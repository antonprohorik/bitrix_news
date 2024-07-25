<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die(); ?>

<?php if ($arResult["ITEMS"]): ?>
    <?php foreach($arResult["ITEMS"] as $arItem): ?>
        <?php
        $banTitle = $arItem["NAME"];
        $banAnnounce = $arItem["PREVIEW_TEXT"];
        $banImageUrl = '';
        
        if ($arItem["DETAIL_PICTURE"]) {
            $banImageUrl = CFile::GetPath($arItem["DETAIL_PICTURE"]["ID"]);
        }
        ?>
        <?php if (!empty($banImageUrl)): ?>
            <div class="ban">
                <h1 class="ban_title"><a href="<?= $arItem['DETAIL_PAGE_URL']; ?>"><?=htmlspecialcharsbx($banTitle)?></a></h1>
                <div class="ban_subtitle"><?=htmlspecialcharsbx($banAnnounce)?></div>
                <style> .ban { background-image: url(<?=htmlspecialcharsbx($banImageUrl)?>);} </style>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>