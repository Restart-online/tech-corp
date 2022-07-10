<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul class="menu-sidebar__list">

<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<?if($arItem["SELECTED"]):?>
		<li class="menu-sidebar__item"><a href="<?=$arItem["LINK"]?>"  class="menu-sidebar__link menu-sidebar__link_active"><?=$arItem["TEXT"]?></a></li>
	<?else:?>
		<li class="menu-sidebar__item"><a href="<?=$arItem["LINK"]?>"  class="menu-sidebar__link"><?=$arItem["TEXT"]?></a></li>
	<?endif?>
	
<?endforeach?>

</ul>
<?endif?>