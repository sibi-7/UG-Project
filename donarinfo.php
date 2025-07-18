<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donor Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: start;
            min-height: 100vh;
        }

        h1 {
            color: #d32f2f;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            background-color: #ffffff;
            padding: 30px;
            max-width: 800px;
            width: 100%;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-radius: 8px;
            box-sizing: border-box;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .form-group {
            flex: 1 1 45%;
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            font-size: 14px;
        }

        input, select {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="radio"] {
            margin-right: 5px;
            width: auto;
        }

        .radio-group {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        button {
            padding: 12px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"] {
            background-color: #28a745;
            color: white;
        }

        button[type="submit"]:hover {
            background-color: #218838;
        }

        button[type="reset"] {
            background-color: #dc3545;
            color: white;
        }

        button[type="reset"]:hover {
            background-color: #c82333;
        }

        @media (max-width: 600px) {
            .form-group {
                flex: 1 1 100%;
            }
        }
    </style>
</head>
<body>

<?php
$conn=mysqli_connect("localhost","root","","blooddonor");
if(!$conn){
 die("connection failed:".mysqli_connect_error());
}
if(isset($_POST['submit']))
  {  $name=$_POST["name"];
    $dob=$_POST["dob"];
    $age=$_POST["age"];
    $gender=$_POST["gender"];
    $adds=$_POST["adds"];
    $taluk=$_POST["taluk"];
    $pincode=$_POST["pin"];
    $distric=$_POST["distric"];
    $state=$_POST["state"];
    $mobileno=$_POST["mobileno"];
    $mail=$_POST["mail"];
    $bgroup=$_POST["Bloodgroup"];
    $anydes=$_POST["disease"];
    
    $qu="insert into donarinfo values('$name','$dob','$age','$gender','$adds','$taluk','$pincode','$distric','$state','$mobileno','$mail','$bgroup','$anydes')";
    $r=mysqli_query($conn,$qu);

    if ($r) {
      // Redirect to home page after successful submission
      header("Location: index.html");
      exit();
  }
  }
?>

<form method="POST" action="">
    <h1>Blood Donor Form</h1>
    <div class="form-row">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" placeholder="enter name" required>
        </div>

        <div class="form-group">
            <label>DOB:</label>
            <input type="date" name="dob">
        </div>

        <div class="form-group">
            <label>Age:</label>
            <input type="number" name="age" placeholder="enter your age">
        </div>

        <div class="form-group">
            <label>Gender:</label>
            <div class="radio-group">
                <label><input type="radio" value="male" name="gender"> Male</label>
                <label><input type="radio" value="female" name="gender"> Female</label>
            </div>
        </div>

        <div class="form-group">
            <label>Address:</label>
            <input name="adds" type="text">
        </div>

        <div class="form-group">
            <label>Taluk:</label>
            <input name="taluk" type="text">
        </div>

        <div class="form-group">
            <label>Pincode:</label>
            <input name="pin" type="number">
        </div>

        <div class="form-group">
            <label>Distric:</label>
            <input name="distric" type="text">
        </div>

        <div class="form-group">
            <label>State:</label>
            <input name="state" type="text">
        </div>

        <div class="form-group">
            <label for="phone">Phono:</label>
            <input name="mobileno" id="phone" required>
        </div>

        <div class="form-group">
            <label>Email id:</label>
            <input name="mail" type="email">
        </div>

        <div class="form-group">
            <label>Blood group:</label>
            <select name="Bloodgroup">
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="Bombay Blood">bombay blood</option>
            </select>
        </div>

        <div class="form-group">
            <label>Any disease:</label>
            <input name="disease" type="text">
        </div>
    </div>

    <div class="button-group">
        <button type="submit" name="submit">Submit</button>
        <button type="reset">Reset</button>
    </div>
</form>

</body>
</html>
