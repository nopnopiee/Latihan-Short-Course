<?php

namespace App\Http\Controllers;

use App\Models\Kategori;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::orderBy('id', 'desc')->get();
        return view('v_kategori.index', [
            'judul' => 'Kategori',
            'sub' => 'Data Kategori',
            'kategori' => $kategori
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('v_kategori.create', [
            'judul' => 'Kategori',
            'sub' => 'Tambah Kategori'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ddd($request);
        $validatedData = $request->validate([
            'kd_kategori' => 'required|max:6|unique:kategori',
            'nama_kategori' => 'required|max:255',
        ]);
        Kategori::create($validatedData);
        return redirect('/kategori')->with('success', 'Data berhasil tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Mengambil data berdasarkan ID
        $kategori = Kategori::findOrFail($id);
        
        // Jika data ditemukan, kembalikan view dengan data
        if ($kategori) {
            return view('v_kategori.detail', compact('kategori'));
        } else {
            // Jika data tidak ditemukan, bisa diarahkan ke halaman error atau pesan lainnya
            return redirect()->route('halaman.error')->with('message', 'Data tidak ditemukan.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('v_kategori.edit', [
            'judul' => 'Kategori',
            'sub' => 'Ubah Kategori',
            'edit' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategori = Kategori::findOrFail($id);
        $rules = [
            'nama_kategori' => 'required|max:255',
        ];
        if ($request->kd_kategori != $kategori->kd_kategori) {
            $rules['kd_kategori'] = 'required|max:6|unique:kategori';
        }

        $validatedData = $request->validate($rules);
        Kategori::where('id', $id)->update($validatedData);
        return redirect('/kategori')->with('success', 'Data berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect('/kategori');
    }
}
