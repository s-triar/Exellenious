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
        <h1>Data Diri Guru</h1>
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

            <button type="submit" id="singup-submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection