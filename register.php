 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$city = $_POST['city'];
$age = $_POST['age'];

if (isset($_POST['register'])) {
  	$username = $_POST['username'];
  	$email = $_POST['email'];
  	$password = $_POST['password'];

  	$sql_u = "SELECT * FROM users WHERE username='$username'";
  	$sql_e = "SELECT * FROM users WHERE email='$email'";
  	$res_u = mysqli_query($conn, $sql_u);
  	$res_e = mysqli_query($conn, $sql_e);

  	if (mysqli_num_rows($res_u) > 0) {
  	  echo "Sorry... username already taken";
  	}else if(mysqli_num_rows($res_e) > 0){
  	  echo "Sorry... email already taken";
  	}else{
           $query = "INSERT INTO users (username, password1, fullname, phone, email, city, age) 
      	    	  VALUES ('$username', '$password', '$fullname', '$phone', '$email', '$city', '$age')";
           $results = mysqli_query($conn, $query);
           header("Location: login.html");
  	}
  }
$conn->close();
?> 