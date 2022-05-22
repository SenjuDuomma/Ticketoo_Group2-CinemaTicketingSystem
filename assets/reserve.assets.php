<?php
    session_start();
   
    if (isset($_POST['Book'])) {
        require_once '../includes/dbh.inc.php';
        $film=$conn->query("SELECT * FROM movies WHERE movieID=".$_POST['Book'])->fetch_array();
        $user_ID = $_SESSION['userid'];
        $cinema_ID =$_POST['cinema'];
        $movie_ID = $_POST['Book'];
        $quantity = $_POST['quantity'];
        $contactNum = $_POST['contactNum'];
        $time = $_POST['time'];
        $date = $_POST['date'];


        $intQuantity = (int)$quantity;
        $intPrice = (int)$film['price'];
        $totalPrice = $intQuantity * $intPrice;

        $timeNow = strtotime("now");
        

        $reservaton_ID = $movie_ID.$user_ID.$cinema_ID.$timeNow;

        
        require_once 'functions.assets.php';

       if (emptyInputReserve($cinema_ID, $quantity, $contactNum, $time, $date) !== false) {
            header("location:../reserve.php?error=emptyinput&movie_id=".$_POST['Book']);
            exit();
        }/* 
        if (datePassed($date)) {
            header("location:../reserve.php?error=datePassed&movie_id=".$_POST['Book']);
            exit();
        }*/
        
        createReservation($conn, $user_ID, $cinema_ID, $movie_ID, $quantity, $contactNum, $time, $date, $totalPrice, $reservaton_ID);
       
}
else {
    header("location:../reserve.php");
    exit();
}
?>
