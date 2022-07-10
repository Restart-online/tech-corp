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
                            "/local/include/about/aktsii/feedback__caption.php", 
                            Array(), 
                            Array(
                                "MODE"      => "text",                                           
                                "NAME"      => "Редактирование включаемой области",      
                                "TEMPLATE"  => ""                    
                            ));
                        ?></div>
                <div class="feedback__description"><?$APPLICATION->IncludeFile(
                            "/local/include/about/aktsii/feedback__description.php", 
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
                                "RUBRICS" => array("3"),
                                "SHOW_RUBRICS" => "N"
                            )
                        );?>
                <?/*$APPLICATION->IncludeComponent("bitrix:subscribe.form",
                    "action",
                    Array(
                            "USE_PERSONALIZATION" => "Y",
                            "PAGE" => "/o-kompanii/aktsii/", 
                            "SHOW_HIDDEN" => "N", 
                            "CACHE_TYPE" => "A", 
                            "CACHE_TIME" => "3600" 
                        )
                );*/?>               
            </div>
        </div>
        <?
            CModule::IncludeModule("iblock");
            global $arrFilterNews;
            $arrFilterNews = Array();  
            if(isset($_REQUEST['YEAR']) && $_REQUEST['YEAR']) {
                $firstMonth = '01.01.'.$_REQUEST['YEAR']; //начало года
                $lastMonth = '31.12.'.$_REQUEST['YEAR']; //конец года
                $arrFilterNews = Array(
                    "LOGIC" => "AND",
                    array(">=DATE_ACTIVE_FROM" => ConvertTimeStamp(strtotime($firstMonth),"FULL")),
                    array("<=DATE_ACTIVE_FROM" => ConvertTimeStamp(strtotime($lastMonth),"FULL")),
                );  
            }            
            $arrYear = array(                
                'ALL' => array(
                    $APPLICATION->GetCurPage(),
                    'Все',
                   ( isset($_REQUEST['YEAR']) && $_REQUEST['YEAR'] ? '' : 'checked') 
                ),
            );  

            $arSelect = Array("ID", "DATE_ACTIVE_FROM");
            $arFilter = Array("IBLOCK_ID"=> 9, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
            $res = CIBlockElement::GetList(Array("DATE_ACTIVE_FROM" => "ASC"), $arFilter, false, false, $arSelect);
            $DATE = array();
            if($ob = $res->GetNextElement())
                $DATE[] = $ob->GetFields()['DATE_ACTIVE_FROM'];
            $res = CIBlockElement::GetList(Array("DATE_ACTIVE_FROM" => "DESC"), $arFilter, false, false, $arSelect);
            
            if($ob = $res->GetNextElement())
                $DATE[] = $ob->GetFields()['DATE_ACTIVE_FROM'];

            $e = date('Y', strtotime($DATE[0]));
            $y = date('Y', strtotime($DATE[1]));
            while($y>=$e) {                
                $arrYear[$y] = array(    
                    $APPLICATION->GetCurPage() . '?YEAR=' . $y,
                    $y,
                    (isset($_REQUEST['YEAR']) && $_REQUEST['YEAR'] == $y ? 'checked' : '')                  
                );  
                $y--;
            }

            #echo '<pre style="">';print_r($DATE);echo '</pre>';

        ?>
        <div class="sidebar-page__content">
            <div class="sidebar-page__caption"><?$APPLICATION->ShowTitle(false)?></div>
            <div class="info-page__badge badge">
                <div class="badge__list">
                    <?
                        foreach($arrYear as $k=>$v) {
                    ?>
                         <label class="badge__item">
                            <input type="radio" name="year" class="badge__input" <?=$v[2]?> value="<?=$k?>" onchange="location = '<?=$v[0]?>';">
                            <span class="badge__label"><?=$v[1]?></span>
                        </label>
                    <?
                        }
                    ?>
                   
                </div>
            </div>
            <?$APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "page_action",
                Array(
                    "ACTIVE_DATE_FORMAT" => "j F Y",
                    "ADD_SECTIONS_CHAIN" => "N",
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "N",
                    "CACHE_FILTER" => "Y",
                    "CACHE_GROUPS" => "Y",
                    "CACHE_TIME" => "36000000",
                    "CACHE_TYPE" => "A",
                    "CHECK_DATES" => "Y",
                    "DETAIL_URL" => "#SITE_DIR#/o-kompanii/aktsii/#ELEMENT_CODE#/",
                    "DISPLAY_BOTTOM_PAGER" => "Y",
                    "DISPLAY_DATE" => "Y",
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => "Y",
                    "DISPLAY_PREVIEW_TEXT" => "Y",
                    "DISPLAY_TOP_PAGER" => "N",
                    "FIELD_CODE" => array("SHOW_COUNTER", ""),
                    "FILTER_NAME" => "arrFilterNews",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "IBLOCK_ID" => "9",
                    "IBLOCK_TYPE" => "content",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "MESSAGE_404" => "",
                    "NEWS_COUNT" => "5",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_TEMPLATE" => "news",
                    "PAGER_TITLE" => "Новости",
                    "PARENT_SECTION" => "",
                    "PARENT_SECTION_CODE" => "",
                    "PREVIEW_TRUNCATE_LEN" => "",
                    "PROPERTY_CODE" => array("", ""),
                    "SET_BROWSER_TITLE" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "SET_META_DESCRIPTION" => "N",
                    "SET_META_KEYWORDS" => "N",
                    "SET_STATUS_404" => "N",
                    "SET_TITLE" => "N",
                    "SHOW_404" => "N",
                    "SORT_BY1" => "ACTIVE_FROM",
                    "SORT_BY2" => "SORT",
                    "SORT_ORDER1" => "DESC",
                    "SORT_ORDER2" => "ASC",
                    "STRICT_SECTION_CHECK" => "N"
                )
            );?>                        
        </div>
    </div>
</section>