<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("contacts");
?><style>
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
		 Наши контакты: 8 800 555 35 35 звоните в любое время
	</div>
</div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>