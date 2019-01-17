<html>
<body>

<form action="report.php" method="GET">
<input id="search" type="text" placeholder="Type here">
<input id="submit" type="submit" value="search">
</form>
</body>
</html>

<?php
$mysqli = new mysqli("localhost", "root", "", "nsls"); 
  
if ($mysqli == = false) { 
    die("ERROR: Could not connect. " 
                          .$mysqli->connect_error); 
} 
  
if (isset($_POST['search'])) {
$safe_value = mysql_real_escape_string($_POST['search']);
$sql = mysql_query("SELECT email FROM user WHERE email LIKE '%".$safe_value."%'"); 
 }

} else {
    $sql = "SELECT * FROM user"; }
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
        echo "<table>"; 
        echo "<tr>"; 
        echo "<th>Firstname</th>"; 
        echo "<th>Lastname</th>"; 
        echo "<th>Username</th>"; 
        echo "<th>Email</th>";
        echo "</tr>"; 
        while ($row = $res->fetch_array())  
            { 
            echo "<tr>"; 
            echo "<td>".$row['Firstname']."</td>"; 
            echo "<td>".$row['LastName']."</td>"; 
            echo "<td>".$row['Username']."</td>"; 
            echo "<td>".$row['email']."</td>"; 
            echo "</tr>"; 
            } 
        echo "</table>"; 
        $res->free(); 
    } 
    else { 
        echo "No matching records are found."; 
    } 
} 
else { 
    echo "ERROR: Could not able to execute $sql. " 
                                             .$mysqli->error; 
}
     
$mysqli->close(); 
?> 