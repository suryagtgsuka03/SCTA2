<?php

namespace App\Http\Controllers;

use App\Models\pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index()
    {

        $data_pengeluaran = pengeluaran::orderBy('tanggal', 'asc')->get();
        return view('private.pengeluaran', compact('data_pengeluaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'tanggal' => 'required',
                'jumlah' => 'required|int',
                'sumber' => 'required',
                'keterangan' => 'required'
            ],
            [
                'tanggal.required' => 'Tanggal Wajib Diisi',
                'jumlah.required' => 'Jumlah Wajib Diisi',
                'sumber.required' => 'Sumber Wajib Diisi',
                'keterangan.required' => 'KeteranganWajib Diisi'
            ]
        );
        $data_pengeluaran = [
            'tanggal' => $request->input('tanggal'),
            'jumlah' => $request->input('jumlah'),
            'sumber' => $request->input('sumber'),
            'keterangan' => $request->input('keterangan'),
        ];

        pengeluaran::create($data_pengeluaran);
        return redirect('pengeluaran')->with('Success', 'Data Pengeluaran Berhasil Disimpan');
    }

    public function destroy($id)
    {
        $pengeluaran = pengeluaran::findOrFail($id);
        $pengeluaran->delete();
        return redirect('pengeluaran')->with('Success', 'Data Pengeluaran Berhasil Dihapus');
    }

    public function edit($id)
    {
        $pengeluaran = pengeluaran::findOrFail($id);
        return view('private.pengeluaran', compact('pengeluaran'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required',
            'jumlah' => 'required',
            'sumber' => 'required',
            'keterangan' => 'required'
        ]);

        $pengeluaran = pengeluaran::findOrFail($id);

        $pengeluaran->tanggal = $request->tanggal;
        $pengeluaran->jumlah = $request->jumlah;
        $pengeluaran->sumber = $request->sumber;
        $pengeluaran->keterangan = $request->keterangan;
        $pengeluaran->save();

        return redirect('pengeluaran')->with('Success', 'Data Pengeluaran Berhasil Diedit');
    }
}