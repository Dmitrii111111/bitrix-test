<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die(); ?>
<?php 
use Bitrix\main\Page\Asset;  //Подключение библиотеки для использования css и js
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

// ГЛАВНАЯ ИЛИ НЕТ? скрываем заголовок
$sCurPage = $APPLICATION->GetCurPage(false);
if ($sCurPage == '/') {
    $blsMain = true;
}

// ПРОВЕРКА ВРЕМЕНИ
$iHours = (int)date("H");
if ($iHours >= 9 && $iHours <= 18) { 
    $blsWorkTime = true;
}

?>

<!DOCTYPE html>
<html lang="<?php LANGUAGE_ID ?>">
<!-- <html lang="ru"> -->

<head>
    <!-- ЭТО ВСЕ ПОДКЛЮЧАЕТЬСЯ В php $APPLICATION->ShowHead() -->
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8" />
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content=""> -->

    <?php $APPLICATION->ShowHead() ?>
    <!-- TITLE -->
    <title><?php $APPLICATION->ShowTitle(); ?></title>

    <?php
    //CSS
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/reset.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/style.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/owl.carousel.css');
    //JS -->
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/jquery.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/owl.carousel.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/scripts.js');

    Asset::getInstance()->addString('<meta name="viewport" content="width=device-width, initial-scale=1.0">');
    ?>
    
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <!-- <link rel="stylesheet" href="./css/reset.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/owl.carousel.css" /> -->
    <!-- <script src="./js/jquery.min.js"></script>
    <script src="./js/owl.carousel.min.js"></script>
    <script src="./js/scripts.js"></script> -->
    <link rel="icon" type="image/vnd.microsoft.icon"  href="<?= SITE_TEMPLATE_PATH ?>/img/favicon.ico">
    <link rel="shortcut icon" href="<?= SITE_TEMPLATE_PATH ?>/img/favicon.ico">
</head>

