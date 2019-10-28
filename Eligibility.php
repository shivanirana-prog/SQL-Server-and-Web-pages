-<!DOCTYPE html>
<html>
<body bgcolor = #E5C69F>
<?php
$tmarks=$_POST["12marks"];

$iitmain=$_POST["iitmain"];
$branch=$_POST["branches"];
if($tmarks>=80 && $iitmain>=120)
{
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
$query = "SELECT COUNT(branch) from student WHERE(branch='$branch')";
$result = mysqli_query($conn, $query);
$n1 = mysqli_fetch_row($result);
$n = $n1[0];
if($n <= 60)
{ 
  $t = 60 - $n;
  echo " You are eligible to apply for admission";
  echo "There are only " . $t . "seats left in branch " . $branch . "<br>";
  echo "<a href = Admsn_form.html> Admission Form  </a>";
}
 else
 {
   echo " You are eligible to apply but there are no seats left in branch " . $branch . " <br> ";
   echo " Please click on the link below to apply for some other branch ";
   echo "<a href = Eliginility_criteria.html> Eligibilty Form  </a>";
 }
mysqli_close($conn);
}
else
{
 echo "You are not eligible to apply";
}
?>
</body>
</html>



