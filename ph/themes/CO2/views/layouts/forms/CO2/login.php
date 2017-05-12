
<?php HtmlHelper::registerCssAndScriptsFiles( array('/js/default/loginRegister.js') , $this->module->assetsUrl); ?>

<style>
    .no-display {
        display: none;
    }
    .help-block{
        color:red;
    }
    .topLogoAnim{
      background-color: rgba(255, 255, 255, 0);
      position: absolute;
      z-index: 10;
      top: 65px !important;
      right: 13%;
      width: 400px;
      padding-left: 10px;
    }
    .topLogoAnim .homestead{
      font-size:41px !important;
      font-weight: 100 !important;
    }
    .titleWhite, .subTitle {
    color: #3C5665 !important;
    }
    .subTitle {
        font-weight: 300;
        font-size: 13px;
        margin-top: -15px !important;
    }
@media (min-width: 768px) and (max-width: 991px) {
 .topLogoAnim{
        top: 40px !important;
          right: 6%;
          
     }
     .topLogoAnim .homestead{
      font-size:25px !important;
    }   
    .subTitle {
        font-size: 10px;
    }
}
@media (max-width: 768px){
    .topLogoAnim{
        top: 75px !important;
          right: 1%;
          
     }
     .topLogoAnim .homestead{
      font-size:23px !important;
    }   
    .subTitle {
        font-size: 9px;
    margin-top: 7px !important;
    }
}
</style>

<style>
    .box-login{
        width:540px;
        display: inline-block;
        border-left:1px solid #CCC !important;
    }
    .box-login label{
        font-size:9px;
        margin-bottom: 2px;
    }
    .box-login .form-control{
        font-weight: 300;
        padding: 3px 10px;
        height:27px;
    }
    .loginBtn{
        height:27px;
        font-size:11px;
        margin-top:7px;
    }


    @media screen and (max-width: 992px) {
        .box-login{
            width:540px;
        }
    } 

    @media (max-width: 767px) {
        .box-login{
            width:300px;
            border-left:0px solid #CCC !important;
        }
    }

</style>
<form class="form-login box-login" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="col-md-12 col-sm-12 col-xs-12 no-padding text-left pull-right">

        <div class="hidden-xs col-md-4 col-sm-4 col-xs-12 text-left pull-right">          
            <button class="btn btn-success loginBtn bg-green-k" type="submit">
                <i class="fa fa-sign-in"></i> Connexion
            </button><br><br>
        </div>

        <div class="col-md-4 col-sm-4 col-xs-6 no-padding text-left pull-right">
            <label><i class="fa fa-key"></i> Un mot de passe</label> 
            <input class="form-control" name="password" id="password-login" type="password" placeholder="mot de passe"><br>
             <button class="btn btn-link no-margin btn-sm" data-toggle="modal" data-target="#modalForgot">
                <!-- <i class="fa fa-s"></i> -->J'ai perdu mon mot de passe
            </button>
        </div>

        <div class="col-md-4 col-sm-4 col-xs-6 text-left pull-right">
            <label><i class="fa fa-envelope"></i> Un e-mail</label> 
            <input class="form-control" name="email" id="email-login" type="text" placeholder="e-mail"><br>
            <label for="remember" class="checkbox-inline">
                <input type="checkbox" id="remember" name="remember">
                Se souvenir de moi
            </label>
        </div>

        <div class="visible-xs col-xs-12 text-left pull-right">          
            <button class="btn btn-success loginBtn bg-green-k" type="submit">
                <i class="fa fa-sign-in"></i> Connexion
            </button><br><br>
        </div>

        <div class="form-actions col-md-12 no-padding" style="margin-top:5px;">
            <div class="errorHandler alert alert-danger no-display loginResult">
                <i class="fa fa-remove-sign"></i> <?php echo Yii::t("login","Please verify your entries.") ?>
            </div>
            <div class="alert alert-danger no-display notValidatedEmailResult">
                <i class="fa fa-remove-sign"></i><?php echo Yii::t("login","Your account is not validated : please check your mailbox to validate your email address.") ?>
                      <?php echo Yii::t("login","If you didn't receive it or lost it, click") ?>
                      <a class="validate" href="#" 
                      onclick="showPanel('box-email', 
                        function() {
                            emailType = 'validateEmail';
                            $('#email2').val($('#email-login').val());
                            $('#email3').val($('#email-login').val());
                            $('.forgotBtn .ladda-label').text(buttonLabel[emailType])});">
                      <?php echo Yii::t("login","here") ?></a> <?php echo Yii::t("login","to receive it again.") ?> 
            </div>
            <div class="alert alert-info no-display betaTestNotOpenResult">
                <i class="fa fa-remove-sign"></i><?php echo Yii::t("login","Our developpers are fighting to open soon ! Check your mail that will happen soon !")?>
            </div>
            <div class="alert alert-success no-display emailValidated">
                <i class="fa fa-check"></i> <?php echo Yii::t("login","Your account is now validated ! Please try to login.") ?>
            </div>
            <div class="alert alert-danger no-display custom-msg">
                <i class="fa fa-remove-sign"></i> <?php echo Yii::t("login","You have some form errors. Please check below.") ?>
            </div>
            <div class="alert alert-danger no-display emailAndPassNotMatchResult">
                <i class="fa fa-remove-sign"></i><?php echo Yii::t("login","Email or password does not match. Please try again !")?>
            </div>
            <div class="alert alert-danger no-display emailNotFoundResult">
                <i class="fa fa-remove-sign"></i><?php echo Yii::t("login","Impossible to find an account for this username or password.")?>
            </div>  
        </div>
<!-- 
        <div class="col-md-12 no-padding text-center">
            <hr>
            <button class="btn bg-white" data-toggle="modal" data-target="#modalForgot">
                <!-- <i class="fa fa-s"></i> - ->J'ai perdu mon mot de passe
            </button>
            <br><br>
        </div> -->
    </div>      
</form>