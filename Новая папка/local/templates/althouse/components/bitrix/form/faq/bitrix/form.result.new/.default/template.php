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
			<label class="feedback-form__checkbox custom-checkbox">
				<input name="form_checkbox_<?=$FIELD_SID?>[]" class="custom-checkbox__input" type="checkbox" <?=$arQuestion['STRUCTURE'][0]['FIELD_PARAM']?>>
				<span class="custom-checkbox__label">
				<?=$arQuestion['CAPTION']?> <?=$arQuestion['STRUCTURE'][0]['MESSAGE']?>
				</span>
			</label>
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
		} elseif($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'textarea') {	
			#$arQuestion["HTML_CODE"] = preg_replace("#<input#", '<input ' . ($arQuestion["REQUIRED"] == "Y" ? 'required' : ''), $arQuestion["HTML_CODE"]);
	?>
		 <label class="feedback-form__item field field--dark">
		 	<?=$arQuestion["HTML_CODE"]?>
			 <span class="field__label field__label--outside"><?=$arQuestion["CAPTION"]?></span>
			<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
				<span class="error-fld" title="<?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?>"></span>
			<?endif;?>
		</label>
	<?
		
	} else {		
			#$arQuestion["HTML_CODE"] = preg_replace("#<input#", '<input ' . ($arQuestion["REQUIRED"] == "Y" ? 'required' : ''), $arQuestion["HTML_CODE"]);
	?>
		 <label class="feedback-form__item field field--dark">
		 	<?=$arQuestion["HTML_CODE"]?>
			<span class="field__label field__label--inside"><?=$arQuestion["CAPTION"]?></span>
			<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
				<span class="error-fld" title="<?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?>"></span>
			<?endif;?>
		</label>
	<?
		}
	} //endwhile
	?>
<button type="submit" name="web_form_submit" class="g-recaptcha button button--blue" onclick="this.form.recaptcha_token.value = window.recaptcha.getToken()">Отправить</button>

<!--
<p>
<?=$arResult["REQUIRED_SIGN"];?> - <?=GetMessage("FORM_REQUIRED_FIELDS")?>
</p>
-->
<?=$arResult["FORM_FOOTER"]?>

 <?

} //endif (isFormNote)
?>
