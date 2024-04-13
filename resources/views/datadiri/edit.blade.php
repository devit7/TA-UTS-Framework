@extends('layouts.main')

@section('content')
    <div class="container">

        <div class="card p-3 mx-auto">
            <h1 class="card-title text-center mb-3">Edit Data Diri</h1>
            <form action="{{ route('data-diri.update', ['data_diri' => $dataDiri->nim]) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row mb-2">
                    <div class="col-md-6">
                        <label for="exampleInputNIM" class="form-label">NIM</label>
                        <input type="text" class="form-control @error('nim') is-invalid @enderror" id="exampleInputNIM"
                            aria-describedby="NIMHelp" name="nim" value="{{ $dataDiri->nim }}">
                        @error('nim')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputNama" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputNama"
                            aria-describedby="NamaHelp" name="nama" value="{{ $dataDiri->nama }}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <label for="exampleInputJurusan" class="form-label">Jurusan</label>
                        <select class="form-select @error('jursan') is-invalid @enderror" id="exampleInputJurusan"
                            aria-describedby="JurusanHelp" name="jurusan">
                            <option selected>Pilih Jurusan</option>
                            <option value="Teknik Informatika"
                                {{ $dataDiri->jurusan == 'Teknik Informatika' ? 'selected' : '' }}>Teknik Informatika
                            </option>
                            <option value="Teknik Elektro" {{ $dataDiri->jurusan == 'Teknik Elektro' ? 'selected' : '' }}>
                                Teknik Elektro</option>
                            <option value="Teknik Industri" {{ $dataDiri->jurusan == 'Teknik Industri' ? 'selected' : '' }}>
                                Teknik Industri</option>
                            <option value="Teknik Mesin" {{ $dataDiri->jurusan == 'Teknik Mesin' ? 'selected' : '' }}>Teknik
                                Mesin</option>
                            <option value="Teknik Sipil" {{ $dataDiri->jurusan == 'Teknik Sipil' ? 'selected' : '' }}>Teknik
                                Sipil</option>
                            <option value="Rekaya Perangkat Lunak"
                                {{ $dataDiri->jurusan == 'Rekaya Perangkat Lunak' ? 'selected' : '' }}>Rekaya Perangkat
                                Lunak</option>
                        </select>
                        @error('jurusan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputAlamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                            id="exampleInputAlamat" aria-describedby="AlamatHelp" name="alamat"
                            value="{{ $dataDiri->alamat }}">
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <label for="exampleInputNoHP" class="form-label">No HP</label>
                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                            id="exampleInputNoHP" aria-describedby="NoHPHelp" name="no_hp"
                            value="{{ $dataDiri->no_hp }}">
                        @error('no_hp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputEmail" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                            id="exampleInputEmail" aria-describedby="EmailHelp" name="email"
                            value="{{ $dataDiri->email }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <label for="exampleInputImgPath" class="form-label">Image</label>
                        <input type="file" class="form-control @error('img_path') is-invalid @enderror"
                            id="exampleInputImgPath" aria-describedby="ImgPathHelp" name="img_path"
                            onchange="previewImg()">
                        @error('img_path')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        @if ($dataDiri->img_path)
                            <img src="{{ env('IMG_PATH') . $dataDiri->img_path }}" alt="image" id="img-preview"
                                class="img-fluid img-thumbnail mt-2 w-25">
                        @else
                            <img alt="" class="img-fluid img-thumbnail mt-2 w-25" id="img-preview"
                                style="display: none">
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>


    </div>

    <script>
        function previewImg() {
            const img_path = document.querySelector('#exampleInputImgPath');
            const img_preview = document.querySelector('#img-preview');

            const fileImg = new FileReader();
            fileImg.readAsDataURL(img_path.files[0]);

            fileImg.onload = function(e) {
                img_preview.src = e.target.result;
            }

            img_preview.style.display = 'block';
        }
    </script>
@endsection
