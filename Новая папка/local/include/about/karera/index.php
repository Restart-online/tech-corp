<section class="career">
    <div class="career__container sertificats__container">
        <div class="career__sidebar sidebar">
            <div data-spollers="992" class="sidebar__menu menu-sidebar">
                <div class="menu-sidebar__spoller">
                    <button type="button" data-spoller class="menu-sidebar__title"><? $APPLICATION->IncludeFile(
                                                                                        "/local/include/about/sertifikaty/sidebar__title.php",
                                                                                        array(),
                                                                                        array(
                                                                                            "MODE"      => "text",
                                                                                            "NAME"      => "Редактирование включаемой области",
                                                                                            "TEMPLATE"  => ""
                                                                                        )
                                                                                    );
                                                                                    ?></button>
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "inner",
                        array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "left",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => array(),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "A",
                            "MENU_CACHE_USE_GROUPS" => "N",
                            "ROOT_MENU_TYPE" => "left",
                            "USE_EXT" => "N",
                            "COMPONENT_TEMPLATE" => "inner"
                        ),
                        false
                    ); ?>
                </div>
            </div>
            <div data-da=".sertificats__container, 992" class="sidebar__bottom">
                <div class="callback__text">
                    <div class="callback__title callback__title_sidebar sectiontitle"><? $APPLICATION->IncludeFile(
                                                                                            "/local/include/about/karera/feedback__caption.php",
                                                                                            array(),
                                                                                            array(
                                                                                                "MODE"      => "text",
                                                                                                "NAME"      => "Редактирование включаемой области",
                                                                                                "TEMPLATE"  => ""
                                                                                            )
                                                                                        );
                                                                                        ?></div>
                    <div class="callback__label sectionlabel"><? $APPLICATION->IncludeFile(
                                                                    "/local/include/about/karera/feedback__description.php",
                                                                    array(),
                                                                    array(
                                                                        "MODE"      => "text",
                                                                        "NAME"      => "Редактирование включаемой области",
                                                                        "TEMPLATE"  => ""
                                                                    )
                                                                );
                                                                ?></div>
                </div>
                <div class="callback__form footer__callback footer__callback_light callback-footer">
                    <?$APPLICATION->IncludeComponent(
						"bitrix:form",
						"carier",
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
							"WEB_FORM_ID" => "14"
						)
					);?>
                   
                </div>
            </div>
        </div>
        <div class="career__body body-career">
            <div class="body-career__hero">
                <div class="body-career__head">
                    <div class="body-career__title sectiontitle"><? $APPLICATION->ShowTitle(false) ?></div>
                </div>
                <div class="body-career__image">
                    <? $APPLICATION->IncludeFile(
                        "/local/include/about/karera/image.php",
                        array(),
                        array(
                            "MODE"      => "text",
                            "NAME"      => "Редактирование включаемой области",
                            "TEMPLATE"  => ""
                        )
                    );
                    ?>
                </div>
                <p class="body-career__text">
                    <? $APPLICATION->IncludeFile(
                        "/local/include/about/karera/text.php",
                        array(),
                        array(
                            "MODE"      => "text",
                            "NAME"      => "Редактирование включаемой области",
                            "TEMPLATE"  => ""
                        )
                    );
                    ?>
                </p>
            </div>
            <div class="career__vacancy">
                <div class="body-career__head">
                    <div class="body-career__title sectiontitle">Вакансии</div>
                </div>
                <div data-tabs class="body-career__tabs tabs-career">
                    <nav data-tabs-titles class="tabs-career__navigation">
                        <button type="button" class="tabs-career__title _tab-active">Программирование (3)</button>
                        <button type="button" class="tabs-career__title">Дизайн (2)</button>
                        <button type="button" class="tabs-career__title">Тестирование (4)</button>
                    </nav>
                    <div data-tabs-body class="tabs-career__content">
                        <div class="tabs-career__body">
                            <div data-spollers class="body-career__spollers spollers-career">
                                <div class="spollers-career__item">
                                    <button type="button" data-spoller class="spollers-career__title spollers__title _spoller-active">
                                        <span>Middle front-end developer</span>
                                        <div class="spollers-career__price">80 000 руб.</div>
                                    </button>
                                    <div class="spollers-career__body">
                                        <div class="spollers-career__text">
                                            <p>Заказывали в «...» систему безопасности для нашего центра. Заказ обработали быстро – уже на следующий день инженеры окружили меня и требовали разрешения начать работу.</p>
                                            <p>В течение дня установили видеонаблюдение и сигнализацию. Я думала, что это конец работ, но в течение следующей недели рабочие ежедневно приходили и проверяли работоспособность системы. Когда они убедились, что все работает исправно, предоставили сопроводительную документацию и акты. Я очень довольна работой с «Олл Корп» и буду сотрудничать с ними в будущем.</p>
                                        </div>
                                        <a href="#" data-popup="#careerPopup" class="spollers-career__popuplink rectangle_btn">Откликнуться</a>
                                    </div>
                                </div>
                                <div class="spollers-career__item">
                                    <button type="button" data-spoller class="spollers-career__title spollers__title">
                                        <span>Senior back-end developer</span>
                                        <div class="spollers-career__price">80 000 руб.</div>
                                    </button>
                                    <div class="spollers-career__body">
                                        <div class="spollers-career__text">
                                            <ul>
                                                <li>Список</li>
                                                <li>Для него тоже сделаю стили</li>
                                                <li>Вдруг пригодятся</li>
                                            </ul>
                                        </div>
                                        <a href="#" data-popup="#careerPopup" class="spollers-career__popuplink rectangle_btn">Откликнуться</a>
                                    </div>
                                </div>
                                <div class="spollers-career__item">
                                    <button type="button" data-spoller class="spollers-career__title spollers__title">
                                        <span>Junior front-end developer</span>
                                        <div class="spollers-career__price">80 000 руб.</div>
                                    </button>
                                    <div class="spollers-career__body">
                                        <div class="spollers-career__text">
                                            <ol>
                                                <li>И для нумерованного списка</li>
                                                <li>Тоже</li>
                                                <li>Сделал</li>
                                            </ol>
                                        </div>
                                        <a href="#" data-popup="#careerPopup" class="spollers-career__popuplink rectangle_btn">Откликнуться</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tabs-career__body">
                            <div data-spollers class="body-career__spollers spollers-career">
                                <div class="spollers-career__item">
                                    <button type="button" data-spoller class="spollers-career__title spollers__title _spoller-active">
                                        <span>Middle front-end developer</span>
                                        <div class="spollers-career__price">80 000 руб.</div>
                                    </button>
                                    <div class="spollers-career__body">
                                        <div class="spollers-career__text">
                                            <p>Заказывали в «...» систему безопасности для нашего центра. Заказ обработали быстро – уже на следующий день инженеры окружили меня и требовали разрешения начать работу.</p>
                                            <p>В течение дня установили видеонаблюдение и сигнализацию. Я думала, что это конец работ, но в течение следующей недели рабочие ежедневно приходили и проверяли работоспособность системы. Когда они убедились, что все работает исправно, предоставили сопроводительную документацию и акты. Я очень довольна работой с «Олл Корп» и буду сотрудничать с ними в будущем.</p>
                                        </div>
                                        <a href="#" data-popup="#careerPopup" class="spollers-career__popuplink rectangle_btn">Откликнуться</a>
                                    </div>
                                </div>
                                <div class="spollers-career__item">
                                    <button type="button" data-spoller class="spollers-career__title spollers__title">
                                        <span>Senior back-end developer</span>
                                        <div class="spollers-career__price">80 000 руб.</div>
                                    </button>
                                    <div class="spollers-career__body">
                                        <div class="spollers-career__text">
                                            <ul>
                                                <li>Список</li>
                                                <li>Для него тоже сделаю стили</li>
                                                <li>Вдруг пригодятся</li>
                                            </ul>
                                        </div>
                                        <a href="#" data-popup="#careerPopup" class="spollers-career__popuplink rectangle_btn">Откликнуться</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tabs-career__body">
                            <div data-spollers class="body-career__spollers spollers-career">
                                <div class="spollers-career__item">
                                    <button type="button" data-spoller class="spollers-career__title spollers__title _spoller-active">
                                        <span>Middle front-end developer</span>
                                        <div class="spollers-career__price">80 000 руб.</div>
                                    </button>
                                    <div class="spollers-career__body">
                                        <div class="spollers-career__text">
                                            <p>Заказывали в «...» систему безопасности для нашего центра. Заказ обработали быстро – уже на следующий день инженеры окружили меня и требовали разрешения начать работу.</p>
                                            <p>В течение дня установили видеонаблюдение и сигнализацию. Я думала, что это конец работ, но в течение следующей недели рабочие ежедневно приходили и проверяли работоспособность системы. Когда они убедились, что все работает исправно, предоставили сопроводительную документацию и акты. Я очень довольна работой с «Олл Корп» и буду сотрудничать с ними в будущем.</p>
                                        </div>
                                        <a href="#" data-popup="#careerPopup" class="spollers-career__popuplink rectangle_btn">Откликнуться</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>