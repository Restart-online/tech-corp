<section class="sidebar-page info-page">
    <div class="sidebar-page__container">
        <div class="sidebar-page__sidebar">
            <div data-spollers="992" class="menu-sidebar">
                <div class="menu-sidebar__spoller">
                    <button type="button" data-spoller class="menu-sidebar__title"><?$APPLICATION->IncludeFile(
                            "/local/include/about/sertifikaty/sidebar__title.php", 
                            Array(), 
                            Array(
                                "MODE"      => "text",                                           
                                "NAME"      => "Редактирование включаемой области",      
                                "TEMPLATE"  => ""                    
                            ));
                        ?></button>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu", 
                        "inner", 
                        array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "left",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "A",
                            "MENU_CACHE_USE_GROUPS" => "N",
                            "ROOT_MENU_TYPE" => "left",
                            "USE_EXT" => "N",
                            "COMPONENT_TEMPLATE" => "inner"
                        ),
                        false
                    );?>
                </div>
            </div>
            <div data-da=".sidebar-page__container, 992" class="info-page__form feedback">
                <div class="feedback__caption"><?$APPLICATION->IncludeFile(
                            "/local/include/stati/feedback__caption.php", 
                            Array(), 
                            Array(
                                "MODE"      => "text",                                           
                                "NAME"      => "Редактирование включаемой области",      
                                "TEMPLATE"  => ""                    
                            ));
                        ?></div>
                <div class="feedback__description"><?$APPLICATION->IncludeFile(
                            "/local/include/stati/feedback__description.php", 
                            Array(), 
                            Array(
                                "MODE"      => "text",                                           
                                "NAME"      => "Редактирование включаемой области",      
                                "TEMPLATE"  => ""                    
                            ));
                        ?></div>
                        <?$APPLICATION->IncludeComponent(
                            "asd:subscribe.quick.form",
                            "news",
                            Array(
                                "FORMAT" => "html",
                                "INC_JQUERY" => "N",
                                "NOT_CONFIRM" => "Y",
                                "RUBRICS" => array("2"),
                                "SHOW_RUBRICS" => "N"
                            )
                        );?>
                <?/*$APPLICATION->IncludeComponent("bitrix:subscribe.form",
                    "stati",
                    Array(
                            "USE_PERSONALIZATION" => "Y",
                            "PAGE" => "/stati/", 
                            "SHOW_HIDDEN" => "N", 
                            "CACHE_TYPE" => "A", 
                            "CACHE_TIME" => "3600" 
                        )
                );*/?>               
            </div>
        </div>
        <?
          /*  CModule::IncludeModule("iblock");
                     
            $arrYear = array(                
                'ALL' => array(
                    "/stati/",
                    'Все',
                    (isset($_REQUEST['CODE']) && $_REQUEST['CODE'] ? '' : 'checked')      
                ),
            );  

            $arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL", "CODE");
            $arFilter = Array("IBLOCK_ID"=> 11, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
            $res = CIBlockSection::GetList(Array("SORT" => "ASC"), $arFilter, false, $arSelect);            
            while($ob = $res->GetNext()) {
                     $arrYear[$ob['CODE']] = array(                                    
                        "/stati/" . $ob['CODE'] . "/",
                        $ob['NAME'],
                        (isset($_REQUEST['CODE']) && $_REQUEST['CODE'] == $ob['CODE'] ? 'checked' : '')                                 
                );  
            }       */       
          # echo '<pre style="">';print_r($_REQUEST);echo '</pre>';

        ?>
        <div class="sidebar-page__content">
            <div class="sidebar-page__caption"><?$APPLICATION->ShowTitle(false)?></div>
            <?$APPLICATION->IncludeComponent(
                "bitrix:catalog",
                "stati",
                Array(
                    "ACTION_VARIABLE" => "action",
                    "ADD_ELEMENT_CHAIN" => "Y",
                    "ADD_PICT_PROP" => "-",
                    "ADD_PROPERTIES_TO_BASKET" => "N",
                    "ADD_SECTIONS_CHAIN" => "Y",
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "N",
                    "BASKET_URL" => "/personal/basket.php",
                    "CACHE_FILTER" => "Y",
                    "CACHE_GROUPS" => "Y",
                    "CACHE_TIME" => "36000000",
                    "CACHE_TYPE" => "A",
                    "COMPATIBLE_MODE" => "Y",
                    "DETAIL_ADD_DETAIL_TO_SLIDER" => "N",
                    "DETAIL_BACKGROUND_IMAGE" => "-",
                    "DETAIL_BRAND_USE" => "N",
                    "DETAIL_BROWSER_TITLE" => "-",
                    "DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
                    "DETAIL_DETAIL_PICTURE_MODE" => array("POPUP", "MAGNIFIER"),
                    "DETAIL_DISPLAY_NAME" => "Y",
                    "DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "E",
                    "DETAIL_IMAGE_RESOLUTION" => "16by9",
                    "DETAIL_META_DESCRIPTION" => "-",
                    "DETAIL_META_KEYWORDS" => "-",
                    "DETAIL_PRODUCT_INFO_BLOCK_ORDER" => "sku,props",
                    "DETAIL_PRODUCT_PAY_BLOCK_ORDER" => "rating,price,priceRanges,quantityLimit,quantity,buttons",
                    "DETAIL_SET_CANONICAL_URL" => "N",
                    "DETAIL_SHOW_POPULAR" => "Y",
                    "DETAIL_SHOW_SLIDER" => "N",
                    "DETAIL_SHOW_VIEWED" => "Y",
                    "DETAIL_STRICT_SECTION_CHECK" => "N",
                    "DETAIL_USE_COMMENTS" => "N",
                    "DETAIL_USE_VOTE_RATING" => "N",
                    "DISABLE_INIT_JS_IN_COMPONENT" => "Y",
                    "DISPLAY_BOTTOM_PAGER" => "Y",
                    "DISPLAY_TOP_PAGER" => "N",
                    "ELEMENT_SORT_FIELD" => "active_from",
                    "ELEMENT_SORT_FIELD2" => "name",
                    "ELEMENT_SORT_ORDER" => "desc",
                    "ELEMENT_SORT_ORDER2" => "asc",
                    "FILTER_FIELD_CODE" => array("",""),
                    "FILTER_HIDE_ON_MOBILE" => "N",
                    "FILTER_NAME" => "",
                    "FILTER_PRICE_CODE" => array(),
                    "FILTER_PROPERTY_CODE" => array("",""),
                    "FILTER_VIEW_MODE" => "VERTICAL",
                    "IBLOCK_ID" => "11",
                    "IBLOCK_TYPE" => "content",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "INSTANT_RELOAD" => "N",
                    "LABEL_PROP" => array(),
                    "LAZY_LOAD" => "N",
                    "LINE_ELEMENT_COUNT" => "3",
                    "LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
                    "LINK_IBLOCK_ID" => "",
                    "LINK_IBLOCK_TYPE" => "",
                    "LINK_PROPERTY_SID" => "",
                    "LIST_BROWSER_TITLE" => "-",
                    "LIST_ENLARGE_PRODUCT" => "STRICT",
                    "LIST_META_DESCRIPTION" => "-",
                    "LIST_META_KEYWORDS" => "-",
                    "LIST_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
                    "LIST_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
                    "LIST_SHOW_SLIDER" => "N",
                    "LIST_SLIDER_INTERVAL" => "3000",
                    "LIST_SLIDER_PROGRESS" => "N",
                    "LOAD_ON_SCROLL" => "N",
                    "MESSAGE_404" => "",
                    "MESS_BTN_ADD_TO_BASKET" => "В корзину",
                    "MESS_BTN_BUY" => "Купить",
                    "MESS_BTN_COMPARE" => "Сравнение",
                    "MESS_BTN_DETAIL" => "Подробнее",
                    "MESS_BTN_LAZY_LOAD" => "Показать ещё",
                    "MESS_BTN_SUBSCRIBE" => "Подписаться",
                    "MESS_NOT_AVAILABLE" => "Нет в наличии",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_TEMPLATE" => "news",
                    "PAGER_TITLE" => "Товары",
                    "PAGE_ELEMENT_COUNT" => "30",
                    "PARTIAL_PRODUCT_PROPERTIES" => "N",
                    "PRICE_CODE" => array(),
                    "PRICE_VAT_INCLUDE" => "N",
                    "PRICE_VAT_SHOW_VALUE" => "N",
                    "PRODUCT_ID_VARIABLE" => "id",
                    "PRODUCT_PROPS_VARIABLE" => "prop",
                    "PRODUCT_QUANTITY_VARIABLE" => "quantity",
                    "SEARCH_CHECK_DATES" => "N",
                    "SEARCH_NO_WORD_LOGIC" => "N",
                    "SEARCH_PAGE_RESULT_COUNT" => "50",
                    "SEARCH_RESTART" => "N",
                    "SEARCH_USE_LANGUAGE_GUESS" => "N",
                    "SEARCH_USE_SEARCH_RESULT_ORDER" => "N",
                    "SECTIONS_HIDE_SECTION_NAME" => "N",
                    "SECTIONS_SHOW_PARENT_NAME" => "Y",
                    "SECTIONS_VIEW_MODE" => "TILE",
                    "SECTION_BACKGROUND_IMAGE" => "-",
                    "SECTION_COUNT_ELEMENTS" => "Y",
                    "SECTION_ID_VARIABLE" => "SECTION_ID",
                    "SECTION_TOP_DEPTH" => "1",
                    "SEF_FOLDER" => "/stati/",
                    "SEF_MODE" => "Y",
                    "SEF_URL_TEMPLATES" => Array(
                        "compare" => "compare.php?action=#ACTION_CODE#",
                        "element" => "#ELEMENT_CODE#/",
                        "section" => "#SECTION_CODE_PATH#/",
                        "sections" => "",
                        "smart_filter" => "#SECTION_ID#/filter/#SMART_FILTER_PATH#/apply/"
                    ),
                    "SET_LAST_MODIFIED" => "N",
                    "SET_STATUS_404" => "N",
                    "SET_TITLE" => "Y",
                    "SHOW_404" => "N",
                    "SHOW_DEACTIVATED" => "N",
                    "SHOW_PRICE_COUNT" => "1",
                    "SHOW_SKU_DESCRIPTION" => "N",
                    "SHOW_TOP_ELEMENTS" => "N",
                    "SIDEBAR_DETAIL_SHOW" => "N",
                    "SIDEBAR_PATH" => "",
                    "SIDEBAR_SECTION_SHOW" => "N",
                    "TEMPLATE_THEME" => "",
                    "TOP_ELEMENT_COUNT" => "9",
                    "TOP_ELEMENT_SORT_FIELD" => "sort",
                    "TOP_ELEMENT_SORT_FIELD2" => "id",
                    "TOP_ELEMENT_SORT_ORDER" => "asc",
                    "TOP_ELEMENT_SORT_ORDER2" => "desc",
                    "TOP_ENLARGE_PRODUCT" => "STRICT",
                    "TOP_LINE_ELEMENT_COUNT" => "3",
                    "TOP_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
                    "TOP_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
                    "TOP_SHOW_SLIDER" => "Y",
                    "TOP_SLIDER_INTERVAL" => "3000",
                    "TOP_SLIDER_PROGRESS" => "N",
                    "TOP_VIEW_MODE" => "SECTION",
                    "USER_CONSENT" => "N",
                    "USER_CONSENT_ID" => "0",
                    "USER_CONSENT_IS_CHECKED" => "N",
                    "USER_CONSENT_IS_LOADED" => "N",
                    "USE_COMPARE" => "N",
                    "USE_ELEMENT_COUNTER" => "Y",
                    "USE_ENHANCED_ECOMMERCE" => "N",
                    "USE_FILTER" => "N",
                    "USE_MAIN_ELEMENT_SECTION" => "Y",
                    "USE_PRICE_COUNT" => "N",
                    "USE_PRODUCT_QUANTITY" => "N",
                    "USE_REVIEW" => "N",
                    "USE_STORE" => "N",
                )
            );?>
            
        </div>
    </div>
</section>