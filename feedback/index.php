<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Обратная связь");

if(CModule::IncludeModule("iblock")) {
    $iblockId = 7;

    $arOrder = ["SORT" => "ASC"];
    $arFilter = ["IBLOCK_ID" => $iblockId, "ACTIVE" => "Y"];
    $arSelect = ["ID", "NAME"];

    $rsThemes = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);

    $themes = [];
    while ($theme = $rsThemes->Fetch()) {
        $themes[$theme["ID"]] = $theme["NAME"];
    }
}

$APPLICATION->IncludeComponent(
	"bitrix:main.feedback", 
	"form_feedback", 
	array(
		"EMAIL_TO" => "prokhorik@techart.ru",
		"EVENT_MESSAGE_ID" => array(
			0 => "7",
		),
		"OK_TEXT" => "Спасибо, ваше сообщение принято.",
		"REQUIRED_FIELDS" => array(
			0 => "NAME",
			1 => "EMAIL",
			2 => "MESSAGE",
		),
		"USE_CAPTCHA" => "N",
		"COMPONENT_TEMPLATE" => "form_feedback",
		"THEMES" => $themes
	),
	false
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>