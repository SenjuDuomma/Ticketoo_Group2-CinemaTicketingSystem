<?php

if (isset($_POST["submit"])) {
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false) {
        header("location:../signup.php?error=emptyinput");
        exit();//stops the script from running
    }
    if (invalidUid($username) !== false) {
        header("location:../signup.php?error=invaliduid");
        exit();//stops the script from running
    }
    if (invalidEmail($email) !== false) {
        header("location:../signup.php?error=invalidemail");
        exit();//stops the script from running
    }
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location:../signup.php?error=unmatchedpassword");
        exit();//stops the script from running
    }
    if (uidExists($conn, $username, $email) !== false) {
        header("location:../signup.php?error=usernametaken");
        exit();//stops the script from running
    }

    creatUser($conn, $name, $email, $username, $pwd);

}
else {
    header("location:../signup.php");
    exit();
}