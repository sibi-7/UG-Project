<html>
<head>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #e0f7fa; /* Light blue background color */
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Form container with max-width and padding */
.form-container {
    max-width: 400px;
    width: 100%;
    padding: 20px;
    background-color: transparent; /* Transparent dark background */
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Heading styling */
h1 {
    text-align: center;
    color: darkblack;
    margin-bottom: 20px;
}

/* Full-width input fields */
.form-container input[type="text"], 
.form-container input[type="password"] {
    width: 100%;
    padding: 15px;
    margin: 8px 0;
    border: none;
    background-color: rgba(247, 244, 244, 0.8); /* Transparent light background for inputs */
    border-radius: 5px;
    font-size: 16px;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

/* When the inputs get focus */
.form-container input[type="text"]:focus, 
.form-container input[type="password"]:focus {
    background-color: rgba(243, 236, 236, 0.9); /* Lighter background when focused */
    outline: none;
    box-shadow: 0 0 5px 2px rgba(66, 58, 59, 0.6);
}

/* Button Styles */
.form-container .btn {
    background-color: rgba(4, 170, 109, 0.9); /* Transparent green for button */
    color: white;
    padding: 16px;
    border: none;
    cursor: pointer;
    width: 100%;
    border-radius: 5px;
    font-size: 18px;
    transition: background-color 0.3s, transform 0.2s;
    margin: 5px 0;
}

.form-container .btn:hover {
    background-color: rgba(72, 179, 147, 0.9); /* Hover effect with transparent lighter color */
    transform: scale(1.05);
}

.form-container .btn:active {
    background-color: rgba(56, 167, 138, 0.9);
}

.form-container .cancel {
    background-color: rgba(220, 53, 69, 0.9); /* Transparent red for cancel button */
    color: white;
    padding: 16px;
    border-radius: 5px;
    width: 100%;
    font-size: 18px;
    transition: background-color 0.3s;
    margin: 5px 0;
}

.form-container .cancel:hover {
    background-color: rgba(231, 76, 60, 0.9);
}

/* Responsive Design */
@media (max-width: 600px) {
    .form-container {
        padding: 15px;
    }

    h1 {
        font-size: 20px;
    }

    .form-container input[type="text"], 
    .form-container input[type="password"], 
    .form-container .btn, 
    .form-container .cancel {
        font-size: 14px;
    }
}
</style>
</head>
<body>
<?php
$con=mysqli_connect("localhost","root","","blooddonor");
if(isset($_POST["submit"])){
$mail=$_POST["email"];
$passwrd=$_POST["psw"];
$q="insert into regis values('$mail','$passwrd')";
$r=mysqli_query($con,$q);
header("Location:home.html");
}

?>
<center><br><br><br><br><br><br><br><br>
<form method="POST" action=" " class="form-container">
 
<h1>sign up</h1>
<label for="email"><b>Email</b></label>
<input type="text" placeholder="Enter Email" name="email" required>
                                                
<label for="psw"><b>Password</b></label>
<input type="password" placeholder="create a Password" value="" id="myInput" name="psw" required>
<input type="checkbox" onclick="myFunction()">Show Password
<button type="submit" class="btn" name="submit">Login</button>
<button type="button" class="btn cancel" onclick="closeForm()">Close</button>


</form>
</center>
<script>function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";}
    }</script>


</body>

</html>