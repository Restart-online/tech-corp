<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
$home = false;
if($APPLICATION->GetCurPage(false) === '/')
	$home = true;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<? if(isset($_GET) && count($_GET)>0) { ?>
	<!--
		<meta name="robots" content="noindex,nofollow">
		--> 
		<meta name="robots" content="noindex">
	<? } ?>
	<?$APPLICATION->ShowHead();?>
	<title><?$APPLICATION->ShowTitle()?></title>
	<meta charset="UTF-8">
	<meta name="format-detection" content="telephone=no">
	<!-- <style>body{opacity: 0;}</style> -->
	<!-- <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/style_after.css?_v=20220513195056"> -->
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/style_after.min.css?_v=20220513195056">
	<link rel="shortcut icon" type="image/png" href="/favicon.png">
	<!-- <meta name="robots" content="noindex, nofollow"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?$APPLICATION->ShowPanel()?>
<div class="wrapper">
	<header data-scroll="100" class="header <?$APPLICATION->ShowProperty("class_header")?>">
		<div class="header__top top-header">
			<div class="top-header__container">
				<div class="top-header__left">
					<button type="button" class="menu__icon icon-menu"><span></span></button>
					<a href="/" class="top-header__logo">
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							Array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "",
								"EDIT_TEMPLATE" => "",
								"PATH" => "/local/include/header/logo.php"
							)
						);?>
					</a>
					<div data-da=".menu__item_city, 767" class="top-header__city">
					<!--
					<div data-spollers class="spollers-header">							
							<div class="spollers-header__item">
								<button type="button" data-spoller class="spollers-header__title">Москва</button>
								<div class="spollers-header__body" hidden>
									<a href="#" class="spollers-header__link">Питер</a>
									<a href="#" class="spollers-header__link">Уфа</a>
									<a href="#" class="spollers-header__link">Казахстан</a>
								</div>
							</div>							
						</div>
					-->
					<div>
						<?$APPLICATION->IncludeComponent("twofingers:location","location",Array());?>
						</div>
					</div>
				</div>
				<div class="top-header__right">
					<a data-da=".menu__item_phoneOne, 767" href="tel:<?$APPLICATION->IncludeComponent(
									"bitrix:main.include",
									"",
									Array(
										"AREA_FILE_SHOW" => "file",
										"AREA_FILE_SUFFIX" => "",
										"EDIT_TEMPLATE" => "",
										"PATH" => "/local/include/header/phone1.php"
									),
									false,
									array('HIDE_ICONS' => 'Y')
								);?>" class="top-header__phone phone-header">
						<div class="phone-header__icon">
							<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M7.50289 2.25722L6.57441 2.62861V2.62861L7.50289 2.25722ZM8.55715 4.89288L9.48563 4.52149V4.52149L8.55715 4.89288ZM8.23664 6.91603L9.00486 7.55621V7.55621L8.23664 6.91603ZM7.66925 7.5969L8.43747 8.23708L7.66925 7.5969ZM7.79148 10.2915L7.08437 10.9986L7.79148 10.2915ZM9.70852 12.2085L10.4156 11.5014L9.70852 12.2085ZM12.4031 12.3307L11.7629 11.5625L12.4031 12.3307ZM13.084 11.7634L13.7242 12.5316L13.7242 12.5316L13.084 11.7634ZM15.1071 11.4428L14.7357 12.3713L15.1071 11.4428ZM17.7428 12.4971L18.1142 11.5686L17.7428 12.4971ZM2.89474 2H5.64593V0H2.89474V2ZM6.57441 2.62861L7.62867 5.26427L9.48563 4.52149L8.43136 1.88583L6.57441 2.62861ZM7.46842 6.27585L6.90103 6.95672L8.43747 8.23708L9.00486 7.55621L7.46842 6.27585ZM7.08437 10.9986L9.00141 12.9156L10.4156 11.5014L8.49859 9.58437L7.08437 10.9986ZM13.0433 13.099L13.7242 12.5316L12.4438 10.9951L11.7629 11.5625L13.0433 13.099ZM14.7357 12.3713L17.3714 13.4256L18.1142 11.5686L15.4785 10.5144L14.7357 12.3713ZM18 14.3541V17.1053H20V14.3541H18ZM17.1053 18C8.76286 18 2 11.2371 2 2.89474H0C0 12.3417 7.65829 20 17.1053 20V18ZM18 17.1053C18 17.5994 17.5994 18 17.1053 18V20C18.704 20 20 18.704 20 17.1053H18ZM17.3714 13.4256C17.751 13.5775 18 13.9452 18 14.3541H20C20 13.1274 19.2531 12.0242 18.1142 11.5686L17.3714 13.4256ZM13.7242 12.5316C14.0063 12.2964 14.3947 12.2349 14.7357 12.3713L15.4785 10.5144C14.4554 10.1051 13.2903 10.2897 12.4438 10.9951L13.7242 12.5316ZM9.00141 12.9156C10.0986 14.0128 11.8513 14.0923 13.0433 13.099L11.7629 11.5625C11.3656 11.8936 10.7813 11.8671 10.4156 11.5014L9.00141 12.9156ZM6.90103 6.95672C5.90771 8.1487 5.98722 9.90143 7.08437 10.9986L8.49859 9.58437C8.13287 9.21866 8.10637 8.63441 8.43747 8.23708L6.90103 6.95672ZM7.62867 5.26427C7.76509 5.6053 7.70356 5.99367 7.46842 6.27585L9.00486 7.55621C9.71029 6.7097 9.89487 5.54459 9.48563 4.52149L7.62867 5.26427ZM5.64593 2C6.05484 2 6.42255 2.24895 6.57441 2.62861L8.43136 1.88583C7.97577 0.746853 6.87265 0 5.64593 0V2ZM2.89474 0C1.29602 0 0 1.29602 0 2.89474H2C2 2.40059 2.40059 2 2.89474 2V0Z" fill="white" />
							</svg>
						</div>
						<div class="phone-header__body">
							<div class="phone-header__number"><?$APPLICATION->IncludeFile(
									"/local/include/header/phone1.php", 
									Array(), 
									Array(
										"MODE"      => "text",                                           
										"NAME"      => "Редактирование включаемой области",      
										"TEMPLATE"  => ""                    
									));
								?></div>
							<div class="phone-header__label">(отдел продаж)</div>
						</div>
					</a>
					<a data-da=".menu__item_phoneTwo, 767" href="tel:<?$APPLICATION->IncludeComponent(
										"bitrix:main.include",
										"",
										Array(
											"AREA_FILE_SHOW" => "file",
											"AREA_FILE_SUFFIX" => "",
											"EDIT_TEMPLATE" => "",
											"PATH" => "/local/include/header/phone2.php"
										),
										false,
										array('HIDE_ICONS' => 'Y')
									);?>" class="top-header__phone phone-header">
						<div class="phone-header__icon">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M21 13H22C22 12.4477 21.5523 12 21 12V13ZM21 12H17V14H21V12ZM15 14V19H17V14H15ZM17 21H20V19H17V21ZM22 19V13H20V19H22ZM20 21C21.1046 21 22 20.1046 22 19H20V21ZM15 19C15 20.1046 15.8954 21 17 21V19H15ZM17 12C15.8954 12 15 12.8954 15 14H17V12Z" fill="white" />
								<path d="M3 13V12C2.44772 12 2 12.4477 2 13H3ZM3 14H7V12H3V14ZM7 14V19H9V14H7ZM7 19H4V21H7V19ZM4 19V13H2V19H4ZM4 19L4 19H2C2 20.1046 2.89543 21 4 21V19ZM7 19V21C8.10457 21 9 20.1046 9 19H7ZM7 14H9C9 12.8954 8.10457 12 7 12V14Z" fill="white" />
								<path class="fillSvg" d="M3 13C3 8.02944 7.02944 4 12 4C16.9706 4 21 8.02944 21 13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</div>
						<div class="phone-header__body">
							<div class="phone-header__number"><?$APPLICATION->IncludeFile(
									"/local/include/header/phone2.php", 
									Array(), 
									Array(
										"MODE"      => "text",                                           
										"NAME"      => "Редактирование включаемой области",      
										"TEMPLATE"  => ""                    
									));
								?></div>
							<div class="phone-header__label">(тех. поддержка)</div>
						</div>
					</a>
					<button data-da=".menu__item_callback, 767" class="top-header__callback" type="button" data-goto=".footer">Заказать звонок</button>
				</div>
			</div>
		</div>
		<div class="header__bottom bottom-header">
			<div class="bottom-header__container">
				<div class="bottom-header__menu">
					<div data-da=".header, 767" class="bottom-header__closemenu"></div>
					<div data-da=".header, 767" class="header__menu menu">
						<nav class="menu__body">
							<?$APPLICATION->IncludeComponent(
								"bitrix:menu",
								"header",
								Array(
									"ALLOW_MULTI_SELECT" => "N",
									"CHILD_MENU_TYPE" => "left",
									"DELAY" => "Y",
									"MAX_LEVEL" => "3",
									"MENU_CACHE_GET_VARS" => array(""),
									"MENU_CACHE_TIME" => "3600",
									"MENU_CACHE_TYPE" => "A",
									"MENU_CACHE_USE_GROUPS" => "N",
									"ROOT_MENU_TYPE" => "top",
									"USE_EXT" => "Y"
								)
							);?>
						</nav>
					</div>
				</div>
				<?$APPLICATION->IncludeComponent(
					"bitrix:search.form",
					"header",
					Array(
						"PAGE" => "/search/index.php",
						"USE_SUGGEST" => "N"
					)
				);?>
			</div>
		</div>
	</header>
	<main class="page <?$APPLICATION->ShowProperty("class_main")?>">
		<?
		if(!$home) {
		?>
		<?$APPLICATION->IncludeComponent(
			"bitrix:breadcrumb",
			"breadcrumb",
			Array(
				"PATH" => "",
				"SITE_ID" => "s1",
				"START_FROM" => "0"
			)
		);?>
		
		<?
		
			}
		?>