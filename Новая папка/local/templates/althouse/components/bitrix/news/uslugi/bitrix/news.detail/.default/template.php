<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
#echo '<pre style="">';print_r($arResult["PREVIEW_PICTURE"]);echo '</pre>';
$arResult["PREVIEW_PICTURE_RESIZE"] = CFile::ResizeImageGet($arResult["PREVIEW_PICTURE"], array('width'=>960, 'height'=>960), BX_RESIZE_IMAGE_EXACT); 
?>
<section class="computer__header computer-header">
	<div class="computer-header__wrapper">
		<div class="computer-header__caption">
			<?=($arResult['DISPLAY_PROPERTIES']['SPECIAL_NAME']['DISPLAY_VALUE'] ? htmlspecialcharsBack($arResult['DISPLAY_PROPERTIES']['SPECIAL_NAME']['DISPLAY_VALUE']) : $arResult["NAME"])?>
		</div>
		<ul class="computer-header__list">
			<?
				if($arResult['DISPLAY_PROPERTIES']['HEADER_LIST']['DISPLAY_VALUE'] && !is_array($arResult['DISPLAY_PROPERTIES']['HEADER_LIST']['DISPLAY_VALUE']))
					$arResult['DISPLAY_PROPERTIES']['HEADER_LIST']['DISPLAY_VALUE'] = array($arResult['DISPLAY_PROPERTIES']['HEADER_LIST']['DISPLAY_VALUE']);
				foreach($arResult['DISPLAY_PROPERTIES']['HEADER_LIST']['DISPLAY_VALUE'] as $val) {
			?>
				<li class="computer-header__item"><?=$val?></li>
			<?		
				}
			?>

		</ul>
		<div class="computer-header__bottom">
			<div class="computer-header__consultation"><?=$arResult['DISPLAY_PROPERTIES']['HEADER_CONSULTATION']['DISPLAY_VALUE']?></div>
			<div class="button button--blue computer-header__button" data-popup="#elementServicePopup" data-popup-info="<?=$arResult['DISPLAY_PROPERTIES']['NAME_MODAL']['DISPLAY_VALUE']?>"><?=$arResult['DISPLAY_PROPERTIES']['HEADER_BUTTON']['DISPLAY_VALUE']?></div>
		</div>
	</div>
	<div class="computer-header__background">
	<picture><source srcset="<?=$arResult["PREVIEW_PICTURE_RESIZE"]['src']?>" type="<?=$arResult["PREVIEW_PICTURE"]["CONTENT_TYPE"]?>"><img src="<?=$arResult["PREVIEW_PICTURE_RESIZE"]['src']?>" alt="<?echo $arResult["NAME"]?>" class="computer-header__picture"></picture>	
	
	</div>
</section>
<section class="computer__includes computer-includes">
	<div class="computer-includes__container">
		<div class="computer-includes__sidebar">
			<?=$arResult['DISPLAY_PROPERTIES']['INCLUDES_SIDEBAR']['DISPLAY_VALUE']?>			
		</div>
		<div class="computer-includes__content">
			<div class="computer-includes__caption">
				<?=$arResult['DISPLAY_PROPERTIES']['INCLUDES_CAPTION']['DISPLAY_VALUE']?>						
			</div>
			<div class="computer-includes__list">
				<?
					if($arResult['DISPLAY_PROPERTIES']['INCLUDES_LIST']['DISPLAY_VALUE'] && !is_array($arResult['DISPLAY_PROPERTIES']['INCLUDES_LIST']['DISPLAY_VALUE']))
						$arResult['DISPLAY_PROPERTIES']['INCLUDES_LIST']['DISPLAY_VALUE'] = array($arResult['DISPLAY_PROPERTIES']['INCLUDES_LIST']['DISPLAY_VALUE']);
					foreach($arResult['DISPLAY_PROPERTIES']['INCLUDES_LIST']['DISPLAY_VALUE'] as $val) {
				?>			
					<div class="computer-includes__item">
						<?=$val?>
					</div>
				<?		
					}
				?>				
			</div>
		</div>
	</div>
