<html>
<head>
    <style>
        body{
            
        }
        .form-container {
           
  max-width: 300px;
 
 padding: 10px;
  background-color: rgba(66, 58, 59, 0.856);
}
h1{
  text-align:center
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f7f4f4;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: rgb(243, 236, 236);
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
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