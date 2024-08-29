 <html>
<body>
    <style>
        echo{
            text-align:center
        }
    </style>
<?php
if (isset($_POST["a+"])) {
    $con = mysqli_connect("localhost", "root", "", "blooddonor");
    if (mysqli_connect_errno()) {
        echo "<p>Error: Unable to connect to MySQL.</p>";
        exit();
    }
    $query = "SELECT * FROM donarinfo WHERE bgroup='a+'";
    $result = mysqli_query($con, $query);
    if (!$result) {
        echo "<p>Error executing query: " . mysqli_error($con) . "</p>";
        mysqli_close($con);
        exit();
    }
  
    echo "<title>Blood Donor Information</title>";
    echo "<style>";
    echo "body { font-family: Arial, sans-serif; margin: 20px; }";
    echo "table { width: 100%; border-collapse: collapse; margin: 20px 0; }";
    echo "th, td { padding: 12px; text-align: left; border: 1px solid #ddd; }";
    echo "th { background-color: #f4f4f4; }";
    echo "tr:nth-child(even) { background-color: #f9f9f9; }";
    echo "</style>";
    echo "</head>";
    echo "<body>";
    echo "<h1>Blood Donor Information</h1>";
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>Date of Birth</th>";
    echo "<th>Age</th>";
    echo "<th>Gender</th>";
    echo "<th>Address</th>";
    echo "<th>Taluk</th>";
    echo "<th>District</th>";
    echo "<th>State</th>";
    echo "<th>Mobile No</th>";
    echo "<th>Email</th>";
    echo "<th>Blood Group</th>";
    echo "<th>Any Description</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['dob']) . "</td>";
        echo "<td>" . htmlspecialchars($row['age']) . "</td>";
        echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
        echo "<td>" . htmlspecialchars($row['adds']) . "</td>";
        echo "<td>" . htmlspecialchars($row['taluk']) . "</td>";
        echo "<td>" . htmlspecialchars($row['distric']) . "</td>";
        echo "<td>" . htmlspecialchars($row['state']) . "</td>";
        echo "<td>" . htmlspecialchars($row['mobileno']) . "</td>";
        echo "<td>" . htmlspecialchars($row['mail']) . "</td>";
        echo "<td>" . htmlspecialchars($row['bgroup']) . "</td>";
        echo "<td>" . htmlspecialchars($row['anydes']) . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</body>";
    echo "</html>";

    mysqli_close($con);
}

if (isset($_POST["a-"])) {
    $con = mysqli_connect("localhost", "root", "", "blooddonor");
    if (mysqli_connect_errno()) {
        echo "<p>Error: Unable to connect to MySQL.</p>";
        exit();
    }
    $query = "SELECT * FROM donarinfo WHERE bgroup='a-'";
    $result = mysqli_query($con, $query);
    if (!$result) {
        echo "<p>Error executing query: " . mysqli_error($con) . "</p>";
        mysqli_close($con);
        exit();
    }

    echo "<title>Blood Donor Information</title>";
    echo "<style>";
    echo "body { font-family: Arial, sans-serif; margin: 20px; }";
    echo "table { width: 100%; border-collapse: collapse; margin: 20px 0; }";
    echo "th, td { padding: 12px; text-align: left; border: 1px solid #ddd; }";
    echo "th { background-color: #f4f4f4; }";
    echo "tr:nth-child(even) { background-color: #f9f9f9; }";
    echo "</style>";
    echo "</head>";
    echo "<body>";
    echo "<h1>Blood Donor Information</h1>";
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>Date of Birth</th>";
    echo "<th>Age</th>";
    echo "<th>Gender</th>";
    echo "<th>Address</th>";
    echo "<th>Taluk</th>";
    echo "<th>District</th>";
    echo "<th>State</th>";
    echo "<th>Mobile No</th>";
    echo "<th>Email</th>";
    echo "<th>Blood Group</th>";
    echo "<th>Any Description</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['dob']) . "</td>";
        echo "<td>" . htmlspecialchars($row['age']) . "</td>";
        echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
        echo "<td>" . htmlspecialchars($row['adds']) . "</td>";
        echo "<td>" . htmlspecialchars($row['taluk']) . "</td>";
        echo "<td>" . htmlspecialchars($row['distric']) . "</td>";
        echo "<td>" . htmlspecialchars($row['state']) . "</td>";
        echo "<td>" . htmlspecialchars($row['mobileno']) . "</td>";
        echo "<td>" . htmlspecialchars($row['mail']) . "</td>";
        echo "<td>" . htmlspecialchars($row['bgroup']) . "</td>";
        echo "<td>" . htmlspecialchars($row['anydes']) . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</body>";
    echo "</html>";

    mysqli_close($con);
}


 
if (isset($_POST["b+"])) {
    $con = mysqli_connect("localhost", "root", "", "blooddonor");
    if (mysqli_connect_errno()) {
        echo "<p>Error: Unable to connect to MySQL.</p>";
        exit();
    }
    $query = "SELECT * FROM donarinfo WHERE bgroup='b+'";
    $result = mysqli_query($con, $query);
    if (!$result) {
        echo "<p>Error executing query: " . mysqli_error($con) . "</p>";
        mysqli_close($con);
        exit();
    }

    echo "<title>Blood Donor Information</title>";
    echo "<style>";
    echo "body { font-family: Arial, sans-serif; margin: 20px; }";
    echo "table { width: 100%; border-collapse: collapse; margin: 20px 0; }";
    echo "th, td { padding: 12px; text-align: left; border: 1px solid #ddd; }";
    echo "th { background-color: #f4f4f4; }";
    echo "tr:nth-child(even) { background-color: #f9f9f9; }";
    echo "</style>";
    echo "</head>";
    echo "<body>";
    echo "<h1>Blood Donor Information</h1>";
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>Date of Birth</th>";
    echo "<th>Age</th>";
    echo "<th>Gender</th>";
    echo "<th>Address</th>";
    echo "<th>Taluk</th>";
    echo "<th>District</th>";
    echo "<th>State</th>";
    echo "<th>Mobile No</th>";
    echo "<th>Email</th>";
    echo "<th>Blood Group</th>";
    echo "<th>Any Description</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";


    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['dob']) . "</td>";
        echo "<td>" . htmlspecialchars($row['age']) . "</td>";
        echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
        echo "<td>" . htmlspecialchars($row['adds']) . "</td>";
        echo "<td>" . htmlspecialchars($row['taluk']) . "</td>";
        echo "<td>" . htmlspecialchars($row['distric']) . "</td>";
        echo "<td>" . htmlspecialchars($row['state']) . "</td>";
        echo "<td>" . htmlspecialchars($row['mobileno']) . "</td>";
        echo "<td>" . htmlspecialchars($row['mail']) . "</td>";
        echo "<td>" . htmlspecialchars($row['bgroup']) . "</td>";
        echo "<td>" . htmlspecialchars($row['anydes']) . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</body>";
    echo "</html>";


    mysqli_close($con);
}


if (isset($_POST["b-"])) {
    $con = mysqli_connect("localhost", "root", "", "blooddonor");
    if (mysqli_connect_errno()) {
        echo "<p>Error: Unable to connect to MySQL.</p>";
        exit();
    }
    $query = "SELECT * FROM donarinfo WHERE bgroup='b-'";
    $result = mysqli_query($con, $query);
    if (!$result) {
        echo "<p>Error executing query: " . mysqli_error($con) . "</p>";
        mysqli_close($con);
        exit();
    }


    echo "<title>Blood Donor Information</title>";
    echo "<style>";
    echo "body { font-family: Arial, sans-serif; margin: 20px; }";
    echo "table { width: 100%; border-collapse: collapse; margin: 20px 0; }";
    echo "th, td { padding: 12px; text-align: left; border: 1px solid #ddd; }";
    echo "th { background-color: #f4f4f4; }";
    echo "tr:nth-child(even) { background-color: #f9f9f9; }";
    echo "</style>";
    echo "</head>";
    echo "<body>";
    echo "<h1>Blood Donor Information</h1>";
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>Date of Birth</th>";
    echo "<th>Age</th>";
    echo "<th>Gender</th>";
    echo "<th>Address</th>";
    echo "<th>Taluk</th>";
    echo "<th>District</th>";
    echo "<th>State</th>";
    echo "<th>Mobile No</th>";
    echo "<th>Email</th>";
    echo "<th>Blood Group</th>";
    echo "<th>Any Description</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['dob']) . "</td>";
        echo "<td>" . htmlspecialchars($row['age']) . "</td>";
        echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
        echo "<td>" . htmlspecialchars($row['adds']) . "</td>";
        echo "<td>" . htmlspecialchars($row['taluk']) . "</td>";
        echo "<td>" . htmlspecialchars($row['distric']) . "</td>";
        echo "<td>" . htmlspecialchars($row['state']) . "</td>";
        echo "<td>" . htmlspecialchars($row['mobileno']) . "</td>";
        echo "<td>" . htmlspecialchars($row['mail']) . "</td>";
        echo "<td>" . htmlspecialchars($row['bgroup']) . "</td>";
        echo "<td>" . htmlspecialchars($row['anydes']) . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</body>";
    echo "</html>";

    mysqli_close($con);
}




