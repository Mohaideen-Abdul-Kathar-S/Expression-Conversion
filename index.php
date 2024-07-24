<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="x-icon" href="llog12.png">
    <title>EXPRESSION CONVERTER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f0f0f0;
            color: #333;
        }
        #bgdiv {
            background-image: url(headbg.jpg);
            color: #fff;
            background-size: cover;
            text-align: center;
            padding: 50px 20px;
            font-family: Comic Sans MS;
        }
        .navbar a {
            transition: color 0.3s ease;
        }
        .navbar a:hover {
            color: aqua !important;
        }
        #im {
            transition: transform 0.3s ease;
        }
        #im:hover {
            transform: scale(1.1);
        }
        .card {
            margin: 20px 0;
        }
        #loghed{
            width: 80px;
            height: 80px;
            top: 50px;
            right: 300px;
        }
        .hedi .headericon{
          position: absolute;
                top: 33px;
                left:  300px;
                width: 80px;
                height: 80px;
                
        }
    </style>
</head>
<body>
    <div id="bgdiv" class="container-fluid text-center">
        <div class="hedi">
        <img src="llog12.png" alt="Logo" class="headericon">
        <h1>EXPRESSION CONVERTER</h1>
        <h3><marquee>Welcome To Our Website</marquee></h3>
    </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="mylog1.PNG" alt="Logo" class="img-fluid" style="width: 150px; height: 50px; border-radius: 50%;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Login.php">Convert</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">More Tools</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Login.php">Sign In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Signup.php">Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container my-4">
        <div class="card">
            <div class="card-header">
                About
            </div>
            <div class="card-body">
                <p>In this website used to Convert One type Expresion to another type Expresion.<br>Using this website is free of charge, and This website will be user-friendly. This website was created in 2024.</p>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                How to Use
            </div>
            <div class="card-body">
                <p>Click the Convert button to begin the process, Next select the Input type. After choosing the input type, select the output type. Next Enter your Expression and Click Output button, The output will appear.</p>
                <div class="text-center">
                    <a href="Login.php" class="btn btn-primary" id="conbtn">Convert</a>
                </div>
                <div class="text-center mt-4">
                    <img src="intopo.png" alt="Expression Image" width="200px" id="im" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Usage
            </div>
            <div class="card-body">
                <p>You can convert your expression using the following types.</p>
                <ul class="list-group">
                    <li class="list-group-item">Infix Expression
                        <ul>
                            <li>To Postfix Expression</li>
                            <li>To Prefix Expression</li>
                        </ul>
                    </li>
                    <li class="list-group-item">Postfix Expression
                        <ul>
                            <li>To Infix Expression</li>
                            <li>To Prefix Expression</li>
                        </ul>
                    </li>
                    <li class="list-group-item">Prefix Expression
                        <ul>
                            <li>To Infix Expression</li>
                            <li>To Postfix Expression</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                For You
            </div>
            <div class="card-body">
                <p>You can find solutions to many problems by clicking on the link below.</p>
                <a href="Click" class="btn btn-link lin">Move</a>
            </div>
        </div>
    </div>
    <footer class="bg-dark text-white text-center py-4">
        <div class="container">
            <h4>Contact :</h4>
            <address>
            <p>E-Mail: mohaideenabdulkathars.23csd@kongu.edu</p>
            <p>Phone No: 9659991439</p>
            <p>
                <a href="//www.instagram.com/unique__lovely__boy?igsh=cHprYnp1YTZzeTZm" class="text-white me-3">Instagram</a>
                <a href="https://github.com/Mohaideen-Abdul-Kathar-S" class="text-white">GitHub</a>
            </p>
            <hr class="bg-light">
          
        </address>
        </div>
    </footer>
</body>
</html>