<body>
    <!-- wrap -->
     <!-- АДМИН ПАНЕЛЬ -->
    <div id="panel"><?$APPLICATION->ShowPanel();?></div> 
    <div class="wrap">   
        <!-- header -->
        <header class="header">
            <div class="inner-wrap">
                <div class="logo-block"><a href="" class="logo">Мебельный магазин</a>
                </div>
                <div class="main-phone-block">
                
                <!-- ЕСЛИ СЕЙЧАС ВРЕМЯ (на сервере) рабочее (с 9 до 18), то отображается телефон, если не рабочее – то email. -->
                <? if ($blsWorkTime): ?>
                    <a href="tel:84952128506" class="phone">8 (495) 212-85-06</a>
                <? else: ?>
                    <a href="mailto:store@store.ru" class="phone">store@store.ru</a>
                    <? endif; ?>

                    <!-- <a href="tel:84952128506" class="phone">8 (495) 212-85-06</a> -->
                    <div class="shedule">время работы с 9-00 до 18-00</div>
                </div>
                <div class="actions-block">
                    <form action="/" class="main-frm-search">
                        <input type="text" placeholder="Поиск">
                        <button type="submit"></button>
                    </form>



                    <!-- вход/выход -->
                    <?$APPLICATION->IncludeComponent(
	"bitrix:system.auth.form", 
	"demo", 
	array(
		"FORGOT_PASSWORD_URL" => "/login/?forgot_password=yes",
		"PROFILE_URL" => "/login/user.php",
		"REGISTER_URL" => "/login/?register=yes",
		"SHOW_ERRORS" => "Y",
		"COMPONENT_TEMPLATE" => "demo"
	),
	false
);?>




                    <!-- <nav class="menu-block">
                        <ul>
                            <li class="att popup-wrap">
                                <a id="hd_singin_but_open" href="" class="btn-toggle">Войти на сайт</a>
                                <form action="/" class="frm-login popup-block">
                                    <div class="frm-title">Войти на сайт</div>
                                    <a href="" class="btn-close">Закрыть</a>
                                    <div class="frm-row"><input type="text" placeholder="Логин"></div>
                                    <div class="frm-row"><input type="password" placeholder="Пароль"></div>
                                    <div class="frm-row"><a href="" class="btn-forgot">Забыли пароль</a></div>
                                    <div class="frm-row">
                                        <div class="frm-chk">
                                            <input type="checkbox" id="login">
                                            <label for="login">Запомнить меня</label>
                                        </div>
                                    </div>
                                    <div class="frm-row"><input type="submit" value="Войти"></div>
                                </form>
                            </li>
                            <li><a href="">Зарегистрироваться</a>
                            </li>
                        </ul>
                    </nav> -->
                </div>
            </div>
        </header>
        <!-- /header -->

        <!-- nav (ВЕРХНЯЯ МЕНЮ)-->
        <nav class="nav">
            <div class="inner-wrap">
            <!-- задаем параметры компанента  -->
            <?$APPLICATION->IncludeComponent(  
                "bitrix:menu",
                "top_menu_exam1",
                Array(
                    "ALLOW_MULTI_SELECT" => "N",
                    "CHILD_MENU_TYPE" => "left",
                    "DELAY" => "N",
                    "MAX_LEVEL" => "3",
                    "MENU_CACHE_GET_VARS" => array(""),
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_TYPE" => "N",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "ROOT_MENU_TYPE" => "top",
                    "USE_EXT" => "Y"
                )
            );?>

                <!-- <div class="menu-block popup-wrap">
                    <a href="" class="btn-menu btn-toggle"></a>
                    <div class="menu popup-block"> -->
                        <!-- <ul class="">
                            <li class="main-page">
                                <a href="">Главная</a>
                            </li>
                            <li>
                                <a href="">Компания</a>
                                <ul>
                                    <li>
                                        <a href="">Пункт 1</a>
                                        <ul>
                                            <li><a href="">Пункт 1</a>
                                            </li>
                                            <li><a href="">Пункт 2</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="">Пункт 2</a>
                                    </li>
                                    <li><a href="">Пункт 3</a>
                                    </li>
                                    <li><a href="">Пункт 4</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="">Новости</a>
                            </li>
                            <li>
                                <a href="">Каталог</a>
                                <ul>
                                    <li>
                                        <a href="">Пункт 1</a>
                                        <ul>
                                            <li><a href="">Пункт 1</a>
                                            </li>
                                            <li><a href="">Пункт 2</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="">Пункт 2</a>
                                    </li>
                                    <li><a href="">Пункт 3</a>
                                    </li>
                                    <li><a href="">Пункт 4</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="">Фотогалерея</a>
                            </li>
                            <li><a href="">Партнерам</a>
                            </li>
                            <li><a href="">Контакты</a>
                            </li>
                        </ul>
                        <a href="" class="btn-close"></a> -->
                    <!-- </div>
                    <div class="menu-overlay"></div>
                </div> -->
            </div>
        </nav>
        <!-- /nav -->

        <? if (!$blsMain): ?>  <!-- если главная то не показываем хлебные крошки -->
        <!-- breadcrumbs(хлебные крошки) -->
        <!-- <div class="breadcrumbs-box">
            <div class="inner-wrap">
                <a href="">Главная</a>
                <a href="">Мебель</a>
                <span>Выставки и события</span>
            </div>
        </div> -->

        <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "nav", Array(
	"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
		"SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
		"START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
	),
	false
);?>

        <!-- /breadcrumbs -->
        <? endif; ?>

        <!-- page -->
        <div class="page">
            <!-- content box -->
            <div class="content-box">
                <!-- content -->
                <div class="content">
                    <div class="cnt">
                    
                    
                    <? if (!$blsMain): ?>  <!-- если не главная -->
                        <heder>  
                            <h1 id ="pagetitle"><?=$APPLICATION->ShowTitle(false)?></h1>  <!-- будет выводиться всегда заголовок страницы если не главная -->
                        </heder>
                        <br>
                    <? endif; ?>

                    <? if ($blsMain): ?>  <!-- если главная то выводим контент -->
                        <p>«Мебельная компания» осуществляет производство мебели на высококлассном оборудовании с применением минимальной доли ручного труда, что позволяет обеспечить высокое качество нашей продукции. Налажен производственный процесс как массового и индивидуального характера, что с одной стороны позволяет обеспечить постоянную номенклатуру изделий и индивидуальный подход – с другой.
						</p>

						<!-- index column -->
		                <div class="cnt-section index-column">
		                    <div class="col-wrap">
		
		                        <!-- main actions box -->
		                        <div class="column main-actions-box">
		                        	<div class="title-block">
		                                <h2>Новинки</h2>
		                                 <hr>
		                            </div>
		                              <div class="items-wrap">
		                                <div class="item-wrap">
		                                    <div class="item">
		                                        <div class="title-block att">
		                                            Угловой диван!
		                                        </div>
		                                        <br>
		                                        <div class="inner-block">
		                                            <a href="" class="photo-block">
		                                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/new01.jpg" alt="">
		                                            </a>
		                                            <div class="text"><a href="">Угловой диван "Титаник",  с большим выбором расцветок и фактур.</a>
		                                            <a href="" class="btn-arr"></a>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="item-wrap">
		                                    <div class="item">
		                                        <div class="title-block att">
		                                            Угловой диван!
		                                        </div>
		                                        <br>
		                                        <div class="inner-block">
		                                            <a href="" class="photo-block">
		                                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/new02.jpg" alt="">
		                                            </a>
		                                            <div class="text"><a href="">Угловой диван "Титаник",  с большим выбором расцветок и фактур.</a>
		                                            <a href="" class="btn-arr"></a>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="item-wrap">
		                                    <div class="item">
		                                        <div class="title-block att">
		                                            Угловой диван!
		                                        </div>
		                                        <br>
		                                        <div class="inner-block">
		                                            <a href="" class="photo-block">
		                                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/new03.jpg" alt="">
		                                            </a>
		                                            <div class="text"><a href="">Угловой диван "Титаник",  с большим выбором расцветок и фактур.</a>
		                                            <a href="" class="btn-arr"></a>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                            <a href="" class="btn-next">Все новинки</a>
		                        </div>
		                        <!-- /main actions box -->
		                        <!-- main news box -->
		                        <div class="column main-news-box">
		                            <div class="title-block">
		                                <h2>Новости</h2>
		                            </div>
		                            <hr>
		                            <div class="items-wrap">
		                                <div class="item-wrap">
		                                    <div class="item">
		                                        <div class="title"><a href="">29 августа 2012</a>
		                                        </div>
		                                        <div class="text"><a href="">Поступление лучших офисных кресел из Германии </a>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="item-wrap">
		                                    <div class="item">
		                                        <div class="title"><a href="">29 августа 2012</a>
		                                        </div>
		                                        <div class="text"><a href="">Мастер-класс дизайнеров  из Италии для производителей мебели </a>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="item-wrap">
		                                    <div class="item">
		                                        <div class="title"><a href="">29 августа 2012</a>
		                                        </div>
		                                        <div class="text"><a href="">Поступление лучших офисных кресел из Германии </a>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="item-wrap">
		                                    <div class="item">
		                                        <div class="title"><a href="">29 августа 2012</a>
		                                        </div>
		                                        <div class="text"><a href="">Наша дилерская сеть расширилась теперь ассортимент наших товаров доступен в Казани </a>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                            <a href="" class="btn-next">Все новости</a>
		                        </div>
		                        <!-- /main news box -->
		
		                    </div>
		                </div>
		                <!-- /index column -->
		                
	                    <!-- afisha box -->
		                <div class="cnt-section afisha-box">
		                    <div class="section-title-block">
		                        <h2 class="second-ttile">Ближайшие мероприятия</h2>
		                        <a href="" class="btn-next">все мероприятия</a>
		                    </div>
		                    <hr>
		                    <div class="items-wrap">
		                        <div class="item-wrap">
		                            <div class="item">
		                                <div class="title"><a href="">29 августа 2012, Москва</a>
		                                </div>
		                                <div class="text"><a href="">Семинар производителей мебели России и СНГ, Обсуждение тенденций.</a>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="item-wrap">
		                            <div class="item">
		                                <div class="title"><a href="">29 августа 2012, Москва</a>
		                                </div>
		                                <div class="text"><a href="">Открытие шоу-рума на Невском проспекте. Последние модели в большом ассортименте.</a>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="item-wrap">
		                            <div class="item">
		                                <div class="title"><a href="">29 августа 2012, Москва</a>
		                                </div>
		                                <div class="text"><a href="">Открытие нового магазина в нашей  дилерской сети.</a>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		                <!-- /afisha box -->
                    <? endif; ?>

