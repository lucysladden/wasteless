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
    $sql = "SELECT * FROM food_entry";

    $db_host   = '192.168.56.12';
    $db_name   = 'wastelessdb';
    $db_user   = 'webuser';
    $db_passwd = '349db_password';

    $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

    // $conn = new PDO($pdo_dsn, $db_user, $db_passwd);
    // if (isset($conn)) {
    //   $result = $conn->query($sql);
    // }
    // echo '<p>entry Submitted</p>';

    //output data of each row
    echo "<table>
          <tr>
          <th>Id</th>
          <th>Name</th>
          <th>address</th>
          <th>Description</th>
          <th>Price</th>
          <th>Time Frame</th>
          </tr>";
    // while($row = $result->fetch()) {
    //       echo "<tr>";
    //       echo "<td>" . $row['leftovers_ID'] . "</td>";
    //       echo "<td>" . $row['restaurant_name'] . "</td>";
    //       echo "<td>" . $row['address'] . "</td>";
    //       echo "<td>" . $row['description'] . "</td>";
    //       echo "<td>" . $row['price'] . "</td>";
    //       echo "<td>" . $row['latest_collection'] . "</td>";
    //       echo "</tr>";
    //   }


    ?>
  </main>
</body>

</html>