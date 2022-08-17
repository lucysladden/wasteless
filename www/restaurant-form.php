<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <h1>Food Donation Form</h1>
    <form action="images/Pont_du_Gard_BLS.jpeg">
      <table>
        <tr>
          <td>Restaurant Name:</td>
          <td>
            <input type="text" name="name" />
          </td>
        </tr>
        <tr>
          <td>Address:</td>
          <td>
            <input type="text" name="address" />
          </td>
        </tr>
        <tr>
          <td>Food description:</td>
          <td>
            <input type="text" name="description" />
          </td>
        </tr>
        <tr>
          <td>Price:</td>
          <td>
            <input type="text" name="price" />
          </td>
        </tr>
        <tr>
          <td>Latest time to pick up:</td>
          <td>
            <input type="datetime-local" name="timeframe" />
          </td>
        </tr>
        <tr>
          <td>
            <input type="submit" value="Submit" />
          </td>
        </tr>
      </table>
    </form>
    <a href="/index.php">Home</a>
  </body>
</html>