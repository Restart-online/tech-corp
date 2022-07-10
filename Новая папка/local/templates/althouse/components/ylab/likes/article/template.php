<?php
CJSCore::Init(['YlabLikesForm']);
?>
<div class="article-liked__rates votes_bar" data-element="<?= $arParams['ELEMENT_ID'] . "," . $arParams['ENTITY_ID'] ?>">
   
    <label class="article-liked__label vote_action like js-like-action <?= ($arResult['STAT']['IS_VOTED'] == 'LIKE' ? "is-active" : "")?>">
        <sup style="display:none;" class="counter js-like-counter"><?= (!empty($arResult['STAT']['COUNT_LIKE']) ? $arResult['STAT']['COUNT_LIKE'] : 0 ) ?></sup>
        <input class="article-liked__input" <?= ($arResult['STAT']['IS_VOTED'] == 'LIKE' ? "checked" : "")?> type="radio" value="1" hidden name="grade" onchange="BX.Ylab.Likes.setLike(<?= $arParams['ELEMENT_ID'] ?>,<?= $arParams['ENTITY_ID'] ?>, (new UpdateCounters(<?= CUtil::PhpToJSObject($arParams)?>)).readData)">
        
        <svg class="article-liked__rate article-liked__rate--like">
            <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/icons/sprite.svg#like"></use>
        </svg>
    </label>
    <?if($arParams['HIDDEN_DISLIKE'] != 'Y'){?>
        <label class="article-liked__label vote_action dislike js-dislike-action <?= ($arResult['STAT']['IS_VOTED'] == 'DISLIKE' ? "is-active" : "")?>">
            <sup style="display:none;" class="counter js-dislike-counter"><?= (!empty($arResult['STAT']['COUNT_DISLIKE']) ? $arResult['STAT']['COUNT_DISLIKE'] : 0 ) ?></sup>
            <input class="article-liked__input" <?= ($arResult['STAT']['IS_VOTED'] == 'DISLIKE' ? "checked" : "")?> type="radio" value="-1" name="grade" hidden onchange="BX.Ylab.Likes.setDislike(<?= $arParams['ELEMENT_ID'] ?>,<?= $arParams['ENTITY_ID'] ?>, (new UpdateCounters(<?= CUtil::PhpToJSObject($arParams)?>)).readData)">
            <svg class="article-liked__rate article-liked__rate--dislike">
                <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/icons/sprite.svg#like"></use>
            </svg>
        </label>
    <?}?>
</div>	
<?/*
<div class="votes_bar" data-element="<?= $arParams['ELEMENT_ID'] . "," . $arParams['ENTITY_ID'] ?>">    
    <?if($arParams['HIDDEN_DISLIKE'] != 'Y'){?>
        <div class="vote_action">
            <sup class="counter js-dislike-counter"><?= (!empty($arResult['STAT']['COUNT_DISLIKE']) ? $arResult['STAT']['COUNT_DISLIKE'] : 0 ) ?></sup>
            <button class="dislike js-dislike-action <?= ($arResult['STAT']['IS_VOTED'] == 'DISLIKE' ? "is-active" : "")?>"
                    onclick="BX.Ylab.Likes.setDislike(<?= $arParams['ELEMENT_ID'] ?>,<?= $arParams['ENTITY_ID'] ?>, (new UpdateCounters(<?= CUtil::PhpToJSObject($arParams)?>)).readData)">Dislike</button>
        </div>
    <?}?>
    <div class="vote_action">
        <sup class="counter js-like-counter"><?= (!empty($arResult['STAT']['COUNT_LIKE']) ? $arResult['STAT']['COUNT_LIKE'] : 0 ) ?></sup>
        <button class="like js-like-action <?= ($arResult['STAT']['IS_VOTED'] == 'LIKE' ? "is-active" : "")?>"
                onclick="BX.Ylab.Likes.setLike(<?= $arParams['ELEMENT_ID'] ?>,<?= $arParams['ENTITY_ID'] ?>, (new UpdateCounters(<?= CUtil::PhpToJSObject($arParams)?>)).readData)">Like</button>
    </div>
</div>
 */  
?>