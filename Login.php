<?php
session_start();

$log = 0;
$invl = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'conphp.php';

    $uname = mysqli_real_escape_string($con, $_POST['username']);
    $upass = mysqli_real_escape_string($con, $_POST['password']);

    // Use prepared statements to prevent SQL injection
    $stmt = $con->prepare("SELECT * FROM reg WHERE UName = ? AND UPass = ?");
    $stmt->bind_param('ss', $uname, $upass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        $num = $result->num_rows;
        if ($num == 0) {
            $invl = 1; // User not found
        } else {
            $log = 1;
            $_SESSION['UName'] = $result->fetch_assoc()['UName'];
            header('Location: afterlogin.php'); // Redirect to the correct PHP page
            exit();
        }
    } else {
        // Handle query execution error
        echo "Error: " . $con->error;
    }

    $stmt->close();
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortut icon" type="x-icon" href="llog12.png">
    <title>EXPRESSION CONVERTER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bg-image {
            background-size: cover;
            background-image: url(loginbg.jpg);
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
        }
        fieldset {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .btn-clear {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-clear:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .btn-signin {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-signin:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .alert-bottom {
            margin-top: 20px;
        }
    </style>
    <script>
    function formvalidation(){
        let x=document.forms["log"]["username"].value;
        if(x==""){
            alert("Username cannot be empty");
            return false;
        }
        let y=document.forms["log"]["password"].value;
        if(y==""){
            alert("Password cannot be empty");
            return false;
        }
        return true;
    }
    function newFunction(){
        document.getElementById("log").reset();
    }
    </script>
</head>
<body class="bg-image d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <fieldset>
                    <legend class="text-end">
                        <b class="text-primary fs-3">Sign In</b>
                    </legend>
                    <form method="post" action="Login.php" id="log" name="log" onsubmit="return formvalidation()">
                        <div class="text-center mb-4">
                            <h2>Welcome to Our Page!!!</h2>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fs-5">E-Mail</label>
                            <input type="email" class="form-control" id="email" name="username" placeholder="E-Mail" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label fs-5">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="text-center mb-3">
                            <button type="reset" class="btn btn-clear me-3" id="clear">Clear</button>
                            <button type="submit" class="btn btn-signin" id="signin">Sign In</button>
                        </div>
                        <?php
                        if ($invl) {
                            echo '<div class="alert alert-danger alert-bottom" role="alert">Invalid email or password.</div>';
                        }
                        ?>
                        <div class="text-center">
                            <h3>Don't have an account? <a href="Signup.php">Sign Up</a>.</h3>
                            <b>Back to <a href="index.php">Home</a>.</b>
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>
      </div>
</body>
<html>
