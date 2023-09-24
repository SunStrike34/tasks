<p class="text-xl">Мои группы</p>
<ul class="list-inside list-disc">
    <?php if (!is_null($groups)) {
        foreach ($groups as $group) {?>
        <li><span class="font-bold"><?=htmlspecialchars($group['name'])?></span> - <?=htmlspecialchars($group['description'])?></li>
        <?php }
    }?>
</ul>