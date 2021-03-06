<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
        </main>
        <footer class="footer">
				<a href="#" data-goto=".wrapper" data-onscroll="150" class="uparrow">
					<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M39.8498 22.3033L33.4777 15.8809L34.5644 14.7856L42.7143 22.9999L34.5644 31.2142L33.4777 30.119L39.6955 23.8522L3.28577 23.8522V22.3033L39.8498 22.3033Z" fill="#fff"/>
					</svg>
				</a>
			<div class="footer__black"></div>
			<div class="footer__container">
				<div class="footer__callback callback-footer">
					<div class="footer__title callback-footer__title">
							<?$APPLICATION->IncludeFile(
								"/local/include/footer/callback__title.php", 
								Array(), 
								Array(
									"MODE"      => "html",                                           
									"NAME"      => "Редактирование включаемой области",      
									"TEMPLATE"  => ""                    
								));
							?>
						</div>
					<?$APPLICATION->IncludeComponent(
						"bitrix:form",
						"footer",
						Array(
							"AJAX_MODE" => "Y",
							"AJAX_OPTION_ADDITIONAL" => "",
							"AJAX_OPTION_HISTORY" => "N",
							"AJAX_OPTION_JUMP" => "N",
							"AJAX_OPTION_STYLE" => "N",
							"CACHE_TIME" => "3600",
							"CACHE_TYPE" => "A",
							"CHAIN_ITEM_LINK" => "",
							"CHAIN_ITEM_TEXT" => "",
							"EDIT_ADDITIONAL" => "N",
							"EDIT_STATUS" => "N",
							"IGNORE_CUSTOM_TEMPLATE" => "N",
							"NAME_TEMPLATE" => "",
							"NOT_SHOW_FILTER" => array("", ""),
							"NOT_SHOW_TABLE" => array("", ""),
							"RESULT_ID" => $_REQUEST['RESULT_ID'],
							"SEF_MODE" => "N",
							"SHOW_ADDITIONAL" => "N",
							"SHOW_ANSWER_VALUE" => "N",
							"SHOW_EDIT_PAGE" => "N",
							"SHOW_LIST_PAGE" => "N",
							"SHOW_STATUS" => "N",
							"SHOW_VIEW_PAGE" => "N",
							"START_PAGE" => "new",
							"SUCCESS_URL" => "",
							"USE_EXTENDED_ERRORS" => "Y",
							"VARIABLE_ALIASES" => Array(
								"action" => "action"
							),
							"WEB_FORM_ID" => "1"
						)
					);?>
				</div>
				<div class="footer__contacts contacts-footer">
					<div class="contacts-footer__body">
						<div class="contacts-footer__item">
							<div class="contacts-footer__subtitle">Наши услуги</div>
							<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"footer",
	Array(
		"CUSTOM_SECTION_SORT" => array("UF_SORT" => "ASC"),
		"ADD_SECTIONS_CHAIN" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COUNT_ELEMENTS" => "N",
		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
		"FILTER_NAME" => "sectionsFilter",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "content",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array("", ""),
		"SECTION_ID" => "",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array("", ""),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "1",
		"VIEW_MODE" => "LIST"
	)
);?>
							<?/*$APPLICATION->IncludeFile(
									"/local/include/footer/social.php", 
									Array(), 
									Array(
										"MODE"      => "html",                                           
										"NAME"      => "Редактирование включаемой области",      
										"TEMPLATE"  => ""                    
									));*/
								?>
							<!--		
							<ul class="contacts-footer__list">
								<li class="contacts-footer__li">
								<a href="#" class="contacts-footer__link">Vkontakte</a>
								
							
									<a href="#" class="contacts-footer__link">Vkontakte</a>
								
								</li>
								<li class="contacts-footer__li">
									<a href="#" class="contacts-footer__link">Twitter</a>
								</li>
							</ul>
							-->
						</div>
						<div class="contacts-footer__item">
							<div class="contacts-footer__subtitle">Наш офис</div>
							<ul class="contacts-footer__list">
								<li class="contacts-footer__li"><a href="#" class="contacts-footer__link">
								<?$APPLICATION->IncludeFile(
										"/local/include/footer/address.php", 
										Array(), 
										Array(
											"MODE"      => "html",                                           
											"NAME"      => "Редактирование включаемой области",      
											"TEMPLATE"  => ""                    
										));
									?>
									
								</a></li>
								<li class="contacts-footer__li"><a href="#" class="contacts-footer__link">
									<?$APPLICATION->IncludeFile(
										"/local/include/footer/email.php", 
										Array(), 
										Array(
											"MODE"      => "text",                                           
											"NAME"      => "Редактирование включаемой области",      
											"TEMPLATE"  => ""                    
										));
									?>
									</a></li>
								<li class="contacts-footer__li"><a href="#" class="contacts-footer__link">
								<?$APPLICATION->IncludeFile(
									"/local/include/header/phone1.php", 
									Array(), 
									Array(
										"MODE"      => "text",                                           
										"NAME"      => "Редактирование включаемой области",      
										"TEMPLATE"  => ""                    
									));
								?>
								</a></li>
								<li class="contacts-footer__li"><a href="#" class="contacts-footer__link">
								<?$APPLICATION->IncludeFile(
									"/local/include/header/phone2.php", 
									Array(), 
									Array(
										"MODE"      => "text",                                           
										"NAME"      => "Редактирование включаемой области",      
										"TEMPLATE"  => ""                    
									));
								?>
								</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="footer__menu menu-footer">
					 <?$APPLICATION->IncludeComponent(
						"bitrix:menu",
						"footer",
						Array(
							"ALLOW_MULTI_SELECT" => "N",
							"CHILD_MENU_TYPE" => "left",
							"DELAY" => "Y",
							"MAX_LEVEL" => "1",
							"MENU_CACHE_GET_VARS" => array(""),
							"MENU_CACHE_TIME" => "3600",
							"MENU_CACHE_TYPE" => "A",
							"MENU_CACHE_USE_GROUPS" => "N",
							"ROOT_MENU_TYPE" => "footer",
							"USE_EXT" => "Y"
						)
					);?>					
					
				</div>
				<div class="footer__bottom bottom-footer">
					<a href="https://restart-online.com/" target="_blank" class="bottom-footer__restart">
						
						<?$APPLICATION->IncludeFile(
									"/local/include/footer/logo.php", 
									Array(), 
									Array(
										"MODE"      => "html",                                           
										"NAME"      => "Редактирование включаемой области",      
										"TEMPLATE"  => ""                    
									));
								?>
					</a>
					<div class="bottom-footer__copy"><?=date('Y')?> | 
					<?$APPLICATION->IncludeFile(
									"/local/include/footer/copy.php", 
									Array(), 
									Array(
										"MODE"      => "text",                                           
										"NAME"      => "Редактирование включаемой области",      
										"TEMPLATE"  => ""                    
									));
								?>
					</div>
					<div class="bottom-footer__forminfo">
							<?$APPLICATION->IncludeFile(
									"/local/include/footer/police.php", 
									Array(), 
									Array(
										"MODE"      => "html",                                           
										"NAME"      => "Редактирование включаемой области",      
										"TEMPLATE"  => ""                    
									));
								?>
					</div>
				</div>
			</div>
			<div class="cookies _hide" data-delay="3000">
				<div class="cookies__container container">
					<div class="cookies__content">
						<span>
						<?$APPLICATION->IncludeFile(
								"/local/include/footer/cookies__content.php", 
								Array(), 
								Array(
									"MODE"      => "text",                                           
									"NAME"      => "Редактирование включаемой области",      
									"TEMPLATE"  => ""                    
								));
							?>
						<button class="cookies__btn">Закрыть</button>
					</div>
				</div>
			</div>
		</footer>
	</div>
	<div id="aboutBenefitsPopup" aria-hidden="true" class="popup blueButtonPopup">
		<div class="popup__wrapper blueButtonPopup__wrapper">
			<div class="popup__content blueButtonPopup__content">
				<button data-close type="button" class="popup__close blueButtonPopup__close">
					<img src="<?=SITE_TEMPLATE_PATH?>/img/icons/close.svg" alt="image">
				</button>
				<div class="popup__text blueButtonPopup__text">
					<div class="footer__title callback-footer__title">aboutBenefitsPopup</div>
					<?$APPLICATION->IncludeComponent(
						"bitrix:form",
						"footer",
						Array(
							"AJAX_MODE" => "Y",
							"AJAX_OPTION_ADDITIONAL" => "",
							"AJAX_OPTION_HISTORY" => "N",
							"AJAX_OPTION_JUMP" => "N",
							"AJAX_OPTION_STYLE" => "N",
							"CACHE_TIME" => "3600",
							"CACHE_TYPE" => "A",
							"CHAIN_ITEM_LINK" => "",
							"CHAIN_ITEM_TEXT" => "",
							"EDIT_ADDITIONAL" => "N",
							"EDIT_STATUS" => "N",
							"IGNORE_CUSTOM_TEMPLATE" => "N",
							"NAME_TEMPLATE" => "",
							"NOT_SHOW_FILTER" => array("", ""),
							"NOT_SHOW_TABLE" => array("", ""),
							"RESULT_ID" => $_REQUEST['RESULT_ID'],
							"SEF_MODE" => "N",
							"SHOW_ADDITIONAL" => "N",
							"SHOW_ANSWER_VALUE" => "N",
							"SHOW_EDIT_PAGE" => "N",
							"SHOW_LIST_PAGE" => "N",
							"SHOW_STATUS" => "N",
							"SHOW_VIEW_PAGE" => "N",
							"START_PAGE" => "new",
							"SUCCESS_URL" => "",
							"USE_EXTENDED_ERRORS" => "Y",
							"VARIABLE_ALIASES" => Array(
								"action" => "action"
							),
							"WEB_FORM_ID" => "3"
						)
					);?>
				</div>

			</div>
		</div>
	</div>
	<div id="aboutWarrantyPopup" aria-hidden="true" class="popup blueButtonPopup">
		<div class="popup__wrapper blueButtonPopup__wrapper">
			<div class="popup__content blueButtonPopup__content">
				<button data-close type="button" class="popup__close blueButtonPopup__close">
					<img src="<?=SITE_TEMPLATE_PATH?>/img/icons/close.svg" alt="image">
				</button>
				<div class="popup__text blueButtonPopup__text">
					<div class="footer__title callback-footer__title">aboutWarrantyPopup</div>
					<?$APPLICATION->IncludeComponent(
						"bitrix:form",
						"footer",
						Array(
							"AJAX_MODE" => "Y",
							"AJAX_OPTION_ADDITIONAL" => "",
							"AJAX_OPTION_HISTORY" => "N",
							"AJAX_OPTION_JUMP" => "N",
							"AJAX_OPTION_STYLE" => "N",
							"CACHE_TIME" => "3600",
							"CACHE_TYPE" => "A",
							"CHAIN_ITEM_LINK" => "",
							"CHAIN_ITEM_TEXT" => "",
							"EDIT_ADDITIONAL" => "N",
							"EDIT_STATUS" => "N",
							"IGNORE_CUSTOM_TEMPLATE" => "N",
							"NAME_TEMPLATE" => "",
							"NOT_SHOW_FILTER" => array("", ""),
							"NOT_SHOW_TABLE" => array("", ""),
							"RESULT_ID" => $_REQUEST['RESULT_ID'],
							"SEF_MODE" => "N",
							"SHOW_ADDITIONAL" => "N",
							"SHOW_ANSWER_VALUE" => "N",
							"SHOW_EDIT_PAGE" => "N",
							"SHOW_LIST_PAGE" => "N",
							"SHOW_STATUS" => "N",
							"SHOW_VIEW_PAGE" => "N",
							"START_PAGE" => "new",
							"SUCCESS_URL" => "",
							"USE_EXTENDED_ERRORS" => "Y",
							"VARIABLE_ALIASES" => Array(
								"action" => "action"
							),
							"WEB_FORM_ID" => "4"
						)
					);?>
				</div>
			</div>
		</div>
	</div>
	<div id="sectionServicePopup" aria-hidden="true" class="popup blueButtonPopup">
		<div class="popup__wrapper blueButtonPopup__wrapper">
			<div class="popup__content blueButtonPopup__content">
				<button data-close type="button" class="popup__close blueButtonPopup__close">
					<img src="<?=SITE_TEMPLATE_PATH?>/img/icons/close.svg" alt="image">
				</button>
				<div class="popup__text blueButtonPopup__text">
					<div class="footer__title callback-footer__title">aboutWarrantyPopup</div>
					<?$APPLICATION->IncludeComponent(
						"bitrix:form",
						"footer",
						Array(
							"AJAX_MODE" => "Y",
							"AJAX_OPTION_ADDITIONAL" => "",
							"AJAX_OPTION_HISTORY" => "N",
							"AJAX_OPTION_JUMP" => "N",
							"AJAX_OPTION_STYLE" => "N",
							"CACHE_TIME" => "3600",
							"CACHE_TYPE" => "A",
							"CHAIN_ITEM_LINK" => "",
							"CHAIN_ITEM_TEXT" => "",
							"EDIT_ADDITIONAL" => "N",
							"EDIT_STATUS" => "N",
							"IGNORE_CUSTOM_TEMPLATE" => "N",
							"NAME_TEMPLATE" => "",
							"NOT_SHOW_FILTER" => array("", ""),
							"NOT_SHOW_TABLE" => array("", ""),
							"RESULT_ID" => $_REQUEST['RESULT_ID'],
							"SEF_MODE" => "N",
							"SHOW_ADDITIONAL" => "N",
							"SHOW_ANSWER_VALUE" => "N",
							"SHOW_EDIT_PAGE" => "N",
							"SHOW_LIST_PAGE" => "N",
							"SHOW_STATUS" => "N",
							"SHOW_VIEW_PAGE" => "N",
							"START_PAGE" => "new",
							"SUCCESS_URL" => "",
							"USE_EXTENDED_ERRORS" => "Y",
							"VARIABLE_ALIASES" => Array(
								"action" => "action"
							),
							"WEB_FORM_ID" => "8"
						)
					);?>
				</div>
			</div>
		</div>
	</div>
	<div id="elementServicePopup" aria-hidden="true" class="popup blueButtonPopup">
		<div class="popup__wrapper blueButtonPopup__wrapper">
			<div class="popup__content blueButtonPopup__content">
				<button data-close type="button" class="popup__close blueButtonPopup__close">
					<img src="<?=SITE_TEMPLATE_PATH?>/img/icons/close.svg" alt="image">
				</button>
				<div class="popup__text blueButtonPopup__text">
					<div class="footer__title callback-footer__title">aboutWarrantyPopup</div>
					<?$APPLICATION->IncludeComponent(
						"bitrix:form",
						"footer",
						Array(
							"AJAX_MODE" => "Y",
							"AJAX_OPTION_ADDITIONAL" => "",
							"AJAX_OPTION_HISTORY" => "N",
							"AJAX_OPTION_JUMP" => "N",
							"AJAX_OPTION_STYLE" => "N",
							"CACHE_TIME" => "3600",
							"CACHE_TYPE" => "A",
							"CHAIN_ITEM_LINK" => "",
							"CHAIN_ITEM_TEXT" => "",
							"EDIT_ADDITIONAL" => "N",
							"EDIT_STATUS" => "N",
							"IGNORE_CUSTOM_TEMPLATE" => "N",
							"NAME_TEMPLATE" => "",
							"NOT_SHOW_FILTER" => array("", ""),
							"NOT_SHOW_TABLE" => array("", ""),
							"RESULT_ID" => $_REQUEST['RESULT_ID'],
							"SEF_MODE" => "N",
							"SHOW_ADDITIONAL" => "N",
							"SHOW_ANSWER_VALUE" => "N",
							"SHOW_EDIT_PAGE" => "N",
							"SHOW_LIST_PAGE" => "N",
							"SHOW_STATUS" => "N",
							"SHOW_VIEW_PAGE" => "N",
							"START_PAGE" => "new",
							"SUCCESS_URL" => "",
							"USE_EXTENDED_ERRORS" => "Y",
							"VARIABLE_ALIASES" => Array(
								"action" => "action"
							),
							"WEB_FORM_ID" => "9"
						)
					);?>
				</div>
			</div>
		</div>
	</div>
	<div id="elementArticlePopup" aria-hidden="true" class="popup blueButtonPopup">
		<div class="popup__wrapper blueButtonPopup__wrapper">
			<div class="popup__content blueButtonPopup__content">
				<button data-close type="button" class="popup__close blueButtonPopup__close">
					<img src="<?=SITE_TEMPLATE_PATH?>/img/icons/close.svg" alt="image">
				</button>
				<div class="popup__text blueButtonPopup__text">
					<div class="footer__title callback-footer__title">aboutWarrantyPopup</div>
					<?$APPLICATION->IncludeComponent(
						"bitrix:form",
						"footer",
						Array(
							"AJAX_MODE" => "Y",
							"AJAX_OPTION_ADDITIONAL" => "",
							"AJAX_OPTION_HISTORY" => "N",
							"AJAX_OPTION_JUMP" => "N",
							"AJAX_OPTION_STYLE" => "N",
							"CACHE_TIME" => "3600",
							"CACHE_TYPE" => "A",
							"CHAIN_ITEM_LINK" => "",
							"CHAIN_ITEM_TEXT" => "",
							"EDIT_ADDITIONAL" => "N",
							"EDIT_STATUS" => "N",
							"IGNORE_CUSTOM_TEMPLATE" => "N",
							"NAME_TEMPLATE" => "",
							"NOT_SHOW_FILTER" => array("", ""),
							"NOT_SHOW_TABLE" => array("", ""),
							"RESULT_ID" => $_REQUEST['RESULT_ID'],
							"SEF_MODE" => "N",
							"SHOW_ADDITIONAL" => "N",
							"SHOW_ANSWER_VALUE" => "N",
							"SHOW_EDIT_PAGE" => "N",
							"SHOW_LIST_PAGE" => "N",
							"SHOW_STATUS" => "N",
							"SHOW_VIEW_PAGE" => "N",
							"START_PAGE" => "new",
							"SUCCESS_URL" => "",
							"USE_EXTENDED_ERRORS" => "Y",
							"VARIABLE_ALIASES" => Array(
								"action" => "action"
							),
							"WEB_FORM_ID" => "10"
						)
					);?>
				</div>
			</div>
		</div>
	</div>
	<div id="actionHomePopup" aria-hidden="true" class="popup blueButtonPopup">
		<div class="popup__wrapper blueButtonPopup__wrapper">
			<div class="popup__content blueButtonPopup__content">
				<button data-close type="button" class="popup__close blueButtonPopup__close">
					<img src="<?=SITE_TEMPLATE_PATH?>/img/icons/close.svg" alt="image">
				</button>
				<div class="popup__text blueButtonPopup__text">
					<div class="footer__title callback-footer__title">aboutWarrantyPopup</div>
					<?$APPLICATION->IncludeComponent(
						"bitrix:form",
						"index_action",
						Array(
							"AJAX_MODE" => "Y",
							"AJAX_OPTION_ADDITIONAL" => "",
							"AJAX_OPTION_HISTORY" => "N",
							"AJAX_OPTION_JUMP" => "N",
							"AJAX_OPTION_STYLE" => "N",
							"CACHE_TIME" => "3600",
							"CACHE_TYPE" => "A",
							"CHAIN_ITEM_LINK" => "",
							"CHAIN_ITEM_TEXT" => "",
							"EDIT_ADDITIONAL" => "N",
							"EDIT_STATUS" => "N",
							"IGNORE_CUSTOM_TEMPLATE" => "N",
							"NAME_TEMPLATE" => "",
							"NOT_SHOW_FILTER" => array("", ""),
							"NOT_SHOW_TABLE" => array("", ""),
							"RESULT_ID" => $_REQUEST['RESULT_ID'],
							"SEF_MODE" => "N",
							"SHOW_ADDITIONAL" => "N",
							"SHOW_ANSWER_VALUE" => "N",
							"SHOW_EDIT_PAGE" => "N",
							"SHOW_LIST_PAGE" => "N",
							"SHOW_STATUS" => "N",
							"SHOW_VIEW_PAGE" => "N",
							"START_PAGE" => "new",
							"SUCCESS_URL" => "",
							"USE_EXTENDED_ERRORS" => "Y",
							"VARIABLE_ALIASES" => Array(
								"action" => "action"
							),
							"WEB_FORM_ID" => "11"
						)
					);?>
				</div>
			</div>
		</div>
	</div>
	<div id="calculatorPopup" aria-hidden="true" class="popup blueButtonPopup">
		<div class="popup__wrapper blueButtonPopup__wrapper">
			<div class="popup__content blueButtonPopup__content">
				<button data-close type="button" class="popup__close blueButtonPopup__close">
					<img src="<?=SITE_TEMPLATE_PATH?>/img/icons/close.svg" alt="image">
				</button>
				<div class="popup__text blueButtonPopup__text">
					<div class="footer__title callback-footer__title">Забронировать</div>
					<?$APPLICATION->IncludeComponent(
						"bitrix:form",
						"service_form",
						Array(
							"AJAX_MODE" => "Y",
							"AJAX_OPTION_ADDITIONAL" => "",
							"AJAX_OPTION_HISTORY" => "N",
							"AJAX_OPTION_JUMP" => "N",
							"AJAX_OPTION_STYLE" => "N",
							"CACHE_TIME" => "3600",
							"CACHE_TYPE" => "A",
							"CHAIN_ITEM_LINK" => "",
							"CHAIN_ITEM_TEXT" => "",
							"EDIT_ADDITIONAL" => "N",
							"EDIT_STATUS" => "N",
							"IGNORE_CUSTOM_TEMPLATE" => "N",
							"NAME_TEMPLATE" => "",
							"NOT_SHOW_FILTER" => array("", ""),
							"NOT_SHOW_TABLE" => array("", ""),
							"RESULT_ID" => $_REQUEST['RESULT_ID'],
							"SEF_MODE" => "N",
							"SHOW_ADDITIONAL" => "N",
							"SHOW_ANSWER_VALUE" => "N",
							"SHOW_EDIT_PAGE" => "N",
							"SHOW_LIST_PAGE" => "N",
							"SHOW_STATUS" => "N",
							"SHOW_VIEW_PAGE" => "N",
							"START_PAGE" => "new",
							"SUCCESS_URL" => "",
							"USE_EXTENDED_ERRORS" => "Y",
							"VARIABLE_ALIASES" => Array(
								"action" => "action"
							),
							"WEB_FORM_ID" => "15"
						)
					);?>

				</div>
			</div>
		</div>
	</div>
