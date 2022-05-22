<?php
    include_once 'header.php';
    require_once 'includes/dbh.inc.php';
    $user = $conn->query("SELECT * FROM users WHERE usersID=".$_SESSION['userid']);
    while ($user_row = $user->fetch_assoc()):
    $reservation = $conn->query("SELECT * FROM reservation WHERE usersID=".$user_row['usersID']);
    ?>
    <div>
        <div>
            <table>
                <tr>
                    <th><h2>Profile</h2></th>
                </tr>
                <tr>
                    <td></td>
                    <td><h3><?php echo $user_row['usersName']?></h3><br></td>
                    <td>
                        <p>
                        Username: <?php echo $user_row['usersUid']?><br>
                        Email: <?php echo $user_row['usersEmail']?>
                    </p>
                    </td>
                </tr>
            </table>
        </div>

        <div>
            <table>
                <tr>
                    <th><h2>Reservation History</h2></th>
                </tr>
                <tr>
                    <td><h3>Reservation ID</h3></td>
                    <td><h3>Movie</h3></td>
                    <td><h3>Movie Info</h3></td>
                    <td><h3>Reservation Info</h3></td>
                    <td><h3>Total Price</h3></td>
                </tr>
                <?php 
                
                    while($reserved_row = $reservation->fetch_assoc()){
                        $movie_rsrv = $conn->query("SELECT * FROM movies WHERE movieID=".$reserved_row['movieID'])->fetch_array();
                ?>
                    <tr>
                        <td><?php echo $reserved_row['reservationID']?></td>
                        <td>
                            <?php echo $movie_rsrv['title']?><br>
                            <img src="img/<?php echo $movie_rsrv['cover_img']?>" alt=" <?php echo $movie_rsrv['title']?>">
                        </td>

                        <td><p>
                            Duration: <?php echo $movie_rsrv['duration']?> hrs<br>
                            Date Showing: <?php echo $movie_rsrv['date_showing']?><br>
                            End Date: <?php echo $movie_rsrv['end_date']?><br>
                            Price: <?php echo $movie_rsrv['price']?><br>
                        </p> </td>

                        <td><p>
                            Number of Seats: <?php echo $reserved_row['quantity']?><br>
                            Contact Number: <?php echo $reserved_row['contactNum']?><br>
                            Date: <?php echo $reserved_row['date']?><br>
                            Time: <?php echo $reserved_row['time']?><br>
                            Cinema: <?php echo $reserved_row['cinemaID']?><br>
                        </p>  
                        </td>
                        <td>P<?php echo $reserved_row['total_price']?></td>
                    </tr>      
                <?php  } 
                 ?>
            </table>
        </div>
    </div>

    <?php endwhile;?>