<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <p>Display list of available food items</p>
    <a href="/index.php">Home</a>

<h2> Admin </h2>
<main>
    <h3>Food Entrys: </h3>
    <?php
    $db_host   = '192.168.56.12';
    $db_name   = 'fvision';
    $db_user   = 'webuser';
    $db_passwd = 'insecure_db_pw';
    
    $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
    
    $conn = new PDO($pdo_dsn, $db_user, $db_passwd);


    $sql = "SELECT * FROM food_entry";

    $result = $conn->query($sql);

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
        while($row = $q->fetch()) {

          echo "<form action = deleteEntry.php method=post>";
          echo '<input type ="hidden" name="entryID" value=' . $row['entryID'] . '>';
          echo "<tr>";
          echo "<td>" . $row['entryID'] . "</td>";
          echo "<td>" . $row['name'] . "</td>";
          echo "<td>" . $row['address'] . "</td>";
          echo "<td>" . $row['description'] . "</td>";
          echo "<td>" . $row['price'] . "</td>";
          echo "<td>" . $row['timeframe'] . "</td>";
          echo "<td>" . " <input type = 'submit' id = 'entries' name = delete  value = " . 'delete' . " > </td>";
          echo "</form>";
      }
  

    ?>
</main>
  </body>
</html>