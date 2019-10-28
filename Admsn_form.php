<html>
<body bgcolor = #E5C69F>
</body>
</html>


<?php
echo "The form submission was sucessful!!! <br>"; 
$fname=$_POST["firstname"];

$lname=$_POST["lastname"];

$dob=$_POST["dob"];

$age=$_POST["age"];
$gender=$_POST["sex"];
$tel=$_POST["ph_no"];

$email=$_POST["email"];

$address=$_POST["Address"];
$tenmarks=$_POST["10marks"];
$twmarks=$_POST["12marks"];
$iitmain=$_POST["iitmain"];
$branch=$_POST["branches"];
$cat=$_POST["Caste"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college_admsn";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 
else
{
  echo "Connection Established <br>";
}

if($cat == "open")
{
  $que="INSERT INTO student (FirstName,LastName,dob,age,gender,ph_no,email,address,ten,twelve,iit,branch,category,fees) values ('$fname','$lname','$dob','$age','$gender','$tel','$email','$address','$tenmarks','$twmarks','$iitmain','$branch','$cat','100000')";
}
else if($cat == "scst")
{
  $que="INSERT INTO student (FirstName,LastName,dob,age,gender,ph_no,email,address,ten,twelve,iit,branch,category,fees) values ('$fname','$lname','$dob','$age','$gender','$tel','$email','$address','$tenmarks','$twmarks','$iitmain','$branch','$cat','10000')";
}
else
{
 $que="INSERT INTO student (FirstName,LastName,dob,age,gender,ph_no,email,address,ten,twelve,iit,branch,category,fees) values ('$fname','$lname','$dob','$age','$gender','$tel','$email','$address','$tenmarks','$twmarks','$iitmain','$branch','$cat','50000')";
} 
 
if (mysqli_query($conn, $que)) {
    echo "New record created successfully <br>";
} else {
    echo "Error: " . $que . "<br>" . mysqli_error($conn);
}




$query = "SELECT ID,FirstName,LastName,branch,category,fees  FROM student WHERE (email = '$email')";
$result = mysqli_query($conn, $query);
echo"<br>";
echo"<br>";
echo"<center><b><font size=5> Fees Payment </center></b></font>";
echo"<br>";
if (mysqli_num_rows($result) > 0) {
    
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
     echo "<b><center><font size=3> ID:" .$row["ID"]. "<br>";
     echo"<br>";
     echo " NAME:" .$row["FirstName"]. " " .$row["LastName"]. "<br>";
     echo"<br>";
     echo " BRANCH:" .$row["branch"]. "<br>";
     echo"<br>";
     echo " CATEGORY:" .$row["category"]. "<br>";
     echo"<br>";
     echo " FEES:" .$row["fees"]. "<br>";
     echo"<br>";
    }
} else {
    echo "0 results";
}
mysqli_close($conn);
?>
<html>
<body>
<form method="post"  action="paid.html" target="_blank" onsubmit="paid.html">
Enter Name of Bank :
<br><br>
<input type="text" name = "bank" required >
<br><br>
Enter Branch :
<br><br>
<input type="text" name = "branch" required >
<br><br>
Enter Account No. :
<br><br>
<input type="text" name = "acc" required >
<br><br>
Enter your Card No. :
<br><br>
<input type="text" name = "card" required >
<br><br>
Enter your pin :
<br><br>
<input type="password" name = "card" required >
<br><br>
<input type="submit" value"submit">
<br><br>
<input type="reset" value="Reset">
</form>
</body>
</html>