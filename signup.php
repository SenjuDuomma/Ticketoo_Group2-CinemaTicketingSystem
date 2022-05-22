<?php
    include_once 'header.php';
?>
    <section class="signup-form">
        <h2>Sign Up</h2>
        <div class="signupform-form">
            <form action="includes/signup.inc.php" method="POST">
                <input type="text" name="name" placeholder="Fullname..."><br><br>
                <input type="text" name="email" placeholder="Email..."><br><br>
                <input type="text" name="uid" placeholder="Username..."><br><br>
                <input type="password" name="pwd" placeholder="Password..."><br><br>
                <input type="password" name="pwdrepeat" placeholder="Repeat Password..."><br><br>
                <button type="submit" name="submit">Sign-up</button><br><br>
            </form>
        </div>
        <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields!</p>";
        }
        elseif ($_GET["error"] == "invaliduid") {
            echo "<p>Choose a proper username!</p>";
        }
        elseif ($_GET["error"] == "invalidemail") {
            echo "<p>Choose a proper email!</p>";
        }
        elseif ($_GET["error"] == "unmatchedpassword") {
            echo "<p>Passwords doesn't match!</p>";
        }
        elseif ($_GET["error"] == "stmtfailed") {
            echo "<p>Something went wrong, try again!</p>";
        }
        elseif ($_GET["error"] == "usernametaken") {
            echo "<p>Username already taken, try again!</p>";
        }
        elseif ($_GET["error"] == "none") {
            echo "<p>You have signed up!</p>";
        }
        # code...
    }
    ?>   
    </section>
   

<?php
    include_once 'footer.php';
?>
