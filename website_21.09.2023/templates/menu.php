<ul class="list-inside bullet-list-item flex flex-wrap justify-between -mx-5 -my-2">
<?php
foreach ($menu as $item) {?>
<li class="px-5 py-2"><a class="<?= isCurrentUrl($item['path']) ? 'text-red-600 cursor-default' : 'text-gray-600 hover:text-orange' ?>" href="<?=htmlspecialchars($item['path'])?>"><?= cutString(htmlspecialchars($item['title']))?></a></li>
<?php }?>
</ul>