<?php
// ini_set("display_errors","on");
include_once "connection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST["submitBtn"])) {
    echo "<pre>";
    print_r($_REQUEST);
    print_r($_FILES);
    $name = $_REQUEST["txt_name"];
    $email = $_REQUEST["txt_email"];
    $password = md5($_REQUEST["txt_password"]);
    $city = $_REQUEST["sel_city"];
    $skills = "";
    $uploadOk = 1;
    if (!empty($_REQUEST["chk_skills"])) {
        $skills = implode(",", $_REQUEST["chk_skills"]);
    }
    $target_dir = "uploads/";
    
    $target_file = $target_dir . basename($_FILES["user_file"]["name"]);
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check file size
    if ($_FILES["user_file"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    echo "file_type=".$file_type;
    // Allow certain file formats
    if (
        $file_type != "doc" &&
        $file_type != "docx" &&
        $file_type != "pdf"
    ) {
        echo "Sorry, only DOC, DOCX & PDF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["user_file"]["tmp_name"], $target_file)) 
        {
            $insert_sql = "INSERT INTO registration (name,email,password,skills,data_file,city) values('$name','$email','$password','$skills','$target_file','$city')";
            $res = mysqli_query($conn, $insert_sql);
            if ($res) {
                header("location:user_login.php");
            } else {
                echo "Error: " . $insert_sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    die;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Registration Form</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4>User Registration</h4>
          </div>
          <div class="card-body">
            <form name="frmuser" method="POST" enctype="multipart/form-data">
              <!-- Name -->
              <div class="mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" id="txt_name" name="txt_name" placeholder="Enter your name" required>
              </div>

              <!-- Email Address -->
              <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="txt_email" name="txt_email" placeholder="Enter your email" required>
              </div>

              <!-- Password -->
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="txt_password" name="txt_password" placeholder="Enter your password" required>
              </div>

              <!-- Confirm Password -->
              <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="txt_confirm_password" name="txt_confirm_password" placeholder="Confirm your password" required>
              </div>
              
              <div class="mb-3">
              	<label for="skills" class="form-label">Skills</label>
              </div>

              <div class="mb-3">
                <input type="checkbox" class="form-check-input" id="chk_php" name="chk_skills[]" value="php"> Php
                <input type="checkbox" class="form-check-input" id="chk_react" name="chk_skills[]" /> React
                <input type="checkbox" class="form-check-input" id="chk_nodejs" name="chk_skills[]"> Node JS
              </div>

              <div class="mb-3">
                <label for="userFile" class="form-label">Select File</label>
                <input type="file" class="form-file" id="user_file" name="user_file" required>
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">City</label>
                <select class="form-select" for="city" name="sel_city">
                	<option	value="vadodara">Vadodara</option>
                	<option	value="kalol">Kalol</option>
                	<option	value="halol">Halol</option>
                	<option	value="surat">Surat</option>
                	<option	value="rajkot">Rajkot</option>
                </select>
              </div>

              <!-- Submit Button -->
              <div class="gap-2">
                <button align="center" type="submit" id="submitBtn" name="submitBtn" class="btn btn-primary">Register</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
 
  <!-- Bootstrap 5 JS and Popper -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
