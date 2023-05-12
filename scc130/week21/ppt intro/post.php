<!DOCTYPE html>
<html>
    <body>
        <?php
            if (strlen($_POST["myname"]) > 0)
            {
                echo '<p> Welcome back! </p>';
                echo $_POST["myname"];
            }
            else
            {
                echo '<p> Your name has not been entered! </p>';
            }
        ?>
    </body>
</html>