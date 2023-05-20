@extends('layouts.app')

@section('content')
  <div class="col-10 mt-5" >
    <div style="margin-top:100px ;margin-bottom:50px;">
      <h1>Update Profile</h1>
      <div id="alert-container"></div>
      <!-- Success Message -->
      <div id="success-message" class="alert alert-success mt-3" style="display: none;">
        Profile updated successfully
      </div>
        
      <br><br>
      <!-- UPDATE PROFILE FORM -->
      <form id="update-profile-form" action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="{{ Auth::user()->name }}">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
        </div>
        <div class="form-group">
          <label for="confirm_password">Confirm Password</label>
          <input type="password" class="form-control" id="confirm_password" name="password_confirmation" placeholder="Confirm your password">
        </div>
        <button type="button" id="update-button" class="btn btn-primary"><i class="fas fa-upload"></i> Update</button>
      </form>
      <!-- END OF UPDATE PROFILE FORM -->
    </div>
  </div>

  <!-- Bootstrap Modal -->
  <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-dialog-pop-up">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to update your profile?</p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" form="update-profile-form" class="btn btn-primary">Update</button>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection