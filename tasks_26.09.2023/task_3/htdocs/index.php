<?php
require_once 'src/core.php';
$showError = false;
$error = false;
$comments = getComments();

if (!empty($_POST)) {
  $request = [
      'author' => htmlspecialchars($_POST['author']) ?? null,
      'comment' => htmlspecialchars($_POST['comment']) ?? null,
  ];

  if ($error = validateUserRequest($request)) {
      if (addComment($request)) {
          $request = [];
          header("Location: index.php");
      } else {
          $showError = true;
          $errorMessage = 'Ошибка при добавлении комментария';
          $request = [];
      }
  } else {
      $request = [];
      header("Location: index.php");
      $errorMessage = 'Какое-то поле не заполнено';
  }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css"> 
    <title>Комментарии</title>
</head>
<body>
    <?php if ($showError) {?>
        <div>
            <p><?= htmlspecialchars((string)$errorMessage)?></p>
        </div>
    <?php }?>
    <form method="post" name="form">
        <p class="is-h">Автор:<br> <input name="author" type="text" class="is-input" id="author"></p>
        <p class="is-h">Текст сообщения:<br><textarea name="comment" rows="5" cols="50" id="comment"></textarea></p>
        <button type="submit" id='click' name="button" class="is-button">Отправить</button>
    </form>
    <div>
    <?php if (is_null($comments)) {?>
        <div class="clear">
            <p>Комментариев пока нет.<p>
        </div>
    <?php } else {?>
        <div class="clear">
            <p>Комментарии к статье:</p>
        </div>
        <?php foreach ($comments as $comment) {?>
            <div class='comment'>
                Автор: <?=htmlspecialchars($comment['author'])?><br>
                <?=htmlspecialchars($comment['comment'])?>
            </div>
        <?php }
    }?>
    </div>
</body>
</html>