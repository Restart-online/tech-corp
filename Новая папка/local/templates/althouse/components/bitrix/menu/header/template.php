<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul class="menu__list">

<?
$previousLevel = 0;
foreach($arResult as $arItem):?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel && $previousLevel == 1):?>
		<?=str_repeat("</ul></div></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel && $previousLevel > 1):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>	

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li class="menu__item IS_PARENT DEPTH_LEVEL_<?=$arItem["DEPTH_LEVEL"]?>"><a href="<?=$arItem["LINK"]?>" class="menu__link menu__link_sub <?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a>
				<div class="menu__submenu">
					<div class="menu__submenu__body">
						<ul data-spollers data-one-spoller class="menu__sublist">
		<?else:?>
			<li class="menu__subitem IS_PARENT DEPTH_LEVEL_<?=$arItem["DEPTH_LEVEL"]?><?if ($arItem["SELECTED"]):?> item-selected <?endif?>">
				<a href="<?=$arItem["LINK"]?>" class="menu__sublink" data-spoller>
					<span><?=$arItem["TEXT"]?></span>
					<svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M0.142883 5C0.142883 4.44772 0.590599 4 1.14288 4H14.8572C15.4095 4 15.8572 4.44772 15.8572 5C15.8572 5.55228 15.4095 6 14.8572 6H1.14288C0.590599 6 0.142883 5.55228 0.142883 5Z" fill="white" />
						<path fill-rule="evenodd" clip-rule="evenodd" d="M10.3406 0.483368C10.7311 0.0928443 11.3643 0.0928445 11.7548 0.483369L15.5643 4.29289C15.9548 4.68342 15.9548 5.31658 15.5643 5.70711L11.7548 9.51663C11.3643 9.90716 10.7311 9.90716 10.3406 9.51663C9.95004 9.12611 9.95004 8.49294 10.3406 8.10242L13.443 5L10.3406 1.89758C9.95004 1.50706 9.95004 0.873893 10.3406 0.483368Z" fill="white" />
					</svg>
				</a>
				<ul class="sub-submenu">
					<li class="sub-submenu__item_back">
						<svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M0.142883 5C0.142883 4.44772 0.590599 4 1.14288 4H14.8572C15.4095 4 15.8572 4.44772 15.8572 5C15.8572 5.55228 15.4095 6 14.8572 6H1.14288C0.590599 6 0.142883 5.55228 0.142883 5Z" fill="white" />
							<path fill-rule="evenodd" clip-rule="evenodd" d="M10.3406 0.483368C10.7311 0.0928443 11.3643 0.0928445 11.7548 0.483369L15.5643 4.29289C15.9548 4.68342 15.9548 5.31658 15.5643 5.70711L11.7548 9.51663C11.3643 9.90716 10.7311 9.90716 10.3406 9.51663C9.95004 9.12611 9.95004 8.49294 10.3406 8.10242L13.443 5L10.3406 1.89758C9.95004 1.50706 9.95004 0.873893 10.3406 0.483368Z" fill="white" />
						</svg>

						<span>Назад</span>
					</li>
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="menu__item DEPTH_LEVEL_<?=$arItem["DEPTH_LEVEL"]?>"><a href="<?=$arItem["LINK"]?>" class="menu__link <?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li  class="PERMISSION menu__subitem<?if ($arItem["SELECTED"]):?> item-selected<?endif?>"><a class="menu__sublink" href="<?=$arItem["LINK"]?>"><span><?=$arItem["TEXT"]?></span>
					<svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M0.142883 5C0.142883 4.44772 0.590599 4 1.14288 4H14.8572C15.4095 4 15.8572 4.44772 15.8572 5C15.8572 5.55228 15.4095 6 14.8572 6H1.14288C0.590599 6 0.142883 5.55228 0.142883 5Z" fill="white" />
						<path fill-rule="evenodd" clip-rule="evenodd" d="M10.3406 0.483368C10.7311 0.0928443 11.3643 0.0928445 11.7548 0.483369L15.5643 4.29289C15.9548 4.68342 15.9548 5.31658 15.5643 5.70711L11.7548 9.51663C11.3643 9.90716 10.7311 9.90716 10.3406 9.51663C9.95004 9.12611 9.95004 8.49294 10.3406 8.10242L13.443 5L10.3406 1.89758C9.95004 1.50706 9.95004 0.873893 10.3406 0.483368Z" fill="white" />
					</svg>
				</a></li>
			<?endif?>

		<?else:?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="menu__item DEPTH_LEVEL_<?=$arItem["DEPTH_LEVEL"]?>"><a href="" class="menu__link <?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li class="2 sub-submenu__item"><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></div></li>", ($previousLevel-1) );?>
<?endif?>
	<li class="menu__item menu__item_city"></li>
		<li class="menu__item menu__item_callback"></li>
		<li class="menu__item menu__item_phoneOne"></li>
		<li class="menu__item menu__item_phoneTwo"></li>
</ul>

<?endif?>