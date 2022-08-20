@extends('layouts.app')
@extends('partials.navbar')

@section('content')

<h1>Users</h1>

<ul>
    @foreach($users as $user)
        <li>{{ $user->name }}</li>
        <li>{{ $user->email }}</li><.
    @endforeach
</ul>

@endsection