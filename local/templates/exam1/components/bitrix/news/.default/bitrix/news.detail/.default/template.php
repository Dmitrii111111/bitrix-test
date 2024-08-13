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
<?// echo '<pre>'; print_r($arResult); echo '</pre>'; ?>

	<hr>
	<div class="review-block">
		<div class="review-text">
			<div class="review-text-cont">
				<?=$arResult["DETAIL_TEXT"]?>
			</div>
			<div class="review-autor">
			<?=$arResult["NAME"]?>, <?=$arResult["DISPLAY_ACTIVE_FROM"]?>., <?=$arResult["PROPERTIES"]["POSITION"]["VALUE"]?>, <?=$arResult["PROPERTIES"]["COMPANY"]["VALUE"]?>.
			</div>
		</div>
		<div style="clear: both;" class="review-img-wrap"><img src="<?=$arResult["DETAIL_PICTURE"]["SRC"] ? $arResult["DETAIL_PICTURE"]["SRC"] : '/local/templates/exam1/img/rew/no_photo.jpg'?>" alt="img"></div>
	</div>	

	<? if($arResult["PROPERTIES"]["DOCUMENT"]["VALUE"] > 0): ?>
		<div class="exam-review-doc">
		<p><?=GetMessage('DOC')?></p>
		<!-- цикл -->

		<? foreach($arResult["PROPERTIES"]["DOCUMENT"]["VALUE"] as $val): ?>

			<?$scrDoc = CFILE::GetPath($val)?>  <!-- cсылка на файл -->
			<?$obDoc = CFILE::GetByID($val)?>  <!-- объект -->
			<?$arDoc = $obDoc->Fetch()?>  <!-- массив -->

				<div class="exam-review-item-doc"><img class="rew-doc-ico" src="/local/templates/exam1/img/icons/pdf_ico_40.png">
				<a href="<?=$arDoc["SRC"]?>"><?=$arDoc["ORIGINAL_NAME"]?></a></div>

		<? endforeach; ?>  
		</div>  
    <!-- <a href="" class="review-block_back_link"> &larr; К списку отзывов</a> -->
 	<? endif; ?>

  <hr>

	

	<!-- <div class="review-block">
		<div class="review-text">
			<div class="review-text-cont">
				Вы сможете организовать внутри компании коллективную работу над проектами в рабочих группах, вести учет и планирование времени и событий, обмениваться сообщениями и почтой через портал, проводить внутри компании видеоконференции и делать многое другое.
				Вы сможете организовать внутри компании коллективную работу над проектами в рабочих группах, вести учет и планирование времени и событий, обмениваться сообщениями и почтой через портал, проводить внутри компании видеоконференции и делать многое другое.
				Вы сможете организовать внутри компании коллективную работу над проектами в рабочих группах, вести учет и планирование времени и событий, обмениваться сообщениями и почтой через портал, проводить внутри компании видеоконференции и делать многое другое.
			</div>
			<div class="review-autor">
				Сергей Родионов, 12 мая 2020 г., Генеральный директор, CTC-Медиа.
			</div>
		</div>
		<div style="clear: both;" class="review-img-wrap"><img src="img/rew/photo_1.jpg" alt="img"></div>
	</div>
	<div class="exam-review-doc">
		<p>Документы:</p>
		<div  class="exam-review-item-doc"><img class="rew-doc-ico" src="./img/icons/pdf_ico_40.png"><a href="">Файл 1</a></div>
		<div  class="exam-review-item-doc"><img class="rew-doc-ico" src="./img/icons/pdf_ico_40.png"><a href="">Файл 2</a></div>
		<div  class="exam-review-item-doc"><img class="rew-doc-ico" src="./img/icons/pdf_ico_40.png"><a href="">Файл 3</a></div>
	</div>
	<hr>
	<a href="" class="review-block_back_link"> &larr; К списку отзывов</a> -->



