@extends('layouts.app')

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Oops!</strong> There are some problems with your input :<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('ads') }}">
        <img class="img-fluid" width="40" height="34" src="logo.png">
            {{ config('app.name', 'FreeAds') }}
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link bg-info gradient text-white rounded-pill" href="{{ route('ads.create') }}"> + POST ADS</a>
                </li>
                <li class="navbar-nav ml-auto">
                    <!-- ROUTE SILVIO LOGIN-->
                    <a class="nav-link" href="/disconnect">LOGOUT</a>
                    <a class="nav-link" href="/admin">Admin Panel</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@section('content')

<form action="/userUpdate" method="POST">
    {{ csrf_field() }}
    <label class="label">New Password</label>
    <div class="control">
    <input type="password" name="password" placeholder="New password">
    </div>
    <label class="label">Password confirmation</label>
    <div class="control">
    <input type="password" name="password_confirmation" placeholder="New password">
    </div>
    <input type="submit" value="Modify">

</form>

@endsection