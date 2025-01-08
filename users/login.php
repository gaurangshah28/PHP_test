<?php
include_once('connection.php');
// Check if the form data is sent via POST
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    session_start();
    // Get the form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT name,password from registration where email = '".$username."'";
    $res = mysqli_query($conn,$sql);
    if($res)
    {
        $row_count = mysqli_num_rows($res);
        if($row_count > 0)
        {   
            $user_data = mysqli_fetch_array($res);
            $user_password =  $user_data['password'];
            $name =  $user_data['name'];
             if (md5($password) === $user_password) {
                $_SESSION['username'] = $name;
                echo 'success';
            }
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo 'Invalid request method.';
}
die;
?>
