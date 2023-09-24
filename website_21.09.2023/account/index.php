<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/core.php';

redirectExited();

$data = getDataUser();

$user = arrayUnity(findData($_SESSION['id']), $data);

$groups = findGroups($_SESSION['id']);

includeTemplate('/header.php', ['title' => 'Личный кабинет']);
?>
<div class="space-y-2">
    <?php includeTemplate('account/profile.php', [ 'user' => $user])?>
</div>
<div class="space-y-2">
    <?php includeTemplate('account/groups.php', [ 'groups' => $groups])?>
</div>
<?php includeTemplate('/footer.php')?>
