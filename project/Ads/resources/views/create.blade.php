@extends('layouts.app')
@extends('partials.navbar')
  
  @section('content')
  <div class="row">
      <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <h2>Add New Ad</h2>
          </div>
          <div class="pull-right">
              <a class="btn btn-primary" href="{{ route('ads.index') }}"> Back</a>
          </div>
      </div>
  </div>
     
  @if ($errors->any())
      <div class="alert alert-danger">
          <strong>Oops!</strong> There are some problems with your input<br><br>
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
     

  <form class="d-flex justify-content-center" action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
    
       <div>
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <p style="font-family: 'Montserrat', sans-serif;font-weight: bold;">Title:</p>
                  <input type="text" name="title" class="form-control" placeholder="Name">
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <p style="font-family: 'Montserrat', sans-serif;font-weight: bold;">Price:</p>
                  <input class="form-control" name="price" placeholder="Price">
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-12">
                <div class="form-group">
                    <p style="font-family: 'Montserrat', sans-serif;font-weight: bold;">Category:</p>
                    <input class="form-control" name="category" placeholder="Create your category">
                    <select class="selectpicker form-control" name="category" data-size="5">
                    <option disabled selected value> -- select an option -- </option>
                    @foreach ($ads as $ad)
                    <option>
                        {{ $ad->category }}
                    </option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p style="font-family: 'Montserrat', sans-serif;font-weight: bold;">Location:</p>
                    <input class="form-control" name="localisation" placeholder="Localisation">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p style="font-family: 'Montserrat', sans-serif;font-weight: bold;">Image:</p>
                    <input type="file" class="form-control" name="image" placeholder="image" accept="image/png, image/jpeg, image/jpg">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p style="font-family: 'Montserrat', sans-serif;font-weight: bold;">Other Images:</p>
                    <input type="file" class="form-control" name="images[]" multiple placeholder="Other Image" accept="image/png, image/jpeg, image/jpg">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p style="font-family: 'Montserrat', sans-serif;font-weight: bold;">Description:</p>
                    <textarea class="form-control" name="description" placeholder="Description"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        
  </form>

  

  @endsection
