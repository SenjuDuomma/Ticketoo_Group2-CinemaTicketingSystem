<?php
    include_once 'header.php';
    require_once 'includes/dbh.inc.php';
    $movie = $conn->query("SELECT * FROM movies where movieID =".$_GET['movie_id'])->fetch_array();
    
?>
<section><?php
    if (isset($_SESSION["useruid"])) {
        echo "<p>Hello there! ". $_SESSION['useruid']."</p>";    
        //$user = $conn->query("SELECT * FROM users WHERE usersUid =".$_SESSION['userid'])->fetch_array();?>
    <div>
        <table class="">
            <tr>
                <th>
                    <h2 name="title"><?php echo $movie['title']?></h2>
                    <h5>Showing: <?php echo $movie['date_showing']?> - <?php echo $movie['end_date']?></h5>
                    <h5>Price: P<?php echo $movie['price']?></h5>
                </th>
                <th><h4>Fill-up Ticket Information</h4></th>
            </tr>
            <tr>
             
                <td><div><img src="img/<?php echo $movie['cover_img']?>" alt=""></div></td>
                <td><div>
                    <form action="assets/reserve.assets.php" method="POST" autocomplete="on">
                        <h3>Name: <?php echo $_SESSION['userFullName'];?></h3>

                        <label for="contactNum">Contact Number:</label>
                        <input type="text" id="contactNum"name="contactNum" value="" placeholder="Contact Number..."><br><br>

                        <label for="quantity">Number of Seats:</label>
                        <input type="text" id="quantity" name="quantity" value="" placeholder="Number of Seats..."><br><br>

                        <label for="date">Date:</label>
                        <input type="date" id="date" name="date" min="<?php echo $movie['date_showing']?>" max="<?php echo $movie['end_date']?>"><br><br>

                        <label for="time">Time:</label>
                        <select id="time" name="time">
                            <option value="09:00:00">09:00:00 AM</option>
                            <option value="01:00:00">01:00:00 PM</option>
                            <option value="03:00:00">03:00:00 PM</option>
                        </select>

                        <label for="cinema">Cinema:</label>
                        <select id="cinema" name="cinema">
                            <option value="1">Cinema 1</option>
                            <option value="2">Cinema 2</option>
                            <option value="3">Cinema 3</option>
                            <option value="4">Cinema 4</option>
                        </select><br><br>
                        <button type="submit" name="Book" value="<?php echo $_GET['movie_id'] ?>">Book</button>
                        <input type="reset"><button type="button" onclick="exitBtn()">Cancel</button>
                    </form>
                </div>
                    </td>
                <td>
                <?php 
                if (isset($_GET["error"]))
                {
                    if ($_GET["error"] == "emptyinput") {
                    echo "<p>Fill in all fields!</p>";
                    }
                elseif ($_GET["error"] == "none") {
                    echo "<p>Ticket has been reserved successfully!</p><br>";
                
                }}?>
                </td>
            </tr>
            
        </table>
    </div>
    
    <?php 
    
        

    } else{?>

        <h2>You are not logged in. Log-in first to book a ticket.</h2><button onclick="login()">Log-in</button><br>
        <h3>Don't have an account? Sign-up now!</h3><button onclick="signup()">Sign-up</button>
        

    <?php }?>
</section>



<script>
function signup() {
  location.replace("signup.php")
}
function login() {
  location.replace("login.php")
}
function exitBtn() {
  location.replace("index.php")
}
</script>
<?php
    include_once 'footer.php';
?>
