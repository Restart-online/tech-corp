<section class="callback">
    <div class="callback__container">
        <div class="callback__body callback__body_center">
            <div class="callback__text">
                <?$APPLICATION->IncludeFile(
                        "/local/include/index/callback__text.php", 
                        Array(), 
                        Array(
                            "MODE"      => "html",                                           
                            "NAME"      => "Редактирование включаемой области",      
                            "TEMPLATE"  => ""                    
                        ));
                    ?>
                
            </div>
            <div class="callback__form footer__callback footer__callback_light callback-footer">
                <div class="callback__title sectiontitle">
                <?$APPLICATION->IncludeFile(
                        "/local/include/index/callback__title.php", 
                        Array(), 
                        Array(
                            "MODE"      => "text",                                           
                            "NAME"      => "Редактирование включаемой области",      
                            "TEMPLATE"  => ""                    
                        ));
                    ?>
                    </div>
                <div class="callback__label sectionlabel">
                <?$APPLICATION->IncludeFile(
                        "/local/include/index/callback__label.php", 
                        Array(), 
                        Array(
                            "MODE"      => "text",                                           
                            "NAME"      => "Редактирование включаемой области",      
                            "TEMPLATE"  => ""                    
                        ));
                    ?>
                    </div>
                <div class="footer__title callback-footer__title"><?$APPLICATION->IncludeFile(
                        "/local/include/index/callback-footer__title.php", 
                        Array(), 
                        Array(
                            "MODE"      => "text",                                           
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
							"WEB_FORM_ID" => "2"
						)
					);?>
                
            </div>
        </div>
    </div>
</section>