if (isset($_POST["ab+"])) {
    $con = mysqli_connect("localhost", "root", "", "blooddonor");
    if (mysqli_connect_errno()) {
        echo "<p>Error: Unable to connect to MySQL.</p>";
        exit();
    }
    $query = "SELECT * FROM donarinfo WHERE bgroup='ab+'";
    $result = mysqli_query($con, $query);
    if (!$result) {
        echo "<p>Error executing query: " . mysqli_error($con) . "</p>";
        mysqli_close($con);
        exit();
    }

    echo "<title>Blood Donor Information</title>";
    echo "<style>";
    echo "body { font-family: Arial, sans-serif; margin: 20px; }";
    echo "table { width: 100%; border-collapse: collapse; margin: 20px 0; }";
    echo "th, td { padding: 12px; text-align: left; border: 1px solid #ddd; }";
    echo "th { background-color: #f4f4f4; }";
    echo "tr:nth-child(even) { background-color: #f9f9f9; }";
    echo "</style>";
    echo "</head>";
    echo "<body>";
    echo "<h1>Blood Donor Information</h1>";
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>Date of Birth</th>";
    echo "<th>Age</th>";
    echo "<th>Gender</th>";
    echo "<th>Address</th>";
    echo "<th>Taluk</th>";
    echo "<th>District</th>";
    echo "<th>State</th>";
    echo "<th>Mobile No</th>";
    echo "<th>Email</th>";
    echo "<th>Blood Group</th>";
    echo "<th>Any Description</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

   
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['dob']) . "</td>";
        echo "<td>" . htmlspecialchars($row['age']) . "</td>";
        echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
        echo "<td>" . htmlspecialchars($row['adds']) . "</td>";
        echo "<td>" . htmlspecialchars($row['taluk']) . "</td>";
        echo "<td>" . htmlspecialchars($row['distric']) . "</td>";
        echo "<td>" . htmlspecialchars($row['state']) . "</td>";
        echo "<td>" . htmlspecialchars($row['mobileno']) . "</td>";
        echo "<td>" . htmlspecialchars($row['mail']) . "</td>";
        echo "<td>" . htmlspecialchars($row['bgroup']) . "</td>";
        echo "<td>" . htmlspecialchars($row['anydes']) . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</body>";
    echo "</html>";

    mysqli_close($con);
}



if (isset($_POST["ab-"])) {
    $con = mysqli_connect("localhost", "root", "", "blooddonor");
    if (mysqli_connect_errno()) {
        echo "<p>Error: Unable to connect to MySQL.</p>";
        exit();
    }
    $query = "SELECT * FROM donarinfo WHERE bgroup='ab-'";
    $result = mysqli_query($con, $query); 
    if (!$result) {
        echo "<p>Error executing query: " . mysqli_error($con) . "</p>";
        mysqli_close($con);
        exit();
    }

    echo "<title>Blood Donor Information</title>";
    echo "<style>";
    echo "body { font-family: Arial, sans-serif; margin: 20px; }";
    echo "table { width: 100%; border-collapse: collapse; margin: 20px 0; }";
    echo "th, td { padding: 12px; text-align: left; border: 1px solid #ddd; }";
    echo "th { background-color: #f4f4f4; }";
    echo "tr:nth-child(even) { background-color: #f9f9f9; }";
    echo "</style>";
    echo "</head>";
    echo "<body>";
    echo "<h1>Blood Donor Information</h1>";
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>Date of Birth</th>";
    echo "<th>Age</th>";
    echo "<th>Gender</th>";
    echo "<th>Address</th>";
    echo "<th>Taluk</th>";
    echo "<th>District</th>";
    echo "<th>State</th>";
    echo "<th>Mobile No</th>";
    echo "<th>Email</th>";
    echo "<th>Blood Group</th>";
    echo "<th>Any Description</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['dob']) . "</td>";
        echo "<td>" . htmlspecialchars($row['age']) . "</td>";
        echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
        echo "<td>" . htmlspecialchars($row['adds']) . "</td>";
        echo "<td>" . htmlspecialchars($row['taluk']) . "</td>";
        echo "<td>" . htmlspecialchars($row['distric']) . "</td>";
        echo "<td>" . htmlspecialchars($row['state']) . "</td>";
        echo "<td>" . htmlspecialchars($row['mobileno']) . "</td>";
        echo "<td>" . htmlspecialchars($row['mail']) . "</td>";
        echo "<td>" . htmlspecialchars($row['bgroup']) . "</td>";
        echo "<td>" . htmlspecialchars($row['anydes']) . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</body>";
    echo "</html>";

  
    mysqli_close($con);
}



