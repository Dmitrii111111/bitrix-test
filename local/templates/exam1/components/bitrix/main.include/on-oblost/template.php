<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

		/** @var array $arParams */
		/** @var array $arResult */
		/** @global CMain $APPLICATION */
		/** @global CUser $USER */
		/** @global CDatabase $DB */
		/** @var CBitrixComponentTemplate $this */
		/** @var string $templateName */
		/** @var string $templateFile */
		/** @var string $templateFolder */
		/** @var string $componentPath */
		/** @var CBitrixComponent $component */
		$this->setFrameMode(true);
        
		// Если текст не должен выводиться, то и «каркас» с пустым содержимым не должен отображаться в шаблоне сайта. filesize($arResult["FILE"]) если в байтах(filesize) 0 то FALSE
		if(filesize($arResult["FILE"])):
?>
			<div class="side-block side-anonse">
				<div class="title-block"><span class="i i-title01"></span><?=GetMessage("INFO")?></div>
				<div class="item">
					<p>

						<?include($arResult["FILE"]);?>
				
					</p>
				</div>
			</div>
		<?endif;?>	
		


		<!-- // if($arResult["FILE"] <> ''AND filesize($arResult["FILE"]))

		// 	include($arResult["FILE"]);


		// if($arResult["FILE"] <> ''AND
		// filesize($arResult["FILE"])) -->


<!-- // <div class="side-block side-anonse">
// 	<<div class="title-block"><span class="i i-title01"></span>Полезная информация!</div>
// 	<div class="item">
// 		<p>Клиенты предпочитают все больше эко-материалов.</p>
// 	</div>
// </div> -->