</section>
<?
#echo '<pre style="">';print_r($arResult['PROPERTIES']['TARIFFS']);echo '</pre>';
if($arResult['TARIFFS']){
?>
<section class="computer__tariff computer-tariff">
				<div class="computer-tariff__container">
					<div class="computer-tariff__caption">Тарифы на обслуживание ПК в Москве</div>
					<div class="computer-tariff__block">
						<div class="computer-tariff__slider">
							<div class="computer-tariff__subtitle">Количество компьютеров</div>
							<div class="computer-tariff__range js-tariff__range" data-min="<?=$arResult['DISPLAY_PROPERTIES']['PC_MIN']['DISPLAY_VALUE']?>" 
							data-max="<?=$arResult['DISPLAY_PROPERTIES']['PC_MAX']['DISPLAY_VALUE']?>" data-start="<?=$arResult['DISPLAY_PROPERTIES']['PC_START']['DISPLAY_VALUE']?>" data-input="computer"></div>
						</div>
						<div class="computer-tariff__slider">
							<div class="computer-tariff__subtitle">Количество серверов</div>
							<div class="computer-tariff__range js-tariff__range" data-min="<?=$arResult['DISPLAY_PROPERTIES']['SERVER_MIN']['DISPLAY_VALUE']?>" 
							data-max="<?=$arResult['DISPLAY_PROPERTIES']['SERVER_MAX']['DISPLAY_VALUE']?>" data-start="<?=$arResult['DISPLAY_PROPERTIES']['SERVER_START']['DISPLAY_VALUE']?>" data-input="server"></div>
						</div>
					</div>
					<div class="computer-tariff__unique tariff-unique js-tariff__unique" data-computer="<?=$arResult['DISPLAY_PROPERTIES']['PC_LIMIT']['DISPLAY_VALUE']?>"
					 data-server="<?=$arResult['DISPLAY_PROPERTIES']['SERVER_LIMIT']['DISPLAY_VALUE']?>">
						<div class="tariff-unique__caption">
							У вас больше <span data-computer></span> компьютеров или <span data-server></span> серверов?
						</div>
						<div class="tariff-unique__button">
							<div data-popup="#calculatorPopup" data-popup-info="Заказать расчет проекта" class="button button--blue">Заказать расчет проекта</div>
						</div>
					</div>
					<div class="computer-tariff__list">
					<?
				foreach($arResult['TARIFFS'] as $tariff) {
				?>
						<div class="tariff js-tariff" data-computer-price="<?/*=$tariff['PROPERTY_PC_PRICE_VALUE']*/?>900||800||650||500" data-steps="1-20||21-50||51-75||76-100" data-server-price="<?=$tariff['PROPERTY_SERVER_PRICE_VALUE']?>" data-min-price="<?=$tariff['PROPERTY_MINIMAL_PRICE_VALUE']?>">
							<div class="tariff__content">
								<div class="tariff__header">
									<div class="tariff__name js-tariff__name">
										<?=$tariff['PROPERTY_NAME_VALUE']?>
                  <span 
                  data-tariff-tippy="
                  Удалённая поддержка без ограничений, в рамках оговоренного режима поддержки.||
                  Гарантированное время реакции на обращение – 15 минут||
                  Первичный ИТ-аудит оборудования Заказчика с предоставлением экспресс-стчета||
                  Резервное копирование данных||
                  Профилактическое обслуживание, принтеров и МФУ: (заправка, чистка, смазка)||
                  Профилактическое обслуживание компьютеров и программного обеспечения (без ремонта): чистка от пыли, и системных реестров.||
                  Удалённое администрирование и мониторинг серверной и сетевой инфраструктуры||
                  Помощь в подборе и закупке оборудования и программного обеспечения||
                  Взаимодействие с поставщиками услуг (провайдеры, 1С, хостинг)||
                  Администрирование эл. почты||
                  Администрирование систем видеонаблюдения"
                  class="tariff__tippy">
                    i
                  </span>
									</div>
									<div class="tariff__price"><span class="js-tariff__price"><?=$tariff['PROPERTY_MINIMAL_PRICE_VALUE']?></span> &#8381; / мес.</div>
								</div>
								<div class="tariff__description">
									<?
									foreach($tariff['PROPERTY_OPTIONS_VALUE'] as $k=>$option) {
									?>
									<div class="tariff__option">
										<span class="tariff__label"><?=$option?></span>
										<span class="tariff__value"><?=$tariff['PROPERTY_OPTIONS_DESCRIPTION'][$k]?></span>
									</div>
									<?	
										}
									?>
								</div>
							</div>
							<div class="tariff__button">
								<div data-popup="#calculatorPopup" data-popup-info="Забронировать" class="button button--blue button--block">Забронировать</div>
							</div>
						</div>
						<?	
				}
			?>		
					</div>
				</div>
			</section>
			<?	
				/*
			?>	
<section class="computer__tariff computer-tariff">
	<div class="computer-tariff__container">
		<div class="computer-tariff__caption">Тарифы на обслуживание ПК в Москве</div>
		<div class="computer-tariff__block">
			<div class="computer-tariff__slider">
				<div class="computer-tariff__subtitle">Количество компьютеров</div>
				<div class="computer-tariff__range js-tariff__range" data-min="<?=$arResult['DISPLAY_PROPERTIES']['PC_MIN']['DISPLAY_VALUE']?>" 
				data-max="<?=$arResult['DISPLAY_PROPERTIES']['PC_MAX']['DISPLAY_VALUE']?>" data-start="<?=$arResult['DISPLAY_PROPERTIES']['PC_START']['DISPLAY_VALUE']?>" data-input="computer"></div>
			</div>
			<div class="computer-tariff__slider">
				<div class="computer-tariff__subtitle">Количество серверов</div>
				<div class="computer-tariff__range js-tariff__range" data-min="<?=$arResult['DISPLAY_PROPERTIES']['SERVER_MIN']['DISPLAY_VALUE']?>" data-max="<?=$arResult['DISPLAY_PROPERTIES']['SERVER_MAX']['DISPLAY_VALUE']?>" 
				data-start="<?=$arResult['DISPLAY_PROPERTIES']['SERVER_START']['DISPLAY_VALUE']?>" data-input="server"></div>
			</div>
		</div>
		<div class="computer-tariff__unique tariff-unique js-tariff__unique" data-computer="<?=$arResult['DISPLAY_PROPERTIES']['PC_LIMIT']['DISPLAY_VALUE']?>" 
		data-server="<?=$arResult['DISPLAY_PROPERTIES']['SERVER_LIMIT']['DISPLAY_VALUE']?>">
			<div class="tariff-unique__caption">
				У вас больше <span data-computer></span> компьютеров или <span data-server></span> серверов?
			</div>
			<div class="tariff-unique__button">
				<div data-popup="#calculatorPopup" data-popup-info="Заказать расчет проекта" class="button button--blue">Заказать расчет проекта</div>
			</div>
		</div>
		<div class="computer-tariff__list">
		<?
				foreach($arResult['TARIFFS'] as $tariff) {
				?>
					<div class="tariff js-tariff" data-computer-price="<?=$tariff['PROPERTY_PC_PRICE_VALUE']?>" data-server-price="<?=$tariff['PROPERTY_SERVER_PRICE_VALUE']?>"
					 data-min-price="<?=$tariff['PROPERTY_MINIMAL_PRICE_VALUE']?>">
						<div class="tariff__content">
							<div class="tariff__header">
								<div class="tariff__name js-tariff__name"><?=$tariff['PROPERTY_NAME_VALUE']?></div>
								<div class="tariff__price"><span class="js-tariff__price"><?=$tariff['PROPERTY_MINIMAL_PRICE_VALUE']?></span> &#8381; / мес.</div>
							</div>
							<div class="tariff__description">
								<?
								foreach($tariff['PROPERTY_OPTIONS_VALUE'] as $k=>$option) {
								?>
								<div class="tariff__option">
									<span class="tariff__label"><?=$option?></span>
									<span class="tariff__value"><?=$tariff['PROPERTY_OPTIONS_DESCRIPTION'][$k]?></span>
								</div>
								<?	
									}
								?>
							</div>
						</div>
						<div class="tariff__button">
							<div data-popup="#calculatorPopup" data-popup-info="Забронировать" class="button button--blue button--block">Забронировать</div>
						</div>
					</div>				
				<?	
				}
			?>				
		</div>
	</div>
</section>
<?	
*/
				/*
			?>	
<section class="computer__tariff computer-tariff">
	<div class="computer-tariff__container">
		<div class="computer-tariff__caption">Тарифы на обслуживание ПК в Москве</div>
		<div class="computer-tariff__block">
			<div class="computer-tariff__slider">
				<div class="computer-tariff__subtitle">Количество компьютеров</div>
				<input type="hidden" name="computer" class="computer-tariff__input js-tariff__input">
				<div class="computer-tariff__range js-tariff__range" data-min="<?=$arResult['DISPLAY_PROPERTIES']['PC_MIN']['DISPLAY_VALUE']?>" 
				data-max="<?=$arResult['DISPLAY_PROPERTIES']['PC_MAX']['DISPLAY_VALUE']?>" data-start="<?=$arResult['DISPLAY_PROPERTIES']['PC_START']['DISPLAY_VALUE']?>"></div>
			</div>
			<div class="computer-tariff__slider">
				<div class="computer-tariff__subtitle">Количество серверов</div>
				<input type="hidden" name="server" class="computer-tariff__input js-tariff__input">
				<div class="computer-tariff__range js-tariff__range" data-min="<?=$arResult['DISPLAY_PROPERTIES']['SERVER_MIN']['DISPLAY_VALUE']?>" 
				data-max="<?=$arResult['DISPLAY_PROPERTIES']['SERVER_MAX']['DISPLAY_VALUE']?>" data-start="<?=$arResult['DISPLAY_PROPERTIES']['SERVER_START']['DISPLAY_VALUE']?>"></div>
			</div>
		</div>
		<div class="computer-tariff__unique tariff-unique js-tariff__unique" data-computer="<?=$arResult['DISPLAY_PROPERTIES']['PC_LIMIT']['DISPLAY_VALUE']?>" 
		data-server="<?=$arResult['DISPLAY_PROPERTIES']['SERVER_LIMIT']['DISPLAY_VALUE']?>">
			<div class="tariff-unique__caption">
				У вас больше <span data-computer></span> компьютеров или <span data-server></span> серверов?
			</div>
			<div class="tariff-unique__button">
				<div data-popup="#blueButtonPopup" data-popup-info="Заказать расчет проекта" class="button button--blue">Заказать расчет проекта</div>
			</div>
		</div>
		<div class="computer-tariff__list">
			<?
				foreach($arResult['TARIFFS'] as $tariff) {
				?>
					<div class="tariff js-tariff" data-computer-price="<?=$tariff['PROPERTY_PC_PRICE_VALUE']?>" data-server-price="<?=$tariff['PROPERTY_SERVER_PRICE_VALUE']?>" data-min-price="<?=$tariff['PROPERTY_MINIMAL_PRICE_VALUE']?>">
						<div class="tariff__content">
							<div class="tariff__header">
								<div class="tariff__name"><?=$tariff['PROPERTY_NAME_VALUE']?></div>
								<div class="tariff__price"><span class="js-tariff__price"><?=$tariff['PROPERTY_MINIMAL_PRICE_VALUE']?></span> &#8381; / мес.</div>
							</div>
							<div class="tariff__description">
								<?
								foreach($tariff['PROPERTY_OPTIONS_VALUE'] as $k=>$option) {
								?>
								<div class="tariff__option">
									<span class="tariff__label"><?=$option?></span>
									<span class="tariff__value"><?=$tariff['PROPERTY_OPTIONS_DESCRIPTION'][$k]?></span>
								</div>
								<?	
									}
								?>
								
							</div>
						</div>
						<div class="tariff__button">
							<div data-popup="#tariffPopup" data-popup-info="Забронировать" class="button button--blue button--block">Забронировать</div>
						</div>
					</div>
				<?	
				}
			?>			
		</div>
	</div>
</section>
	<?	
				*/
			?>	
<?
}
?>
<?
if($arResult['DISPLAY_PROPERTIES']['ORDER_CONTENT']['VALUE']){
?>
<section class="computer__order computer-order">
	<div class="computer-order__container">
		<div class="computer-order__sidebar">
			<div class="computer-order__caption">
				<?=$arResult['DISPLAY_PROPERTIES']['ORDER_CAPTION']['DISPLAY_VALUE']?>		
				
			</div>
			<div class="computer-order__description">
				<?=$arResult['DISPLAY_PROPERTIES']['ORDER_DESCRIPTION']['DISPLAY_VALUE']?>						
			</div>
		</div>
		<div class="computer-order__content">
			<?
				#echo '<pre style="">';print_r($arResult['DISPLAY_PROPERTIES']['ORDER_CONTENT']);echo '</pre>';
				if($arResult['DISPLAY_PROPERTIES']['ORDER_CONTENT']['DISPLAY_VALUE'] && !is_array($arResult['DISPLAY_PROPERTIES']['ORDER_CONTENT']['DISPLAY_VALUE']))
					$arResult['DISPLAY_PROPERTIES']['ORDER_CONTENT']['DISPLAY_VALUE'] = array($arResult['DISPLAY_PROPERTIES']['ORDER_CONTENT']['DISPLAY_VALUE']);
				foreach($arResult['DISPLAY_PROPERTIES']['ORDER_CONTENT']['DISPLAY_VALUE'] as $k=>$val) {
			?>			
				<div class="computer-order__item">
					<div class="computer-order__title"><?=($k+1)?>. <?=$arResult['DISPLAY_PROPERTIES']['ORDER_CONTENT']['DESCRIPTION'][$k]?></div>
					<div class="computer-order__text">
						<?=$val?>
					</div>
				</div>
			<?		
				}
			?>		
			
		</div>
	</div>
</section>
<?
}
?>