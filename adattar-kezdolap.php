<!DOCTYPE HTML>  
<html>
<head>

</head>
<body>
<?php
$nameErr = $orgErr = $orgnameErr = $userErr = $emailErr = $passErr = $repassErr = "";
$name = $org = $orgname = $user = $email = $pass = $repass = "";

if (isset($_POST['submit']) {
  if (empty($_POST["name"])){
  $nameErr = "Name is Required";
  }
  else {
	  $name = test_input($_POST["name"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
 };
	$email = test_input($_POST["email"]);
  if (empty($_POST["email"])){
  $emailErr = "Email is Required";
  }
  else {
	  $email = test_input($_POST["email"]);
	  if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $emailErr = "Invalid email format";
	}
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>



<?php
echo "<h2>Your Input:</h2>";
echo $namee;
echo "<br>";
echo $email;
echo "<br>";
?>

</body>
</html>