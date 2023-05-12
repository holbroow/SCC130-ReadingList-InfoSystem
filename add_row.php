<?php
// if (isset($_POST['submit']))
// {
//     header("Location: index.php");
// }
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
        <center><h1>Will's Reading List</h1></center/>
        <form action="index.php" method="post">
            <button type="submit" name="homepage">Homepage</button>
        </form>
    </fieldset>
    <br><br>
</body>
</html>

<?php

include_once("connect.php");
include_once("create_table.php");

// Retrieve all books from database
$query = "SELECT * FROM books2";

$result = $connection->query($query);

if (!$result)
{
    die("Database access failed: " . $connection->error);
}

// Print a table of all books
$rows = $result->num_rows;

print<<< _HTML
    <fieldset>
        <table class="center">
            <tr>
                <th>Book id</th>
                <th>Title</th>
                <th>Author</th>
                <th>Rating</th>
                <th>Date Added</th>
            </tr>
_HTML;

if ($result->num_rows > 0)
{
    while ($row = $result->fetch_assoc())
    {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["title"] . "</td>";
        echo "<td>" . $row["author"] . "</td>";
        echo "<td>" . $row["rating"] . "</td>";
        echo "<td>" . $row["date_added"] . "</td>";
        echo "</tr>";
    }
}
else
{
    echo "DEBUG: There are no books present in your list. 0 results.";
}

echo <<< _HTML
        </table>
    </fieldset>
_HTML;

// Print a form to add a book
echo <<< _HTML
    <br><br><br>
    <form action="" method="post">
        <fieldset>
            <legend>Add a book</legend>
            <p><b>Please enter the book information below:</b> <br><br>
            Book ID <input type="text" name="id" maxlength="3"/> <br><br>
            Book Title <input type="text" name="title" maxlength="30" /> <br><br>
            Author <input type="text" name="author" maxlength="20" /> <br><br>
            Rating <input type="text" name="rating" maxlength="1" /> <br><br>
            </p>
        </fieldset>
        <div>
            <br>
            <input type="submit" name="submit" value="Add Book" />
        </div>
    </form>
_HTML;

// Handle adding book
function assign_data($connection, $var)
    {
        return $connection->real_escape_string($_POST[$var]);
    }


if (isset($_POST["id"]) && 
    isset($_POST["title"]) &&
    isset($_POST["author"]) && 
    isset($_POST["rating"]))
    {
        $id = assign_data($connection, 'id');
        $title = assign_data($connection, 'title');
        $author = assign_data($connection, 'author');
        $rating = assign_data($connection, 'rating');
        
        $query = " 	INSERT INTO books2(id, title, author, rating, date_added)
                    VALUES ('$id', '$title', '$author', '$rating', Date(NOW()))";

        try
        {
            $result = $connection->query($query);
        }
        catch(Exception $e)
        {
            echo '<br>';
            echo 'Input not valid, Please try again.';
            echo '<script>setTimeout(function() { window.location.href = "index.php"; }, 3000);</script>';
        }

        $connection->close();

    }
?>
