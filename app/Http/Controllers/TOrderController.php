<?php

namespace App\Http\Controllers;

use App\Models\PTrans;
use App\Models\Supir;
use App\Models\TOrder;
use App\Models\Truk;
use Illuminate\Http\Request;

class TOrderController extends Controller
{

    public function index()
    {

        $orders = TOrder::all();
        $transports = PTrans::all();
        $truks = Truk::all();
        $supirs = Supir::all();

        foreach ($orders as $order) {
            $progress = $transports->where('no_do', $order->no_do);
            $totalMuat = $progress->sum('tot_muat');
            $sisaBarang = $totalMuat - $order->t_barang;
            if ($totalMuat == 0) {
                $order->progress = 'Belum Dimulai (' . number_format($sisaBarang, 0, ',', '.') . ' Kg)';
            } elseif ($totalMuat > 0 && $totalMuat < $order->t_barang) {
                $order->progress = 'Proses (' . number_format($sisaBarang, 0, ',', '.') . ' Kg)';
            } elseif ($totalMuat >= $order->t_barang) {
                $order->progress = 'Selesai';
            } else {
                $order->progress = 'Tidak Diketahui';
            }
        }

        foreach ($transports as $transport) {
            $torder = TOrder::where('no_do', $transport->no_do)->first();
            if ($torder) {
                $t_susut = $torder->t_susut;
                $jumlah = $torder->t_barang;
                $performa = ($t_susut * $jumlah) / 100;
                $selisih = $transport->tot_muat - $transport->tot_bongkar;

                if ($selisih > $performa) {
                    $transport->status = 'Buruk ( -' . number_format($selisih, 0, ',', '.') . ' Kg )';
                } elseif ($selisih <= $performa) {
                    $transport->status = 'Baik ( -' . number_format($selisih, 0, ',', '.') . ' Kg )';
                }
            } else {
                $transport->status = 'Tidak Diketahui';
            }
        }
        return view('private.torder', compact('orders', 'transports', 'truks', 'supirs'));
    }

    public function create()
    {
        $truks = Truk::all();
        return view('torder.create', compact('truks'));
    }

    public function store(Request $request)
    {
        if ($request->input('form_type') == 'torder') {
            // Validasi untuk TOrder
            $request->validate([
                'perusahaan' => 'required',
                'no_spk' => 'required',
                'no_do' => 'required',
                'j_barang' => 'required',
                'jumlah' => 'required',
                'ppn' => 'required',
                'pph' => 'required',
                't_susut' => 'required',
                'c_susut' => 'required',
                't_barang' => 'required',
                't_bongkar' => 'required',
                't_angkut' => 'required'
            ]);
            $data_torder = [
                'perusahaan' => $request->input('perusahaan'),
                'no_spk' => $request->input('no_spk'),
                'no_do' => $request->input('no_do'),
                'j_barang' => $request->input('j_barang'),
                'jumlah' => $request->input('jumlah'),
                'ppn' => $request->input('ppn'),
                'pph' => $request->input('pph'),
                't_susut' => $request->input('t_susut'),
                'c_susut' => $request->input('c_susut'),
                't_barang'  => $request->input('t_barang'),
                't_bongkar' => $request->input('t_bongkar'),
                't_angkut' => $request->input('t_angkut')
            ];
            // Simpan Data TOrder
            TOrder::create($data_torder);
        } elseif ($request->input('form_type') == 'ptrans') {
            // Validasi untuk PTrans
            $request->validate([
                'no_do-add' => 'required',
                'plat_truk-add' => 'required',
                'supir-add' => 'required',
                'tgl_muat-add' => 'required',
                'tgl_bongkar-add' => 'required',
                'tot_muat-add' => 'required',
                'tot_bongkar-add' => 'required',
                'no_spb-add' => 'required'
            ]);
            $data_transport = [
                'no_do' => $request->input('no_do-add'),
                'plat_truk' => $request->input('plat_truk-add'),
                'supir' => $request->input('supir-add'),
                'tgl_muat' => $request->input('tgl_muat-add'),
                'tgl_bongkar' => $request->input('tgl_bongkar-add'),
                'tot_muat' => $request->input('tot_muat-add'),
                'tot_bongkar' => $request->input('tot_bongkar-add'),
                'no_spb' => $request->input('no_spb-add')
            ];
            // Simpan Data PTrans
            PTrans::create($data_transport);
        }

        return redirect('torder')->with('Success', 'Data berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function destroyTOrder($id)
    {
        $torder = TOrder::findOrFail($id);
        $torder->delete();
        return redirect('torder')->with('Success', 'Data Transport Order Berhasil Dihapus');
    }
    public function destroyPTrans($id)
    {
        $ptrans = PTrans::findOrFail($id);
        $ptrans->delete();
        return redirect('torder')->with('Success', 'Data Progress Transport Berhasil Dihapus');
    }

    public function editTorder($id)
    {
        $torder = TOrder::findOrFail($id);

        return view('private.torder-edit', compact('torder'));
    }

    public function editPTrans($id)
    {
        $ptrans = PTrans::findOrFail($id);
        $truks = Truk::all();

        return view('private.ptrans-edit', compact('ptrans', 'truks'));
    }

    public function updateTorder(Request $request, $id)
    {
        // Validasi untuk TOrder
        $request->validate([
            'perusahaanedit' => 'required',
            'no_spkedit' => 'required',
            'no_doedit' => 'required',
            'j_barangedit' => 'required',
            'jumlahedit' => 'required',
            'ppnedit' => 'required',
            'pphedit' => 'required',
            't_susutedit' => 'required',
            'c_susutedit' => 'required',
            't_barangedit' => 'required',
            't_bongkaredit' => 'required',
            't_angkutedit' => 'required'
        ]);

        $torder = TOrder::findOrFail($id);

        $torder->perusahaan = $request->perusahaanedit;
        $torder->no_spk = $request->no_spkedit;
        $torder->no_do = $request->no_doedit;
        $torder->j_barang = $request->j_barangedit;
        $torder->jumlah = $request->jumlahedit;
        $torder->ppn = $request->ppnedit;
        $torder->pph = $request->pphedit;
        $torder->t_susut = $request->t_susutedit;
        $torder->c_susut = $request->c_susutedit;
        $torder->t_barang = $request->t_barangedit;
        $torder->t_bongkar = $request->t_bongkaredit;
        $torder->t_angkut = $request->t_angkutedit;

        $torder->save();
        return redirect('torder')->with('Success', 'Data Berhasil Diedit');
    }

    public function updatePTrans(Request $request, $id)
    {
        // Validasi untuk PTrans
        $request->validate([
            'editno_do' => 'required',
            'plat_trukedit' => 'required',
            'supiredit' => 'required',
            'tgl_muatedit' => 'required',
            'tgl_bongkaredit' => 'required',
            'tot_muatedit' => 'required',
            'tot_bongkaredit' => 'required',
            'no_spbedit' => 'required'
        ]);

        $ptrans = PTrans::findOrFail($id);

        // Update data PTrans
        $ptrans->no_do = $request->editno_do;
        $ptrans->plat_truk = $request->plat_trukedit;
        $ptrans->supir = $request->supiredit;
        $ptrans->tgl_muat = $request->tgl_muatedit;
        $ptrans->tgl_bongkar = $request->tgl_bongkaredit;
        $ptrans->tot_muat = $request->tot_muatedit;
        $ptrans->tot_bongkar = $request->tot_bongkaredit;
        $ptrans->no_spb = $request->no_spbedit;

        $ptrans->save();

        return redirect('torder')->with('Success', 'Data Berhasil Diedit');
    }
}