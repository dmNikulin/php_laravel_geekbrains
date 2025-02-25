<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php
$db_server = '127.127.126.25:3306';
$db_user = 'root';
$db_password = '';
$db_name =  'logs_laravel';

try {
    $db = new PDO("mysql:host=$db_server;dbname=$db_name", $db_user, $db_password, array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'));
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'select * from logs';

    $statement = $db->prepare($sql);

    $statement->execute();

    $result_array = $statement->fetchAll();

    echo "<table><tr><th>id</th><th>time</th><th>duration</th><th>ip</th><th>url</th><th>method</th><th>input</th></tr>";
    foreach ($result_array as $result_row) {
        echo "<tr>";
        echo "<td>" . $result_row["id"] . "</td>";
        echo "<td>" . $result_row["time"] . "</td>";
        echo "<td>" . $result_row["duration"] . "</td>";
        echo "<td>" . $result_row["ip"] . "</td>";
        echo "<td>" . $result_row["url"] . "</td>";
        echo "<td>" . $result_row["method"] . "</td>";
        echo "<td>" . $result_row["input"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
catch(PDOException $e) {
    echo $e->getMessage();
}
$db = null;
?>
</body>

</html>