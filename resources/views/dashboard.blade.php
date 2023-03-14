<style>
    /* Prevent image stretching as it's resized */
.card-img-top {
    object-fit: cover;
}

/* Make all cards in row the same height */
.row {
   display: flex;
   flex-wrap: wrap;
}

/* Hover effects */
.card {
  transition: -webkit-transform 0.3s ease;
}
.card:hover {
  transform: scale(1.01, 1.01);
}

</style>
@extends('layouts.app')

@section('content')

<div style="padding: 0 50px;margin-bottom: 50px;margin-top: 100px;">
    <h1 class="upletter">Welcome user to our AngkotAPI user profile page</h1>
    <h3 class="tit-text">Realtime, Hourly, Daily and 15 min interval weather forecast, Historical Weather, Air Quality Data, Bulk Request, Astronomy, Search, Sports and much more</h3>
    <h5 class="tit-text">Completely managed online - Simple to use - Built for developers, by developers</h5>
    <p class="mt-3 tit-text2">WeatherAPI.com is a powerful fully managed weather and geolocation API provider that provides extensive APIs that range from the realtime and weather forecast, historical weather, Air Quality Data, Bulk Request, IP lookup, and astronomy through to sports, time zone, and geolocation.</p>
    <p class="mt-3 tit-text2">Equipped with AI and machine learning our API delivers weather from global weather stations and high resolution weather models to deliver fast, reliable and accurate weather for a given location anywhere in the world.</p>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('update.profile.page') }}" class="btn btn-primary btn-lg btn-block">Update Profile</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('manage.api.page') }}" class="btn btn-primary btn-lg btn-block">Manage API</a>
        </div>
        <div class="col-md-4">
            <a href="#" class="btn btn-primary btn-lg btn-block">Documentation</a>
        </div>
    </div>
</div>
<!--content-->
<div class="row">
  <!-- the cols in this div change the number of cards per row depending on screen size and the mb-4 adds space below cards if they spill over into the next row-->
  <div class="col-12 col-md-6 col-lg-4 mb-4">
    <div class="card">
      <img class="card-img-top" src="{{ asset('images/angkot.jpg') }}" alt="Card image cap">
      <div class="card-body">
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-6 col-lg-4 mb-4">
    <div class="card">
      <img class="card-img-top" src="{{ asset('images/angkot.jpg') }}" alt="Card image cap">
      <div class="card-body">
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-6 col-lg-4 mb-4">
    <div class="card">
      <img class="card-img-top" src="{{ asset('images/angkot.jpg') }}" alt="Card image cap">
      <div class="card-body">
        <p class="card-text">This photo is a different size than the first two.</p>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-6 col-lg-4 mb-4">
    <div class="card">
      <img class="card-img-top" src="{{ asset('images/angkot.jpg') }}" alt="Card image cap">
      <div class="card-body">
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-6 col-lg-4 mb-4">
    <div class="card">
      <img class="card-img-top" src="{{ asset('images/angkot.jpg') }}" alt="Card image cap">
      <div class="card-body">
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-6 col-lg-4 mb-4">
    <div class="card">
      <img class="card-img-top" src="{{ asset('images/angkot.jpg') }}" alt="Card image cap">
      <div class="card-body">
        <p class="card-text">This photo is a different size than the first two.</p>
      </div>
    </div>
  </div>
</div>
@endsection