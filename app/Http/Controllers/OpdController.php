<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;

class OpdController extends Controller
{
    public function index()
    {
        $data = Instansi::all();
        return view('opd', compact('data'));
    }

    public function create()
    {
        return view('opd-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_opd' => ['required','string','max:25','unique:opd,kode_opd'],
            'nama_opd' => ['required','string','max:225'],
            'is_active' => ['required','boolean']
        ],
        [
            'kode_opd.required'=>'kode OPD wajib diisi',
            'kode_opd.string'=> 'kode OPD harus berupa string',
            'kode_opd.max'=> 'kode OPD maksimal 255 karakter',
            'kode_opd.unique'=> 'kode OPD sudah digunakan',
            'nama_opd.required'=> 'Nama OPD wajib diisi',
            'nama_opd.string'=> 'Nama OPD harus berupa string',
            'nama_opd.max'=> 'Nama OPD maksimal 255 karakter',
            'is_active.required'=> 'Status OPD wajib diisi',
            'is_active.boolean'=> 'Status OPD harus berupa boolean'
        ]
        );
        Instansi::create([
            'kode_opd' => $request->kode_opd,
            'nama_opd' => $request->nama_opd,
            'is_active' => $request->is_active,

        ]);
        return redirect()->route('opd')->with('success','Data OPD berhasil ditambahkan');
    }

    public function edit(Instansi $instansi)
    {
        return view('opd-edit', compact('instansi'));
    }

    public function update(Request $request, Instansi $instansi)
    {
        $request->validate([
            'kode_opd' => ['required', 'string', 'max:255', 'unique:opd,kode_opd,' . $instansi->id],
            'nama_opd' => ['required', 'string', 'max:255'],
            'is_active' => ['required', 'boolean']
        ],
        [
            'kode_opd.required'=>'kode OPD wajib diisi',
            'kode_opd.string'=> 'kode OPD harus berupa string',
            'kode_opd.max'=> 'kode OPD maksimal 255 karakter',
            'kode_opd.unique'=> 'kode OPD sudah digunakan',
            'nama_opd.required'=> 'Nama OPD wajib diisi',
            'nama_opd.string'=> 'Nama OPD harus berupa string',
            'nama_opd.max'=> 'Nama OPD maksimal 255 karakter',
            'is_active.required'=> 'Status OPD wajib diisi',
            'is_active.boolean'=> 'Status OPD harus berupa boolean'
        ]
        );

        $instansi->update([
             'kode_opd' => $request->kode_opd,
            'nama_opd' => $request->nama_opd,
            'is_active' => $request->is_active
        ]);

        return redirect()->route(route:'opd')->with(key: 'succes', value: 'OPD berhasil diupdate');
    }

    public function destroy(Instansi $instansi)
    {
        $instansi->delete();
        return redirect()->route(route:'opd')->with(key:'succes', value: 'OPD berhasil dihapus');

    }
}
