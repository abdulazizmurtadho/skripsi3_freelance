<?php

namespace App\Http\Controllers;

use App\Models\Perhitungan;
use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;


class PerhitunganController extends Controller
{
    public function __construct()
    {
        // $this->kriterias = new kriteria();
    }

    public function index()
    {
        
        return view('user.perhitungan.index');
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
        return view('user.perhitungan.create');
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

        return redirect()->route('perhitungan.index');
    }

    public function show(Alternatif $alternatif)
    {
        return $alternatif;
    }

    public function edit(Perhitungan $perhitungan, $id)
    {
        $alternatif= Alternatif::find($id);

        return redirect()->route('user.alternatif.edit');
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

    public function destroy(Alternatif $alternatif, $id)
    {
        $alternatif->delete($id);

        return redirect()->route('altertnatif.index');
    }
}
