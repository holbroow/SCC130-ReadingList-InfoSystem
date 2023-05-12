<?php
    echo "Thank you,";
    echo $_POST["name"];
    echo ". ";
    if (strlen($_POST["interests"]) > 0)
        {
            echo "You entered your interests as: ";
            echo $_POST["interests"];
        }
        else
        {
            echo '<p> You didnt select any interests! </p>';
        }
?>