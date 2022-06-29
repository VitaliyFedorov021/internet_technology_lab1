<?php
    include('connect.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>LB1</title>
    <meta charset="utf-8"/>
    <link href="style.css" rel="stylesheet">
</head>

<body>
<form action="client_name.php" method="post">
    Получить статистику работы в сети выбранного клиента: 
    <select name="name">
        <?php
        try
        {
            $sql = 'SELECT DISTINCT name FROM client';
            foreach ($dbh->query($sql) as $row)
            {
              $name = $row[0];
              print "<option value='$name'>$name</option>";
            }
        }
        catch (PDOException $ex)
        {
            print "Error!: " . $e->getMessage() . "<br/>";
            exit();
        }
        // $db->client();
        ?>
    </select>
    <input type="submit" value="OK"><br>
</form>
<br>
<br>
<form action="from_start_date_to_stop_date.php" method="post">
    <label>Получить статистику работы в сети c 
    <input type="datetime-local" name="start_date">
    по
    <input type="datetime-local" name="stop_date">
    </label>
    <input type="submit" value="OK"><br>
</form>
<br>
<br>
<form action="client_balance.php" method="post">
Получить список клиентов с отрицательным балансом счета:
    <input type="submit" value="OK" name="balance"><br>
</form>
</body>
</html>
