<?php
if (!defined('B_PROLOG_INCLUDED') || (B_PROLOG_INCLUDED !== true)) {
    die();
}

if (!$arResult["NavShowAlways"]) {
    if (
       (0 == $arResult["NavRecordCount"])
       ||
       ((1 == $arResult["NavPageCount"]) && (false == $arResult["NavShowAll"]))
    ) {
        return;
    }
}

$navQueryString      = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$navQueryStringFull  = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");

?>
<div class="page_buttons">
    <?php if ($arResult["NavPageNomer"] > 1 && $arResult["NavPageNomer"] == 1): ?>
        <?php if ($arResult["bSavePage"]): ?>
            <a href="<?=$arResult["sUrlPath"]?>?<?=$navQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">
                <button class="btn page_btn"><?=GetMessage("nav_prev")?></button>
            </a>
        <?php else: ?>
            <?php if ($arResult["NavPageNomer"] > 2): ?>
                <a href="<?=$arResult["sUrlPath"]?>?<?=$navQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">
                    <button class="btn page_btn"><?=GetMessage("nav_prev")?></button>
                </a>
            <?php else: ?>
                <a href="<?=$arResult["sUrlPath"]?><?=$navQueryStringFull?>">
                    <button class="btn page_btn"><?=GetMessage("nav_prev")?></button>
                </a>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>

        <?php while ($arResult["nStartPage"] <= $arResult["nEndPage"]) { ?>
            <?php if ($arResult["nStartPage"] == $arResult["NavPageNomer"]) { ?>
                <div class="active"><button class="btn page_btn"><?php echo $arResult["nStartPage"] ?></button></div>
            <?php } elseif ((1 == $arResult["nStartPage"]) && (false == $arResult["bSavePage"])) { ?>
                <a href="<?php echo $arResult["sUrlPath"] ?><?php echo $navQueryStringFull ?>"><button class="btn page_btn"><?php echo $arResult["nStartPage"] ?></button></a>
            <?php } else { ?>
                <a href="<?php echo $arResult["sUrlPath"] ?>?<?php echo $navQueryString ?>PAGEN_<?php echo $arResult["NavNum"] ?>=<?php echo $arResult["nStartPage"] ?>"><button class="btn page_btn"><?php echo $arResult["nStartPage"] ?></button></a>
            <?php } ?>
            <?php $arResult["nStartPage"]++ ?>
        <?php } ?>


    <?php if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]): ?>
        <a href="<?=$arResult["sUrlPath"]?>?<?=$navQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">
            <button class="btn next_btn"><div></div></button>
        </a>
    <?php endif; ?>
</div>