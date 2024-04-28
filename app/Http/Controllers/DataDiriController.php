<?php

namespace App\Http\Controllers;

use App\Models\DataDiri;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Stringable;

class DataDiriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //validasi search   
        $dataDiri = DataDiri::where('nim', 'like', "%$request->search%")
            ->orWhere('nama', 'like', "%$request->search%")
            ->orWhere('alamat', 'like', "%$request->search%")
            ->orWhere('email', 'like', "%$request->search%")
            ->orWhere('no_hp', 'like', "%$request->search%")
            ->orWhere('jurusan', 'like', "%$request->search%")
            ->paginate(4);

        return view('list', [
            'dataDiri' => $dataDiri
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('datadiri.add');
    }
    public function store(Request $request)
    {
        // Validasi data agar sesuai dengan ketentuan
        $request->validate(
            [
                'nim' => 'required|unique:data_diris|numeric',
                'nama' => 'required',
                'alamat' => 'required',
                'email' => 'required|email|unique:data_diris',
                'no_hp' => 'required|numeric|min:13|unique:data_diris',
                'jurusan' => 'required',
                'img_path' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Validasi untuk jenis file gambar
                'bio' => 'required'
            ],
            [
                'nim.required' => 'NIM harus diisi',
                'nim.numeric' => 'NIM harus berupa angka',
                'nim.unique' => 'NIM sudah terdaftar',
                'nama.required' => 'Nama harus diisi',
                'alamat.required' => 'Alamat harus diisi',
                'email.required' => 'Email harus diisi',
                'email.email' => 'Email harus berupa email', 
                'email.unique' => 'Email sudah terdaftar',   
                'no_hp.required' => 'No HP harus diisi',
                'no_hp.numeric' => 'No HP harus berupa angka',
                'no_hp.min' => 'No HP minimal 13 digit',
                'no_hp.unique' => 'No HP sudah terdaftar',
                'jurusan.required' => 'Jurusan harus diisi',
                'img_path.required' => 'Gambar harus diisi',
                'img_path.image' => 'File harus berupa gambar',
                'img_path.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg',
                'img_path.max' => 'Ukuran gambar maksimal 2MB',
                'bio.required' => 'Bio harus diisi'
            ]

        );
        $fileName = '';
        // Rename dan menyimpan file gambar
        if ($request->hasFile('img_path')) { // jika ada file img_path
            $file = $request->file('img_path'); //menyimpan file img_path
            // melakukan perubahan nama file
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            // menyimpan file img_path ke folder public/img
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
            'bio' => $request->bio
        ]);
        // Redirect ke halaman list
        return redirect('/data-diri')->with('status', 'Data berhasil ditambahkan');
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
    public function edit(DataDiri $dataDiri)
    {
        //
        return view('datadiri.edit', [
            'dataDiri' => $dataDiri
        ]);
    }
    public function update(Request $request, DataDiri $dataDiri)
    {
        // melakukan validasi
        $request->validate(
            [
                'nim' => ['required', 'numeric', Rule::unique('data_diris')->ignore($dataDiri->nim, 'nim')], 
                'nama' => 'required',
                'alamat' => 'required',
                'email' => ['required', 'email', Rule::unique('data_diris')->ignore($dataDiri->email, 'email')],
                'no_hp' => ['required', 'numeric', 'min:13', Rule::unique('data_diris')->ignore($dataDiri->no_hp, 'no_hp')],
                'jurusan' => 'required',
                'bio' => 'required',
            ],
            [
                'nim.required' => 'NIM harus diisi',
                'nim.numeric' => 'NIM harus berupa angka',
                'nim.unique' => 'NIM sudah terdaftar',
                'nama.required' => 'Nama harus diisi',
                'alamat.required' => 'Alamat harus diisi',
                'email.required' => 'Email harus diisi',
                'email.email' => 'Email harus berupa email', 
                'email.unique' => 'Email sudah terdaftar',   
                'no_hp.required' => 'No HP harus diisi',
                'no_hp.numeric' => 'No HP harus berupa angka',
                'no_hp.min' => 'No HP minimal 13 digit',
                'no_hp.unique' => 'No HP sudah terdaftar',
                'jurusan.required' => 'Jurusan harus diisi',
                'bio.required' => 'Bio harus diisi'
            ]
        );
        // Menyimpan nama file lama
        $NamaFileLama = $dataDiri->img_path;

        $fileName = $dataDiri->img_path;
        // Jika ada perubahan pada img_path
        if ($request->hasFile('img_path')) {
            // Validasi untuk jenis file img_path
            $request->validate(
                [
                    'img_path' => 'image|mimes:jpeg,png,jpg|max:2048',
                ],
                [
                    'img_path.required' => 'Gambar harus diisi',
                    'img_path.image' => 'File harus berupa gambar',
                    'img_path.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg',
                    'img_path.max' => 'Ukuran gambar maksimal 2MB',
                ]
            );
            // Rename dan menyimpan file img_path
            $file = $request->file('img_path');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/img', $fileName);

            //delete file gambar lama
            Storage::delete('public/img/' . $NamaFileLama);
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
                'bio' => $request->bio
            ]);

        // Redirect ke halaman list
        return redirect('/data-diri')->with('status', "Data $request->nama berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataDiri  $dataDiri
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataDiri $dataDiri)
    {
        Storage::delete('public/img/' . $dataDiri->img_path);
        $dataDiri->delete();

        return redirect('/data-diri')->with('status', 'Data berhasil dihapus');
    }
}
