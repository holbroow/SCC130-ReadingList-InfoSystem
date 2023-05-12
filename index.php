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
        <center><h1>Will's Reading List</h1></center/>
            <form class="center" action="add_row.php" method="post">
                <button type="submit" name="add_row">Add Book</button>
            </form>
            <br>
            <form action="edit_row.php" method="post">
                <button type="submit" name="edit_row">Edit Book</button>
            </form>
            <br>
            <form action="delete_row.php" method="post">
                <button type="submit" name=delete_row>Delete Book</button>
            </form>
    </fieldset>

    <br><br><br>

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
    _HTML;

    $connection -> close();


    ?>

</body>
</html>