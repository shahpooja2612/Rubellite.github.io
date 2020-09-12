<?php
session_start();
$_SESSION["user"];
$conn = mysqli_connect("localhost", "root", "", "rubellite") or die("Connection Error: " . mysqli_error($conn));

if (count($_POST) > 0) {
    $result = mysqli_query($conn, "SELECT * from logininfo WHERE id='" . $_SESSION["user"] . "'");
    $row = mysqli_fetch_array($result);
    if ($_POST["currentPassword"] == $row["password"]) {
        mysqli_query($conn, "UPDATE logininfo set password='" . $_POST["newPassword"] . "' WHERE id='" . $_SESSION["user"] . "'");
        $message = "Password Successfully Changed";
    } else
        $message = "Current Password is not correct";
    
    
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
/* Style all input fields */
input {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
}

/* Style the submit button */
input[type=submit] {
  background-color: #2fdab8;
  color: black;
}

/* Style the container for inputs */
.container {
  background-color: #f1f1f1;
  padding: 20px;
}

/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}


</style>
</head>
<body>

<h3>Change Password</h3>
<p>Fill In ALL The Fields.</p>

<div class="container">
  <form action="password.php" method="post">
    <div class="message"><?php if(isset($message)) { echo $message; } ?></div>

    <label for="usrname">Current password</label>
    <input type="text" id="" name="currentPassword" required>

    <label for="psw">New Password</label>
    <input type="password" id="psw" name="newPassword" required>
    
    <label for="psw">confirm Password</label>
    <input type="password" id="psw" name="confirmPassword" required>
    
    <input type="submit" value="Submit">
  </form>

</body>
</html>
