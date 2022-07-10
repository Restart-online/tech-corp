<section class="contacts contacts__container">
    <h2 class="contacts__title"><?$APPLICATION->ShowTitle(false)?></h2>
    <div class="contacts__address">
        <?
        global $arrFilterContacts;
        $arrFilterContacts = array('!PROPERTY_CONTACTS' => false);
        ?>
    <?$APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "contacts",
        Array(
            "ACTIVE_DATE_FORMAT" => "d.m.Y",
            "ADD_SECTIONS_CHAIN" => "N",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "N",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "CHECK_DATES" => "Y",
            "DETAIL_URL" => "",
            "DISPLAY_BOTTOM_PAGER" => "N",
            "DISPLAY_DATE" => "N",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "N",
            "DISPLAY_PREVIEW_TEXT" => "N",
            "DISPLAY_TOP_PAGER" => "N",
            "FIELD_CODE" => array("", ""),
            "FILTER_NAME" => "arrFilterContacts",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "IBLOCK_ID" => "20",
            "IBLOCK_TYPE" => "tf_location",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "INCLUDE_SUBSECTIONS" => "Y",
            "MESSAGE_404" => "",
            "NEWS_COUNT" => "20",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => ".default",
            "PAGER_TITLE" => "Новости",
            "PARENT_SECTION" => "",
            "PARENT_SECTION_CODE" => "",
            "PREVIEW_TRUNCATE_LEN" => "",
            "PROPERTY_CODE" => array("EMAIL", "ADDRESS", "CONTACTS", "WORK_TIME", "PHONE", ""),
            "SET_BROWSER_TITLE" => "N",
            "SET_LAST_MODIFIED" => "N",
            "SET_META_DESCRIPTION" => "N",
            "SET_META_KEYWORDS" => "N",
            "SET_STATUS_404" => "N",
            "SET_TITLE" => "N",
            "SHOW_404" => "N",
            "SORT_BY1" => "SORT",
            "SORT_BY2" => "NAME",
            "SORT_ORDER1" => "DESC",
            "SORT_ORDER2" => "ASC",
            "STRICT_SECTION_CHECK" => "N"
        )
    );?>
       

        <div class="contacts__address-items">

            <p class="contacts__address-city contacts__address-item">Наши соц.сети</p>
            
                <?$APPLICATION->IncludeFile(
                        "/local/include/kontakty/social.php", 
                        Array(), 
                        Array(
                            "MODE"      => "html",                                           
                            "NAME"      => "Редактирование включаемой области",      
                            "TEMPLATE"  => ""                    
                        ));
                    ?>
               
            

        </div>

        <div class="contacts__maps">
            <div class="contacts__maps-item">
                <?
                    $apiKeys = COption::GetOptionString("fileman", "yandex_map_api_key"); 
                   # echo '<pre style="">';print_r($aa);echo '</pre>';
                    if ($apiKeys){
                    
                ?>
                <div id="map">
                    
                    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&_v=20220525134951?apikey=<?=$apiKeys?>"></script>
                </div>
                <?
                }
                ?>
            </div>
        </div>
</section>