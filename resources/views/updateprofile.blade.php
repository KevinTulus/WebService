@extends('layouts.app')

@section('content')

<style>
  .modal-dialog-pop-up {
    position: fixed;
    bottom: 15%; /* Adjust this value as needed */
    left: 35%;
    transform: translateX(-50%);
  }
</style>
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card " style="margin-top:50px;">
        <div class="card-body">
          <h1 class="card-title text-center">Update Profile</h1>
          
          <!-- Success Message -->
          <div id="success-message" class="alert alert-success mt-3" style="display: none;">
            Profile updated successfully
          </div>
          
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
            <button type="button" id="update-button" class="btn btn-primary">Update</button>
          </form>
        </div>
      </div>
    </div>
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

<script>
  document.getElementById('update-button').addEventListener('click', function() {
    const username = document.getElementById('username').value.trim();
    const password = document.getElementById('password').value.trim();
    const confirmPassword = document.getElementById('confirm_password').value.trim();

    if (username === '' || password === '' || confirmPassword === '') {
      alert('Please fill in all fields before updating.');
    } else {
      $('#confirmationModal').modal('show');
    }
  });

  document.querySelector('#confirmationModal .btn-secondary').addEventListener('click', function() {
    $('#confirmationModal').modal('hide');
  });

  // After updating the profile, show a success message
  document.querySelector('#update-profile-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission
    // Add your code here to handle the profile update

    // Hide the confirmation modal
    $('#confirmationModal').modal('hide');

    // Show the success message
    const successMessage = document.getElementById('success-message');
    successMessage.style.display = 'block';

    // Scroll to the top of the form
    document.documentElement.scrollTop = 0;
    document.body.scrollTop = 0;

    // Hide the success message after 3 seconds
    setTimeout(function() {
      successMessage.style.display = 'none';
    }, 3000);
  });
</script>

<!-- <script>
// function clearPlaceholder(element) {
//   element.placeholder = '';
// }
// </script> -->
@endsection
