@extends('layouts.app')
@extends('partials.navbar')

@section('content')

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

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ $message }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif 

<form action="/register" method="POST">
    {{ csrf_field() }}

    <input type="name" name="name" value="{{ old('name') }}" placeholder="Name">
    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input type="password" name="password_confirmation" placeholder="Password Confirmation">

    <input type="submit" value="Submit">

</form>


@endsection