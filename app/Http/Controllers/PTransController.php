<?php

namespace App\Http\Controllers;

use App\Models\PTrans;
use App\Models\TOrder;
use Illuminate\Http\Request;

class PTransController extends Controller
{
    public function index()
    {
        $transports = PTrans::all();
        $orders = Torder::all();
        return view('private.torder', compact('orders', 'transports'));
    }
    public function store(Request $request)
    {
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

        PTrans::create($data_transport);
        return redirect('torder')->with('Success', 'Data Progress Transport berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $ptrans = PTrans::findOrFail($id);
        $ptrans->delete();
        return redirect('ptrans')->with('Success', 'Data Progress Transport Berhasil Dihapus');
    }

    public function edit($id)
    {
        $ptrans = PTrans::findOrFail($id);
        return view('private.ptrans-edit', compact('transport'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
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

        $torder = PTrans::findOrFail($id);

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

        return redirect('torder')->with('Success', 'Data Transport Order Berhasil Diedit');
    }
}