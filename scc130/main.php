    <?php
    echo "Book Details: ";

    // book id
    if (strlen($_POST["id"]) > 0)
        {
            echo "Book ID: ";
            echo $_POST["id"];
        }
        else
        {
            echo '<p> Book ID: Field Empty! </p>';
        }
    echo "<br>";
    // book title
    if (strlen($_POST["title"]) > 0)
        {
            echo "Book Title: ";
            echo $_POST["title"];
        }
        else
        {
            echo '<p> Book Title: Field Empty! </p>';
        }
    echo "<br>";
    // author
    if (strlen($_POST["author"]) > 0)
        {
            echo "Author: ";
            echo $_POST["author"];
        }
        else
        {
            echo '<p> Book Author: Field Empty! </p>';
        }
    echo "<br>";
    // genre
    if (strlen($_POST["genre"]) > 0)
        {
            echo "Genre: ";
            echo $_POST["genre"];
        }
        else
        {
            echo '<p> Genre: Field Empty! </p>';
        }
    echo "<br>";
    // year
    if (strlen($_POST["year"]) > 0)
        {
            echo "Year: ";
            echo $_POST["year"];
        }
        else
        {
            echo '<p> Year: Field Empty! </p>';
        }
    echo "<br>";
?>
