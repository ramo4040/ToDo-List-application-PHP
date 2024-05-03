<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dev101</title>
    <link rel="stylesheet" href="http://localhost/todo/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/todo/public/css/reset.css">
    <link rel="stylesheet" href="http://localhost/todo/public/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>

    <?php
    
    require_once 'app/Helper/Autoloader.php';
    require_once 'app/Config/Container.php';

    app\routes\Router::route($_SERVER['REQUEST_METHOD']);


    ?>

</body>

</html>