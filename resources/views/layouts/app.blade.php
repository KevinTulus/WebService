<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="images/angkot.png" type="image/x-icon">
  <link rel="shortcut icon" href="images/angkot.png" type="image/x-icon">
  <title>Angkot API</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <!-- navbar header -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-custom shadow-sm">
      <a class="navbar-brand d-flex align-items-center">
        <img class="logo-icon mr-2" src="{{ asset('images/angkot.png') }}" alt="Logo" style="max-height: 55px; max-width: 220px;">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <h3>Angkot API</h3>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="{{ asset('images/angkot.jpg') }}" alt="Profile Picture" class="rounded-circle bg-dark text-dark shadow-1-strong  mr-2" height="30" width="30">{{ Auth::user()->name }}
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- end of navbar header -->

  <!--sidebar-->
  <div class="row justify-content-start bg-white">
    <div class="col-2 fixed-sidebar col-md-2 px-sm-2 px-0 bg-custom-2 shadow sidebar">
      <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
      <h5 class="text-dark container"><strong>Welcome, {{ Auth::user()->name }}!</strong></h5>
        <ul class="nav nav-pills flex-column mb-sm-aauto mb-0 align-items-center align-items-sm-start" id="menu">
          <li>
            <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
              <li class="w-100" style="padding-top: 10px; padding-bottom: 10px;">
                <a class="dropdown-item nav-link w-100" href="#">
                  <i class="fas fa-dashboard mr-2"></i> &nbsp;Dashboard
                </a>
              </li>
              <li class="w-100" style="padding-top: 10px; padding-bottom: 10px;">
                <a class="dropdown-item nav-link w-100" href="#">
                  <i class="fas fa-file mr-2"></i> &nbsp; Documentation
                </a>
              </li>
              <li class="w-100" style="padding-top: 10px; padding-bottom: 10px;">
                <a class="dropdown-item nav-link w-100" href="{{ route('update.profile.page') }}" id="update-profile-li">
                  <i class="fas fa-user-circle mr-2"></i> &nbsp;Update Profile
                </a>
              </li>
              <li class="w-100" style="padding-top: 10px; padding-bottom: 10px;" >
                <a class="dropdown-item nav-link w-100" href="{{ route('manage.api.page') }}" id="manage-api-li">
                  <i class="fas fa-cogs mr-2"></i> &nbsp;Manage API
                </a>
              </li>
              <li class="w-100" style="padding-top: 10px; padding-bottom: 10px;">
                <a class="dropdown-item nav-link w-100" href="{{ route('logout') }}">
                  <i class="fas fa-sign-out-alt mr-2"></i> &nbsp;Logout
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>

    <!--content-->
    <div class="col-lg-8 py-4 px-0 ml-4 mr-0 content">
      @yield('content')
    </div>
    <!-- end of content -->
  </div>
  <!-- end of sidebar -->

  <!-- footer -->
  <footer class="bg-custom text-dark">
    <div class="container p-4">
      <div class="row justify-content-between align-items-center">
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <div class="rounded-circle bg-white shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto" style="width: 100px; height: 100px;">
            <img src="{{ asset('images/angkot.png') }}" height="50" alt="" loading="lazy" />
          </div>
          <h6 class="text-center mb-4">angkotAPI.com</h6>
        </div>
        <div class="col-lg-3 col-md-6">
          <h5 class="text-uppercase mb-4">Menu</h5>
          <ul class="list-unstyled mb-0">
            <li>
              <p><i class="fas fa-star pe-2"></i> &nbsp;Another Menu</p>
            </li>
            <li>
              <p><i class="fas fa-star pe-2"></i> &nbsp; Another Menuu</p>
            </li>
            <li>
              <p><i class="fas fa-star pe-2"></i> &nbsp; Another Menuu</p>
            </li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6">
          <h5 class="text-uppercase mb-4">Social Media</h5>
          <ul class="list-unstyled mb-0">
            <li>
              <p><i class="fab fa-facebook-square"></i> &nbsp; Our Facebok Page</p>
            </li>
            <li>
              <p><i class="fab fa-instagram"></i> &nbsp; Our Instagram Page</p>
            </li>
            <li>
              <p><i class="fab fa-youtube"></i> &nbsp; Our Youtube Page</p>
            </li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6">
          <h5 class="text-uppercase mb-4">Contact</h5>
          <ul class="list-unstyled mb-0">
            <li>
              <p><i class="fas fa-map-marker-alt pe-2"></i> &nbsp;Warsaw, 57 Street, Poland</p>
            </li>
            <li>
              <p><i class="fas fa-phone pe-2"></i> &nbsp; +1 234 567 89</p>
            </li>
            <li>
              <p><i class="fas fa-envelope pe-2 mb-0"></i> &nbsp; contact@example.com</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="text-center py-2" style="background-color: rgba(0, 0, 0, 0.2)">
      © 2023 angkotAPI.com
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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

    // Get the current URL
    var currentUrl = window.location.href;

    // Check if the URL contains the route for the Update Profile page
    if (currentUrl.includes('{{ route('update.profile.page') }}')) {
        // Add the active class to the Update Profile <li> element
        document.getElementById('update-profile-li').classList.add('active');
    }

    // Check if the URL contains the route for the Manage API page
    if (currentUrl.includes('{{ route('manage.api.page') }}')) {
        // Add the active class to the Manage API <li> element
        document.getElementById('manage-api-li').classList.add('active');
    }
  </script>
</body>
</html>