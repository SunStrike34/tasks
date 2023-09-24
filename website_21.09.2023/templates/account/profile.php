<div class="space-y-2 pb-4 border-b">
    <p class="text-xl">Мой профиль</p>
    <?php foreach ($user as $title => $userValue) {?>
    <div class="flex max-w-xl">
        <div class="flex-1 border px-4 py-2 bg-gray-200 font-bold"><?=htmlspecialchars($title)?></div>
        <div class="flex-1 border px-4 py-2"><?=htmlspecialchars($userValue)?></div>
    </div>
    <?php }?>
</div>
