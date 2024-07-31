<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<!-- /bitrix/components/bitrix/menu/templates/horizontal_multilevel/template.php -->
<? echo '<pre>'; print_r($arResult); echo '</pre>'; ?>  <!-- для отладки -->

<?if (!empty($arResult)):?>

	<div class="menu-block popup-wrap">
		<a href="" class="btn-menu btn-toggle"></a>
		<div class="menu popup-block">
			<ul class="">
				<li class="main-page">
					<a href="/"><?=GetMessage("MAIN");?></a>
				</li>

				<?
				$previousLevel = 0;
				foreach($arResult as $arItem):?>

					<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
						<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
					<?endif?>

					<?if ($arItem["IS_PARENT"]):?>

						<?if ($arItem["DEPTH_LEVEL"] == 1):?>
							<li>
								<a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a>
							<ul>
						<?else:?>
							<li>
								<?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><a href="<?=$arItem["LINK"]?>" class="parent"><?=$arItem["TEXT"]?></a>
							<ul>
						<?endif?>
						
						<!-- если у элемента есть параметр "DESCRIPTION" в параметрах то выводим блок описания и вставляем текст в параметр "DESCRIPTION" -->
						<? if (isset($arItem["PARAMS"]["DESCRIPTION"])): ?> 
							<div class="menu-text">
								<?=$arItem["PARAMS"]["DESCRIPTION"];?>
								<? print_r($arItem["DEPTH_LEVEL"]); ?>
							</div>
						<? endif ?>

						<!-- Добавляем новый блок для дополнительного названия под пункта если он есть но только для одного подпункта -->
						<?// if (isset($arItem["PARAMS"]["ADDITIONAL_NAME"])): ?> 
							<!-- <div class="menu-text">
								<?//=$arItem["PARAMS"]["ADDITIONAL_NAME"];?>
							</div> -->
						<?// endif ?>


					<? else: ?>

						<?if ($arItem["PERMISSION"] > "D"):?>

							<?if ($arItem["DEPTH_LEVEL"] == 1):?>
								<li><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a></li>
							<?else:?>
								<li<?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
							<?endif?>

						<?else:?>

							<?if ($arItem["DEPTH_LEVEL"] == 1):?>
								<li><a href="" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
							<?else:?>
								<li><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
							<?endif?>

							<!-- ХАЛЯ БАЛЯ пгрк екрпкерпекп -->

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


