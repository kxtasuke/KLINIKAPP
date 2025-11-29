<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $pasien = \App\Models\Pasien::latest()->paginate(10);
        return view('pasien_index', compact('pasien'));
    }

    public function create()
    {
        return view('pasien_create');
    }

    public function store(Request $request)
    {
        $requestData = $request->validate([
        'no_pasien' => 'required|unique:pasien,no_pasien',
        'nama' => 'required',
        'umur' => 'required|numeric',
        'jenis_kelamin' => 'required|in:laki-laki,perempuan',
        'alamat' => 'nullable',
        // 'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
    ]);
    $pasien = new \App\Models\Pasien(); 
    $pasien->no_pasien = $requestData['no_pasien']; 
    $pasien->nama = $requestData['nama']; 
    $pasien->umur = $requestData['umur']; 
    $pasien->jenis_kelamin = $requestData['jenis_kelamin']; 
    $pasien->alamat = $requestData['alamat']; 
    // $pasien->foto = $request->file('foto')->store('public'); //mengisi objek dengan pathFoto
    $pasien->save();
    return redirect('/pasien')->with('pesan', 'Data sudah disimpan');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $data['pasien'] = \App\Models\Pasien::findOrFail($id);
        return view('pasien_edit', $data);
    }

    public function update(Request $request, string $id)
    {

        $requestData = $request->validate([
            'no_pasien' => 'required|unique:pasiens,no_pasien,' . $id,
            'nama' => 'required|min:3',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat' => 'nullable',
            // 'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
        ]);
        $pasien = \App\Models\Pasien::findOrFail($id);
        $pasien->no_pasien = $requestData['no_pasien'];
        $pasien->nama = $requestData['nama'];
        $pasien->umur = $requestData['umur'];
        $pasien->jenis_kelamin = $requestData['jenis_kelamin'];
        $pasien->alamat = $requestData['alamat'];
        $pasien->save();
        return redirect('/pasien')->with('pesan', 'Data sudah diupdate');
    }

    public function destroy(string $id)
    {
        $pasien = \App\Models\Pasien::findOrFail($id);
        $pasien->delete();
        return back()->with('pesan', 'Data sudah dihapus');
    }
}
