<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
?>


<?// echo '<pre>'; var_dump($img); echo '</pre>'; ?>
<?// echo '<pre>'; print_r($arResult); echo '</pre>'; ?>

<div class="rew-footer-carousel">

	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		
		// Этот код получает информацию о превью-изображении из CMS Bitrix, создает его ресайзнутую версию (49x49 пикселей, пропорционально) 
		// и сохраняет URL этого ресайзнутого изображения в переменную `$img`
		$arImg = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']['ID'], array('width' => 49, 'height' => 49), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
		$img = $arImg['src'];
		?>

		<div class="item">

			<div class="side-block side-opin" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="inner-block">
					<div class="title">
						<div class="photo-block">
							<img src="<?=$img ? $img : SITE_TEMPLATE_PATH . '/components/bitrix/news.list/images/no_photo_left_block.jpg'?>" alt="">
						</div>
						<div class="name-block"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem['NAME']?></a></div>
						<div class="pos-block"><?=$arItem['DISPLAY_PROPERTIES']['POSITION']['VALUE']?>,<?=$arItem['DISPLAY_PROPERTIES']['COMPANY']['VALUE']?></div>
					</div>
					<div class="text-block">
						<?=TruncateText($arItem['PREVIEW_TEXT'], 150)?>
					</div>
				</div>
			</div>

			

				<?/*
			<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
				<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img
							class="preview_picture"
							border="0"
							src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
							width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
							height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
							alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
							title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
							style="float:left"
							/></a>
				<?else:?>
					<img
						class="preview_picture"
						border="0"
						src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
						width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
						height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
						alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
						style="float:left"
						/>
				<?endif;?>
			<?endif?>
			<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
				<span class="news-date-time"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
			<?endif?>
			<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
				<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
					<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><b><?echo $arItem["NAME"]?></b></a><br />
				<?else:?>
					<b><?echo $arItem["NAME"]?></b><br />
				<?endif;?>
			<?endif;?>
			<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
				<?echo $arItem["PREVIEW_TEXT"];?>
			<?endif;?>
			<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
				<div style="clear:both"></div>
			<?endif?>
			<?foreach($arItem["FIELDS"] as $code=>$value):?>
				<small>
				<?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?>
				</small><br />
			<?endforeach;?>
			<?foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
				<small>
				<?=$arProperty["NAME"]?>:&nbsp;
				<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
					<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
				<?else:?>
					<?=$arProperty["DISPLAY_VALUE"];?>
				<?endif?>
				</small><br />
			<?endforeach;?>
					*/?>

		</div>
	<?endforeach;?>
	
	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		<br /><?=$arResult["NAV_STRING"]?>
	<?endif;?>
	
</div>


<!-- <div class="rew-footer-carousel">
	<div class="item">
		<div class="side-block side-opin">
			<div class="inner-block">
				<div class="title">
					<div class="photo-block">
						<img src="<?//= SITE_TEMPLATE_PATH ?>/img/side-opin.jpg" alt="">
					</div>
					<div class="name-block"><a href="">Дмитрий Иванов</a></div>
					<div class="pos-block">Генеральный директор,"Офис+"</div>
				</div>
				<div class="text-block">“В магзине предоставили потрясающий выбор
					расцветок, а также, получил большую скидку по карте постоянного...</div>
			</div>
		</div>
	</div>
	<div class="item">
		<div class="side-block side-opin">
			<div class="inner-block">
				<div class="title">
					<div class="photo-block">
						<img src="<?//= SITE_TEMPLATE_PATH ?>/img/side-opin.jpg" alt="">
					</div>
					<div class="name-block"><a href="">Дмитрий Иванов</a></div>
					<div class="pos-block">Генеральный директор,"Офис+"</div>
				</div>
				<div class="text-block">“В магазине предоставили потрясающий выбор
					расцветок, а также, получил большую скидку по карте постоянного...</div>
			</div>
		</div>
	</div>
</div> -->