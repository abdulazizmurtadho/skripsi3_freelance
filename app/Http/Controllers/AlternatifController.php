<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;


class AlternatifController extends Controller
{
    public function __construct()
    {
        // $this->kriterias = new kriteria();
    }

    public function index()
    {
        $alternatif = Alternatif::all();
        return view('alternatif.index', compact('alternatif'));
    }

    //     $kriteria = [
    //         'kriteria' => $this->kriteria->allData(),
    //     ];
    //     return view('user.kriteria', $kriteria);
    // }

    public function create(Request $request)
    {
        // $request->validate([
        //     'nama' => ['required','string'],
        //     'weight' => ['required','numeric']
        //     'jenis' => 'required',
        // ]);
        return view('alternatif.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required','string'],
            'alamat' => ['nullable'],
            'nomer' => ['nullable',]

            // 'jenis' => 'required',
        ]);

        Alternatif::create([
            'nama' => $request->get('nama'),
            'alamat' => $request->get('alamat'),
            'nomer' => $request->get('nomer')
        ]);

        return redirect()->route('alternatif.index');
    }

    public function show(Alternatif $alternatif)
    {
        return $alternatif;
    }

    public function edit(Alternatif $alternatif, $id)
    {
        $alternatif= Alternatif::find($id);

        return redirect()->route('alternatif.edit');
    }

    public function update(Request $request, Alternatif $alternatif)
    {
        $request->validate([
            'nama' => ['required','string'],
            'alamat' => ['nullable'],
            'nomer' => ['nullable',]
        ]);

        $alternatif->update();

        return redirect()->route('alternatif.index');
    }

    public function destroy($id)
    {
        Alternatif::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('alternatif.index');
    }
}
