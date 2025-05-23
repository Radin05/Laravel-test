<?php
namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RumahSakit;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens     = Pasien::with('rumahSakit')->get();
        $rumahSakits = RumahSakit::all();

        return view('pasien.index', compact('pasiens', 'rumahSakits'));
    }

    public function create()
    {
        $rumahSakits = RumahSakit::all();
        return view('pasien.create', compact('rumahSakits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pasien'    => 'required|string|max:255',
            'alamat'         => 'required|string',
            'no_telepon'     => 'required|string|max:20',
            'id_rumah_sakit' => 'required|exists:rumah_sakits,id',
        ]);

        Pasien::create($request->all());

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil ditambahkan.');
    }

    public function show(Pasien $pasien)
    {
        return view('pasien.show', compact('pasien'));
    }

    public function edit(Pasien $pasien)
    {
        $rumahSakits = RumahSakit::all();
        return view('pasien.edit', compact('pasien', 'rumahSakits'));
    }

    public function update(Request $request, Pasien $pasien)
    {
        $request->validate([
            'nama_pasien'    => 'required|string|max:255',
            'alamat'         => 'required|string',
            'no_telepon'     => 'required|string|max:20',
            'id_rumah_sakit' => 'required|exists:rumah_sakits,id',
        ]);

        $pasien->update($request->all());

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil diperbarui.');
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();

        return response()->json(['message' => 'Data pasien berhasil dihapus.']);
    }

    public function filter(Request $request)
    {
        $query = Pasien::with('rumahSakit');

        if ($request->id_rumah_sakit) {
            $query->where('id_rumah_sakit', $request->id_rumah_sakit);
        }

        $pasiens = $query->get();

        return view('partials._tabel_pasien', compact('pasiens'))->render();
    }

}
