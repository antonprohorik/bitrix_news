<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<div class="bread_crumbs">
    <a class="bread_crumbs_start" href="/news/">Главная /</a>
    <a class="bread_crumbs_end"><?= $arResult['NAME']; ?></a>
</div>

<div class="detail_block_title">
    <h1><?= $arResult['NAME']; ?></h1>
</div>

<div class="detail_news_wrapper">
    <div class="detail_news">
        <div class="detail_date">
            <time><?= date('d.m.Y', strtotime($arResult['PROPERTIES']['DATE_OF_FUTURE']['VALUE'])); ?></time>
        </div>
        <? if ($arParams["DISPLAY_NAME"] != "N" && $arResult["NAME"]): ?>
            <h1 class="detail_news_title"><?= $arResult['PREVIEW_TEXT']; ?></h1>
        <? endif; ?>
        <div class="detail_news_text">
            <? if ($arResult["DETAIL_TEXT"]): ?>
                <?= $arResult["DETAIL_TEXT"]; ?> 
            <? else: ?>
                <?= $arResult["PREVIEW_TEXT"]; ?>
            <? endif; ?>
        </div>
        <div class="detail_news_text">
            <strong>Темы:</strong>
            <?php
            if (!empty($arResult['PROPERTIES']['THEMES']['DISPLAY_VALUE'])) {
                $themes = is_array($arResult['PROPERTIES']['THEMES']['DISPLAY_VALUE']) ? $arResult['PROPERTIES']['THEMES']['DISPLAY_VALUE'] : [$arResult['PROPERTIES']['THEMES']['DISPLAY_VALUE']];
                foreach ($themes as $themeId => $themeName) {
                    echo '<a href="/news/theme/' . urlencode($themeId) . '">' . htmlspecialchars($themeName) . '</a> ';
                }
            } else {
                echo htmlspecialchars($arResult['PROPERTIES']['THEMES']['VALUE']);
            }
            ?>
        </div>
        <a href="/news/">
            <button class="btn detail_more_btn">
                <svg class="btn_arrow" width="26px" height="26px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <title></title>
                        <g id="Complete">
                            <g id="arrow-left">
                                <g>
                                    <polyline data-name="Right" fill="none" id="Right-2" points="7.6 7 2.5 12 7.6 17" class="btn_stroke" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polyline>
                                    <line fill="none" class="btn_stroke" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="21.5" x2="4.8" y1="12" y2="12"></line>
                                </g>
                            </g>
                        </g>
                    </svg>
                    Назад к новостям
                </button>
            </a>
        </div>
        <img class="detail_news_img" src="<?= $arResult['DETAIL_PICTURE']['SRC']; ?>">
    </div>
</div>