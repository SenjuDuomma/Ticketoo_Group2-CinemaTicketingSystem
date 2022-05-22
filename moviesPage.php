<?php
    include_once 'header.php';
    require_once 'includes/dbh.inc.php';
    //$movies = $conn->query("SELECT * FROM movies where '".date('Y-m-d')."' BETWEEN date(date_showing) and date(end_date) order by rand()");
    $movies = $conn->query("SELECT * FROM movies");
?>
  



	<?php while($row=$movies->fetch_assoc()): ?>
    <div><form action="reserve.php" method="get">
      <h2><?php echo $row['title']?></h2>
      <img src="img/<?php echo $row['cover_img']?>" alt="">
      <p>
      Duration: <?php echo $row['duration']?> hrs<br>
      Date Showing: <?php echo $row['date_showing']?><br>
      End Date: <?php echo $row['end_date']?><br>
      Ticket Price: <?php echo $row['price']?><br>
      </p>
      
      <button type="submit" name="movie_id" value="<?php echo $row['movieID']?>">Reserve</button></form>
      
    </div>
       
  <?php endwhile; ?>

  
  
<?php
    include_once 'footer.php';
?>
