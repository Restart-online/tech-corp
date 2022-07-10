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
?>

<?
$frame = $this->createFrame("subscribe-form", false)->begin();
?>
	<form 0 action="<?=$arResult["FORM_ACTION"]?>" class="feedback__form feedback-form">
	<input type="hidden" name="recaptcha_token" value="">
		<input type="checkbox" name="sf_RUB_ID[]" id="sf_RUB_ID_2" value="2" checked style="display:none;">	
		<label class="feedback-form__item field field--dark">
			<input type="email" class="field__input" data-required inputmode="text" data-inputmask="'alias': 'email'" placeholder=" " name="sf_EMAIL" value="<?=$arResult["EMAIL"]?>">
			<span class="field__label field__label--inside">Почта</span>
		</label>
		<label class="feedback-form__checkbox custom-checkbox">
			<input class="custom-checkbox__input" type="checkbox" data-required checked>
			<span class="custom-checkbox__label">
				Я согласен(а) на <a href="#">обработку персональных данных</a>
			</span>
		</label>
		<button type="submit"  onclick="this.form.recaptcha_token.value = window.recaptcha.getToken()" class="g-recaptcha button button--blue" name="OK" value="<?=GetMessage("subscr_form_button")?>"><?=GetMessage("subscr_form_button")?></button>		
	</form>
	<!--
	<form action="<?=$arResult["FORM_ACTION"]?>">

	<?foreach($arResult["RUBRICS"] as $itemID => $itemValue):?>
		<label for="sf_RUB_ID_<?=$itemValue["ID"]?>">
			<input type="checkbox" name="sf_RUB_ID[]" id="sf_RUB_ID_<?=$itemValue["ID"]?>" value="<?=$itemValue["ID"]?>"<?if($itemValue["CHECKED"]) echo " checked"?> /> <?=$itemValue["NAME"]?>
		</label><br />
	<?endforeach;?>

		<table border="0" cellspacing="0" cellpadding="2" align="center">
			<tr>
				<td><input type="text" name="sf_EMAIL" size="20" value="<?=$arResult["EMAIL"]?>" title="<?=GetMessage("subscr_form_email_title")?>" /></td>
			</tr>
			<tr>
				<td align="right"><input type="submit" name="OK" value="<?=GetMessage("subscr_form_button")?>" /></td>
			</tr>
		</table>
	</form>
	-->
<?

$frame->beginStub();
?>
	<form 1 action="<?=$arResult["FORM_ACTION"]?>" class="feedback__form feedback-form">
	<input type="hidden" name="recaptcha_token" value="">
		<input type="checkbox" name="sf_RUB_ID[]" id="sf_RUB_ID_2" value="2" checked style="display:none;">	
		<label class="feedback-form__item field field--dark">
			<input type="email" class="field__input" data-required inputmode="text" data-inputmask="'alias': 'email'" placeholder=" " name="sf_EMAIL" value="<?=$arResult["EMAIL"]?>">
			<span class="field__label field__label--inside">Почта</span>
		</label>
		<label class="feedback-form__checkbox custom-checkbox">
			<input class="custom-checkbox__input" type="checkbox" data-required checked>
			<span class="custom-checkbox__label">
				Я согласен(а) на <a href="#">обработку персональных данных</a>
			</span>
		</label>
		<button type="submit"  onclick="this.form.recaptcha_token.value = window.recaptcha.getToken()" class="g-recaptcha button button--blue" name="OK" value="<?=GetMessage("subscr_form_button")?>"><?=GetMessage("subscr_form_button")?></button>		
	</form>
<!--
	<form action="<?=$arResult["FORM_ACTION"]?>">

		<?foreach($arResult["RUBRICS"] as $itemID => $itemValue):?>
			<label for="sf_RUB_ID_<?=$itemValue["ID"]?>">
				<input type="checkbox" name="sf_RUB_ID[]" id="sf_RUB_ID_<?=$itemValue["ID"]?>" value="<?=$itemValue["ID"]?>" /> <?=$itemValue["NAME"]?>
			</label><br />
		<?endforeach;?>

		<table border="0" cellspacing="0" cellpadding="2" align="center">
			<tr>
				<td><input type="text" name="sf_EMAIL" size="20" value="" title="<?=GetMessage("subscr_form_email_title")?>" /></td>
			</tr>
			<tr>
				<td align="right"><input type="submit" name="OK" value="<?=GetMessage("subscr_form_button")?>" /></td>
			</tr>
		</table>
	</form>
		-->
<?
$frame->end();
?>

