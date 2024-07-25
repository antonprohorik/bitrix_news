<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Iblock\ElementTable;

if (is_array($arResult['PROPERTIES']['THEMES']['VALUE'])) {
    $themeIds = $arResult['PROPERTIES']['THEMES']['VALUE'];

    $res = ElementTable::getList([
        'select' => ['ID', 'NAME'],
        'filter' => ['ID' => $themeIds]
    ]);

    $themeNames = [];
    while ($theme = $res->fetch()) {
        $themeNames[$theme['ID']] = $theme['NAME'];
    }

    $arResult['PROPERTIES']['THEMES']['DISPLAY_VALUE'] = $themeNames;
}
?>