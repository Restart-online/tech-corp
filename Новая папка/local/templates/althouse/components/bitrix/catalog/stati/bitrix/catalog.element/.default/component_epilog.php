<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;

/**
 * @var array $templateData
 * @var array $arParams
 * @var string $templateFolder
 * @global CMain $APPLICATION
 */

global $APPLICATION;

if (isset($templateData['TEMPLATE_THEME']))
{
	$APPLICATION->SetAdditionalCSS($templateFolder.'/themes/'.$templateData['TEMPLATE_THEME'].'/style.css');
	$APPLICATION->SetAdditionalCSS('/bitrix/css/main/themes/'.$templateData['TEMPLATE_THEME'].'/style.css', true);
}

if (!empty($templateData['TEMPLATE_LIBRARY']))
{
	$loadCurrency = false;

	if (!empty($templateData['CURRENCIES']))
	{
		$loadCurrency = Loader::includeModule('currency');
	}

	CJSCore::Init($templateData['TEMPLATE_LIBRARY']);
	if ($loadCurrency)
	{
		?>
		<script>
			BX.Currency.setCurrencies(<?=$templateData['CURRENCIES']?>);
		</script>
		<?
	}
}

if (isset($templateData['JS_OBJ']))
{
	?>
	<script>
		BX.ready(BX.defer(function(){
			if (!!window.<?=$templateData['JS_OBJ']?>)
			{
				window.<?=$templateData['JS_OBJ']?>.allowViewedCount(true);
			}
		}));
	</script>

	<?
	// check compared state
	if ($arParams['DISPLAY_COMPARE'])
	{
		$compared = false;
		$comparedIds = array();
		$item = $templateData['ITEM'];

		if (!empty($_SESSION[$arParams['COMPARE_NAME']][$item['IBLOCK_ID']]))
		{
			if (!empty($item['JS_OFFERS']))
			{
				foreach ($item['JS_OFFERS'] as $key => $offer)
				{
					if (array_key_exists($offer['ID'], $_SESSION[$arParams['COMPARE_NAME']][$item['IBLOCK_ID']]['ITEMS']))
					{
						if ($key == $item['OFFERS_SELECTED'])
						{
							$compared = true;
						}

						$comparedIds[] = $offer['ID'];
					}
				}
			}
			elseif (array_key_exists($item['ID'], $_SESSION[$arParams['COMPARE_NAME']][$item['IBLOCK_ID']]['ITEMS']))
			{
				$compared = true;
			}
		}

		if ($templateData['JS_OBJ'])
		{
			?>
			<script>
				BX.ready(BX.defer(function(){
					if (!!window.<?=$templateData['JS_OBJ']?>)
					{
						window.<?=$templateData['JS_OBJ']?>.setCompared('<?=$compared?>');

						<? if (!empty($comparedIds)): ?>
						window.<?=$templateData['JS_OBJ']?>.setCompareInfo(<?=CUtil::PhpToJSObject($comparedIds, false, true)?>);
						<? endif ?>
					}
				}));
			</script>
			<?
		}
	}

	// select target offer
	$request = Bitrix\Main\Application::getInstance()->getContext()->getRequest();
	$offerNum = false;
	$offerId = (int)$this->request->get('OFFER_ID');
	$offerCode = $this->request->get('OFFER_CODE');

	if ($offerId > 0 && !empty($templateData['OFFER_IDS']) && is_array($templateData['OFFER_IDS']))
	{
		$offerNum = array_search($offerId, $templateData['OFFER_IDS']);
	}
	elseif (!empty($offerCode) && !empty($templateData['OFFER_CODES']) && is_array($templateData['OFFER_CODES']))
	{
		$offerNum = array_search($offerCode, $templateData['OFFER_CODES']);
	}

	if (!empty($offerNum))
	{
		?>
		<script>
			BX.ready(function(){
				if (!!window.<?=$templateData['JS_OBJ']?>)
				{
					window.<?=$templateData['JS_OBJ']?>.setOffer(<?=$offerNum?>);
				}
			});
		</script>
		<?
	}
}
?>
<?
	$arrComment = array(
		"PROPERTY_ARTiCLE"=>$arResult['ID'],
		"IBLOCK_ID"=> 12
	);
	CModule::IncludeModule("iblock");
	$arResult['COMMENTS'] = array();
	$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM","PREVIEW_TEXT", "PROPERTY_NAME");
    $arFilter = Array("IBLOCK_ID"=> $arrComment["IBLOCK_ID"], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "PROPERTY_ARTiCLE"=>$arrComment['PROPERTY_ARTiCLE']);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNextElement()) {
        $arResult['COMMENST'][] = $ob->GetFields();
    }
