<?php
    include_once 'header.php';
?>
    <section class="signup-form">
        <h2>Login</h2>
        <div class="signupform-form">
            <form action="includes/login.inc.php" method="POST" autocomplete="on">
                <input type="text" name="uid" placeholder="Username/Email..."><br><br>
                
                <input type="password" name="pwd" placeholder="Password..."><br><br>

                <button type="submit" name="submit">Login</button><br><br>
            </form>
        </div>
        <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields!</p>";
        }
        elseif ($_GET["error"] == "wronglogin") {
            echo "<p>Incorrect inputs!</p>";
        }
    }
    ?>   
    </section>

<?php
    include_once 'footer.php';
?>
