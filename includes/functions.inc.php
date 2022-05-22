<?php
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat){
    $result;

    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidUid($username){
    $result;

    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat){
    $result;

    if ($pwd !== $pwdRepeat){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email){
  $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
  $stmt = $conn->stmt_init();//Creating a prepared statements
  
  if (!$stmt = $conn->prepare($sql)) {
    header("location:../signup.php?error=stmtfailed");
        exit();
  }
  $stmt->bind_param("ss", $username, $email);
  $stmt->execute();
  //mysqli_stmt_bind_param($stmt, "ss", $username, $email);//pass data from te user mysqli_stmt_bind_param(prepared statement, data type, actual data submitted by the user)
  //mysqli_stmt_execute($stmt);

  $resultData = $stmt->get_result();

  if ($row = $resultData->fetch_assoc()) {
      return $row;
  }
  else {
      $result = false;
      return $result;
  }

  $stmt -> close();
}

function creatUser($conn, $name, $email, $username, $pwd){
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
    $stmt = $conn->stmt_init();//Creating a prepared statements
  
    if (!$stmt = $conn->prepare($sql)) {
      header("location:../signup.php?error=stmtfailed");
          exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    
    $stmt->bind_param("ssss", $name, $email, $username, $hashedPwd);//pass data from te user mysqli_stmt_bind_param(prepared statement, data type, actual data submitted by the user)
    $stmt->execute();
    $stmt -> close();
    header("location:../signup.php?error=none");
    exit();

  }

  function emptyInputLogin($username, $pwd){
    $result;

    if (empty($username) || empty($pwd)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd){
    $uidExists = uidExists($conn, $username, $username);
    //$userRows = $conn->query("SELECT user_name from (SELECT u_name AS user_nameFROM   users) WHERE  u_name = ".$username)

    if ( $uidExists === false) {
        header("location:../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location:../login.php?error=wronglogin");
        exit();
    }
    elseif ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersID"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        $_SESSION["userFullName"] = $uidExists["usersName"];
        $_SESSION["useremail"] = $uidExists["usersEmail"];
        header("location:../index.php?id=".$_SESSION['userid']);
        exit();
    }


}
