<?php
function emptyInputReserve($cinema_ID, $quantity, $contactNum, $time, $date){
    $result;

    if (empty($cinema_ID) || empty($quantity) || empty($contactNum) || empty( $time) || empty($date)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function createReservation($conn, $user_ID, $cinema_ID, $movie_ID, $quantity, $contactNum, $time, $date, $totalPrice, $reservaton_ID){
    $sql = "INSERT INTO reservation (`reservationID`, `usersID`, `cinemaID`, `quantity`, `contactNum`, `total_price`, `date`, `time`, `movieID`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = $conn->stmt_init();//Creating a prepared statements
  
    if (!$stmt = $conn->prepare($sql)) {
      header("location:../reserve.php?error=stmtfailed&movie_id=".$movie_ID);
          exit();
    }

    
    $stmt->bind_param("siiissssi", $reservaton_ID, $user_ID, $cinema_ID, $quantity, $contactNum, $totalPrice, $date, $time, $movie_ID);//pass data from te user mysqli_stmt_bind_param(prepared statement, data type, actual data submitted by the user)
    $stmt->execute();
    $stmt -> close();
    header("location:../ticket.php?error=none&reservationID=".$reservaton_ID);
    exit();

  }

//to check if the date entered is within the time availability of the movie
/*function datePassed($conn, $date){
    $sql = "SELECT * FROM movies WHERE movieID = ?;";
    $stmt = $conn->stmt_init();//Creating a prepared statements
    
    if (!$stmt = $conn->prepare($sql)) {
      header("location:../signup.php?error=stmtfailed");
          exit();
    }
    $stmt->bind_param("s", $date);
    $stmt->execute();
     
    $resultData = $stmt->get_result();
    $row = $resultData->fetch_assoc()
  
    if () {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }}*/

