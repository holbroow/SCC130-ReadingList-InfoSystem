<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Displaying results</title>
</head>

<body>
    <?php
        include_once ("connect.php");

        $query  = "SELECT * FROM books";

        $result = $connection->query($query);
        if (!$result)
        {
            die ("Database access failed: " . $connection->error);
        }
    
        $rows = $result->num_rows;

        
    print<<<_HTML

        <b>Here is your list of Books</b>

        <br><br>
        <table>
            <tr>
                <th>Book id</th>
                <th>Title</th>
                <th>Author</th>
            </tr>

    _HTML;

        
        if ($result -> num_rows > 0)
        {
            while($row = $result -> fetch_assoc())
            {
                echo "<tr>";
                echo "<td>".$row["id"]."<td>";
                echo "<td>".$row["title"]."<td>";
                echo "<td>".$row["author"]."<td>";
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

    $result -> close();
    $connection -> close();
    ?>

</body>
</html>