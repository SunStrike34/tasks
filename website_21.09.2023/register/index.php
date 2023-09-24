<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/core.php';
redirectАuthorized();
$showSuccess = false;
$showError = false;
$error = false;
$request = [];

if (!empty($_POST)) {
    $request = [
        'name' => htmlspecialchars($_POST['name']) ?? null,
        'email' => htmlspecialchars($_POST['email']) ?? null,
        'phone' => htmlspecialchars($_POST['phone']) ?? null,
        'password' => htmlspecialchars($_POST['password']) ?? null,
        'password_confirmation' => htmlspecialchars($_POST['password_confirmation']) ?? null,
        'mailing' => htmlspecialchars($_POST['mailing']) ?? null,
    ];

    if ((!$error = validateUserRequest($request)) && (!$error = checkUser($request['email'], $request['phone']))) {
        if (addUser($request)) {
            $showSuccess = true;
        } else {
            $error = 'Ошибка при регистрации';
            $showError = true;
            $request = [];
        }
    } else {
        $showError = true;
        $request = [];
    }
}

includeTemplate('/header.php', ['title' => 'Страница регистрации']);

if ($showError) {
    includeTemplate('messages/error_message.php', ['message' => $error]);
}

if ($showSuccess) {
    includeTemplate('messages/success_message.php', ['message' => "Вы успешно зарегистрированы"]);
}
?>
<form method = "post">
    <div class="mt-8 max-w-md">
        <div class="grid grid-cols-1 gap-6">
            <div class="block">
                <label for="fieldName" class="text-gray-700 font-bold">ФИО</label>
                <input id="fieldName" name="name" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Иванов Иван Иваныч">
            </div>
            <div class="block">
                <label for="fieldEmail" class="text-gray-700 font-bold">Email</label>
                <input id="fieldEmail" name="email" type="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="john@example.com">
            </div>
            <div class="block">
                <label for="fieldPhone" class="text-gray-700 font-bold">Телефон</label>
                <input id="fieldPhone" name="phone" type="phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="88888888888">
            </div>
            <div class="block">
                <label for="fieldPassword" class="text-gray-700 font-bold">Пароль</label>
                <input id="fieldPassword" name="password" type="password" minlength="6" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="******">
            </div>
            <div class="block">
                <label for="fieldPasswordConfirmation" class="text-gray-700 font-bold">Подтверждение пароля</label>
                <input id="fieldPasswordConfirmation" name="password_confirmation" type="password" minlength="6" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="******">
            </div>
            <div class="block">
                <label for="fieldmailing" class="text-gray-700 font-bold">Согласие на получение email-рассылки</label>
                <input id="fieldmailing" name="mailing" type="checkbox" class="mt-1 block rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="block">
                <button type="submit" class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                    Регистрация
                </button>
                <a href="/login/" class="inline-block hover:underline focus:outline-none font-bold py-2 px-4 rounded">
                    У меня уже есть аккаунт
                </a>
            </div>
        </div>
    </div>
</form>
<?php  includeTemplate('/footer.php') ?>