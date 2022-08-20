@extends('layouts.app')
@extends('partials.navbar')

@section('content')

<!-- SEARCH BAR --->

<div class="card-body d-flex justify-content-between py-4 input-group" style="width:85%;">
    <input type="text" class="form-control shadow-none form-control-lg border border-info rounded" placeholder="Search">
    <div class="input-group-append">
        <button class="btn btn-info" type="button">
            <i class="fa fa-search"></i>
        </button>
    </div>
</div>



<div class="container-fluid">
    <div class="row d-md-block">
        <div class="col-md-4 float-left">
            <div style="height:400px;width:100%;">
                <p style="font-family: 'Montserrat', sans-serif;">Filter by</p>
                <hr style="border-top: 5px solid #0DCAF0;border-radius:20px">
                <p style="font-family: 'Montserrat', sans-serif;font-weight: bold;">Category</p>
                <select class="selectpicker form-control" data-size="5">
                    @foreach ($ads as $ad)
                    <option>
                        {{ $ad->category }}
                    </option>
                    @endforeach
                </select>
                <hr style="border-top: 5px solid #0DCAF0;border-radius:20px">
                <p style="font-family: 'Montserrat', sans-serif;font-weight: bold;">Localisation</p>
                <select class="selectpicker form-control" data-size="5">
                    @foreach ($ads as $ad)
                    <option>
                        {{ $ad->localisation }}
                    </option>
                    @endforeach
                </select>
                <hr style="border-top: 5px solid #0DCAF0;border-radius:20px">
                <p style="font-family: 'Montserrat', sans-serif;font-weight: bold;">Price</p>
                <input type="text" class="form-control" placeholder="Price">
            </div>
        </div>
    </div>
</div>

@foreach ($ads as $ad)
<div class="card mb-3" style="margin-left:48%;width: 30rem;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="/image/{{ $ad->image }}" class="img-fluid rounded-start" style="width:100%;height:100%;object-fit: cover;" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{ $ad->title }}</h5>
                <h6 class="card-title pagination justify-content-end">{{ $ad->price }}€</h6>
                <p class="card-text">{{ $ad->description }}</p>
                <div class="pagination justify-content-end">
                    <p class="card-text">{{ $ad->category }}</p>
                </div>
                <p class="card-text">{{ $ad->localisation }}</p>
                <br><br>
                <p class="card-text"><small class="text-muted pagination justify-content-end">{{ $ad->created_at }}</small></p>
                <form action="{{ route('ads.destroy',$ad->id) }}" method="POST">
        
                    <a class="btn btn-info" href="{{ route('ads.show',$ad->id) }}">Show</a>
        
                    <a class="btn btn-primary" href="{{ route('ads.edit',$ad->id) }}">Edit</a>
        
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endforeach

@endsection