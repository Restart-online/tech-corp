<section class="home-reviews">
    <div class="home-reviews__container">
        <div class="home-reviews__head">
            <div class="home-reviews__title sectiontitle">
            <?$APPLICATION->IncludeFile(
                        "/local/include/index/reviews__title.php", 
                        Array(), 
                        Array(
                            "MODE"      => "text",                                           
                            "NAME"      => "Редактирование включаемой области",      
                            "TEMPLATE"  => ""                    
                        ));
                    ?>
                </div>
        </div>
        <div class="home-reviews__body">
            <div class="home-reviews__slider swiper">
                <div data-gallery class="home-reviews__wrapper swiper-wrapper">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "reviews_index",
                    Array(
                        "ACTIVE_DATE_FORMAT" => "d.m.Y",
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
                        "DETAIL_URL" => "",
                        "DISPLAY_BOTTOM_PAGER" => "N",
                        "DISPLAY_DATE" => "Y",
                        "DISPLAY_NAME" => "Y",
                        "DISPLAY_PICTURE" => "Y",
                        "DISPLAY_PREVIEW_TEXT" => "Y",
                        "DISPLAY_TOP_PAGER" => "N",
                        "FIELD_CODE" => array("PREVIEW_TEXT", "PREVIEW_PICTURE", "DATE_ACTIVE_FROM", ""),
                        "FILTER_NAME" => "",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "IBLOCK_ID" => "15",
                        "IBLOCK_TYPE" => "content",
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
                        "PROPERTY_CODE" => array("POST", ""),
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
                </div>
            </div>
            <div class="videocases__arrows">
                <div class="videocases_arrow_prev">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/icons/long_prev.svg" alt="image">
                </div>
                <div class="videocases_arrow_next">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/icons/long_next.svg" alt="image">
                </div>
            </div>
            <div class="videocases__pagination"></div>
        </div>
    </div>
</section>