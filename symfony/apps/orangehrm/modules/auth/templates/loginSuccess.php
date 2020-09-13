<?php // XXX: this is myFile ?>
<?php
//$imagePath = theme_path("images/login");
//echo stylesheet_tag(theme_path('css/login.css'));
$loginImage = sfConfig::get('sf_web_dir') . DIRECTORY_SEPARATOR . sfConfig::get('ohrm_resource_dir')
    . DIRECTORY_SEPARATOR . '/themes/default/images/login/login.svg';
?>
<?php echo stylesheet_tag(theme_path('css/bootstrap.min.css')); ?>
<h2 class="text-header text-center">[<sup>.</sup>} talento.tms</h2>
      <section class="container-login">
          <h4 class="text-center">Connectez-vous</h4>
          <form id="frmLogin"   method="post" action="<?php echo url_for('auth/validateCredentials'); ?>">
            <input type="hidden" name="actionID"/>
            <input type="hidden" name="hdnUserTimeZoneOffset" id="hdnUserTimeZoneOffset" value="0" />
            <?php
                echo $form->renderHiddenFields(); // rendering csrf_token
            ?>
            <div id="logInPanelHeading"><?php //echo __('LOGIN Panel'); ?></div>

            <div id="divUsername1" class="textInputContainer">
                <?php //echo $form['Username']->render(); ?>
               <input type="text"  name ="txtUsername"  id ="txtUsername" placeholder="Adresse email">
               <span class="form-hint" ><?php //echo __('Username'); ?> </span>
            </div>
             <div id="divPassword1" class="textInputContainer">
                 <?php //echo $form['Password']->render(); ?>
                 <input type="password" id="txtPassword" name="txtPassword"  placeholder="Mot de passe" >
                <span class="form-hint" ><?php //echo __('Password'); ?></span>
             </div>
             <div class="row">
                   <div class="col">
                       <div class="form-check">
                         <input class="form-check-input" type="checkbox" value="" id="defaultCheck">
                         <label class="form-check-label" for="defaultCheck">
                              Se sevounire de moi
                         </label>
                       </div>
                   </div>
                   <div class="col">
                       <div id="forgotPasswordLink1">
                           <a href="<?php echo url_for('auth/requestPasswordResetCode'); ?>"> <?php echo __('Mot de passe oublié ?'); ?></a>
                       </div>
                   </div>
             </div>

               <input
                class=" btn-connect"
                style="background:#3F51B5" id ="btnLogin"  value="<?php echo __('SE CONNECTER'); ?>"
                type="submit" name="Submit"/>
             <p class="text-center">vous n'avez pas de copmte? <a href="#"> Contactez-nous</a></p>
             <div id="divLoginButton">
                 <?php if (!empty($message)): ?>
                 <span id="spanMessage" ><?php echo __($message); ?></span>
                 <?php endif; ?>
             </div>

          </form>



  </section><br>
   <p class=" text-center info"> BY Nabi</p>
   <footer>
       <p class=" text-center info"> 2020 tout doroit resarver</p>
   </footer>

<?php //include_partial('global/footer_copyright_social_links'); ?>
<?php echo stylesheet_tag(theme_path('css/login_nabi.css')); ?>



<script type="text/javascript">
    function calculateUserTimeZoneOffset() {
        var myDate = new Date();
        var offset = (-1) * myDate.getTimezoneOffset() / 60;
        return offset;
    }

    function addHint(inputObject, hintImageURL) {
        if (inputObject.val() == '') {
            inputObject.css('background', "url('" + hintImageURL + "') no-repeat 10px 3px");
        }
    }

    function removeHint() {
       $('.form-hint').css('display', 'none');
    }

    function showMessage(message) {
        if ($('#spanMessage').length == 0) {
            $('<span id="spanMessage"></span>').insertAfter('#btnLogin');
        }
        $('#spanMessage').html(message);
        //$("#spanMessage").css("display", "block");

    }

    function validateLogin() {
      console.log("call fnction validateLogin");
        var isEmptyPasswordAllowed = false;

        if ($('#txtUsername').val() == '') {
            showMessage('<?php echo __js('Username cannot be empty'); ?>');
            return false;
        }

        if (!isEmptyPasswordAllowed) {
            if ($('#txtPassword').val() == '') {
                showMessage('<?php echo __js('Password cannot be empty'); ?>');
                return false;
            }
        }
        return true;
    }

    function refreshSession() {
        setTimeout(function() {
            location.reload();
        }, 20 * 60 * 1000);
    }

    $(document).ready(function() {
        if ($('#installation').val())  {
            var login = $('#installation').val();
            $("#loginSuccessMessage").attr("value", login);
        }

        refreshSession();

        /*Set a delay to compatible with chrome browser*/
        setTimeout(checkSavedUsernames,100);

        $('#txtUsername').focus(function() {
            removeHint();
        });

        $('#txtPassword').focus(function() {
             removeHint();
        });

        $('.form-hint').click(function(){
            removeHint();
            $('#txtUsername').focus();
        });

        $('#hdnUserTimeZoneOffset').val(calculateUserTimeZoneOffset().toString());

        $('#frmLogin').submit(validateLogin);
        $("#frmLogin1").click(function(){
          //console.log("usernaname "+ $("#txtUsername").val() +"\n password "+$("#txtPassword").val());
          validateLogin();
          if ($("#txtUsername").val()==""){
            showMessage('<?php echo __js('Username cannot be empty'); ?>');
            console.log("<?php echo __js('Username cannot be empty'); ?>");
            return false;
          }
          if ($("#txtPassword").val()){
            showMessage('<?php echo __js('Password cannot be empty'); ?>');
            console.log("<?php echo __js('Password cannot be empty'); ?>");
            return false;
          }
        });


    });

    function checkSavedUsernames(){
        if ($('#txtUsername').val() != '') {
            removeHint();
        }
    }

    if (window.top.location.href != location.href) {
        window.top.location.href = location.href;
    }
</script>
