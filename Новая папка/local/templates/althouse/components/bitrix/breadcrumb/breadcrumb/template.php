<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = ''; 
 /*
?>
	<section class="breadcumps">
			<div class="breadcumps__container">
				<ul class="breadcumps__body" itemscope itemtype="http://schema.org/BreadcrumbList">
					<li class="breadcumps__item item-breadcumps" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
						<a href="#" class="item-breadcumps__link" itemprop="item">Главная</a>
						<meta itemprop="position" content="'.($index + 1).'" />

					</li>
					<li class="breadcumps__item item-breadcumps" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
						<a href="#" class="item-breadcumps__link item-breadcumps__link_drop" itemprop="item">Услуги <span></span></a>
						<meta itemprop="position" content="'.($index + 1).'" />
						<div class="item-breadcumps__dropdown">
							<ul class="item-breadcumps__list">
								<li class="item-breadcumps__item">
									<a href="#" itemprop="item">Услуги 1</a>
									<meta itemprop="position" content="'.($index + 1).'" />

							</li>
								<li class="item-breadcumps__item"><a href="#">Услуги 2</a></li>
								<li class="item-breadcumps__item"><a href="#">Услуги 3</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
		</section>
<?

*/ 
#echo '<pre style="">';print_r($arResult);echo '</pre>';
foreach($arResult as $k=>$v) {
	$arrMenu = array('.left.menu.php', '.left.menu_ext.php');
	$arResult[$k]["DROP"] = false;
	foreach($arrMenu as $menu) {
		if(file_exists($_SERVER["DOCUMENT_ROOT"] . $v['LINK'] . $menu)){
			$arResult[$k]["DROP"] = true;
			include $_SERVER["DOCUMENT_ROOT"] . $v['LINK'] . $menu;
			$arResult[$k]["MENU"] = $aMenuLinks;
			break;
		}
	}
	
    #echo '<pre style="">';print_r($_SERVER["DOCUMENT_ROOT"] . $v['LINK'] . '.left.menu.php');echo '</pre>';
}
$strReturn .= '<section class="breadcumps">
	<div class="breadcumps__container">
		<ul class="breadcumps__body" itemscope itemtype="http://schema.org/BreadcrumbList">';
#echo '<pre style="">';print_r($arResult);echo '</pre>';
$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	#$arrow = ($index > 0? '<i class="fa fa-angle-right"></i>' : '');

	$drop = $arResult[$index]["DROP"];


	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .= '
			<li class="breadcumps__item item-breadcumps" id="bx_breadcrumb_'.$index.'" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				
				<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="item" class="item-breadcumps__link'; 
				if($index > 0 && $drop) {
					$strReturn .= '	item-breadcumps__link_drop';
				}	
				$strReturn .= '">
					'.$title;

				if($index > 0 && $drop) {
					$strReturn .= '	<span></span>';
				}

				$strReturn .= '</a>';
				if($index > 0 && $drop) {
					
					if($arResult[$index]["MENU"]) {
						$strReturn .= '
							<div class="item-breadcumps__dropdown">
								<ul class="item-breadcumps__list">';
						foreach($arResult[$index]["MENU"] as $menu) {
							if($menu[3]['DEPTH_LEVEL'] > 1)
								continue;
							$strReturn .= '<li class="item-breadcumps__item">
										<a href="' . $menu[1] . '" itemprop="item">' . $menu[0] . '</a>
				
									</li>';
							}		
						$strReturn .= '</ul>
							</div>';	
					}
				}
		$strReturn .= '		<meta itemprop="position" content="'.($index + 1).'" />
			</li>';
	}
	else
	{
		$strReturn .= '
			<li class="breadcumps__item item-breadcumps" id="bx_breadcrumb_'.$index.'" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="item" class="item-breadcumps__link'; 
				if($index > 0 && $drop) {
					$strReturn .= '	item-breadcumps__link_drop';
				}	
				$strReturn .= '">
					'.$title;

					if($index > 0 && $drop) {
						$strReturn .= '	<span></span>';
					}
	
					$strReturn .= '</a>';
				if($index > 0 && $drop) {
				
					if($arResult[$index]["MENU"]) {
						$strReturn .= '
							<div class="item-breadcumps__dropdown">
								<ul class="item-breadcumps__list">';
						foreach($arResult[$index]["MENU"] as $menu) {
							if($menu[3]['DEPTH_LEVEL'] > 1)
								continue;
							$strReturn .= '<li class="item-breadcumps__item">
										<a href="' . $menu[1] . '" itemprop="item">' . $menu[0] . '</a>
				
									</li>';
							}		
						$strReturn .= '</ul>
							</div>';	
					}
					
				}
				$strReturn .= '
				<meta itemprop="position" content="'.($index + 1).'" />
			</li>';
	}
}

$strReturn .= '</ul>
</div>
</section>';

return $strReturn;
