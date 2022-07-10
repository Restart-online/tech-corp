<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
CModule::IncludeModule("iblock");
if($arResult["DISPLAY_PROPERTIES"]['ORGANIZATION']['DISPLAY_VALUE']){
    $arSelect = Array("ID", "NAME", "PREVIEW_TEXT","PREVIEW_PICTURE","DETAIL_PICTURE","PROPERTY_LIST_1","PROPERTY_LIST_2","PROPERTY_HEADER_LIST_2","PROPERTY_HEADER_LIST_1",);
    $arFilter = Array("IBLOCK_ID"=> $arResult["DISPLAY_PROPERTIES"]['ORGANIZATION']['LINK_IBLOCK_ID'], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID"=>$arResult["DISPLAY_PROPERTIES"]['ORGANIZATION']['VALUE']);
    $res = CIBlockElement::GetList(Array("SORT" => "ASC"), $arFilter, false, false, $arSelect);
    if($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();
        $arResult["DISPLAY_PROPERTIES"]['ORGANIZATION']['DATA'] = $arFields ;
    }

    if($arFields["PREVIEW_PICTURE"])
        $arResult["DISPLAY_PROPERTIES"]['ORGANIZATION']['DATA']["PREVIEW_PICTURE_RESIZE"] = CFile::ResizeImageGet($arFields["PREVIEW_PICTURE"], array('width'=>266, 'height'=>266), BX_RESIZE_IMAGE_PROPORTIONAL_ALT ); 
    if($arFields["DETAIL_PICTURE"])
        $arResult["DISPLAY_PROPERTIES"]['ORGANIZATION']['DATA']["DETAIL_PICTURE_RESIZE"] = CFile::ResizeImageGet($arFields["DETAIL_PICTURE"], array('width'=>568, 'height'=>250), BX_RESIZE_IMAGE_EXACT);     
}
if($arResult["DISPLAY_PROPERTIES"]['STAGE']['DISPLAY_VALUE']){
    $arSelect = Array("ID", "NAME", "PREVIEW_TEXT","PREVIEW_PICTURE");
    $arFilter = Array("IBLOCK_ID"=> $arResult["DISPLAY_PROPERTIES"]['STAGE']['LINK_IBLOCK_ID'], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID"=>$arResult["DISPLAY_PROPERTIES"]['STAGE']['VALUE']);
    $res = CIBlockElement::GetList(Array("NAME" => "ASC"), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();
        if($arFields["PREVIEW_PICTURE"])
            $arFields["PREVIEW_PICTURE_RESIZE"] = CFile::ResizeImageGet($arFields["PREVIEW_PICTURE"], array('width'=>360, 'height'=>220), BX_RESIZE_IMAGE_EXACT );     
        $arResult["DISPLAY_PROPERTIES"]['STAGE']['DATA'][] = $arFields ;
    }

    
}
if($arResult["DISPLAY_PROPERTIES"]['PRICES']['DISPLAY_VALUE']){
    $arSelect = Array("ID", "NAME", "PROPERTY_TARIFF", "PROPERTY_PRICE", "PROPERTY_UNIT");
    $arFilter = Array("IBLOCK_ID"=> $arResult["DISPLAY_PROPERTIES"]['PRICES']['LINK_IBLOCK_ID'], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID"=>$arResult["DISPLAY_PROPERTIES"]['PRICES']['VALUE']);
    $res = CIBlockElement::GetList(Array("NAME" => "ASC"), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields(); 
        $arResult["DISPLAY_PROPERTIES"]['PRICES']['DATA'][$arFields['ID']] = $arFields ;
        if($arFields['PROPERTY_TARIFF_VALUE']) {
            $arSelect1 = Array("ID", "NAME", "PROPERTY_NAME",);
            $arFilter1 = Array("IBLOCK_ID"=> 17, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID"=>$arFields['PROPERTY_TARIFF_VALUE']);
            $res1 = CIBlockElement::GetList(Array("NAME" => "ASC"), $arFilter1, false, false, $arSelect1);
            if($ob1 = $res1->GetNextElement()) {
                $arFields1 = $ob1->GetFields(); 
                $arResult["DISPLAY_PROPERTIES"]['PRICES']['DATA'][$arFields['ID']]['PROPERTY_TARIFF_VALUE_ARRAY'] = $arFields1 ;
            } 
        }
    }          
}
if($arResult["DISPLAY_PROPERTIES"]['ARTICLES']['DISPLAY_VALUE']){
    $arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "PREVIEW_PICTURE", "DETAIL_PAGE_URL");
    $arFilter = Array("IBLOCK_ID"=> $arResult["DISPLAY_PROPERTIES"]['ARTICLES']['LINK_IBLOCK_ID'], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID"=>$arResult["DISPLAY_PROPERTIES"]['ARTICLES']['VALUE']);
    $res = CIBlockElement::GetList(Array("NAME" => "ASC"), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields(); 
        if($arFields["PREVIEW_PICTURE"])
            $arFields["PREVIEW_PICTURE_RESIZE"] = CFile::ResizeImageGet($arFields["PREVIEW_PICTURE"], array('width'=>360, 'height'=>350), BX_RESIZE_IMAGE_EXACT );     
        $arResult["DISPLAY_PROPERTIES"]['ARTICLES']['DATA'][] = $arFields ;        
    }          
}
#echo '<pre style="">';print_r($arResult["DISPLAY_PROPERTIES"]['ARTICLES']['DATA']);echo '</pre>';