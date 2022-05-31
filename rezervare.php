<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicatie</title>
    <link rel="stylesheet" href="./css/style.css">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
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
$user = $_POST['username'];
$password = $_POST['password'];
if (isset($_POST['login'])) {
  	$username = $_POST['username'];
  	$password = $_POST['password'];

  	$sql_u = "SELECT * FROM users WHERE username='$username'";
  	$sql_e = "SELECT * FROM users WHERE password1='$password'";
  	$res_u = mysqli_query($conn, $sql_u);
  	$res_e = mysqli_query($conn, $sql_e);

  	if (mysqli_num_rows($res_u) > 0 && mysqli_num_rows($res_e) > 0) {
  	}else{
      echo 'Wrong username or password!';
      exit();
  	}
  }

$sql = "SELECT fullname, phone, email FROM users WHERE username='$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $fullname = $row["fullname"];
    $phone = $row["phone"];
    $email = $row["email"];
  }
} else {
  echo "0 results";
}

?> 
    <div class="rezervari">
        <h4>Fă o rezervare: </h4>
    <form method="post" action="user_info.php">
        <label for="">Username: </label>
        <input type="text" value=<?php echo htmlspecialchars($username); ?> name="username" required><br><br>
        <label for="">Nume: </label>
        <input type="text" name="nume" value=<?php echo htmlspecialchars($fullname); ?>  required><br><br>
        <label for="">Telefon:</label>
        <input type="text" name="telefon" value=<?php echo htmlspecialchars($phone); ?>  required><br><br>
        <label for="">Email: </label>
        <input type="text" name="email" value=<?php echo htmlspecialchars($email); ?>  required><br><br>
        <label for="">Data1: </label>
        <input type="date" name="firstday" required><br><br>
        <label for="">Data2:</label>
        <input type="date" name="lastday" required><br><br>
        <input type="hidden" name="user" value="<?php echo htmlspecialchars($user); ?>">
    <button type="submit">Trimite</button><br><br>
    </form>
    </div>
    <form method="post" action="user_data.php">
    <button type="submit" style="width:200px; margin-top:30px; margin-left:30px; margin-bottom:30px">Vezi rezervarile curente</button>
    <input type="hidden" name="user" value="<?php echo htmlspecialchars($user); ?>">
    </form>
    <button style="margin-left:30px"><a href="login.html" style="color:white; text-decoration:none;">Logout</a></button><br><br>
    <?php
    $conn->close();
    ?>
    <script src="javascript.js"></script>
    <!-- Bootstrap 5 scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>