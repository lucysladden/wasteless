<?php
$db_host   = '192.168.56.12';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$conn = new PDO($pdo_dsn, $db_user, $db_passwd);

if (isset($_POST['delete'])) {
    $deleteQuery = "DELETE FROM food_entry WHERE entryID='" . $_POST['entryID'] . "';";
    if (isset($conn)) {
        $error = $conn->query($deleteQuery);
    }
    header('Location: admin.php');
    exit;
}

?>