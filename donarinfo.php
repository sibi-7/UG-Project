<html>
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
        <input name="mobileno"  type="tel" id="phone" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required><br>
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
        <option name="Bloodgruop" value="A+">A+</option>
        <option name="Bloodgruop" value="A-">A-</option>
        <option name="Bloodgruop" value="B+">B+</option>
        <option name="Bloodgruop" value="B-">B-</option>
        <option name="Bloodgruop" value="O+">O+</option>
        <option name="Bloodgruop" value="O-">O-</option>
        <option name="Bloodgruop" value="AB+">AB+</option>
        <option name="Bloodgruop" value="AB-">AB-</option>
        <option name="Bloodgruop" value="Bombay Blood">bombay blood</option>
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