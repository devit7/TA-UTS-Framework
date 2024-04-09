@extends('layouts.main')

@section('content')
    <div class="container mb-5">

        <div class="card p-3 mx-auto">
            <h1 class="card-title text-center mb-3">Add Data Diri</h1>
            <form action="{{ route('data-diri.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-2">
                    <div class="col-md-6">
                        <label for="exampleInputNIM" class="form-label">NIM</label>
                        <input type="text" class="form-control @error('nim') is-invalid  @enderror" id="exampleInputNIM"
                            aria-describedby="NIMHelp" name="nim" value="{{ old('nim') }}">
                        @error('nim')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputNama" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid  @enderror" id="exampleInputNama" aria-describedby="NamaHelp"
                            name="nama" value="{{ old('nama') }}">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <label for="exampleInputJurusan" class="form-label">Jurusan</label>
                        <select class="form-select" id="exampleInputJurusan" aria-describedby="JurusanHelp" name="jurusan">
                            <option selected>Pilih Jurusan</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik Elektro">Teknik Elektro</option>
                            <option value="Teknik Industri">Teknik Industri</option>
                            <option value="Teknik Mesin">Teknik Mesin</option>
                            <option value="Teknik Sipil">Teknik Sipil</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputAlamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="exampleInputAlamat" aria-describedby="AlamatHelp"
                            name="alamat" value="{{ old('alamat') }}">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <label for="exampleInputNoHP" class="form-label">No HP</label>
                        <input type="text" class="form-control" id="exampleInputNoHP" aria-describedby="NoHPHelp"
                            name="no_hp" value="{{ old('no_hp') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputEmail" class="form-label">Email</label>
                        <input type="text" class="form-control" id="exampleInputEmail" aria-describedby="EmailHelp"
                            name="email" value="{{ old('email') }}">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <label for="exampleInputImgPath" class="form-label">Image</label>
                        <input type="file" class="form-control" id="exampleInputImgPath" aria-describedby="ImgPathHelp"
                            name="img_path" onchange="previewImg()">
                        <img  alt="" class="img-fluid img-thumbnail mt-2 w-25" id="img-preview" style="display: none">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        {{-- Error --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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