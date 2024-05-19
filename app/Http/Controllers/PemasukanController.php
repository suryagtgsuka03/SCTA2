<?php

namespace App\Http\Controllers;

use App\Models\pemasukan;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data_pemasukan = pemasukan::orderBy('tanggal', 'asc')->get();
        //render view with products
        return view('private.pembukuan', compact('data_pemasukan'));
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

        $request->validate(
            [
                'tanggal' => 'required',
                'jumlah' => 'required',
                'sumber' => 'required',
                'keterangan' => 'required'
            ],
            [
                'tanggal.required' => 'Tanggal Wajib Diisi',
                'jumlah.required' => 'Jumlah Wajib Diisi',
                'sumber.required' => 'Sumber Wajib Diisi',
                'keterangan.required' => 'Keterangan Wajib Diisi'
            ]
        );
        $data_pemasukan = [
            'tanggal' => $request->input('tanggal'),
            'jumlah' => $request->input('jumlah'),
            'sumber' => $request->input('sumber'),
            'keterangan' => $request->input('keterangan'),
        ];


        pemasukan::create($data_pemasukan);
        return redirect('pembukuan')->with('Success', 'Data Pemasukan Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(pemasukan $pemasukan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $pemasukan = pemasukan::findOrFail($id);
    return view('private.pemasukan', compact('pemasukan'));
}


    public function update(Request $request, $id)
{
    $request->validate([
        'tanggal' => 'required',
        'jumlah' => 'required',
        'sumber' => 'required',
        'keterangan' => 'required'
    ]);

    $pemasukan = pemasukan::findOrFail($id);

    $pemasukan->tanggal = $request->tanggal;
    $pemasukan->jumlah = $request->jumlah;
    $pemasukan->sumber = $request->sumber;
    $pemasukan->keterangan = $request->keterangan;
    
    $pemasukan->save();

    return redirect('pembukuan')->with('Success', 'Data Pemasukan Berhasil Diedit');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Cari data pemasukan berdasarkan ID
        $pemasukan = pemasukan::findOrFail($id);
        
        // Hapus data pemasukan
        $pemasukan->delete();
        
        // Redirect kembali ke halaman pembukuan dengan pesan sukses
        return redirect('pembukuan')->with('Success', 'Data Pemasukan Berhasil Dihapus');
    }

}