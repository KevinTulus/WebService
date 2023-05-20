@extends('layouts.mainadmin')
@section('admin')

<div style="padding: 0 75px;margin-bottom: 50px;margin-top: 100px;">
    <h1 class="upletter">Welcome user to our AngkotAPI user profile page</h1>
    <h3 class="tit-text">Discover the convenience of effortlessly retrieving essential information about Angkots, enabling you to plan your journeys with ease.</h3>
    <h5 class="tit-text">Our powerful API empowers you with instant access to details such as pricing, number, color, and availability of Angkots.</h5>
    <p class="mt-3 tit-text2">Whether you're a commuter or a transportation enthusiast, our API is designed to provide you with up-to-date and accurate data, ensuring a seamless and reliable user experience</p>
    <p class="mt-3 tit-text2">Discover the convenience of effortlessly retrieving essential information about Angkots, enabling you to plan your journeys with ease.</p>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('user.profile.index') }}" class="btn btn-primary btn-lg btn-block">Update Profile</a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('user.token.index') }}" class="btn btn-primary btn-lg btn-block">Manage API</a>
        </div>
        {{-- <div class="col-md-4">
            <a href="#" class="btn btn-primary btn-lg btn-block">Documentation</a>
        </div> --}}
    </div>
</div>

@endsection

