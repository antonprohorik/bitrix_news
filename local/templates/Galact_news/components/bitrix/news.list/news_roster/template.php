<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$this->setFrameMode(true);
?>

<div class="block_title"><h1>Новости</h1></div>
<div class="news_wrapper">
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <div class="news_item" id="<?= $arItem['EDIT_AREA_ID']; ?>">
            <div class="date">
                <time><?= date('d.m.Y', strtotime($arItem['PROPERTIES']['DATE_OF_FUTURE']['VALUE'])); ?></time>
            </div>
            <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>">
                <h1 class="news_title"><?= $arItem['NAME']; ?></h1>
            </a>
            <div class="news_text">
                <? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]): ?>
                    <?= $arItem["PREVIEW_TEXT"]; ?>
                <? endif; ?>
            </div>
            <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>">
                <button class="btn more_btn">Подробнее
                    <svg class="btn_arrow" width="26px" height="26px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#841844">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <title></title>
                            <g id="Complete">
                                <g id="arrow-right">
                                    <g>
                                        <polyline data-name="Right" fill="none" id="Right-2" points="16.4 7 21.5 12 16.4 17" class="btn_stroke" stroke="#841844" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polyline>
                                        <line fill="none" class="btn_stroke" stroke="#841844" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="2.5" x2="19.2" y1="12" y2="12"></line>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </button>
            </a>
        </div>
    <? endforeach; ?>
</div>

<?php if ($arResult["NAV_STRING"]): ?>
    <?= $arResult["NAV_STRING"] ?>
<?php endif; ?>z