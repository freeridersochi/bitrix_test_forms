<!--
<form class="contact-form__form" action="/" method="POST">
    <div class="contact-form__form-inputs">
        <div class=" contact-form__input">
            <label class="input__label" for="medicine_name">
            <div class="input__label-text">Ваше имя*</div>
            <input class="input__input inputtext" type="text" 
                    id="medicine_name" 
                    name="form_text_10" 
                    value=""
                    required=""
                    type="text">
            <div class="input__notification">Поле должно содержать не менее 3-х символов</div>
            </label>
        </div>
        <div class="input contact-form__input">
            <label class="input__label" for="medicine_company">
            <div class="input__label-text">Компания/Должность*</div>
            <input class="input__input" 
                    type="text" 
                    id="medicine_company" 
                    name="form_text_11" 
                    value=""
                    required="">
            <div class="input__notification">Поле должно содержать не менее 3-х символов</div>
        </label></div>
        <div class="input contact-form__input">
            <label class="input__label" for="medicine_email">
            <div class="input__label-text">Email*</div>
            <input class="input__input" 
                    type="email" 
                    id="medicine_email" 
                    name="form_email_12" 
                    value=""
                   required="">
            <div class="input__notification">Неверный формат почты</div>
        </label></div>
        
        <div class="input contact-form__input">
            <label class="input__label" for="medicine_phone">
            <div class="input__label-text">Номер телефона*</div>
            <input class="input__input" 
                    type="tel" 
                    id="medicine_phone"
                    data-inputmask="'mask': '+79999999999', 'clearIncomplete': 'true'"
                    maxlength="12"
                    x-autocompletetype="phone-full" 
                    name="form_textarea_answer_14 "
                    value="" 
                    required="">
            </label>
            </div>
    </div>
    <div class="contact-form__form-message">
        <div class="input"><label class="input__label" for="medicine_message">
            <div class="input__label-text">Сообщение</div>
            <textarea class="input__input inputtextarea" 
                        type="text" 
                        id="medicine_message" 
                        name="form_textarea_answer_15"
                      value=""></textarea>
            <div class="input__notification"></div>
        </label></div>
    </div>
    <div class="contact-form__bottom">
        <div class="contact-form__bottom-policy">Нажимая &laquo;Отправить&raquo;, Вы&nbsp;подтверждаете, что
            ознакомлены, полностью согласны и&nbsp;принимаете условия &laquo;Согласия на&nbsp;обработку персональных
            данных&raquo;.
        </div>
        <button class="form-button contact-form__bottom-button" 
            data-success="Отправлено"
            data-error="Ошибка отправки">
            <div class="form-button__title">Оставить заявку</div>
        </button>
    </div>
    </div>
</form>
-->
<!-- contact form end -->

<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true):?>
    die();
<?endif;?>

<?$this->addExternalCss("/local/components/d_form.result.new_third_dem_edition/templates/.dem/css/common.css");?>

<?if ($arResult["isFormErrors"] == "Y"):?>
    <?=$arResult["FORM_ERRORS_TEXT"];?>
<?endif;?>

<?=$arResult["FORM_NOTE"]?>

