<?php
if(!empty($_POST["email"])&&!empty($_POST["psw"]))
{
    $con=mysqli_connect("localhost","root","","blooddonor");
    $mail=$_POST["email"];
    $passwrd=$_POST["psw"];
    $q="SELECT * FROM regis WHERE mail='$mail' AND passwrd='$passwrd'";
    $r=mysqli_query($con,$q);
    $numrows=mysqli_num_rows($r);
    
if($numrows!=0){
header("Location:home.html");
echo"login successful";
}
else{
    echo "invalid email or password";}
}

else{
    echo "all fields are required!";
}
?>