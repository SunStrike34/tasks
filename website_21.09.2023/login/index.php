<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/core.php';
redirectАuthorized();
$isAuthorized = isAuthorized();
$showSuccess = false;
$showError = false;
$showBlock = false;
$email = '';
$password = '';

if ($isAuthorized) {
    $showSuccess = true;
}

if (!empty($_POST) && ! $isAuthorized) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = findUser($email);

    if ($user['active'] == true) {
        if ($user && password_verify($password, $user['password'])) {
            authorize($user);
            createCookies(['email' => $user['email']]);
            $userName = $user['fullname'];
            $isAuthorized = true;
            $showSuccess = true;
        }

        if (!$isAuthorized) {
            $showError = true;
        }
    } else {
        $showBlock = true;
    }
}

includeTemplate('/header.php', ['title' => 'Форма авторизации']);

if ($showError) {
    includeTemplate('messages/error_message.php', ['message' => "Неверный email или пароль"]);
}

if ($showSuccess) {
    includeTemplate('messages/success_message.php', ['message' => "Вы успешно авторизовались"]);
}

if ($showBlock) {
    includeTemplate('messages/error_message.php', ['message' => "Доступ запрещен"]);
}

if (!$isAuthorized) {?>
<form method = "post">
    <div class="mt-8 max-w-md">
        <div class="grid grid-cols-1 gap-6"> 
            <div class="block">
                <label for="fieldEmail" class="text-gray-700 font-bold">Email</label>
                <input id="fieldEmail" value ="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : (isset($_COOKIE['email']) ? htmlspecialchars($_COOKIE['email']) : '') ?>" name="email" type="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="john@example.com">
            </div>
            <div class="block">
                <label for="fieldPassword" class="text-gray-700 font-bold">Пароль</label>
                <input id="fieldPassword" name="password" type="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="******">
            </div>
            <div class="block">
                <button type="submit" class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                    Войти
                </button>
                <a href="/register/" class="inline-block hover:underline focus:outline-none font-bold py-2 px-4 rounded">
                    У меня нет аккаунта
                </a>
            </div>
        </div>
    </div>
</form>
<?php }?>
<?php  includeTemplate('/footer.php') ?>