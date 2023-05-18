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
  <div class="row">
    <div class="col-md-6">
      <div class="card " style="margin-top:50px;margin-bottom:50px;">
        <div class="card-body">
          <h1 class="card-title text-center">Update Profile</h1>
          <div id="alert-container"></div>
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
document.addEventListener('DOMContentLoaded', function() {
  // Get the update button
  const updateButton = document.getElementById('update-button');

  // Get the cancel button
  const cancelButton = document.querySelector('[data-bs-dismiss="modal"]');

  // Get the alert container
  const alertContainer = document.getElementById('alert-container');

  // Add click event listener to the update button
  updateButton.addEventListener('click', function() {
    // Validate password confirmation
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirm_password');
    const password = passwordInput.value;
    const confirmPassword = confirmPasswordInput.value;

    // Check if the password and confirm password fields are filled
    if (password === '' || confirmPassword === '') {
      // Display an error message or perform any necessary actions
      showAlert('Please fill in all the required fields.', 'alert-danger');
      return;
    }

    // Validate password confirmation
    if (password !== confirmPassword) {
      // Display an error message or perform any necessary actions
      showAlert('Password and Confirm Password must match.', 'alert-danger');
      return;
    }

    // Show the confirmation modal if field validation is successful
    $('#confirmationModal').modal('show');
  });

  // Add click event listener to the cancel button
  cancelButton.addEventListener('click', function() {
    // Hide the modal
    $('#confirmationModal').modal('hide');
  });

  // Listen for form submission
  const updateProfileForm = document.getElementById('update-profile-form');
  updateProfileForm.addEventListener('submit', function(event) {
    // Prevent the form from submitting by default
    event.preventDefault();

    // Submit the form
    this.submit();
  });

  // Hide the success message initially
  const successMessage = document.getElementById('success-message');
  successMessage.style.display = 'none';

  // Show an alert message
  function showAlert(message, alertType) {
    // Remove any existing alert classes
    alertContainer.classList.remove('alert-success', 'alert-info', 'alert-warning', 'alert-danger');

    // Set the new alert class
    alertContainer.classList.add('alert', alertType);

    // Set the alert message
    alertContainer.textContent = message;

    // Show the alert container
    alertContainer.style.display = 'block';

    // Hide the alert after 3 seconds (3000 milliseconds)
    setTimeout(function() {
      alertContainer.style.display = 'none';
    }, 3000);
  }

  // Listen for success message display event after form submission
  updateProfileForm.addEventListener('submit', function(event) {
    const form = this;

    // Disable the submit button to prevent multiple submissions
    updateButton.disabled = true;

    fetch(form.action, {
      method: form.method,
      body: new FormData(form)
    })
      .then(response => {
        if (response.ok) {
          // Reset the form
          form.reset();

          // Display the success message
          successMessage.style.display = 'block';

          // Hide the modal
          $('#confirmationModal').modal('hide');

          // Set a timeout to hide the success message after 3 seconds (3000 milliseconds)
          setTimeout(function() {
            successMessage.style.display = 'none';
          }, 3000);
        }
      })
      .catch(error => {
        console.error('Error:', error);
      })
      .finally(() => {
        // Enable the submit button after form submission completes
        updateButton.disabled = false;
      });
  });
});
</script>

<!-- <script>
// function clearPlaceholder(element) {
//   element.placeholder = '';
// }
// </script> -->
@endsection
