<?php

namespace App\Http\Controllers;

//import model product

use App\Models\PTrans;
use App\Models\Supir;
use App\Models\Truk;

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
        $data = Supir::all();
        $truks = Truk::all();
        $trips = PTrans::orderBy('supir', 'asc')->get();
        return view('private.monitor', compact('data', 'trips', 'truks'));
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
                'foto' => 'required|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'foto_ktp' => 'required|mimes:jpeg,png,jpg,gif,webp|max:2048'
            ],
            [
                'nama.required' => 'Nama Wajib Diisi',
                'nomor_ktp.required' => 'Nomor KTP Wajib Diisi',
                'nomor_ktp.min' => 'Nomor KTP Harus 16 Digit',
                'tanggal_lahir.required' => 'Tanggal Lahir Wajib Diisi',
                'plat_truk.required' => 'Plat Truk Wajib Diisi',
                'asal.required' => 'Asal Wajib Diisi',
                'foto.required' => 'Foto Wajib Diisi',
                'foto.image' => 'File Foto Harus Berupa Gambar',
                'foto.mimes' => 'Format File Foto Harus jpeg, png, jpg, gif, atau webp',
                'foto.max' => 'Ukuran File Foto Maksimal 2MB',
                'foto_ktp.required' => 'Foto KTP Wajib Diisi',
                'foto_ktp.image' => 'File Foto KTP Harus Berupa Gambar',
                'foto_ktp.mimes' => 'Format File Foto KTP Harus jpeg, png, jpg, gif, atau webp',
                'foto_ktp.max' => 'Ukuran File Foto KTP Maksimal 2MB'
            ]
        );
        $foto = $request->file('foto');
        $filename = date('Y-m-d') . $foto->getClientOriginalName();
        $path = 'foto/' . $filename;
        Storage::disk('public')->put($path, file_get_contents($foto));
        $foto_ktp = $request->file('foto_ktp');
        $filename_ktp = date('Y-m-d') . $foto_ktp->getClientOriginalName();
        $path = 'foto_ktp/' . $filename_ktp;
        Storage::disk('public')->put($path, file_get_contents($foto_ktp));

        $data = [
            'nama' => $request->input('nama'),
            'no_ktp' => $request->input('nomor_ktp'),
            't_lahir' => $request->input('tanggal_lahir'),
            'umur' => $request->input('umur'),
            'p_truk' => $request->input('plat_truk'),
            'asal' => $request->input('asal'),
            'foto' => $filename,
            'foto_ktp' => $filename_ktp,
            'ptrans_id' => $request->input('plat_trukedit'),
        ];
        Supir::create($data);
        return redirect()->route('monitor.get')->with('Success', 'Data Supir Berhasil Disimpan');
    }

    public function edit($id)
    {
        $supir = Supir::findOrFail($id);
        return response()->json($supir);
    }

    public function show($id)
    {
        $supir = Supir::findOrFail($id);
        return response()->json($supir);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nama' => 'required',
                'nomor_ktp' => 'required|min:16|max:16',
                'tanggal_lahir' => 'required',
                'plat_truk' => 'required',
                'asal' => 'required'
            ],
            [
                'nama.required' => 'Nama Wajib Diisi',
                'nomor_ktp.required' => 'Nomor KTP Wajib Diisi',
                'nomor_ktp.min' => 'Nomor KTP Harus 16 Digit',
                'tanggal_lahir.required' => 'Tanggal Lahir Wajib Diisi',
                'plat_truk.required' => 'Plat Truk Wajib Diisi',
                'asal.required' => 'Asal Wajib Diisi'
            ]
        );
        $supir = Supir::findOrFail($id);
        $supir->nama = $request->input('nama');
        $supir->no_ktp = $request->input('nomor_ktp');
        $supir->t_lahir = $request->input('tanggal_lahir');
        $supir->umur = $request->input('umur');
        $supir->p_truk = $request->input('plat_truk');
        $supir->asal = $request->input('asal');
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = date('Y-m-d') . $foto->getClientOriginalName();
            $path = 'foto/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($foto));
            $supir->foto = $filename;
        }
        if ($request->hasFile('foto_ktp')) {
            $foto_ktp = $request->file('foto_ktp');
            $filename_ktp = date('Y-m-d') . $foto_ktp->getClientOriginalName();
            $path = 'foto_ktp/' . $filename_ktp;
            Storage::disk('public')->put($path, file_get_contents($foto_ktp));
            $supir->foto_ktp = $filename_ktp;
        }

        $supir->save();
        return redirect()->route('monitor.get')->with('Success', 'Data supir Berhasil Diedit');
    }

    public function destroy($id)
    {
        $supir = Supir::findOrFail($id);
        if ($supir->foto) {
            Storage::disk('public')->delete('foto/' . $supir->foto);
        }
        if ($supir->foto_ktp) {
            Storage::disk('public')->delete('foto_ktp/' . $supir->foto_ktp);
        }
        $supir->delete();
        return redirect()->route('monitor.get')->with('Success', 'Data Supir Berhasil Dihapus');
    }
}