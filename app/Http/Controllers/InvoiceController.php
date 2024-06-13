<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Carbon\Carbon;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // Mengambil semua data invoice dan mengurutkannya berdasarkan t_masuk secara ascending
        $data_invoice = Invoice::orderBy('t_masuk', 'asc')->get();

        foreach ($data_invoice as $invoice) {
            // Mengambil nilai j_dibayar dan j_ditagih dari invoice
            $j_bayar = $invoice->j_dibayar;
            $j_tagih = $invoice->j_ditagih;
            $status = $j_tagih - $j_bayar; // Perbaikan logika status, harus j_tagih dikurangi j_bayar

            // Hitung tanggal jatuh tempo
            $t_masuk = Carbon::parse($invoice->t_masuk);
            $j_tempo = $t_masuk->copy()->addDays($invoice->durasi);
            $t_kirim = Carbon::parse($invoice->t_kirim);

            $status_durasi = '';
            if ($t_kirim->greaterThan($j_tempo)) {
                $telat = $t_kirim->diffInDays($j_tempo);
                $status_durasi = " (Telat Bayar: $telat hari)";
            }

            // Menetapkan status berdasarkan kondisi
            if ($j_tagih == 0) {
                $invoice->status = 'Belum Dibayar Sisa (Rp ' . number_format($status, 0, ',', '.') . ')' . $status_durasi;
            } elseif ($j_bayar < $j_tagih) {
                $invoice->status = 'Belum Lunas Sisa (Rp ' . number_format($status, 0, ',', '.') . ')' . $status_durasi;
            } elseif ($j_bayar > $j_tagih) {
                $invoice->status = 'Dibayarkan Berlebih Sisa (Rp ' . number_format($status, 0, ',', '.') . ')' . $status_durasi;
            } elseif ($j_bayar == $j_tagih) {
                $invoice->status = 'Lunas';
            }

            // Simpan status yang diperbarui
            $invoice->save();
        }

        return view('private.invoice', compact('data_invoice'));
    }

    // public function index()
    // {
    //     // Mengambil semua data invoice dan mengurutkannya berdasarkan t_masuk secara ascending
    //     $data_invoice = Invoice::orderBy('t_masuk', 'asc')->get();

    //     foreach ($data_invoice as $invoice) {
    //         // Mengambil nilai j_dibayar dan j_ditagih dari invoice
    //         $j_bayar = $invoice->j_dibayar;
    //         $j_tagih = $invoice->j_ditagih;
    //         $status = $j_tagih - $j_bayar; // Perbaikan logika status, harus j_tagih dikurangi j_bayar

    //         // Menetapkan status berdasarkan kondisi
    //         if ($j_tagih == 0) {
    //             $invoice->status = 'Belum Dibayar Sisa (Rp ' . number_format($status, 0, ',', '.') . ')';
    //         } elseif ($j_bayar < $j_tagih) {
    //             $invoice->status = 'Belum Lunas Sisa (Rp ' . number_format($status, 0, ',', '.') . ')';
    //         } elseif ($j_bayar > $j_tagih) {
    //             $invoice->status = 'Dibayarkan Berlebih Sisa (Rp ' . number_format($status, 0, ',', '.') . ')';
    //         } elseif ($j_bayar == $j_tagih) {
    //             $invoice->status = 'Lunas';
    //         }
    //     }

    //     return view('private.invoice', compact('data_invoice'));
    // }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                't_masuk'  => 'required',
                't_kirim'  => 'required',
                'durasi'  => 'required',
                'i_nomor' => 'required',
                'j_ditagih' => 'required',
                'j_dibayar' => 'required',
                'n_pajak' => 'required',
                'nom_pajak' => 'required'
            ],
            [
                't_masuk.required'  => 'Tanggal Masuk Wajib Diisi',
                't_kirim.required'  => 'Tanggal Masuk Wajib Diisi',
                'durasi.required'  => 'Tanggal Masuk Wajib Diisi',
                'i_nomor.required' => 'Nomor Invoice Wajib Diisi',
                'j_ditagih.required' => 'Jumlah Ditagih Wajib Diisi',
                'j_dibayar.required' => 'Jumlah Dibayar Wajib Diisi',
                'n_pajak.required' => 'Nomor Pajak Wajib Diisi',
                'nom_pajak.required' => 'Nominal Pajak Wajib Diisi'
            ]
        );
        $data_invoice = [
            't_masuk' => $request->input('t_masuk'),
            't_kirim' => $request->input('t_kirim'),
            'durasi' => $request->input('durasi'),
            'i_nomor' => $request->input('i_nomor'),
            'j_ditagih' => $request->input('j_ditagih'),
            'j_dibayar' => $request->input('j_dibayar'),
            'n_pajak' => $request->input('n_pajak'),
            'nom_pajak' => $request->input('nom_pajak'),
        ];
        Invoice::create($data_invoice);
        return redirect('invoice')->with('Success', 'Data Invoice Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('private.invoice', compact('Editinvoice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'editt_masuk'  => 'required',
                'editt_kirim'  => 'required',
                'editdurasi'  => 'required',
                'editi_nomor' => 'required',
                'editj_ditagih' => 'required',
                'editj_dibayar' => 'required',
                'editn_pajak' => 'required',
                'editnom_pajak' => 'required'
            ]
        );

        $invoice = Invoice::findOrFail($id);

        $invoice->t_masuk = $request->editt_masuk;
        $invoice->t_kirim = $request->editt_kirim;
        $invoice->durasi = $request->editdurasi;
        $invoice->i_nomor = $request->editi_nomor;
        $invoice->j_ditagih = $request->editj_ditagih;
        $invoice->j_dibayar = $request->editj_dibayar;
        $invoice->n_pajak = $request->editn_pajak;
        $invoice->nom_pajak = $request->editnom_pajak;
        $invoice->save();

        return redirect('invoice')->with('Success', 'Data Invoice Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();
        return redirect('invoice')->with('Success', 'Data Invoice Berhasil Dihapus');
    }
}