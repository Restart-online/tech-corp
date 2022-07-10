<section class="computer__questions computer-questions">
	<div class="computer-questions__left">
		<div class="computer-questions__caption"><?$APPLICATION->IncludeFile(
                        "/local/include/uslugi/detail/callback__title.php", 
                        Array(), 
                        Array(
                            "MODE"      => "text",                                           
                            "NAME"      => "Редактирование заголовка обраной связи",      
                            "TEMPLATE"  => ""                    
                        ));
                    ?></div>
		<div class="computer-questions__description">
		<?$APPLICATION->IncludeFile(
                    "/local/include/uslugi/detail/callback__text.php", 
                    Array(), 
                    Array(
                        "MODE"      => "text",                                           
                        "NAME"      => "Редактирование текста обратной связи",      
                        "TEMPLATE"  => ""                    
                    ));
                ?>
			</div>
	</div>
	<div class="computer-questions__right">
		<div class="computer-questions__title">
		<?$APPLICATION->IncludeFile(
                            "/local/include/uslugi/detail/callback__title_form.php", 
                            Array(), 
                            Array(
                                "MODE"      => "text",                                           
                                "NAME"      => "Редактирование Заголовка формы",      
                                "TEMPLATE"  => ""                    
                            ));
                        ?>
		</div>
		<?$APPLICATION->IncludeComponent(
			"bitrix:form",
			"usluga",
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
				"WEB_FORM_ID" => "7"
			)
		);?>
	</div>
</section>
