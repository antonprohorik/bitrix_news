<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты редакторов");
?><?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"galactic_menu_gorizontal", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "submenu",
		"DELAY" => "N",
		"MAX_LEVEL" => "2",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "top",
		"USE_EXT" => "N",
		"COMPONENT_TEMPLATE" => "galactic_menu_gorizontal"
	),
	false,
	array(
		"ACTIVE_COMPONENT" => "Y"
	)
);?> <style>
    .welbody {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
    }
    .welcome_hello {
        text-align: center;
        font-size: 24px;
    }
</style>
<div class="welbody">
	<div class="welcome_hello">
		 Для связи с редакторами: 8 800 555 35 35
	</div>
</div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>