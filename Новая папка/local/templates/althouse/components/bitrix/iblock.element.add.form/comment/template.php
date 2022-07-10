<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
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
$this->setFrameMode(false);
#echo '<pre style="">';print_r($_GET);echo '</pre>';
if (!empty($arResult["ERRORS"])):?>
	<?ShowError(implode("<br />", $arResult["ERRORS"]))?>
<?endif;
if ($arResult["MESSAGE"] <> ''):?>
	<?ShowNote($arResult["MESSAGE"])?>
<?endif?>
<form name="iblock_add" action="<?=POST_FORM_ACTION_URI?>" method="post" class="article-liked__form article-form" enctype="multipart/form-data">
	<?=bitrix_sessid_post()?>
	<input type="hidden" name="recaptcha_token" value="">
	<input type="hidden" name="PROPERTY[NAME][0]" value="Комментарий от <?=date("d.m.Y")?>-<?=time()?>">
	<input type="hidden" name="PROPERTY[19][0]" value="<?=$arParams['ARTICLE']?>">
	<label class="article-form__item field">
		<input name="PROPERTY[20][0]" type="text" class="field__input" placeholder=" ">
		<span class="field__label field__label--inside">Имя</span>
	</label>
	<label class="article-form__item field">
		<textarea name="PROPERTY[PREVIEW_TEXT][0]" class="field__textarea" placeholder=" "></textarea>
		<span class="field__label field__label--outside">Ваше сообщение</span>
	</label>
	<label class="article-form__checkbox custom-checkbox">
		<input class="custom-checkbox__input" type="checkbox" checked>
		<span class="custom-checkbox__label">
			Я согласен(а) на <a href="#">обработку персональных данных</a>
		</span>
	</label>
	<div class="article-form__button">
		<button type="submit" name="iblock_submit" value="<?=GetMessage("IBLOCK_FORM_SUBMIT")?>" class="button button--blue" onclick="this.form.recaptcha_token.value = window.recaptcha.getToken()">Отправить</button>
	</div>
</form>