<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
#echo '<pre style="">';print_r($arResult['arForm']['SID']);echo '</pre>';
?>
<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>

<?=$arResult["FORM_NOTE"]?>

<?if ($arResult["isFormNote"] != "Y")
{
?>

<?=$arResult["FORM_HEADER"]?>
<input type="hidden" name="recaptcha_token" value="">

<?

	foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
	{
		if($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'checkbox') {
		?>
			<div class="callback-footer__row">
				<input type="checkbox" name="form_checkbox_<?=$FIELD_SID?>[]" value="<?=$arQuestion['STRUCTURE'][0]['ID']?>" id="callback-footer__checkbox_<?=$arQuestion['STRUCTURE'][0]['ID']?>" <?=$arQuestion['STRUCTURE'][0]['FIELD_PARAM']?> class="callback-footer__checkbox">
				<label for="callback-footer__checkbox_<?=$arQuestion['STRUCTURE'][0]['ID']?>" class="callback-footer__agree callback-footer__agree_sidebar"><span><?=$arQuestion['CAPTION']?><?=$arQuestion['STRUCTURE'][0]['MESSAGE']?>
				</span></label>
			</div>
		<?	
		} elseif($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden') {
			$value = '';
			if($arQuestion["CAPTION"] == 'TITLE')
				$value = $APPLICATION->GetTitle();
			if($arQuestion["CAPTION"] == 'URL')
				$value = 'http' . (empty($_SERVER['HTTPS']) ? '' : 's' ) . '://' . $_SERVER['SERVER_NAME'] . $APPLICATION->GetCurPage();	
		?>
			<input id="<?=$arQuestion["CAPTION"]?>_<?=$arQuestion['STRUCTURE'][0]['ID']?>" data-required="" type="hidden" name="form_hidden_<?=$arQuestion['STRUCTURE'][0]['ID']?>" value="<?=$value?>">
		<?
			#echo '<pre style="">';print_r($arQuestion);echo '</pre>';
		} else {		
			#$arQuestion["HTML_CODE"] = preg_replace("#<input#", '<input ' . ($arQuestion["REQUIRED"] == "Y" ? 'required' : ''), $arQuestion["HTML_CODE"]);
	?>

		<div class="callback-footer__row">
			<?=$arQuestion["HTML_CODE"]?>
			<label for="<?=$FIELD_SID . "_" . $arQuestion['STRUCTURE'][0]["ID"]?>" class="callback-footer__label"><?=$arQuestion["CAPTION"]?><?/*if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;*/?></label>
			<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
				<span class="error-fld" title="<?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?>"></span>
			<?endif;?>
		</div>
	<?
		}
	} //endwhile
	?>
<div class="callback-footer__row">
	<button type="submit" name="web_form_submit" onclick="this.form.recaptcha_token.value = window.recaptcha.getToken()" class="g-recaptcha rectangle_btn callback-footer__submit callback-footer__submit_sidebar" <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> value="<?=htmlspecialcharsbx(trim($arResult["arForm"]["BUTTON"]) == '' ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>">Отправить</button>
</div>


<!--
<p>
<?=$arResult["REQUIRED_SIGN"];?> - <?=GetMessage("FORM_REQUIRED_FIELDS")?>
</p>
-->
<?=$arResult["FORM_FOOTER"]?>

 <?

} //endif (isFormNote)
?>
