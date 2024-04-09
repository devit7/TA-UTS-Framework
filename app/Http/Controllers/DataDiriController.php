<?php

namespace App\Http\Controllers;

use App\Models\DataDiri;
use Illuminate\Http\Request;

class DataDiriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('list', [
            'dataDiri' => DataDiri::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('datadiri.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        
        // Validasi data
        $request->validate([
            'nim' => 'required|unique:data_diris',
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'jurusan' => 'required',
            'img_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk jenis file gambar
        ]);
        
        $fileName = '';
        // Rename dan menyimpan file gambar
        if ($request->hasFile('img_path')) {
            $file = $request->file('img_path');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/img', $fileName);
        }
        
        // Simpan data ke database
        DataDiri::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'jurusan' => $request->jurusan,
            'img_path' => $fileName,
        ]);

        // Redirect ke halaman list
        return redirect('/data-diri')->with('status', 'Data berhasil ditambahkan');


        // dd($file);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataDiri  $dataDiri
     * @return \Illuminate\Http\Response
     */
    public function show(DataDiri $dataDiri)
    {
        //

        return view('detail', [
            'dataDiri' => $dataDiri
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataDiri  $dataDiri
     * @return \Illuminate\Http\Response
     */
    public function edit(DataDiri $dataDiri)
    {
        //
        return view('datadiri.edit', [
            'dataDiri' => $dataDiri
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataDiri  $dataDiri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataDiri $dataDiri)
    {
        //
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'jurusan' => 'required',
            'img_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk jenis file gambar
        ]);

        $fileName = '';
        // Rename dan menyimpan file gambar
        if ($request->hasFile('img_path')) {
            $file = $request->file('img_path');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/img', $fileName);
        }

        DataDiri::where('nim', $dataDiri->nim)
            ->update([
                'nim' => $request->nim,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'jurusan' => $request->jurusan,
                'img_path' => $fileName,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataDiri  $dataDiri
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataDiri $dataDiri)
    {
        $dataDiri->delete();

        // delete file
        unlink(storage_path('app/public/img/' . $dataDiri->img_path));

        return redirect('/data-diri')->with('status', 'Data berhasil dihapus');
    }
}