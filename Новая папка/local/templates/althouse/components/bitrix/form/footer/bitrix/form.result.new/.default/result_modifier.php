<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$arResult["FORM_HEADER"] = preg_replace("#<form#", '<form id="' . $arResult['arForm']['SID'] . '" class="callback-footer__body"', $arResult["FORM_HEADER"]);
#echo '<pre style="">';print_r();echo '</pre>';
foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
 
    $arResult["QUESTIONS"][$FIELD_SID]["HTML_CODE"] = preg_replace("#<input#", '<input id="' . $FIELD_SID . "_" . $arQuestion['STRUCTURE'][0]["ID"] . '"' . ($arQuestion["REQUIRED"] == "Y" ? 'data-required' : ''), $arQuestion["HTML_CODE"]);
}