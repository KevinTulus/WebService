@extends('layouts.app')

@section('content')
<div style="padding: 0 50px;margin-bottom: 50px;margin-top: 100px;">
    <div class="container mt-5" >
		<h1>Update Profile</h1>
		<form>
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" class="form-control" id="username" placeholder="Enter your username">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" id="password" placeholder="Enter your password">
			</div>
			<div class="form-group">
				<label for="confirm_password">Confirm Password</label>
				<input type="password" class="form-control" id="confirm_password" placeholder="Confirm your password">
			</div>
			<button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
</div>
@endsection