<!--
	<div id="tariffPopup" aria-hidden="true" class="popup blueButtonPopup">
		<div class="popup__wrapper blueButtonPopup__wrapper">
			<div class="popup__content blueButtonPopup__content">
				<button data-close type="button" class="popup__close blueButtonPopup__close">
					<img src="<?=SITE_TEMPLATE_PATH?>/img/icons/close.svg" alt="image">
				</button>
				<div class="popup__text blueButtonPopup__text">
					<div class="footer__title callback-footer__title">МодалОчка от синей кнопки</div>
					
					<form action="#" data-ajax method="post" class="callback-footer__body">
						<div class="callback-footer__row">
							<input type="text" name="" id="" data-required class="callback-footer__input">
							<label for="" class="callback-footer__label">имя</label>
						</div>
						<div class="callback-footer__row">
							<input type="text" name="" id="" data-required data-inputmask-clearincomplete="true" data-inputmask="'mask':'+7 (999) 999 99 99'" class="callback-footer__input">
							<label for="" class="callback-footer__label">номер телефона</label>
						</div>
						<div class="callback-footer__row">
							<input type="text" name="" id="" data-required="email" data-inputmask="'alias': 'email'" class="callback-footer__input">
							<label for="" class="callback-footer__label">e-mail</label>
						</div>
						<div class="callback-footer__row">
							<textarea type="text" name="" id="" placeholder="Сообщение" class="callback-footer__textarea"></textarea>
					
						</div>
						<div class="callback-footer__row">
							<input type="checkbox" name="" data-required id="callback-footer__checkbox" checked="checked" class="callback-footer__checkbox">
							<label for="callback-footer__checkbox" class="callback-footer__agree"><span>Я согласен(а) на</span><a href="#" class="callback-footer__link">обработку персональных данных</a>
							</label>
						</div>
						<input type="hidden" name="" id="" data-required class="blueButtonPopup_hidden">
						<div class="callback-footer__row">
							<button type="submit" class="rectangle_btn callback-footer__submit">Отправить</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
				-->
	<div id="reviewsPopup" aria-hidden="true" class="popup reviewsPopup">
		<div class="popup__wrapper reviewsPopup__wrapper">
			<div class="popup__content reviewsPopup__content">
				<button data-close type="button" class="popup__close reviewsPopup__close">
					<img src="<?=SITE_TEMPLATE_PATH?>/img/icons/close.svg" alt="image">
				</button>
				<div class="popup__text reviewsPopup__text">
					<div class="reviewsPopup__head">
						<div class="reviewsPopup__title sectiontitle">Оставить отзыв</div>
					</div>
					<?$APPLICATION->IncludeComponent(
						"bitrix:iblock.element.add.form",
						"review",
						Array(
							"CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
							"CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
							"CUSTOM_TITLE_DETAIL_PICTURE" => "",
							"CUSTOM_TITLE_DETAIL_TEXT" => "Отзыв",
							"CUSTOM_TITLE_IBLOCK_SECTION" => "",
							"CUSTOM_TITLE_NAME" => "",
							"CUSTOM_TITLE_PREVIEW_PICTURE" => "",
							"CUSTOM_TITLE_PREVIEW_TEXT" => "Имя",
							"CUSTOM_TITLE_TAGS" => "",
							"DEFAULT_INPUT_SIZE" => "30",
							"DETAIL_TEXT_USE_HTML_EDITOR" => "N",
							"ELEMENT_ASSOC" => "CREATED_BY",
							"GROUPS" => array("2"),
							"IBLOCK_ID" => "15",
							"IBLOCK_TYPE" => "content",
							"LEVEL_LAST" => "N",
							"LIST_URL" => "",
							"MAX_FILE_SIZE" => "0",
							"MAX_LEVELS" => "100000",
							"MAX_USER_ENTRIES" => "100000",
							"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
							"PROPERTY_CODES" => array("30", "71", "72", "73", "74", "75", "76", "NAME", "PREVIEW_TEXT", "DETAIL_TEXT"),
							"PROPERTY_CODES_REQUIRED" => array("75", "76", "PREVIEW_TEXT"),
							"RESIZE_IMAGES" => "N",
							"SEF_FOLDER" => "/o-kompanii/otzyvy/#reviewsPopup",
							"SEF_MODE" => "N",
							"STATUS" => "ANY",
							"STATUS_NEW" => "NEW",
							"USER_MESSAGE_ADD" => "Спасибо за отзыв",
							"USER_MESSAGE_EDIT" => "Спасибо за отзыв",
							"USE_CAPTCHA" => "N",
							"AJAX_MODE" => "Y",
							"AJAX_OPTION_SHADOW" => "Y",
							"AJAX_OPTION_JUMP" => "N", // скроллить страницу до компонента
							"AJAX_OPTION_STYLE" => "Y", // подключать стили
							"AJAX_OPTION_HISTORY" => "N",
						)
					);?>
					
						
				</div>
			</div>
		</div>
	</div>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/app_after.js"></script>
</body>

</html>