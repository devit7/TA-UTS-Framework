@extends('layouts.main')

@section('content')
    <div class="container pt-2 ">

        <div class="w-75 mx-auto mt-5 px-5">
            <div class="d-flex  justify-content-end">
                <a href="{{ route('data-diri.index') }}" class="d-flex ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                    </svg>
                    <p class="">
                        back
                    </p>
                </a>
            </div>
            <div class="d-flex align-items-center justify-content-between">
                <div class="me-4 d-flex flex-column w-50">
                    <div>
                        <h1 class="fw-bold">{{ $dataDiri->nama }}</h1>
                    </div>
                    <div class="d-flex gap-4">
                        <div class="me-4 d-flex flex-column ">
                            <span class="text-secondary">
                                Alamat
                            </span>
                            <p class="fw-bold">
                                {{ $dataDiri->alamat }}
                            </p>
                        </div>
                        <div class="me-4 d-flex flex-column ">
                            <span class="text-secondary">
                                Email
                            </span>
                            <p class="fw-bold">
                                {{ $dataDiri->email }}
                            </p>
                        </div>
                    </div>
                    <div>
                        <p>
                            {{ $dataDiri->bio }}
                        </p>
                    </div>
                    <div class="d-flex flex-column">
                        <div class="d-flex items-center gap-2">
                            <div class="d-flex justify-content-center align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6"
                                    style=" width: 35px; height: 35px;">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                                </svg>
                            </div>
                            <div class="d-flex flex-column">
                                <span class="text-secondary">
                                    No. HP
                                </span>
                                <p class="fw-bold">
                                    {{ $dataDiri->no_hp }}
                                </p>
                            </div>
                        </div>
                        <div class="d-flex items-center gap-2 align-items-center">
                            <div class="d-flex justify-content-center align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6"
                                    style=" width: 35px; height: 35px;">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                </svg>
                            </div>
                            <div class="d-flex flex-column ">
                                <span class="text-secondary">
                                    Jurusan
                                </span>
                                <p class="fw-bold">
                                    {{ $dataDiri->jurusan }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="img  me-4 rounded-3" style="width: 350px; height: 350px; overflow: hidden">
                    <img src="{{ env('IMG_PATH') . $dataDiri->img_path }}" alt="" class="img-fluid  ">
                </div>
            </div>
        </div>




    </div>
@endsection
