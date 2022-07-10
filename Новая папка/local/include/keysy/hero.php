<section class="hero-cases">
    <div class="hero-cases__container">
        <div class="hero-cases__head">
            <h1 class="hero-cases__title">
                <?$APPLICATION->ShowTitle(false)?>
            </h1>
        </div>
        <div class="hero-cases__content">
            <p class="hero-cases__text">
                <?$APPLICATION->IncludeFile(
                    "/local/include/keysy/hero_t1.php", 
                    Array(), 
                    Array(
                        "MODE"      => "text",                                           
                        "NAME"      => "Редактирование включаемой области",      
                        "TEMPLATE"  => ""                    
                    ));
                ?>
            </p>
            <p class="hero-cases__text">
                <?$APPLICATION->IncludeFile(
                    "/local/include/keysy/hero_t2.php", 
                    Array(), 
                    Array(
                        "MODE"      => "text",                                           
                        "NAME"      => "Редактирование включаемой области",      
                        "TEMPLATE"  => ""                    
                    ));
                ?>
            </p>
        </div>
    </div>
</section>