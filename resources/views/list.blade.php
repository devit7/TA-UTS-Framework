@extends('layouts.main')

@section('content')
    <style>
        #card-img:hover {
            transform: scale(1.1);
        }
    </style>
    <div class="container px-5">

        {{-- Aller --}}
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('status') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- search + tambah data --}}
        <div class="d-flex flex-column flex-md-row justify-content-between mt-5 border-bottom pb-3">
            <a href="{{ route('data-diri.create') }}" class="btn btn-primary mb-2 mb-md-0">
                Tambah Data
                <i class="fa-solid fa-plus ml-1"></i>
            </a>
            <form class="d-flex" action="{{ route('data-diri.index') }}" method="get">
                @csrf
                <input type="text" class="form-control me-2 me-md-0 mb-2 mb-md-0" placeholder="Search..." name="search" value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>

        {{-- list data --}}
        <div class="row justify-content-between gap-4 flex-wrap mt-5">
            @foreach ($dataDiri as $d)
                {{-- Card --}}
                <div class="card text-center position-relative p-2" style="width: 16rem;">
                    {{-- Dropdown --}}
                    <div class="position-absolute top-0 start-0">
                        <div class="dropdown ">
                            <button class="btn btn-link text-dark" type="button" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-paperclip" style="color: blueviolet; ">
                                </i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Copy Link</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="position-absolute top-0 end-0">
                        <div class="dropdown">
                            <button class="btn btn-link text-dark" type="button" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical" style="color: blueviolet;"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item"
                                        href="{{ route('data-diri.edit', ['data_diri' => $d->nim]) }}">Edit</a></li>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $d->nim }}">Delete</a></li>
                            </ul>
                        </div>
                    </div>
                    <a href="{{ route('data-diri.show', ['data_diri' => $d->nim]) }}" class="text-decoration-none">
                        <img id="card-img" src="{{ env('IMG_PATH') . $d->img_path }}"
                            class="card-img-top rounded-circle mx-auto mt-3" alt="..."
                            style="max-height: 120px; max-width: 120px; object-fit: cover; transition: transform 0.3s;">
                        <div class="card-body ">
                            <span class="fw-bold" style="color: rgb(39, 1, 105);">
                                {{ $d->nama }}
                            </span>
                            <br class="mb-1">
                            <span class=" rounded-pill px-2 py-1 "
                                style="background-color: rgb(236, 231, 247); font-size: 0.8rem; color: rgba(76, 65, 100, 0.669); ">
                                {{ $d->jurusan }}
                            </span>
                            <br class="mb-1">
                            <span class="fw-light" style="color: rgb(96, 81, 126);">
                                {{ $d->nim }}
                            </span>
                            <br>
                            <span class="fw-light " style="color: rgb(75, 18, 190);">
                                {{ $d->email }}
                            </span>
                        </div>
                    </a>
                </div>
                <!-- Modal -->
                <x-modal-delete nim="{{ $d->nim }}" nama="{{ $d->nama }}" />
            @endforeach
            <div class="mt-5 border-top pt-3">
                {{ $dataDiri->withQueryString()->links() }}
            </div>
        </div>
        

    </div>
@endsection