?>
<section class="article__comments article-comments">
	<div class="__container">
		<div class="article-comments__title">Комментарии</div>
		<div class="article-comments__description">Здесь отображаются ваши комментарии и комментарии других пользователей</div>
		<div class="article-comments__list">
			<?
				if($arResult['COMMENST']) {
					foreach($arResult['COMMENST'] as $comment) {
			?>
				<div class="article-comments__item comment">
					<div class="comment__date"><?=$comment['DATE_ACTIVE_FROM']?></div>
					<div class="comment__name"><?=$comment['PROPERTY_NAME_VALUE']?></div>
					<div class="comment__text">
						<?=$comment['PREVIEW_TEXT']?>
					</div>
				</div>
			<?		
				}
				} else {
			?>
			<div class="article-comments__empty">Комментариев пока нет.</div>
			<?		
				}
			?>			
		</div>		
	</div>
</section>
<section class="article__liked article-liked">
	<div class="__container">
		<div class="article-liked__title">Понравилась статья?</div>
		<div class="article-liked__actions">
			<div class="article-liked__block">
				<div class="article-liked__subtitle">Оцените статью:</div>						
				<?
				$APPLICATION->IncludeComponent(
					"ylab:likes", 
					"article", 
				[
					'ELEMENT_ID' => $arResult['ID'],
					'ENTITY_ID' => $arParams['IBLOCK_ID'],
					'CACHE_TYPE' => 'N',
					'CACHE_TIME' => 0
				]);
				?>						
			</div>
			<div class="article-liked__block">
				<div class="article-liked__subtitle">Поделиться статьей:</div>
				<div class="article-liked__share">
					
					<a href="https://t.me/share/url?url=<?='http' . (empty($_SERVER['HTTPS']) ? '' : 's ' ) . '://' . $_SERVER['SERVER_NAME'] . $APPLICATION->GetCurPage()?>&title=<?=$arResult['NAME']?>&text=<?=$arResult['PREVIEW_TEXT']?>&utm_source=share2" rel="nofollow noopener" target="_blank" class="article-liked__social">
						<svg class="article-liked__icon">
							<use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/icons/sprite.svg#social-telegram"></use>
						</svg>
					</a>
					<a href="https://vk.com/share.php?url=<?='http' . (empty($_SERVER['HTTPS']) ? '' : 's ' ) . '://' . $_SERVER['SERVER_NAME'] . $APPLICATION->GetCurPage()?>&title=<?=$arResult['NAME']?>&utm_source=share2" rel="nofollow noopener" target="_blank" class="article-liked__social">
						<svg class="article-liked__icon">
							<use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/icons/sprite.svg#social-vk"></use>
						</svg>
					</a>
				</div>
			</div>
		</div>
		<div class="article-liked__add" id="comments">
			<div class="article-liked__caption">Оставьте свой комментарий:</div>
			<?$APPLICATION->IncludeComponent(
				"bitrix:iblock.element.add.form",
				"comment",
				Array(
					'ARTICLE' => $arResult['ID'],
					"CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
					"CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
					"CUSTOM_TITLE_DETAIL_PICTURE" => "",
					"CUSTOM_TITLE_DETAIL_TEXT" => "",
					"CUSTOM_TITLE_IBLOCK_SECTION" => "",
					"CUSTOM_TITLE_NAME" => "Имя",
					"CUSTOM_TITLE_PREVIEW_PICTURE" => "",
					"CUSTOM_TITLE_PREVIEW_TEXT" => "Ваше сообщение",
					"CUSTOM_TITLE_TAGS" => "",
					"DEFAULT_INPUT_SIZE" => "30",
					"DETAIL_TEXT_USE_HTML_EDITOR" => "N",
					"ELEMENT_ASSOC" => "CREATED_BY",
					"GROUPS" => array("2"),
					"IBLOCK_ID" => "12",
					"IBLOCK_TYPE" => "content",
					"LEVEL_LAST" => "N",
					"LIST_URL" => "",
					"MAX_FILE_SIZE" => "0",
					"MAX_LEVELS" => "100000",
					"MAX_USER_ENTRIES" => "100000",
					"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
					"PROPERTY_CODES" => array("NAME", "PREVIEW_TEXT", "19", "20"),
					"PROPERTY_CODES_REQUIRED" => array("NAME", "PREVIEW_TEXT", "19", "20"),
					"RESIZE_IMAGES" => "N",
					"SEF_FOLDER" => "/o-kompanii/otzyvy/",
					"SEF_MODE" => "Y",
					"STATUS" => "ANY",
					"STATUS_NEW" => "NEW",
					"USER_MESSAGE_ADD" => "Ваш комментарий добавлен!",
					"USER_MESSAGE_EDIT" => "Ваш комментарий изменен!",
					"USE_CAPTCHA" => "N",
					"AJAX_MODE" => "Y",
					"AJAX_OPTION_SHADOW" => "Y",
					"AJAX_OPTION_JUMP" => "N", // скроллить страницу до компонента
					"AJAX_OPTION_STYLE" => "Y", // подключать стили
					"AJAX_OPTION_HISTORY" => "N",
				)
			);?>
			<?/*$APPLICATION->IncludeComponent(
				"bitrix:iblock.element.add.form",
				"comment",
				Array(
					'ARTICLE' => $arResult['ID'],
					"CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
					"CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
					"CUSTOM_TITLE_DETAIL_PICTURE" => "",
					"CUSTOM_TITLE_DETAIL_TEXT" => "",
					"CUSTOM_TITLE_IBLOCK_SECTION" => "",
					"CUSTOM_TITLE_NAME" => "Имя",
					"CUSTOM_TITLE_PREVIEW_PICTURE" => "",
					"CUSTOM_TITLE_PREVIEW_TEXT" => "Ваше сообщение",
					"CUSTOM_TITLE_TAGS" => "",
					"DEFAULT_INPUT_SIZE" => "30",
					"DETAIL_TEXT_USE_HTML_EDITOR" => "N",
					"ELEMENT_ASSOC" => "CREATED_BY",
					"GROUPS" => array("2"),
					"IBLOCK_ID" => "12",
					"IBLOCK_TYPE" => "content",
					"LEVEL_LAST" => "N",
					"LIST_URL" => $APPLICATION->GetCurPage() . "#comments",
					"MAX_FILE_SIZE" => "0",
					"MAX_LEVELS" => "100000",
					"MAX_USER_ENTRIES" => "100000",
					"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
					"PROPERTY_CODES" => array("NAME", "PREVIEW_TEXT", "19", "20"),
					"PROPERTY_CODES_REQUIRED" => array("NAME", "PREVIEW_TEXT", "19", "20"),
					"RESIZE_IMAGES" => "N",
					"SEF_MODE" => "Y",
					"STATUS" => "ANY",
					"STATUS_NEW" => "NEW",
					"USER_MESSAGE_ADD" => "Ваш комментарий добавлен!",
					"USER_MESSAGE_EDIT" => "Ваш комментарий изменен!",
					"USE_CAPTCHA" => "N",
					"AJAX_MODE" => "Y",
					"AJAX_OPTION_SHADOW" => "Y",
					"AJAX_OPTION_JUMP" => "N", // скроллить страницу до компонента
					"AJAX_OPTION_STYLE" => "Y", // подключать стили
					"AJAX_OPTION_HISTORY" => "N",
				)
			);*/?>
			
		</div>
	</div>
