<?php
if (isset($_POST['submit']))
    {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reading List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <fieldset>
        <center><h1>Will's Reading List</h1></center>
        <form action="index.php" method="post">
            <button type="submit" name="homepage">Homepage</button>
        </form>
    </fieldset>
    <br><br>

<?php

        include_once ("connect.php");
        include_once ("create_table.php");   

        $query  = "SELECT * FROM books2";

        $result = $connection->query($query);
        if (!$result)
        {
            die ("Database access failed: " . $connection->error);
        }
    
        $rows = $result->num_rows;

        
    print<<<_HTML

        <fieldset>
            <table class="center">
                <tr>
                    <th>Book id</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Rating</th>
                    <th>Date Added</th>
                </tr>
        </fieldset>

    _HTML;

        
        if ($result -> num_rows > 0)
        {
            while($row = $result -> fetch_assoc())
            {
                echo "<tr>";
                echo "<td>".$row["id"]."</td>";
                echo "<td>".$row["title"]."</td>";
                echo "<td>".$row["author"]."</td>";
                echo "<td>".$row["rating"]."</td>";
                echo "<td>".$row["date_added"]."</td>";
                echo "<tr>";
            }
        }
        else
        {
            echo "DEGBUG: There are no books present in your list. 0 results.";
        }

    print<<<_HTML
    </table>
    </fieldset>
    _HTML;

?>

<?php // add_row.php
require_once("connect.php");

function assign_data($connection, $var)
{
    return $connection->real_escape_string($_POST[$var]);
}

if (isset($_POST["id"]))
{
    $id = assign_data($connection, 'id');


    $query = "  DELETE FROM books2
                WHERE id = '$id'  ";

    $result = $connection->query($query);

    if (!$result) 
    {
        echo '<br>';
        echo 'DEBUG: The MySQL Query (deleting a row) has failed.';
    }
    else
    {
        echo 'DEBUG: Row removed successfully.';
    }

    $connection -> close();
}

?>
    <br><br>
    <form action="" method="post">
        <fieldset><legend>Delete a book</legend>
            <p><b>Please enter the information below:</b> <br><br>
            Book ID <input type="text" name="id" maxlength="3" /> <br>
            </p>
        </fieldset>

        <div>
            <br>
            <input type="submit" name="submit" value="Delete Book" />
        </div>
    </form>

</body>
</html>
