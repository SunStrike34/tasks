<?php
include_once "connectBD.php";

if ((!empty($_POST))&&(!isset($_POST['author'], $_POST['comment']))) {
    $author = $_POST['author'];
    $comment = $_POST['comment'];
}else {
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\'); 
    $path  = 'index.php';
    header("Location: http://$host$uri/$path ");
}

try{
    $sql = "INSERT INTO data_comments (author, comment) VALUES (:author, :comment)";
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $data = $connect ->prepare($sql);
    $data -> execute(array('author'=>$author, 'comment'=>$comment));
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\'); 
    $path  = 'index.php';
    header("Location: http://$host$uri/$path ");
    } catch (PDOException $error) {
    echo "Ошибка выполнения запроса: <br>" .$sql. $error -> getMessage();
    }
?>
