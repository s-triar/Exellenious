@extends('layouts.app')
<style>
    body {
        background: url('css/blur-background-1.jpg');
        background-size: cover;
    }
</style>
@section('content')

<div class="container mt-4 box-shadow">
    <div class="container sign-container">
        <h1>Data Diri Orang Tua</h1>
        <form id="signup" method="post" action="" data-parsley-validate="">
            {{ csrf_field() }}
            <div class="mb-5 pb-3">

                <div class="form-group">
                    <label for="name">Nama
                        <span class="req">*</span>
                    </label>
                    <input type="text" name="name" id="name" class="form-control" pattern="^[A-Za-z]*$" parsley-rangelength="[2,50]" n="" data-parsley-pattern="^[A-Za-z]*$" data-parsley-trigger="change" required="">
                </div>

                <div class="form-group ">
                    <label for="nip">NIP
                        <span class="req">*</span>
                    </label>
                    <input type="number" name="nip" id="nip" class="form-control{{ $errors->has('nip') ? ' is-invalid' : '' }}" >
                    @if ($errors->has('nip'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('nis') }}</strong>
                        </div>
                    @endif
                </div>

                <div class="form-group ">
                    <label for="nidn">NIDN
                        <span class="req">*</span>
                    </label>
                    <input type="number" name="nidn" id="nidn" class="form-control{{ $errors->has('nidn') ? ' is-invalid' : '' }}">
                    @if ($errors->has('nidn'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('nis') }}</strong>
                        </div>
                    @endif
                </div>

                <div class="form-group ">
                    <label for="tgl_lahir">Tanggal Lahir
                        <span class="req">*</span>
                    </label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" data-parsley-trigger="change" required="required" >
                </div>

                <div class="form-group ">
                    <label for="no_telp">Nomor Telfon
                        <span class="req">*</span>
                    </label>
                    <input type="number" name="no_telp" id="no_telp" class="form-control" data-parsley-trigger="change" required="required" >
                </div>

                <div class="form-group ">
                    <label for="alamat">Alamat
                        <span class="req">*</span>
                    </label>
                    <input type="text" name="alamat" id="alamat" class="form-control" data-parsley-trigger="change" required="required" >
                </div>

                <div class="form-group ">
                        <label for="univ">Universitas
                            <span class="req">*</span>
                        </label>
                        <input type="text" name="univ" id="univ" class="form-control" required="required" >
                    </div>
                </div>

                <div class="form-group ">
                        <label for="fakultas">Fakultas
                            <span class="req">*</span>
                        </label>
                        <input type="text" name="fakultas" id="fakultas" class="form-control" required="required" >
                    </div>
                </div>

                <div class="form-group ">
                        <label for="jurusan">Jurusan
                            <span class="req">*</span>
                        </label>
                        <input type="text" name="jurusan" id="jurusan" class="form-control" required="required" >
                    </div>
                </div>

                <div class="form-group ">
                        <label for="thn_masuk">Tahun Masuk
                            <span class="req">*</span>
                        </label>
                        <input type="text" name="thn_masuk" id="thn_masuk" class="form-control" required="required" >
                    </div>
                </div>

                <div class="form-group ">
                        <label for="thn_lulus">Tahun Lulus
                            <span class="req">*</span>
                        </label>
                        <input type="text" name="thn_lulus" id="thn_lulus" class="form-control" required="required" >
                    </div>
                </div>

                <div class="form-group ">
                    <label for="foto">Foto
                        <span class="req">*</span>
                    </label>
                    <input type="file" name="foto" id="foto" class="form-control" required="required" >
                </div>

            <button type="submit" id="singup-submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection