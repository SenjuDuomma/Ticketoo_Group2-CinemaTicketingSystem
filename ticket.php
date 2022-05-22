<?php
    include_once 'header.php';
    require_once 'includes/dbh.inc.php';
    
    if (isset($_GET["error"]))
    {
     if ($_GET["error"] == "none") {
        echo "<p class = 'success'>Ticket has been reserved successfully!</p><br>"; 
        $reservation = $conn->query("SELECT * FROM reservation where reservationID=".$_GET['reservationID'])->fetch_array();
        $movie_rsrv = $conn->query("SELECT * FROM movies where movieID=".$reservation['movieID'])->fetch_array();
        $user = $conn->query("SELECT * FROM users where usersID=".$reservation['usersID'])->fetch_array();
        
       
?>

        <div>
            <div>
                <h2>Ticket Information</h2>
                <h3><?php echo $movie_rsrv['title']?></h3>
                <h5>Price: <?php echo $movie_rsrv['price']?></h5>
                <p>
                    Name: <?php echo $user['usersName']?> <br>
                    Reservation ID No: <?php echo $reservation['reservationID']?><br>
                    Contact Number: <?php echo $reservation['contactNum']?><br>
                    Date: <?php echo $reservation['date']?><br>
                    Time: <?php echo $reservation['time']?><br>
                    Cinema: <?php echo $reservation['cinemaID']?><br>

                    Number of Seats: <?php echo $reservation['quantity']?><br><br>

                    Total Price: P<?php echo $reservation['total_price']?><br>
                </p>
            </div>
            <button onclick="exitBtn()">Exit</button><button onclick="historyBtn()">History</button>
        </div>



<?php
        }
    }
?>
<script>
function exitBtn() {
  location.replace("index.php")
}
function historyBtn(){location.replace("account.php")}
</script>



<?php
    include_once 'footer.php';
?>
