<section class="hero-cases">
    <div class="hero-cases__container">
        <div class="hero-cases__head">
            <div class="h1 hero-cases__title hero-cases__title_small">
            <?$APPLICATION->IncludeFile(
                    "/local/include/about/warranty_title.php", 
                    Array(), 
                    Array(
                        "MODE"      => "text",                                           
                        "NAME"      => "Редактирование включаемой области",      
                        "TEMPLATE"  => ""                    
                    ));
                ?>
                </div>
        </div>
        <div class="hero-cases__content">
            <p class="hero-cases__text">
            <?$APPLICATION->IncludeFile(
                    "/local/include/about/warranty_text.php", 
                    Array(), 
                    Array(
                        "MODE"      => "text",                                           
                        "NAME"      => "Редактирование включаемой области",      
                        "TEMPLATE"  => ""                    
                    ));
                ?>
                </p>
            <a href="#" data-popup="#aboutWarrantyPopup" data-popup-info="<?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "",
                        "EDIT_TEMPLATE" => "",
                        "PATH" =>  "/local/include/about/warranty_button.php", 
                    ),
                    false,
                    array('HIDE_ICONS' => 'Y')
                );?>" class="hero-cases__link rectangle_btn">
            <?$APPLICATION->IncludeFile(
                    "/local/include/about/warranty_button.php", 
                    Array(), 
                    Array(
                        "MODE"      => "text",                                           
                        "NAME"      => "Редактирование включаемой области",      
                        "TEMPLATE"  => ""                    
                    ));
                ?>
                </a>
        </div>
    </div>
</section>