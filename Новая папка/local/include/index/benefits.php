<section class="about-benefits">
    <div class="about-benefits__container">
        <div class="about-benefits__head">
            <div class="about-benefits__title sectiontitle">
                <?$APPLICATION->IncludeFile(
                        "/local/include/index/benefits__title.php", 
                        Array(), 
                        Array(
                            "MODE"      => "text",                                           
                            "NAME"      => "Редактирование включаемой области",      
                            "TEMPLATE"  => ""                    
                        ));
                    ?>
                </div>
        </div>
        <div class="about-benefits__body">
            <?$APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "benefits",
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
                    "DISPLAY_DATE" => "N",
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => "N",
                    "DISPLAY_PREVIEW_TEXT" => "Y",
                    "DISPLAY_TOP_PAGER" => "N",
                    "FIELD_CODE" => array("", ""),
                    "FILTER_NAME" => "",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "IBLOCK_ID" => "6",
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
        <div class="about-benefits__foot">
            <a href="#" data-popup="#aboutBenefitsPopup" data-popup-info="<?$APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "AREA_FILE_SUFFIX" => "",
                                    "EDIT_TEMPLATE" => "",
                                    "PATH" => "/local/include/index/benefits__link.php", 
                                ),
                                false,
                                array('HIDE_ICONS' => 'Y')
                            );?>" class="about-benefits__link rectangle_btn">
                <?$APPLICATION->IncludeFile(
                        "/local/include/index/benefits__link.php", 
                        Array(), 
                        Array(
                            "MODE"      => "text",                                           
                            "NAME"      => "Редактирование включаемой области",      
                            "TEMPLATE"  => ""                    
                        ));
                    ?>
                </a>
            <a href="tel:<?$APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "AREA_FILE_SUFFIX" => "",
                                    "EDIT_TEMPLATE" => "",
                                    "PATH" => "/local/include/index/benefits__phone.php", 
                                ),
                                false,
                                array('HIDE_ICONS' => 'Y')
                            );?>" class="about-benefits__phone">
                <i class="about-benefits__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M7.50289 2.25722L6.57441 2.62861V2.62861L7.50289 2.25722ZM8.55715 4.89288L9.48563 4.52149V4.52149L8.55715 4.89288ZM8.23664 6.91603L9.00486 7.55621V7.55621L8.23664 6.91603ZM7.66925 7.5969L8.43747 8.23708L7.66925 7.5969ZM7.79148 10.2915L7.08437 10.9986L7.79148 10.2915ZM9.70852 12.2085L10.4156 11.5014L9.70852 12.2085ZM12.4031 12.3307L11.7629 11.5625L12.4031 12.3307ZM13.084 11.7634L13.7242 12.5316L13.7242 12.5316L13.084 11.7634ZM15.1071 11.4428L14.7357 12.3713L15.1071 11.4428ZM17.7428 12.4971L18.1142 11.5686L17.7428 12.4971ZM2.89474 2H5.64593V0H2.89474V2ZM6.57441 2.62861L7.62867 5.26427L9.48563 4.52149L8.43136 1.88583L6.57441 2.62861ZM7.46842 6.27585L6.90103 6.95672L8.43747 8.23708L9.00486 7.55621L7.46842 6.27585ZM7.08437 10.9986L9.00141 12.9156L10.4156 11.5014L8.49859 9.58437L7.08437 10.9986ZM13.0433 13.099L13.7242 12.5316L12.4438 10.9951L11.7629 11.5625L13.0433 13.099ZM14.7357 12.3713L17.3714 13.4256L18.1142 11.5686L15.4785 10.5144L14.7357 12.3713ZM18 14.3541V17.1053H20V14.3541H18ZM17.1053 18C8.76286 18 2 11.2371 2 2.89474H0C0 12.3417 7.65829 20 17.1053 20V18ZM18 17.1053C18 17.5994 17.5994 18 17.1053 18V20C18.704 20 20 18.704 20 17.1053H18ZM17.3714 13.4256C17.751 13.5775 18 13.9452 18 14.3541H20C20 13.1274 19.2531 12.0242 18.1142 11.5686L17.3714 13.4256ZM13.7242 12.5316C14.0063 12.2964 14.3947 12.2349 14.7357 12.3713L15.4785 10.5144C14.4554 10.1051 13.2903 10.2897 12.4438 10.9951L13.7242 12.5316ZM9.00141 12.9156C10.0986 14.0128 11.8513 14.0923 13.0433 13.099L11.7629 11.5625C11.3656 11.8936 10.7813 11.8671 10.4156 11.5014L9.00141 12.9156ZM6.90103 6.95672C5.90771 8.1487 5.98722 9.90143 7.08437 10.9986L8.49859 9.58437C8.13287 9.21866 8.10637 8.63441 8.43747 8.23708L6.90103 6.95672ZM7.62867 5.26427C7.76509 5.6053 7.70356 5.99367 7.46842 6.27585L9.00486 7.55621C9.71029 6.7097 9.89487 5.54459 9.48563 4.52149L7.62867 5.26427ZM5.64593 2C6.05484 2 6.42255 2.24895 6.57441 2.62861L8.43136 1.88583C7.97577 0.746853 6.87265 0 5.64593 0V2ZM2.89474 0C1.29602 0 0 1.29602 0 2.89474H2C2 2.40059 2.40059 2 2.89474 2V0Z" fill="#23252B" />
                    </svg>
                </i>
                <div class="about-benefits__number">
                <?$APPLICATION->IncludeFile(
                        "/local/include/index/benefits__phone.php", 
                        Array(), 
                        Array(
                            "MODE"      => "text",                                           
                            "NAME"      => "Редактирование включаемой области",      
                            "TEMPLATE"  => ""                    
                        ));
                    ?>
                    </div>
            </a>
        </div>
    </div>
</section>