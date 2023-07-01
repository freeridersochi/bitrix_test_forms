<!-- contact form start -->
<div class="contact-form">
    <!-- Form title -->
    <div class="contact-form__head">
        <div class="contact-form__head-title">Связаться</div>
        <div class="contact-form__head-text">Наши сотрудники помогут выполнить подбор услуги и&nbsp;расчет цены с&nbsp;учетом
            ваших требований
        </div>
    </div>
    <!-- Form body start -->
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
    </form>-->
    <!--contact-form__form-inputs end -->
</div>
<!-- contact form end -->

<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true):?>
    die();
<?endif;?>

<?if ($arResult["isFormErrors"] == "Y"):?>
    <?=$arResult["FORM_ERRORS_TEXT"];?>
<?endif;?>

<?=$arResult["FORM_NOTE"]?>

<?if ($arResult["isFormNote"] != "Y"):?>
    <?=$arResult["FORM_HEADER"]; 
    $this->addExternalCss("/local/components/dv_form.result.new/templates/.dem/css/common.css");?>
    
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
        <table class="form-table data-table">
        	
        	<thead>
        		<tr>
        			<th colspan="2">&nbsp;</th>
        		</tr>
        	</thead>
        	
        	    
        	<form class="contact-form__form" action="/" method="POST">    
        	   <div class="contact-form__form-inputs"> 
                	<?foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) :?>
                	    <? print_r($arQuestion['STRUCTURE'][0]['ID']); ?>
                		<div class=" contact-form__input">
                    		<!-- HIDDEN INPUTS -->
                    		<? if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden') :?>
                    			
                    			<? echo $arQuestion["HTML_CODE"]; ?>
                    			
                    		<? endif; ?>
                    	    
                    	    <!-- show this code / ITEMS IN CICLE -->
                    		<tr>
                    			<td class="2">
                    			    <!-- input label -->
    			                    <label class="input__label" for="medicine_name">
                                        <div class="input__label-text">Ваше имя*</div>
                                        <div class="input__notification">Поле должно содержать не менее 3-х символов</div>
                                    </label>
                    			    
                    			    <!-- show ERRORS  -->
                    				<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
                    				    <span class="error-fld" title="<?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?>"></span>
                    				<?endif;?>
                    				<!-- END ERRORS  -->
                    				
                    				<?=$arQuestion["CAPTION"]?>
                    				
                    				<?if ($arQuestion["REQUIRED"] == "Y"):?>
                    				    <?=$arResult["REQUIRED_SIGN"];//123?>
                    				<?endif;?>
                    				
                    				<?=$arQuestion["IS_INPUT_CAPTION_IMAGE"] == "Y" ? "<br />".$arQuestion["IMAGE"]["HTML_CODE"] : ""?>
                    				
                    			</td>
                    			
                    			<td class="3">
                    			   <!-- input -->
                    			   124 <?=111//print_r($arQuestion["HTML_CODE"]);?> 124
                    			                   <input class="input__input inputtext" 
                    			                            type="text" 
                                                            id="medicine_name" 
                                                            name="form_text_<?=$arQuestion['STRUCTURE'][0]['ID'];?>" 
                                                            value=""
                                                            required=""
                                                            type="text">
                    			</td>
                    			
                		    </tr>
                		</div>
                	<? endforeach ;?>
                </div>
        	
        
            <!--

            
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
            </label></div>-->
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
        	<tfoot>
        		<tr>
        			<th colspan="2">
        				<input <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> 
        				    type="submit" 
        				    name="web_form_submit" 
        				    value="<?=htmlspecialcharsbx(trim($arResult["arForm"]["BUTTON"]) == '' ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" />
        			</th>
        		</tr>
        	</tfoot>
        	<!-- Submit btn block END -->
        	
        	</form>
        	
        </table>
        
        <p>
        <?=$arResult["REQUIRED_SIGN"];?> - <?=GetMessage("FORM_REQUIRED_FIELDS")?>
        </p>
        
        <?=$arResult["FORM_FOOTER"]?>
        
        <!-- form body END -->
    
    </div><!-- fORM WRAP END -->
    
<?endif; // isForm_Note end;?>
