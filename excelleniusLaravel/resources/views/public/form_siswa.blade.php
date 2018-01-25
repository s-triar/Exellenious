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
        <h1>Data Diri Siswa</h1>
        <form id="signup" method="post" action="" data-parsley-validate="">
            {{ csrf_field() }}
            <div class="mb-5 pb-3">

                <div class="form-group">
                    <label for="name">Nama
                        <span class="req">*</span>
                    </label>
                    <input type="text" name="name" id="name" class="form-control" pattern="^[A-Za-z]*$" parsley-rangelength="[2,50]" n="" data-parsley-pattern="^[A-Za-z]*$" data-parsley-trigger="change" required="">
                </div>

                <div class="form-group">
                    <label for="kelamin" class="">Jenis Kelamin
                        <span class="req">*</span>
                    </label>
                    <select class="form-control" id="kelamin" name="kelamin">
                    </select>
                </div>

                <div class="form-group ">
                    <label for="nis">NIS
                        <span class="req">*</span>
                    </label>
                    <input type="number" name="nis" id="nis" class="form-control{{ $errors->has('nis') ? ' is-invalid' : '' }}">
                    @if ($errors->has('nis'))
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
                    <label for="foto">Foto
                        <span class="req">*</span>
                    </label>
                    <input type="file" name="foto" id="foto" class="form-control" required="required" >
                </div>

                <div class="form-group ">
                    <label for="univ">Universitas
                        <span class="req">*</span>
                    </label>
                    <input type="text" name="univ" id="univ" class="form-control" required="required" >
                </div>
            </div>

            <button type="submit" id="singup-submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection