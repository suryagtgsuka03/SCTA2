<?php

namespace App\Http\Controllers;

use App\Models\TOrder;
use Illuminate\Http\Request;

class TOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = TOrder::all();
        return view('private.torder', compact('orders'));
    }

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

        TOrder::create($data_torder);
        return redirect('torder')->with('Success', 'Data Transport Order berhasil ditambahkan.');
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

    public function destroy($id)
    {
        $torder = TOrder::findOrFail($id);
        $torder->delete();
        return redirect('torder')->with('Success', 'Data Transport Order Berhasil Dihapus');
    }

    public function edit($id)
    {
        $torder = TOrder::findOrFail($id);
        return view('private.torder-edit', compact('torder'));
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

        return redirect('torder')->with('Success', 'Data Transport Order Berhasil Diedit');
    }
}