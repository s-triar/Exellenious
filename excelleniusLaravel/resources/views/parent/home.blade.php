@extends('parent.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in as Parent!
                </div>
            </div>
        </div>
    </div>
</div>
<a href="{{route('parent.logout')}}" class="btn btn-primary">Logout</a>
@endsection