if (isset($_POST["b+"])) {
    $con = mysqli_connect("localhost", "root", "", "blooddonor");
    if (mysqli_connect_errno()) {
        echo "<p>Error: Unable to connect to MySQL.</p>";
        exit();
    }
    $query = "SELECT * FROM donarinfo WHERE bgroup='b+'";
    $result = mysqli_query($con, $query);
    if (!$result) {
        echo "<p>Error executing query: " . mysqli_error($con) . "</p>";
        mysqli_close($con);
        exit();
    }

    echo "<title>Blood Donor Information</title>";
    echo "<style>";
    echo "body { font-family: Arial, sans-serif; margin: 20px; }";
    echo "table { width: 100%; border-collapse: collapse; margin: 20px 0; }";
    echo "th, td { padding: 12px; text-align: left; border: 1px solid #ddd; }";
    echo "th { background-color: #f4f4f4; }";
    echo "tr:nth-child(even) { background-color: #f9f9f9; }";
    echo "</style>";
    echo "</head>";
    echo "<body>";
    echo "<h1>Blood Donor Information</h1>";
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>Date of Birth</th>";
    echo "<th>Age</th>";
    echo "<th>Gender</th>";
    echo "<th>Address</th>";
    echo "<th>Taluk</th>";
    echo "<th>District</th>";
    echo "<th>State</th>";
    echo "<th>Mobile No</th>";
    echo "<th>Email</th>";
    echo "<th>Blood Group</th>";
    echo "<th>Any Description</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['dob']) . "</td>";
        echo "<td>" . htmlspecialchars($row['age']) . "</td>";
        echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
        echo "<td>" . htmlspecialchars($row['adds']) . "</td>";
        echo "<td>" . htmlspecialchars($row['taluk']) . "</td>";
        echo "<td>" . htmlspecialchars($row['distric']) . "</td>";
        echo "<td>" . htmlspecialchars($row['state']) . "</td>";
        echo "<td>" . htmlspecialchars($row['mobileno']) . "</td>";
        echo "<td>" . htmlspecialchars($row['mail']) . "</td>";
        echo "<td>" . htmlspecialchars($row['bgroup']) . "</td>";
        echo "<td>" . htmlspecialchars($row['anydes']) . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</body>";
    echo "</html>";

    mysqli_close($con);
}



if (isset($_POST["b-"])) {
    $con = mysqli_connect("localhost", "root", "", "blooddonor");
    if (mysqli_connect_errno()) {
        echo "<p>Error: Unable to connect to MySQL.</p>";
        exit();
    }
    $query = "SELECT * FROM donarinfo WHERE bgroup='b-'";
    $result = mysqli_query($con, $query);
    if (!$result) {
        echo "<p>Error executing query: " . mysqli_error($con) . "</p>";
        mysqli_close($con);
        exit();
    }

    echo "<title>Blood Donor Information</title>";
    echo "<style>";
    echo "body { font-family: Arial, sans-serif; margin: 20px; }";
    echo "table { width: 100%; border-collapse: collapse; margin: 20px 0; }";
    echo "th, td { padding: 12px; text-align: left; border: 1px solid #ddd; }";
    echo "th { background-color: #f4f4f4; }";
    echo "tr:nth-child(even) { background-color: #f9f9f9; }";
    echo "</style>";
    echo "</head>";
    echo "<body>";
    echo "<h1>Blood Donor Information</h1>";
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>Date of Birth</th>";
    echo "<th>Age</th>";
    echo "<th>Gender</th>";
    echo "<th>Address</th>";
    echo "<th>Taluk</th>";
    echo "<th>District</th>";
    echo "<th>State</th>";
    echo "<th>Mobile No</th>";
    echo "<th>Email</th>";
    echo "<th>Blood Group</th>";
    echo "<th>Any Description</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['dob']) . "</td>";
        echo "<td>" . htmlspecialchars($row['age']) . "</td>";
        echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
        echo "<td>" . htmlspecialchars($row['adds']) . "</td>";
        echo "<td>" . htmlspecialchars($row['taluk']) . "</td>";
        echo "<td>" . htmlspecialchars($row['distric']) . "</td>";
        echo "<td>" . htmlspecialchars($row['state']) . "</td>";
        echo "<td>" . htmlspecialchars($row['mobileno']) . "</td>";
        echo "<td>" . htmlspecialchars($row['mail']) . "</td>";
        echo "<td>" . htmlspecialchars($row['bgroup']) . "</td>";
        echo "<td>" . htmlspecialchars($row['anydes']) . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</body>";
    echo "</html>";

    mysqli_close($con);
}

?>
</body>
</html>
