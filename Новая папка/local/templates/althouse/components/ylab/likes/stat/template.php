<?php
CJSCore::Init(['YlabLikesForm']);
?>
<div class="article-body__rating votes_bar" data-element="<?= $arParams['ELEMENT_ID'] . "," . $arParams['ENTITY_ID'] ?>">
    <div class="article-body__rate article-body__rate--like">
        <svg class="article-body__icon article-body__icon--like">
            <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/icons/sprite.svg#like"></use>
        </svg>
        <span class="counter js-like-counter"><?= (!empty($arResult['STAT']['COUNT_LIKE']) ? $arResult['STAT']['COUNT_LIKE'] : 0 ) ?></span>
    </div>
    <div class="article-body__rate article-body__rate--dislike">
        <svg class="article-body__icon article-body__icon--dislike">
            <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/icons/sprite.svg#like"></use>
        </svg>
        <span class="counter js-dislike-counter"><?= (!empty($arResult['STAT']['COUNT_DISLIKE']) ? $arResult['STAT']['COUNT_DISLIKE'] : 0 ) ?></span>
    </div>
</div>	
<!--
<div class="votes_bar" data-element="<?= $arParams['ELEMENT_ID'] . "," . $arParams['ENTITY_ID'] ?>">
    <div class="vote_action">
        <sup class="counter js-like-counter"><?= (!empty($arResult['STAT']['COUNT_LIKE']) ? $arResult['STAT']['COUNT_LIKE'] : 0 ) ?></sup>
        <button class="like js-like-action <?= ($arResult['STAT']['IS_VOTED'] == 'LIKE' ? "is-active" : "")?>"
                onclick="BX.Ylab.Likes.setLike(<?= $arParams['ELEMENT_ID'] ?>,<?= $arParams['ENTITY_ID'] ?>, (new UpdateCounters(<?= CUtil::PhpToJSObject($arParams)?>)).readData)">Like</button>
    </div>
    <?if($arParams['HIDDEN_DISLIKE'] != 'Y'){?>
        <div class="vote_action">
            <sup class="counter js-dislike-counter"><?= (!empty($arResult['STAT']['COUNT_DISLIKE']) ? $arResult['STAT']['COUNT_DISLIKE'] : 0 ) ?></sup>
            <button class="dislike js-dislike-action <?= ($arResult['STAT']['IS_VOTED'] == 'DISLIKE' ? "is-active" : "")?>"
                    onclick="BX.Ylab.Likes.setDislike(<?= $arParams['ELEMENT_ID'] ?>,<?= $arParams['ENTITY_ID'] ?>, (new UpdateCounters(<?= CUtil::PhpToJSObject($arParams)?>)).readData)">Dislike</button>
        </div>
    <?}?>
</div>

    -->