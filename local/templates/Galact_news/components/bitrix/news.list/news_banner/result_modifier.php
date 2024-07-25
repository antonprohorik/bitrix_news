<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

foreach ($arResult["ITEMS"] as &$item) {
    if (!empty($item['PROPERTIES']['DATE_OF_FUTURE']['VALUE'])) {
        $date = date('d.m.Y', strtotime($item['PROPERTIES']['DATE_OF_FUTURE']['VALUE']));
        $item['DETAIL_PAGE_URL'] = '/news/' . $date . '/' . $item['CODE'] . '/';
    }
}