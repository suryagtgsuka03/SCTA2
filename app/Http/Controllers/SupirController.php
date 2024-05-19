<?php

namespace App\Http\Controllers;

//import model product
use App\Models\Supir;

//import return type View
use Illuminate\View\View;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class SupirController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(): View
    {
        $data = Supir::orderBy('nama', 'asc')->get();
        //render view with products
        return view('private.monitor', compact('data'));
    }

    public function store(Request $request)
    {
        
        $request->validate(
            [
                'nama' => 'required',
                'nomor_ktp' => 'required|min:16|max:16',
                'tanggal_lahir' => 'required',
                'plat_truk' => 'required',
                'asal' => 'required',
                'foto' => 'required',
                'foto_ktp' => 'required'
            ],
            [
                'nama.required' => 'Nama Wajib Diisi',
                'nomor_ktp.required' => 'Nomor KTP Wajib Diisi',
                'nomor_ktp.min' => 'Nomor KTP Harus 16 Digit',
                'tanggal_lahir.required' => 'Tanggal Lahir Wajib Diisi',
                'plat_truk.required' => 'PLat Truk Wajib Diisi',
                'asal.required' => 'Asal Wajib Diisi',
                'foto.required' => 'Foto Wajib Diisi',
                'foto_ktp.required' => 'Foto KTP Wajib Diisi'

            ]
        );
        
        $foto = $request->file('foto');
        $filename = date('Y-m-d').$foto->getClientOriginalName();
        $path = 'foto/'.$filename;
        Storage::disk('public')->put($path,file_get_contents($foto));


        $foto_ktp = $request->file('foto_ktp');
        $filename_ktp = date('Y-m-d').$foto_ktp->getClientOriginalName();
        $path = 'foto_ktp/'.$filename_ktp;
        Storage::disk('public')->put($path,file_get_contents($foto_ktp));
        
        $data = [
            'nama' => $request->input('nama'),
            'no_ktp' => $request->input('nomor_ktp'),
            't_lahir' => $request->input('tanggal_lahir'),
            'umur' => $request->input('umur'),
            'p_truk' => $request->input('plat_truk'),
            'asal' => $request->input('asal'),
            'foto' => $filename,
            'foto_ktp' => $filename_ktp,
        ];
        

        Supir::create($data);
        return redirect('monitor')->with('Success', 'Data Supir Berhasil Disimpan');
    }
    
    
    public function edit($id)
{
    $supir = supir::findOrFail($id);
    return view('private.monitor', compact('supir'));
}


    public function update(Request $request, $id)
{
    $request->validate(
        [
            'nama' => 'required',
            'nomor_ktp' => 'required|min:16|max:16',
            'tanggal_lahir' => 'required',
            'plat_truk' => 'required',
            'asal' => 'required',
            'foto' => 'required',
            'foto_ktp' => 'required'
        ],
        [
            'nama.required' => 'Nama Wajib Diisi',
            'nomor_ktp.required' => 'Nomor KTP Wajib Diisi',
            'nomor_ktp.min' => 'Nomor KTP Harus 16 Digit',
            'tanggal_lahir.required' => 'Tanggal Lahir Wajib Diisi',
            'plat_truk.required' => 'PLat Truk Wajib Diisi',
            'asal.required' => 'Asal Wajib Diisi',
            'foto.required' => 'Foto Wajib Diisi',
            'foto_ktp.required' => 'Foto KTP Wajib Diisi'

        ]
    );
    
    $supir = supir::findOrFail($id);

    $supir->nama = $request->nama;
    $supir->nomor_ktp = $request->nomor_ktp;
    $supir->tanggal_lahir = $request->tanggal_lahir;
    $supir->plat_truk = $request->plat_truk;
    $supir->asal = $request->asal;
    $supir->foto = $request->foto;
    $supir->foto_ktp = $request->foto_ktp;
    
    $supir->save();

    return redirect('supir')->with('Success', 'Data supir Berhasil Diedit');
}
}