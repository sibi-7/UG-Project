<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donor Form</title>
    <style>
        /* General Body Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #e0f7fa;
            margin: 0;
            padding: 0;
            top: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        /* Form Styling */
        form {
            padding: 20px;
            width: 100%;
            max-width: 600px;
            box-sizing: border-box;
            /* Allows internal scroll if needed */
        }

        table {
            width: 100%;
            border-spacing: 0;
        }

        td {
            padding: 5px;
        }

        label {
            font-weight: bold;
            margin-top: -5px;
            margin-bottom: 8px;
            display: flex;
            
        }

        input, select, button {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        input[type="radio"] {
            width: auto;
            margin-right: 10px;
        }

        /* Button Styles */
        button {
            margin-top: 10px;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
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

        /* Responsive Design */
        @media (max-width: 600px) {
            form {
                padding: 20px;
            }

            td {
                padding: 10px;
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
      }
    ?>

<center><br><br><br><br><br><br><br><br><br>
<h1 style="color: red"> Blood Donor Form </h1>
<form method="POST" action="">
  <table>
    <tr>
        <td>
          <label>Name:<input type="text"  name="name" placeholder="enter name" required><br>
        </td>
    </tr>

    <tr>
        <td>
          <label>DOB:<input type="date" name="dob"><br>
        </td>
    </tr>
    
    <tr>
      <td>
          <label>Age:<input type="number"  name="age" placeholder="enter your age"><br>
      </td>
    </tr>
    
    <tr>
      <td>
          <label>Gender:<input type="radio" value="male"  name="gender">Male <input type="radio" value="female" name="gender">female<br>
      <td>
    </tr>
    
    <tr>
      <td>
        <label>Address:<input name="adds" type="text"><br>
      </td>
    </tr>
    
    <tr>
      <td>
        <label>Taluk:<input name="taluk" type="text"><br>
      </td>
    </tr>

    <tr>
      <td>
        <label>pincode:<input  name="pin" type="number"><br>
      </td>
    </tr>

    <tr>
      <td>
        <label>Distric:<input name="distric" type="text"><br>
      </td>
    </tr>

    <tr>
      <td>
        <label>State:<input name="state" type="text"><br>
      </td>
    </tr>

    <tr>
      <td>
        <label for="phone">phono:</label>
        <input name="mobileno" id="phone" required><br>
      </td>
    </tr>

    <tr>
      <td>
        <label>Email id:<input name="mail" type="email"><br>
      </td>
    </tr>

    <tr>
      <td>
        <label>Blood group:<select name="Bloodgroup">
        <option name="Bloodgroup" value="A+">A+</option>
        <option name="Bloodgroup" value="A-">A-</option>
        <option name="Bloodgroup" value="B+">B+</option>
        <option name="Bloodgroup" value="B-">B-</option>
        <option name="Bloodgroup" value="O+">O+</option>
        <option name="Bloodgroup" value="O-">O-</option>
        <option name="Bloodgroup" value="AB+">AB+</option>
        <option name="Bloodgroup" value="AB-">AB-</option>
        <option name="Bloodgroup" value="Bombay Blood">bombay blood</option>
        </select><br>
      </td>
    </tr>
    
    <tr>
      <td>
        <label>Any disease:<input  name="disease"type="text"><br>
      </td>
    </tr>
   
    <tr>
      <td>
        <button type="submit" name="submit">submit</button>
   
        <button type="reset">reset</button>
      </td>
    </tr>

</table>
</form>
</center>
</body>
</html>