<!DOCTYPE html>
<html lang="en">
<head>
    <title>AJAX Login Form</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h4>Login</h4>
            </div>
            <div class="card-body">
              <form name="frmloginuser" id="loginForm">
                  <!-- Email Address -->
                  <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="username" name="username"  placeholder="Enter your email" required>
                  </div>

                  <!-- Password -->
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                  </div>
                  <!-- Login Button -->
                  <div class="gap-2">
                    <button align="center" type="submit" id="loginbtn" name="loginbtn" class="btn btn-primary">Login</button>
                     <!-- <button type="submit">Login</button> -->
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div id="errorMessage" style="color: red; display: none;"></div>
    <div id="successMessage" style="color: green; display: none;"></div>

    <script>
        $(document).ready(function () {
            $('#loginForm').on('submit', function (e) {
                e.preventDefault();  // Prevent the form from submitting normally

                // Get form data
                var username = $('#username').val();
                var password = $('#password').val();

                // Clear previous messages
                $('#errorMessage').hide();
                $('#successMessage').hide();

                // AJAX request
                $.ajax({
                    url: 'login.php',  // PHP file to handle login
                    type: 'POST',
                    data: {
                      username: username,
                      password: password
                    },
                    success: function(response) {
                      // Check response from PHP
                      if (response === 'success') {
                        // $('#successMessage').text('Login successful!').show();
                        window.location.href = 'dashboard.php';
                      } else {
                        $('#errorMessage').text(response).show();  // Show error message from PHP
                      }
                    },
                    error: function() {
                        $('#errorMessage').text('An error occurred. Please try again.').show();
                    }
                });
            });
        });
    </script>

</body>
</html>
