<?php if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();

if (method_exists($this, 'setFrameMode')) {
	$this->setFrameMode(true);
}

if ($arResult['ACTION']['status']=='error') {
	ShowError($arResult['ACTION']['message']);
} elseif ($arResult['ACTION']['status']=='ok') {
	ShowNote($arResult['ACTION']['message']);
}
?>
<div id="asd_subscribe_res" style="display: none;"></div>
<form action="<?= POST_FORM_ACTION_URI?>" method="post" id="asd_subscribe_form" class="feedback__form feedback-form">
	<?= bitrix_sessid_post()?>
	<input type="hidden" name="asd_subscribe" value="Y" />
	<input type="hidden" name="charset" value="<?= SITE_CHARSET?>" />
	<input type="hidden" name="site_id" value="<?= SITE_ID?>" />
	<input type="hidden" name="asd_rubrics" value="<?= $arParams['RUBRICS_STR']?>" />
	<input type="hidden" name="asd_format" value="<?= $arParams['FORMAT']?>" />
	<input type="hidden" name="asd_show_rubrics" value="<?= $arParams['SHOW_RUBRICS']?>" />
	<input type="hidden" name="asd_not_confirm" value="<?= $arParams['NOT_CONFIRM']?>" />
	<input type="hidden" name="asd_key" value="<?= md5($arParams['JS_KEY'].$arParams['RUBRICS_STR'].$arParams['SHOW_RUBRICS'].$arParams['NOT_CONFIRM'])?>" />
	<label class="feedback-form__item field field--dark">
		<input type="email" class="field__input"  name="asd_email" data-required inputmode="text" data-inputmask="'alias': 'email'" placeholder=" ">
		<span class="field__label field__label--inside">Почта</span>
	</label>
	<label class="feedback-form__checkbox custom-checkbox">
		<input class="custom-checkbox__input" type="checkbox" data-required checked>
		<span class="custom-checkbox__label">
			Я согласен(а) на <a href="#">обработку персональных данных</a>
		</span>
	</label>
	<?if (isset($arResult['RUBRICS'])):?>
		<br/>
		<?foreach($arResult['RUBRICS'] as $RID => $title):?>
		<input type="checkbox" name="asd_rub[]" id="rub<?= $RID?>" value="<?= $RID?>" />
		<label for="rub<?= $RID?>"><?= $title?></label><br/>
		<?endforeach;?>
	<?endif;?>
	<button type="submit" name="asd_submit" id="asd_subscribe_submit" value="<?=GetMessage("ASD_SUBSCRIBEQUICK_PODPISATQSA")?>" class="button button--blue">Подписаться</button>
</form>
<?/*
<form action="<?= POST_FORM_ACTION_URI?>" method="post" id="asd_subscribe_form">
	<?= bitrix_sessid_post()?>
	<input type="hidden" name="asd_subscribe" value="Y" />
	<input type="hidden" name="charset" value="<?= SITE_CHARSET?>" />
	<input type="hidden" name="site_id" value="<?= SITE_ID?>" />
	<input type="hidden" name="asd_rubrics" value="<?= $arParams['RUBRICS_STR']?>" />
	<input type="hidden" name="asd_format" value="<?= $arParams['FORMAT']?>" />
	<input type="hidden" name="asd_show_rubrics" value="<?= $arParams['SHOW_RUBRICS']?>" />
	<input type="hidden" name="asd_not_confirm" value="<?= $arParams['NOT_CONFIRM']?>" />
	<input type="hidden" name="asd_key" value="<?= md5($arParams['JS_KEY'].$arParams['RUBRICS_STR'].$arParams['SHOW_RUBRICS'].$arParams['NOT_CONFIRM'])?>" />
	<input type="text" name="asd_email" value="" />
	<input type="submit" name="asd_submit" id="asd_subscribe_submit" value="<?=GetMessage("ASD_SUBSCRIBEQUICK_PODPISATQSA")?>" />
	<?if (isset($arResult['RUBRICS'])):?>
		<br/>
		<?foreach($arResult['RUBRICS'] as $RID => $title):?>
		<input type="checkbox" name="asd_rub[]" id="rub<?= $RID?>" value="<?= $RID?>" />
		<label for="rub<?= $RID?>"><?= $title?></label><br/>
		<?endforeach;?>
	<?endif;?>
</form>
*/?>
