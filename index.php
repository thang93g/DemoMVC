<?php
require __DIR__ ."/vendor/autoload.php";

$sc = new \App1\c\StudentController();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$page = isset($_REQUEST['page'])?$_REQUEST['page']:NULL;
switch ($page){
    case "add":
        $sc->add();
        break;
    case "edit":
        $sc->edit();
        break;
    case "delete":
        $sc->delete();
        break;
    default:
        $sc->view();
}
?>
</body>
</html>