<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");
define("HIDE_SIDEBAR", true);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Страница не найдена");?>

	<div class="bx-404-container">
		<div class="bx-404-block"><img src="<?=SITE_DIR?>images/404.png" alt=""></div>
		<div class="bx-404-text-block">Неправильно набран адрес, <br>или такой страницы на сайте больше не существует.</div>
		<div class="">Вернитесь на <a href="<?=SITE_DIR?>">главную</a> или воспользуйтесь картой сайта.</div>
	</div>
	<div class="map-columns row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="bx-maps-title">Карта сайта:</div>
		</div>
	</div>

	<div class="col-sm-offset-2 col-sm-4">
		<div class="bx-map-title"><i class="fa fa-leanpub"></i> Каталог</div>
		<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list", 
	"bootstrap_v4", 
	array(
		"COMPONENT_TEMPLATE" => "bootstrap_v4",
		"IBLOCK_TYPE" => "news",
		"IBLOCK_ID" => "1",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_CODE" => "",
		"COUNT_ELEMENTS" => "Y",
		"TOP_DEPTH" => "2",
		"SECTION_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SECTION_URL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
		"ADDITIONAL_COUNT_ELEMENTS_FILTER" => "additionalCountFilter",
		"HIDE_SECTIONS_WITH_ZERO_COUNT_ELEMENTS" => "N",
		"FILTER_NAME" => "sectionsFilter",
		"CACHE_FILTER" => "N",
		"VIEW_MODE" => "LINE",
		"SHOW_PARENT_NAME" => "Y"
	),
	false
);
		?>
	</div>

	<div class="col-sm-offset-1 col-sm-4">
		<div class="bx-map-title"><i class="fa fa-info-circle"></i> О магазине</div>
		<?
		$APPLICATION->IncludeComponent("bitrix:main.map", ".default", array(
	"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"SET_TITLE" => "N",
		"LEVEL" => "3",
		"COL_NUM" => "2",
		"SHOW_DESCRIPTION" => "Y",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "N"
	)
);?>
	</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>