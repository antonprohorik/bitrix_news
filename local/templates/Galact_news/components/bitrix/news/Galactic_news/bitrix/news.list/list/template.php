<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="news_wrapper">
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="news_item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div class="date">
                <time><?=date('d.m.Y', strtotime($arItem['DISPLAY_ACTIVE_FROM']));?></time>
            </div>
            <a href="<?=$arItem['DETAIL_PAGE_URL'];?>">
                <h1 class="news_title"><?=$arItem['NAME'];?></h1>
            </a>
            <? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])): ?>
                <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>">
            <? endif; ?>
            <div class="news_text">
                <? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]): ?>
                    <?=$arItem["PREVIEW_TEXT"];?>
                <? endif; ?>
            </div>
            <a class="more_a" href="<?=$arItem['DETAIL_PAGE_URL'];?>">
                <button class="btn more_btn">Подробнее
                    <svg class="btn_arrow" width="32px" height="32px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#841844">
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

<div class="page_buttons">
    <? if ($arResult["NAV_STRING"]): ?>
        <?=$arResult["NAV_STRING"]?>
    <? endif; ?>
</div>
