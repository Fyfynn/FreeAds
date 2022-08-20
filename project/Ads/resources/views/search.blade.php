@extends('layouts.app')
@extends('partials.navbar')

@section('content')

    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="my-4">Result of the research:
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
            </div>
        </div>
    </div>
</div>

@endforeach
            </h1>
        </div>
    </div>
@endsection