</section>
<?
if($arResult['QUESTIONS']) {
?>
<section class="article__faq article-faq">
	<div class="__container">
		<div class="article-faq__caption">Часто задаваемые вопросы</div>
		<div class="evil-accordion article-faq__accordion">
<?
	CModule::IncludeModule("iblock");

	$arSelect = Array("ID", "NAME", "PREVIEW_TEXT");
	$arFilter = Array("IBLOCK_ID"=> 10, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID"=>$arResult['QUESTIONS']);
	$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
	while($ob = $res->GetNextElement()) {
		$arFields = $ob->GetFields();
	?>
		<div class="evil-accordion__item">
			<div class="evil-accordion__title"><?=$arFields["NAME"]?></div>
			<div class="evil-accordion__body">
				<div class="evil-accordion__content">
					<?=$arFields["PREVIEW_TEXT"]?>
				</div>
			</div>
		</div>
	<?	
	}
?>
		</div>
	</div>
</section>
<?
}
?>
<?
if($arResult['CONSULTANT']) {
	CModule::IncludeModule("iblock");
	$arSelect = Array("ID", "NAME", "PREVIEW_TEXT", "PREVIEW_PICTURE", "PROPERTY_INFO");
	$arFilter = Array("IBLOCK_ID"=> 14, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID"=>$arResult['CONSULTANT']);
	$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
	if($ob = $res->GetNextElement())
		$arFields = $ob->GetFields();
		$arProps = $ob->GetProperties();
	if($arFields["PREVIEW_PICTURE"])
		$arFields ["PREVIEW_PICTURE_RESIZE"] = CFile::ResizeImageGet($arFields["PREVIEW_PICTURE"], array('width'=>360, 'height'=>560), BX_RESIZE_IMAGE_EXACT); 
?>
<section class="article__consultation article-consultation">
	<div class="article-consultation__container">
		<div class="article-consultation__info">
			<div class="article-consultation__caption">
				<?=$arResult['H_CONSULTANT']?>
			</div>
			<div class="article-consultation__button">
				<button class="button button--blue" data-popup="#elementArticlePopup" data-popup-info="<?=$arResult['NAME_MODAL']?>" data-feedback><?=$arResult['NAME_BUTTON']?></button>
			</div>
		</div>
		<div class="article-consultation__right">
			<div class="article-consultation__picture">
				<picture><source srcset="<?=$arFields ["PREVIEW_PICTURE_RESIZE"]['src']?>" type="image/webp"><img src="<?=$arFields ["PREVIEW_PICTURE_RESIZE"]['src']?>" alt="<?=$arFields['NAME']?>" class="article-consultation__image"></picture>
				<div class="article-consultation__profile">
					<div class="article-consultation__name"><?=$arFields['NAME']?></div>
					<div class="article-consultation__position"><?=$arFields['PREVIEW_TEXT']?></div>
					<ul class="article-consultation__list">
						<?
						foreach($arFields ["PROPERTY_INFO_VALUE"] as $val) {
						?>
						<li class="article-consultation__skill"><?=$val?></li>
						<?
						}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<?
}
?>
<?
if($arResult['CASE']) {
?>
<section class="article__cases article-cases items-cases">
	<div class="items-cases__container">
		<div class="article-cases__caption">
			<div class="article-cases__title">Наши кейсы по IT аутсорсингу</div>
			<a href="/keysy/" class="article-cases__link">Смотреть все кейсы</a>
		</div>
		<div class="items-cases__body">
<?
	CModule::IncludeModule("iblock");
	$arSelect = Array("ID", "NAME", "PREVIEW_TEXT", "PREVIEW_PICTURE", "PROPERTY_COMPANY");
	$arFilter = Array("IBLOCK_ID"=> 5, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID"=>$arResult['CASE']);
	$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
	while($ob = $res->GetNextElement()) {
		$arFields = $ob->GetFields();
		$arFields ["PREVIEW_PICTURE_RESIZE"] = CFile::ResizeImageGet($arFields["PREVIEW_PICTURE"], array('width'=>360, 'height'=>280), BX_RESIZE_IMAGE_EXACT); 

	?>
		<div class="items-cases__item item-itemsCases">
			<a href="#" class="item-itemsCases__image">
				<picture><source srcset="<?=$arFields ["PREVIEW_PICTURE_RESIZE"]['src']?>" type="image/webp"><img src="<?=$arFields ["PREVIEW_PICTURE_RESIZE"]['src']?>" alt="<?=$arFields ["NAME"]?>"></picture>
				<div class="item-itemsCases__company"><?=$arFields ["PROPERTY_COMPANY_VALUE"]?></div>
			</a>
			<a href="#" class="item-itemsCases__name"><?=$arFields ["NAME"]?></a>
			<div class="item-itemsCases__text">
			<?=$arFields ["PREVIEW_TEXT"]?>
			</div>
		</div>		
	<?	
	}
?>
		</div>
	</div>
</section>
<?
}
?>
<?
if($arResult['FACTS']) {
?>
<section class="article__slider article-slider">
	<div class="article-slider__container">
		<div class="article-slider__left">
			<div class="article-slider__carousel">
				<div class="swiper js-article-slider__left">
					<div class="swiper-wrapper">
<?
	CModule::IncludeModule("iblock");
	$arrFacts = array();
	$arSelect = Array("ID", "NAME", "PREVIEW_TEXT", "PREVIEW_PICTURE",);
	$arFilter = Array("IBLOCK_ID"=> 13, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID"=>$arResult['FACTS']);
	$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
	while($ob = $res->GetNextElement()) {
		$arFields = $ob->GetFields();
		$arFields ["PREVIEW_PICTURE_RESIZE"] = CFile::ResizeImageGet($arFields["PREVIEW_PICTURE"], array('width'=>570, 'height'=>444), BX_RESIZE_IMAGE_EXACT); 
		$arrFacts[] = $arFields;
	?>
		<div class="swiper-slide">
			<div class="article-slider__caption">Факт дня</div>
			<div class="article-slider__description">
				<?=$arFields["PREVIEW_TEXT"]?>
			</div>
		</div>		
	<?	
	}
?>
</div>
				</div>
				<div class="article-slider__control">
					<svg class="article-slider__arrow article-slider__arrow--prev">
						<use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/icons/sprite.svg#article-slider-arrow"></use>
					</svg>
					<div class="article-slider__pagination"></div>
					<svg class="article-slider__arrow article-slider__arrow--next">
						<use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/icons/sprite.svg#article-slider-arrow"></use>
					</svg>
				</div>
			</div>
		</div>
		<div class="article-slider__right">
			<div class="article-slider__gallery">
				<div class="swiper js-article-slider__right">
					<div class="swiper-wrapper">
						<?
						foreach($arrFacts as $f) {
						?>
						<div class="swiper-slide article-slider__image" style="background-image: url('<?=$f["PREVIEW_PICTURE_RESIZE"]['src']?>')"></div>
						<?
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?
}
?>
