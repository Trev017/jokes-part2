<html>
<head>
</head>
<?php
//
//part 3(2)
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "db_connect.php";
//$username = $_POST['username'];
$username = addslashes($_POST['username']);
$password = $_POST['password'];
echo "<h2>You attempted to login with " . $username . " and " . $password . "</h2>";
$stmt = $mysqli->prepare("SELECT user_id, user_name, `password` FROM users WHERE user_name = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($user_id, $uname, $pw);
//$sql = "SELECT user_id, user_name, `password` FROM users WHERE user_name = '$username' AND `password` = '$password'";
//echo "SQL = " . $sql . "<br>";
if ($stmt->num_rows == 1) {
    echo "I found one person with that username<br>";
    $stmt->fetch();
    if (password_verify($password, $pw)) {
        echo "Password matches<br>";
        echo "Login successful<br>";
        $_SESSION['username'] = $uname;
        $_SESSION['user_id'] = $user_id;
        exit;
    } else {
        $_SESSION = [];
        session_destroy();
    }
} else {
    $_SESSION = [];
    session_destroy();
}
echo "Login failed<br>";
echo "Session variable = <br>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
echo "<a href='index.php'>Return to main page</a>";
//
/*
//part 3(1)
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "db_connect.php";
$username = $_POST['username'];
//$username = addslashes($_POST['username']);
$password = $_POST['password'];
echo "<h2>You attempted to login with " . $username . " and " . $password . "</h2>";
$stmt = $mysqli->prepare("SELECT user_id, user_name, `password` FROM users WHERE user_name = ? AND `password` = ?");
$stmt->bind_param("s", $username, $password);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($user_id, $uname, $pw);
//$sql = "SELECT user_id, user_name, `password` FROM users WHERE user_name = '$username' AND `password` = '$password'";
echo "SQL = " . $sql . "<br>";
if ($stmt->num_rows > 0) {
    $row = $stmt->fetch();
    $user_id = $row['id'];
    echo "Login successful<br>";
    $_SESSION['username'] = $uname;
    $_SESSION['user_id'] = $user_id;
} else {
    echo "0 results. Nobody with that username or password";
    $_SESSION = [];
    session_destroy();
}
echo "Session variable = ";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
echo "<a href='index.php'>Return to main page</a>";
*/
/*
//part 2
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "db_connect.php";
$username = $_POST['username'];
$password = $_POST['password'];
echo "<h2>You attempted to login with " . $username . " and " . $password . "</h2>";
$sql = "SELECT user_id, user_name, `password` FROM users WHERE user_name = '$username' AND `password` = '$password'";
echo "SQL = " . $sql . "<br>";
$result = $mysqli->query($sql);
echo "<pre>";
print_r($result);
echo "</pre>";
echo "<p>Login success</p>";
$_SESSION['username'] = $username;
$_SESSION['user_id'] = $user_id;
echo "Session variable = ";
print_r($_SESSION);
echo "<br>";
*/
/*
//part 1
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "db_connect.php";
$username = $_POST['username'];
$password = $_POST['password'];
echo "<h2>You attempted to login with " . $username . " and " . $password . "</h2>";
$stmt = $mysqli->prepare("SELECT user_id, user_name, `password` FROM users WHERE user_name = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($user_id, $fetched_name, $fetched_pass);
if ($stmt->num_rows == 1) {
    echo "Found 1 person with that username<br>";
    $stmt->fetch();
    if ($password == $fetched_pass) {
        echo " pw matches<br>";
        echo "<p>Login success</p>";
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;
    } else {
        echo "Password does not match<br>";
    }
} else {
    echo "0 results. Not logged in<br>";
    $_SESSION = [];
    session_destroy();
}
echo "Session variable = ";
print_r($_SESSION);
echo "<br>";
echo "<a href='index.php'>Return to main page</a>";
*/
?>
</html>