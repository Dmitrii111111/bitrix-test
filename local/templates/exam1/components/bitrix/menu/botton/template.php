<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>



<?if (!empty($arResult)):?>
<div class="title-block"><?=GetMessage("T_EXAM_MENU_TITLE")?></div>

<ul>

<!-- DEPTH_LEVEL - уровень вложенности пункта меню -->

		<?
		foreach($arResult as $arItem):
			if($arItem["DEPTH_LEVEL"] > 1) 
				continue;
		?>
			<?if($arItem["SELECTED"]):?>
				<li class="selected"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>
			
		<?endforeach?>
	
	
</ul>
<?endif?>
				

		<!-- <div class="title-block">О магазине</div>
		<ul>
			<li><a href="">Отзывы</a>
			</li>
			<li><a href="">Руководство </a>
			</li>
			<li><a href="">История</a>
			</li>
		</ul> -->

				
