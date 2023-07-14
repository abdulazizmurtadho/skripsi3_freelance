<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;


class KriteriaController extends Controller
{
    public function __construct()
    {
        // $this->kriterias = new kriteria();
    }

    public function index()
    {
        $kriteria = Kriteria::all();
        return view('kriteria.index', compact('kriteria'));
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
        return view('kriteria.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required','string'],
            'weight' => ['required','numeric']

            // 'jenis' => 'required',
        ]);

        Kriteria::create([
            'nama' => $request->get('nama'),
            'weight' => $request->get('weight')
        ]);

        $this->updateEigen();

        return redirect()->route('kriteria.index');
    }

    public function show(Kriteria $kriteria)
    {
        return $kriteria;
    }

    public function edit($id)
    {
        // $request->validate([
        //     'nama' => ['required','string'],
        //     'weight' => ['required','numeric']
        //     'jenis' => 'required',
        // ]);

        // $kriteria->update();


        // $this->updateEigen();
        $kriteria= Kriteria::findOrFail($id);

        return redirect()->route('kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, $id)
    {
        Kriteria::find($id)->update([
            'nama' => $request->get('nama'),
            'weight' => $request->get('weight'),
        ]);

        $this->updateEigen();

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('kriteria.index');
    }

    public function destroy($id)
    {
        Kriteria::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('kriteria.index');
    }

    public function updateEigen()
    {
        $total=Kriteria::sum('weight');

        $kriteria=Kriteria::all();
        foreach ($kriteria as $kriterias) {
            $eigen=$kriterias->weight/$total;

            $kriterias->update([
                'eigen'=>$eigen
            ]);
        }
    }
}
