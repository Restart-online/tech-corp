<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>
<?
//echo "<pre>Template arParams: "; print_r($arParams); echo "</pre>";
//echo "<pre>Template arResult: "; print_r($arResult); echo "</pre>";
//exit();
?>

<?if (count($arResult["ERRORS"])):?>
	<?=ShowError(implode("<br />", $arResult["ERRORS"]))?>
<?endif?>
<?if ($arResult["MESSAGE"] <> ''):?>
	<?=ShowNote($arResult["MESSAGE"])?>
<?endif?>
<form name="iblock_add" action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data" class="callback-footer__body">
	<input type="hidden" name="recaptcha_token" value="">
	<input type="hidden" name="PROPERTY[NAME][0]" value="Отзыв от <?=date("d.m.Y")?>-<?=time()?>">
	<?=bitrix_sessid_post()?>
	<?if ($arParams["MAX_FILE_SIZE"] > 0):?><input type="hidden" name="MAX_FILE_SIZE" value="<?=$arParams["MAX_FILE_SIZE"]?>" /><?endif?>
	<div class="callback-footer__row">
		<div class="item-reviews__ratings">
			<div class="rating slide-review__rating rating-review rating_set">
				<div class="rating-review__head">Уровень обслуживания</div>
				<div class="rating__body rating-review__body">
					<div class="rating__active rating-review__active"></div>
					<div class="rating__items rating-review__items">
						<input type="radio" class="rating__item rating-review__item" value="1" name="PROPERTY[71][0]">
						<input type="radio" class="rating__item rating-review__item" value="2" name="PROPERTY[71][0]">
						<input type="radio" class="rating__item rating-review__item" value="3" name="PROPERTY[71][0]">
						<input type="radio" class="rating__item rating-review__item" value="4" name="PROPERTY[71][0]">
						<input type="radio" class="rating__item rating-review__item" value="5" name="PROPERTY[71][0]" checked>
					</div>
				</div>
				<div class="rating__value rating-review__value">5</div>
			</div>
			<div class="rating slide-review__rating rating-review rating_set">
				<div class="rating-review__head">Скорость реагирования</div>
				<div class="rating__body rating-review__body">
					<div class="rating__active rating-review__active"></div>
					<div class="rating__items rating-review__items">
						<input type="radio" class="rating__item rating-review__item" value="1" name="PROPERTY[72][0]">
						<input type="radio" class="rating__item rating-review__item" value="2" name="PROPERTY[72][0]">
						<input type="radio" class="rating__item rating-review__item" value="3" name="PROPERTY[72][0]">
						<input type="radio" class="rating__item rating-review__item" value="4" name="PROPERTY[72][0]">
						<input type="radio" class="rating__item rating-review__item" value="5" name="PROPERTY[72][0]" checked>
					</div>
				</div>
				<div class="rating__value rating-review__value">5</div>
			</div>
			<div class="rating slide-review__rating rating-review rating_set">
				<div class="rating-review__head">Качество работ</div>
				<div class="rating__body rating-review__body">
					<div class="rating__active rating-review__active"></div>
					<div class="rating__items rating-review__items">
						<input type="radio" class="rating__item rating-review__item" value="1" name="PROPERTY[73][0]">
						<input type="radio" class="rating__item rating-review__item" value="2" name="PROPERTY[73][0]">
						<input type="radio" class="rating__item rating-review__item" value="3" name="PROPERTY[73][0]">
						<input type="radio" class="rating__item rating-review__item" value="4" name="PROPERTY[73][0]">
						<input type="radio" class="rating__item rating-review__item" value="5" name="PROPERTY[73][0]" checked>
					</div>
				</div>
				<div class="rating__value rating-review__value">5</div>
			</div>
		</div>
	</div>
	<div class="callback-footer__row">
		<input type="text" name="PROPERTY[PREVIEW_TEXT][0]" id="" data-required class="callback-footer__input">
		<label for="" class="callback-footer__label">имя</label>
	</div>
	<div class="callback-footer__row">
		<input type="text" name="PROPERTY[30][0]" id="" data-required class="callback-footer__input">
		<label for="" class="callback-footer__label">Должность</label>
	</div>
	<div class="callback-footer__row">
		<input type="text" name="PROPERTY[75][0]" id="" data-required data-inputmask-clearincomplete="true" data-inputmask="'mask':'+7 (999) 999 99 99'" class="callback-footer__input">
		<label for="" class="callback-footer__label">номер телефона</label>
	</div>
	<div class="callback-footer__row">
		<input type="text" name="PROPERTY[76][0]" id="" data-required="email" data-inputmask="'alias': 'email'" class="callback-footer__input">
		<label for="" class="callback-footer__label">e-mail</label>
	</div>
	<div class="callback-footer__row">
		<textarea type="text" name="PROPERTY[DETAIL_TEXT][0]" id="" placeholder="Отзыв" class="callback-footer__textarea"></textarea>
		
	</div>
	<div class="callback-footer__row callback-footer__row_file">
		<input type="hidden" name="PROPERTY[74][0]" value="">
		<input type="file" name="PROPERTY_FILE_74_0" data-maxsize="5" data-formaterror="Только файлы формата pdf" data-sizeerror="Не больше 5 мб" accept="application/pdf" id="callback-footer__file" class="callback-footer__fileinput">
		<label for="callback-footer__file" class="callback-footer__agree rectangle_btn callback-footer__agree_file">Загрузить скан документа/письма/файла/пр.</label>
	</div>
	<div class="callback-footer__row">
		<div class="callback-footer__preview">
		</div>
	</div>
	<div class="callback-footer__row">
		<input type="checkbox" name="" data-required id="callback-footer__checkbox_popup" checked class="callback-footer__checkbox">
		<label for="callback-footer__checkbox_popup" class="callback-footer__agree"><span>Я согласен(а) на</span><a href="#" class="callback-footer__link">обработку персональных данных</a>
		</label>
	</div>
	<div class="callback-footer__row">
		<button type="submit" class="rectangle_btn callback-footer__submit" name="iblock_submit" value="<?=GetMessage("IBLOCK_FORM_SUBMIT")?>" onclick="this.form.recaptcha_token.value = window.recaptcha.getToken()">Отправить</button>
	</div>
</form>