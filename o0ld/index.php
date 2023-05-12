<?php // index.php (main page)
include_once("connect.php");
include_once("create_table.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
</head>
<body>
    <br><br><br>
    <form action="add_row.php" method="post">
        <fieldset><legend>Please enter the information below: </legend>
            <p><b>Book Details:</b> <br><br>
            Book ID <input type="text" name="id" maxlength="3" /> <br>
            Book Title <input type="text" name="title" maxlength="30" /> <br>
            Author <input type="text" name="author" maxlength="20" /> <br>
        <!--Genre <input type="text" name="genre" maxlength="10" /> <br>
            Year <input type="text" name="year" maxlength="4" /> <br>    -->
            </p>
        </fieldset>

        <div>
            <br>
            <input type="submit" name="submit" value="Submit Information" />
        </div>
    </form>
    <br><br>
    <form action="display_data.php" method="post">
        <fieldset><legend>Display results: </legend>
            <div>
                <br>
                <input type="submit" name="display" value="Display Results" />
            </div>
    </form>
</body>
</html>
