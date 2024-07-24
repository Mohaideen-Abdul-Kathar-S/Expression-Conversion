
<?php
$regi = 0;
$exsi = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'conphp.php';

    $UName = $_POST['email'];
    $UPass = $_POST['password'];
    $UPass2 = $_POST['password2'];
    $FName = $_POST['FName'];
    $LName = $_POST['LName'];
    $GName = $_POST['GName'];
    $DOB = $_POST['DOB'];

    if ($UPass !== $UPass2) {
        echo "<script>alert('Passwords do not match');</script>";
    } else {
        $sql = "SELECT * FROM reg WHERE UName='$UName'";
        $result = mysqli_query($con, $sql);

        if ($result) {
            $num = mysqli_num_rows($result);
            if ($num > 0) {
                $exsi = 1; 
            } else {
                $sql = "INSERT INTO reg (UName, UPass, FName, LName, GName, DOB) VALUES ('$UName', '$UPass', '$FName', '$LName', '$GName', '$DOB')";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    $regi = 1;
                    echo "<script>
                            alert('Successfully Account created');
                            setTimeout(function(){
                                window.location.href = 'Login.php';
                            }, 2000);
                          </script>";
                    exit();
                } else {
                    die(mysqli_error($con));
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortut icon" type="x-icon" href="llog12.png">
    <title>EXPRESSION CONVERTER</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bg-image {
            background-size: cover;
            background-image: url(signupbg.avif);
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
        }
        .custom-fieldset {
            width: 450px;
            margin-top: 100px;
            margin-bottom: 30px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-control:focus {
            border-color: #17a2b8;
            box-shadow: none;
        }
    </style>
    <script>
    function formvalidation() {
        let fname = document.forms["inf"]["FName"].value;
        let password = document.forms["inf"]["password"].value;
        let password2 = document.forms["inf"]["password2"].value;
        let gender = document.forms["inf"]["GName"].value;
        
        if (fname == "") { 
            alert("First Name cannot be empty");
            return false;
        }

        if (password !== password2) {
            alert("Passwords do not match");
            return false;
        }

        if (gender == "Select Gender") {
            alert("Please select a gender");
            return false;
        }

        return true;
    }
    function newFunction() {
        document.getElementById("inf").reset();
    }
    </script>
</head>
<body class="bg-image d-flex justify-content-center align-items-center">
    <div class="container d-flex justify-content-center">
        <fieldset class="custom-fieldset bg-light p-4">
            <legend class="text-right text-success font-weight-bold">Sign Up</legend>
            <?php
            if ($regi == 1) {
                echo '<div class="alert alert-success" role="alert">Registration successful!</div>';
            } elseif ($exsi == 1) {
                echo '<div class="alert alert-warning" role="alert">User already exists!</div>';
            } elseif ($regi == 0 && $_SERVER['REQUEST_METHOD'] == 'POST') {
                echo '<div class="alert alert-danger" role="alert">Registration failed!</div>';
            }
            ?>
            <form action="Signup.php" method="post" name="inf" id="inf" onsubmit="return formvalidation()">
                <div class="form-group">
                    <label for="email">Enter E-Mail</label>
                    <input type="email" class="form-control" id="email" placeholder="E-Mail" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="divpass">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password2">Confirm Your Password</label>
                    <div class="divpass2">
                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="FName">Enter First Name</label>
                    <input type="text" class="form-control" id="FName" name="FName" placeholder="First Name" required>
                </div>
                <div class="form-group">
                    <label for="LName">Enter Last Name</label>
                    <input type="text" class="form-control" id="LName" placeholder="Last Name" name="LName">
                </div>
                <div class="form-group">
                    <label for="GName">Enter Gender</label>
                    <select class="form-control" id="GName" name="GName" required>
                        <option>Select Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Others</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="DOB">Enter Date of Birth</label>
                    <input type="date" class="form-control" id="DOB" name="DOB" required>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group mr-2">
                        <button type="reset" class="btn btn-danger">Clear</button>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <div class="text-center">
                            <h4>Did you have an account? <a href="Login.php">Sign In</a>.</h4>
                            <b>Back to <a href="index.php">Home</a>.</b>
                        </div>
            </form>
        </fieldset>
    </div>
</body>
</html>