<?if ($arResult["isFormNote"] != "Y"):?>
    <?=$arResult["FORM_HEADER"];?>
    
    <div class="contact-form">
            
        <!-- Form title -->
        <?if ($arResult["isFormDescription"] == "Y" || $arResult["isFormTitle"] == "Y" || $arResult["isFormImage"] == "Y"):?>
        	<div class="contact-form__head">
    		        <!-- TITLE -->
        		    <?if ($arResult["isFormTitle"]):?>
        		        <div class="contact-form__head-title"><?=$arResult["FORM_TITLE"]?> <!--Связаться --></div>
                    <?endif ;// result have title;?>
                	
                	<!-- DESCRIPTION -->
                	<? if ($arResult["isFormDescription"]=="Y"):?>
                	    <div class="contact-form__head-text">><?=$arResult["FORM_DESCRIPTION"]?><!--Наши сотрудники помогут выполнить подбор услуги и&nbsp;расчет цены с&nbsp;учетом
                ваших требований -->
                        </div>
                    <? endif; //end form have description ?>
        	</div>
        <? endif; // tableend form have DESCRIPTION / TITLE / IMAGE;?>
        <!-- Form title END -->
        
        <!-- form body -->
        	<form class="contact-form__form" action="/" method="POST">    
        	   <div class="contact-form__form-inputs"> 
                	<?foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) :?>
                	    <? if( $arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'text' || $arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'email' ): ?>
                    	    <? //print_r($arQuestion[STRUCTURE][0][FIELD_TYPE]); ?>
                    		<div class="contact-form__input">
                        		<!-- HIDDEN INPUTS -->
                        		<? if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden'):?>
                        			<? echo $arQuestion["HTML_CODE"]; ?>
                        		<? endif; ?>
                        	    
                        	    <!-- show this code / ITEMS IN CICLE -->
                        			    <!-- input label -->
        			                    <label class="input__label" for="medicine_<?=$arQuestion['STRUCTURE'][0]['FIELD_TYPE']?>">
                                            <div class="input__label-text"> 
                                                <?=$arQuestion["CAPTION"]?>*
                                            </div>
                                            <div class="input__notification"> Поле должно содержать не менее 3-х символов</div>
                                        </label>
                        			    <!-- show ERRORS  -->
                        				<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
                        				    <span class="error-fld" title="<?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?>"></span>
                        				<?endif;?>
                        				<!-- END ERRORS  -->
                        				<?if ($arQuestion["REQUIRED"] == "Y"):?>
                        				    <?=$arResult["REQUIRED_SIGN"];//?>
                        				    <?=$arQuestion["IS_INPUT_CAPTION_IMAGE"] == "Y" ? "<br />".$arQuestion["IMAGE"]["HTML_CODE"] : ""?>
                        				<?endif;?>
        			                    <input class="input__input inputtext" 
        			                            type="text" 
                                                id="medicine_<?=strtolower($arQuestion["CAPTION"])?>" 
                                                name="form_<?=$arQuestion['STRUCTURE'][0]['FIELD_TYPE']?>_<?=$arQuestion['STRUCTURE'][0]['ID'];?>" 
                                                value=""
                                                required=""
                                                type="text">
                    		</div>
                		<? endif; ?>
                	<? endforeach ;?>
                	
                	<!-- textarea -->
                	<? if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'textarea'):?>
                    	<div class="contact-form__form-message">
                    	    <div class="input">
                    	        <label class="input__label" for="medicine_message">
                            	    <div class="input__label-text">Сообщение</div>
                            	    <textarea name="form_textarea_<?=$arQuestion['STRUCTURE'][0]['ID'];?>" 
                            	           type="text"
                            	           class="inputtextarea input__input" 
                            	           id="medicine_message"
                            	           value="">
                            	    </textarea>
                    	        </label>
                    	    </div>
                    	</div>
                	<?endif;?>
                	
                </div>

            <!--
            <div class="input contact-form__input">
                <label class="input__label" for="medicine_phone">
                <div class="input__label-text">Номер телефона*</div>
                <input class="input__input" 
                        type="tel" 
                        id="medicine_phone"
                        data-inputmask="'mask': '+79999999999', 'clearIncomplete': 'true'"
                        maxlength="12"
                        x-autocompletetype="phone-full" 
                        name="form_textarea_answer_14 "
                        value="" 
                        required="">
                </label>
                </div>-->
        </div>
        	
        	<!-- Submit btn block -->
        	    <div class="contact-form__bottom">
                    <div class="contact-form__bottom-policy">Нажимая &laquo;Отправить&raquo;, Вы&nbsp;подтверждаете, что
                        ознакомлены, полностью согласны и&nbsp;принимаете условия &laquo;Согласия на&nbsp;обработку персональных
                        данных&raquo;.
                    </div>
                    <input <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?>
                        class="form-button contact-form__bottom-button"
                        type="submit" 
    				    name="web_form_submit"
                        data-success="Отправлено"
                        data-error="Ошибка отправки"
                        value="<?=htmlspecialcharsbx(trim($arResult["arForm"]["BUTTON"]) == '' ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>"/>
                        <!--<div class="form-button__title">Оставить заявку</div>-->
                </div>
        	<!-- Submit btn block END -->

        	
        	</form>
        <p>
        <?=$arResult["REQUIRED_SIGN"];?> - <?=GetMessage("FORM_REQUIRED_FIELDS")?>
        </p>
        
        <?=$arResult["FORM_FOOTER"]?>
        
        <!-- form body END -->
    
    </div><!-- fORM WRAP END -->
    
<?endif; // isForm_Note end;?>
