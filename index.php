<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");
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
 <a href="/news/" style="text-decoration: none; color: inherit;">
 <p class="header_text">Добро пожаловать в лучший в мире галактический журнал новостей!</p> </a>
	</div>
</div>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>