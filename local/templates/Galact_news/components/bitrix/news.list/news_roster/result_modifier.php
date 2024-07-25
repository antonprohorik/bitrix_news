<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Iblock\ElementTable;

$arFilter = $arParams['arrFilter'] ?? [];

foreach ($arResult["ITEMS"] as &$item) {
    if (is_array($item['PROPERTIES']['THEMES']['VALUE'])) {
        $themeIds = $item['PROPERTIES']['THEMES']['VALUE'];

        $res = ElementTable::getList([
            'select' => ['ID', 'NAME'],
            'filter' => ['ID' => $themeIds]
        ]);

        $themeNames = [];
        while ($theme = $res->fetch()) {
            $themeNames[$theme['ID']] = $theme['NAME'];
        }

        $item['PROPERTIES']['THEMES']['DISPLAY_VALUE'] = [];
        foreach ($themeIds as $themeId) {
            if (isset($themeNames[$themeId])) {
                $item['PROPERTIES']['THEMES']['DISPLAY_VALUE'][$themeId] = $themeNames[$themeId];
            }
        }
    }

    $item['EDIT_AREA_ID'] = $this->GetEditAreaId($item['ID']);
    $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

    
    if (!empty($item['PROPERTIES']['DATE_OF_FUTURE']['VALUE'])) {
        $date = date('d.m.Y', strtotime($item['PROPERTIES']['DATE_OF_FUTURE']['VALUE']));
        $item['DETAIL_PAGE_URL'] = '/news/' . $date . '/' . $item['CODE'] . '/';
    }
}