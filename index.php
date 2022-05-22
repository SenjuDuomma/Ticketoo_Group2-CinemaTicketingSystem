<?php
    include_once 'header.php';
    require_once 'includes/dbh.inc.php';
    $movies = $conn->query("SELECT * FROM movies");
?>
<section><?php
    if (isset($_SESSION["useruid"])) {
        echo "<p>Hello there! ". $_SESSION["useruid"]."</p>";

    }
    else {
        ?>
    <div>
        <div>
            Create an account to book ticket!
            <button onclick="signup()">Sign-up</button>
        </div>
        <div>
            Log-in and watch movies all you want!
            <button onclick="login()">Log-in</button>
        </div>
    </div>

    <?php
    }
    ?></section>
<center><h1>Ticketoo Cinema Reservation</h1></center>

<?php while($row=$movies->fetch_assoc()): ?>
    <div><form action="reserve.php" method="get">
      <h2><?php echo $row['title']?></h2>
      <img src="img/<?php echo $row['cover_img']?>" alt="">
      <p>
      Duration: <?php echo $row['duration']?><br>
      Date Showing: <?php echo $row['date_showing']?><br>
      End Date: <?php echo $row['end_date']?><br>
      Ticket Price: <?php echo $row['price']?><br>
      </p>
      
      <button type="submit" name="movie_id" value="<?php echo $row['movieID']?>">Reserve</button></form>
      
    </div>
       
  <?php endwhile; ?>
  <script>
function signup() {
  location.replace("signup.php")
}
function login() {
  location.replace("login.php")
}
</script>
<?php
    include_once 'footer.php';
?>
