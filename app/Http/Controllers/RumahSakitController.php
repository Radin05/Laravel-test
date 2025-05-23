<?php
namespace App\Http\Controllers;

use App\Models\RumahSakit;
use Illuminate\Http\Request;

class RumahSakitController extends Controller
{
    public function index()
    {
        $rumahSakit = RumahSakit::all();
        return view('rumahSakit.index', compact('rumahSakit'));
    }

    public function create()
    {
        return view('rumahSakit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_rumah_sakit' => 'required|string|max:255',
            'alamat'           => 'required|string',
            'email'            => 'required|unique:rumah_sakits,email',
        ]);

        RumahSakit::create($request->all());

        return redirect()->route('rumahSakit.index')->with('success', 'Rumah sakit berhasil ditambahkan.');
    }

    public function show(RumahSakit $rumahSakit)
    {
        return view('rumahSakit.show', compact('rumahSakit'));
    }

    public function edit(RumahSakit $rumahSakit)
    {
        return view('rumahSakit.edit', compact('rumahSakit'));
    }

    public function update(Request $request, RumahSakit $rumahSakit)
    {
        $request->validate([
            'nama_rumah_sakit' => 'required|string|max:255',
            'alamat'           => 'required|string',
            'email'            => 'required|email|max:255',
        ]);

        $rumahSakit->update($request->all());

        return redirect()->route('rumahSakit.index')->with('success', 'Data rumah sakit berhasil diperbarui.');
    }

    public function destroy(RumahSakit $rumahSakit)
    {
        if ($rumahSakit->pasien()->count() > 0) {
            return response()->json([
                'message' => 'Gagal menghapus: Rumah sakit ini masih memiliki pasien yang terdaftar. Silakan hapus pasien terlebih dahulu.'
            ], 400);
        }

        $rumahSakit->delete();

        return response()->json(['message' => 'Data rumah sakit berhasil dihapus.']);
    }

}
