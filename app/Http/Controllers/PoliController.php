<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $poli = \App\Models\Poli::latest()->paginate(10);
        return view('poli.index', compact('poli'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('poli.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_polis' => 'required|string|max:10|unique:polis',
            'nama' => 'required',
            'biaya' => 'required|integer',
            'is_aktif' => 'required',
            'deskripsi' => 'required',
        ]);

         \App\Models\Poli::create($validated);
          return redirect()->route('polis.index')->with('success', 'Patient created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Poli $poli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Poli $poli)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Poli $poli)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Poli $poli)
    {
        //
    }
}
