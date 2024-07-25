<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="news-list">
<?foreach($arResult["ITEMS"] as $arItem):?>
 <div class="news-item" id="<?=$arItem['EDIT_AREA_ID'];?>">
  <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
   <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><b><?=$arItem["NAME"]?></b></a>
  <?endif;?>
 </div>
<?endforeach;?>
</div>
<?php if ($arResult["NAV_STRING"]): ?>
    <?= $arResult["NAV_STRING"] ?>
<?php endif; ?>