<?/*
<div class="news-detail">
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<img
			class="detail_picture"
			border="0"
			src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
			width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
			height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
			alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
			title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
			/>
	<?endif?>
	<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
		<span class="news-date-time"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
	<?endif;?>
	<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
		<h3><?=$arResult["NAME"]?></h3>
	<?endif;?>
	<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && ($arResult["FIELDS"]["PREVIEW_TEXT"] ?? '')):?>
		<p><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></p>
	<?endif;?>
	<?if($arResult["NAV_RESULT"]):?>
		<?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
		<?echo $arResult["NAV_TEXT"];?>
		<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
	<?elseif($arResult["DETAIL_TEXT"] <> ''):?>
		<?echo $arResult["DETAIL_TEXT"];?>
	<?else:?>
		<?echo $arResult["PREVIEW_TEXT"];?>
	<?endif?>
	<div style="clear:both"></div>
	<br />
	<?foreach($arResult["FIELDS"] as $code=>$value):
		if ('PREVIEW_PICTURE' == $code || 'DETAIL_PICTURE' == $code)
		{
			?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?
			if (!empty($value) && is_array($value))
			{
				?><img border="0" src="<?=$value["SRC"]?>" width="<?=$value["WIDTH"]?>" height="<?=$value["HEIGHT"]?>"><?
			}
		}
		else
		{
			?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?><?
		}
		?><br />
	<?endforeach;
	foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>

		<?=$arProperty["NAME"]?>:&nbsp;
		<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
			<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
		<?else:?>
			<?=$arProperty["DISPLAY_VALUE"];?>
		<?endif?>
		<br />
	<?endforeach;
	if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
	{
		?>
		<div class="news-detail-share">
			<noindex>
			<?
			$APPLICATION->IncludeComponent("bitrix:main.share", "", array(
					"HANDLERS" => $arParams["SHARE_HANDLERS"],
					"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
					"PAGE_TITLE" => $arResult["~NAME"],
					"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
					"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
					"HIDE" => $arParams["SHARE_HIDE"],
				),
				$component,
				array("HIDE_ICONS" => "Y")
			);
			?>
			</noindex>
		</div>
		<?
	}
	?>
</div>
*/?>

<?/*
<br/>
<br/>
<br/>
<br/>
	<div class="review-block">
		<div class="review-text">
			<div class="review-text-cont">
				Вы сможете организовать внутри компании коллективную работу над проектами в рабочих группах, вести учет и планирование времени и событий, обмениваться сообщениями и почтой через портал, проводить внутри компании видеоконференции и делать многое другое.
				Вы сможете организовать внутри компании коллективную работу над проектами в рабочих группах, вести учет и планирование времени и событий, обмениваться сообщениями и почтой через портал, проводить внутри компании видеоконференции и делать многое другое.
				Вы сможете организовать внутри компании коллективную работу над проектами в рабочих группах, вести учет и планирование времени и событий, обмениваться сообщениями и почтой через портал, проводить внутри компании видеоконференции и делать многое другое.
			</div>
			<div class="review-autor">
				Сергей Родионов, 12 мая 2020 г., Генеральный директор, CTC-Медиа.
			</div>
		</div>
		<div style="clear: both;" class="review-img-wrap"><img src="img/rew/photo_1.jpg" alt="img"></div>
	</div>
	<div class="exam-review-doc">
		<p>Документы:</p>
		<div  class="exam-review-item-doc"><img class="rew-doc-ico" src="./img/icons/pdf_ico_40.png"><a href="">Файл 1</a></div>
		<div  class="exam-review-item-doc"><img class="rew-doc-ico" src="./img/icons/pdf_ico_40.png"><a href="">Файл 2</a></div>
		<div  class="exam-review-item-doc"><img class="rew-doc-ico" src="./img/icons/pdf_ico_40.png"><a href="">Файл 3</a></div>
	</div>
	<hr>
	<a href="" class="review-block_back_link"> &larr; К списку отзывов</a>
*/?>
