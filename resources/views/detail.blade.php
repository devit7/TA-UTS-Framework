@extends('layouts.main')

@section('content')
    <div class="container">

        <div class="card w-50 mx-auto mt-5">
            <div class="card-header d-flex justify-content-between">
                <span>
                    Detail Data Diri
                </span>
                <a href="{{ route('data-diri.index')}}" class="">
                    <i class="fa-solid fa-arrow-left-long"></i>
                    Kembali 
                </a>
            </div>
            <div class="card-body d-flex align-items-center">
                <div class="img w-50 me-4">
                    <img src="{{ env('IMG_PATH') . $dataDiri->img_path }}" alt="" class="img-fluid rounded-3">
                </div>
                <div class="me-4">
                    <p class="card-text">NIM: {{ $dataDiri->nim }}</p>
                    <p class="card-text">Nama: {{ $dataDiri->nama }}</p>
                    <p class="card-text">Jurusan: {{ $dataDiri->jurusan }}</p>
                    <p class="card-text">Alamat: {{ $dataDiri->alamat }}</p>
                    <p class="card-text">No. HP: {{ $dataDiri->no_hp }}</p>
                    <p class="card-text">Email: {{ $dataDiri->email }}</p>
                </div>
            </div>
        </div>




    </div>
@endsection
