<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;

class PetController extends Controller
{
    public function home()
    {
        $pets = Pet::latest()->take(3)->get();
        return view('home', compact('pets'));
    }

    public function index(Request $request)
    {
        $query = Pet::query();

        if ($request->search) {
            $query->where('nama', 'LIKE', '%' . $request->search . '%');
        }

        if ($request->kategori) {
            $query->where('jenis', 'LIKE', '%' . $request->kategori . '%');
        }

        $pets = $query->latest()->get();

        return view('pets.index', compact('pets'));
    }

    public function create()
    {
        return view('pets.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'umur' => 'required|integer',
            'gender' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png,avif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('pets', 'public');
        }

        $data['status'] = 'Tersedia';

        Pet::create($data);

        return redirect('/admin')->with('success', 'Hewan berhasil ditambahkan!');
    }

    public function show($id)
    {
        $pet = Pet::findOrFail($id);
        return view('pets.show', compact('pet'));
    }

    public function edit($id)
    {
        $pet = Pet::findOrFail($id);
        return view('edit', compact('pet'));
    }

    public function update(Request $request, $id)
    {
        $pet = Pet::findOrFail($id);

        $data = $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'umur' => 'required|integer',
            'gender' => 'required',
            'deskripsi' => 'required',
            'status' => 'required',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('pets', 'public');
            
        }

        $pet->update($data);

        return redirect('/admin')->with('success', 'Data hewan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $pet = Pet::findOrFail($id);
        $pet->delete();

        return redirect('/admin')->with('success', 'Hewan berhasil dihapus!');
    }
}