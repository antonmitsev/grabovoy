<?php
    $number = preg_replace("/[^\d]+/i", '', $_SERVER['REQUEST_URI'])
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $number ? : 'Числа на Грабовой'; ?></title>
</head>
<body>
    <h1>Числа на Грабовой</h1>
</body>
</html>