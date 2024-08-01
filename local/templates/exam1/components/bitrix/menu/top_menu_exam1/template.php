<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<!-- /bitrix/components/bitrix/menu/templates/horizontal_multilevel/template.php -->
<?// echo '<pre>'; var_dump($arResult); echo '</pre>'; ?>  <!-- для отладки -->

<?if (!empty($arResult)):?>   <!-- если есть хотя бы 1 пункт меню, можно начинать вывод -->

	<div class="menu-block popup-wrap">
		<a href="" class="btn-menu btn-toggle"></a>
		<div class="menu popup-block">
			<ul class="">
				<li class="main-page">
					<a href="/"><?=GetMessage("MAIN");?></a>
				</li>

				<?
				$previousLevel = 0;  // переменная содержит значение DEPTH_LEVEL предыдущего пункта
				foreach($arResult as $arItem):?>  <!-- пробегаем по пунктам, $arItem - массив с информацией о текущем пункте -->

                   <!-- если уровень вложенности текущего пункта меню меньше чем у предыдущего, значит "подменю" закончилось и нужно закрыть список -->
					<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>  
						<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
					<?endif?>
	
					<!-- если пункт содержит подменю, выводим ссылку и начинаем новый список (тег <ul>) -->
					<?if ($arItem["IS_PARENT"]):?> 


						<?if ($arItem["DEPTH_LEVEL"] == 1):?>  <!-- если уровень вложенности =1, т.е. это главное меню -->
							<!-- выводим ссылку и добавляем класс "root-item" если пункт неактивный и "root-item-selected" если активный -->

							<?
								// $COLOR = '';

								// if (isset($arItem["PARAMS"]["COLOR"])):
								// 	$COLOR = $arItem["PARAMS"]["COLOR"];
								// endif;

							?>
						
							
							<li>
								<a href="<?=$arItem["LINK"]?>"class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>
									 <?=$arItem["PARAMS"]["COLOR"]?>
									"><?=$arItem["TEXT"]?></a>
							<ul>
							
							<? if (isset($arItem["PARAMS"]["TXT"])): ?> 
								<div class="menu-text">
									<?=$arItem["PARAMS"]["TXT"];?>
								</div>
							<? endif ?>		
<!-- !!!!! -->
							
						<?else:?>

							<!-- выводим ссылку и добавляем класс "parent". Если пункт активный, для элемента списка <li> добавляем класс "item-selected" -->
							<li<?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><a href="<?=$arItem["LINK"]?>" class="parent"><?=$arItem["TEXT"]?></a><ul>

							<? if (isset($arItem["PARAMS"]["TXT"])): ?> 
								<div class="menu-text">
									<?=$arItem["PARAMS"]["TXT"];?>
								</div>
							<? endif ?>	
								
						<?endif?>

						<!-- если у элемента есть параметр "DESCRIPTION" в параметрах то выводим блок описания и вставляем текст в параметр "DESCRIPTION" -->


					<? else: ?>  <!-- для пунктов, не содержащих подменю -->

						<?if ($arItem["PERMISSION"] > "D"):?>

							<?if ($arItem["DEPTH_LEVEL"] == 1):?>
								<li><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>
									 <?=$arItem["PARAMS"]["COLOR"]?>
									"><?=$arItem["TEXT"]?></a></li>
							<?else:?>
								<li<?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
							<?endif?>

						<?else:?>

							<?if ($arItem["DEPTH_LEVEL"] == 1):?>
								<li><a href="" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
							<?else:?>
								<li><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
							<?endif?>


						<?endif?>

					<?endif?>

					<?$previousLevel = $arItem["DEPTH_LEVEL"];?>
		
				<?endforeach?>

				<?if ($previousLevel > 1)://close last item tags?>
					<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
				<?endif?>


			
			<a href="" class="btn-close"></a>
		</div>
		<div class="menu-overlay"></div>
	</div>

<? endif ?>

