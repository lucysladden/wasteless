<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
<h2> Admin </h2>
<main>
    <h3>Food Entrys: </h3>
    <?php
    $db_host   = '192.168.56.12';
    $db_name   = 'wastelessdb';
    $db_user   = 'webuser';
    $db_passwd = '349db_password';
    
    $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
    
    $conn = new PDO($pdo_dsn, $db_user, $db_passwd);

    $sql = "SELECT * FROM leftovers";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        echo "<table>
 
            <tr>
            <th>Id</th>
            <th>Name</th>
            <th>address</th>
            <th>Description</th>
            <th>Price</th>
            <th>Time Frame</th>
            </tr>";
        while ($row = mysqli_fetch_assoc($result)) {

            echo "<form action = deleteEntry.php method=post>";
            echo '<input type ="hidden" name="leftovers_ID" value=' . $row['leftovers_ID'] . '>';
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['timeframe'] . "</td>";
            echo "<td>" . " <input type = 'submit' id = 'leftovers_ID' name = delete  value = " . 'delete' . " > </td>";
            echo "</form>";
        }
    } else {
        echo "0 results";
    }

    ?>
</main>
</body>
</html>

