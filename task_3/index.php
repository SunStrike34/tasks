<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css"> 
    <title>Document</title>
</head>
<body>
  <form action="setData.php" method="post" name="form">
    <p class="is-h">Автор:<br> <input name="author" type="text" class="is-input" id="author"></p>
    <p class="is-h">Текст сообщения:<br><textarea name="comment" rows="5" cols="50" id="comment"></textarea></p>
    <button type="submit" id='click' name="button" class="is-button">Отправить</button>
  </form>
  <div class="clear">
  </div>
  <p>Комментарии к статье:</p>
  <div id="comments">
  <?php
    include_once "getData.php";
    ?>
  </div>
</body>
</html>