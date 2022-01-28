<?php SESSION_START(); ?>
<?php print('<p>'.$_SESSION['captcha']['code'].'</p>');?>
<?php print('<p>'.$_POST['captchavalue'].'</p>');?>
<?php  
if(isset($_SESSION['captcha']['code'])){
     print('<p>Captcha Session Set</p>');
           if(isset($_POST['captchavalue']) && $_POST['captchavalue']==$_SESSION['captcha']['code']){
               // go forwards
             print('<p>The values match</p>');
           }else{
            print('<p>Characters Do Not</p>');
             header('Location: index.php?message=Characters Do Not Match&altertype=danger');
           }
     }else{
        // header('Location: index.php?message=No CAPTCHA Session variable&altertype=danger');
     print('<p>No Session captcha</p>');
     }
?>