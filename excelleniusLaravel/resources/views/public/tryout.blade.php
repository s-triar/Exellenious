@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 bg-light sidebar">
                <ul class="navbar-nav mr-auto">
                    <span class="navbar-brand mb-2 pl-3 h1">Category</span>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a class="nav-link active" href="">
                            Kelas 6
                        </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">
                            Kelas 9
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">
                            Kelas 12
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-10 ml-auto">
                <div class="container">
                    <h1>Try Out</h1>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2 col-sm-2">
                                    <img style="height:100px;" style="width:100px;" src="https://image.flaticon.com/teams/slug/freepik.jpg">
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <h3 class="card-title">
                                        <a href="">MATEMATIKA</a>
                                    </h3>
                                    <small>Written on 12 Agustus 2017 by Pak guru</small>
                                    <br>
                                    <a name="" id="" class="btn btn-primary mt-3" href="#" role="button">Download</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection