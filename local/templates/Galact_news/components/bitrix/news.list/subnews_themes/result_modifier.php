<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

foreach ($arResult["ITEMS"] as &$arItem) {
    $arItem['EDIT_AREA_ID'] = $this->GetEditAreaId($arItem['ID']);
}
unset($arItem);
