<?php
  include "../medooconnect.php";
  $failshake = "";
  $fadein = "animated fadeInDown";
?>

<!--
The MIT License (MIT)

Copyright (c) Monday November 7 2016 Joseph Hassell joseph@thehassellfamily.net

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<html>


<head>
    <title>Sign Up</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/passport/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/passport/css/passr.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/passport/css/animate.css" type="text/css" rel="stylesheet" media="screen,projection" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


</head>


<body class="blur-back">

    <div class="containerlogin signup-allign">

        <div id="mainCard" class="card-panel <? echo $fadein; ?>">

    <div class="container">
      <div class="row">
        <form class="col s12" method="post" id="signUpForm" action="">
            <h4 class="center">Sign Up For Passport</h4>
            <div class="input-field">
                <p>
                    <input type="text" required id="firstname" autocomplete="off" class="validate" name="firstname">
                    <label for="firstname">First Name</label>
                </p>
            </div>
            <div class="input-field">
                <p>
                    <input type="text" required id="lastname" autocomplete="off" class="validate" name="lastname">
                    <label for="lastname">Last Name</label>
                </p>
            </div>


            <div class="input-field">

                    <input type="email" required id="email" autocomplete="off" class="validate" name="email">
                    <label data-error="Must be a valid email<?php if($signUpDomainEmailEnding != "") { echo " at " . $signUpDomainEmailEnding; }?>" id="email-label" for="email">Email</label>
                    <?php
                    if($signUpDomainEmailEnding != "") {
                      echo "<p>Must Be at " . $signUpDomainEmailEnding . "</p>";
                    }
                    ?>



        </div>

            <div class="input-field">
                <p>
                    <input type="password" required id="password" autocomplete="off" class="validate" name="passwordadmin">
                    <label data-error="Passwords Must Match" for="password">Password</label>
                </p>
            </div>
            <div class="input-field">
                <p>
                    <input type="password" required id="password2" autocomplete="off" class="validate" name="password2admin">
                    <label data-error="Passwords Must Match" for="password2">Password(again)</label>
                </p>
            </div>

            <a class="waves-effect waves-light btn-large disabled " onclick="submitAnimate();" id="next_step"><i class="material-icons left">fast_forward</i>Next Step</a>

            <div class="progress">
              <div class="determinate" style="width: 20%"></div>
            </div>
        </form>
    </div>
  </div>
</div>
</div>


</body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="/passport/js/materialize.js"></script>
<script src="/passport/js/init.js"></script>
<script>
      $('#password, #password2').on('keyup', function () {
        if ($('#password').val() == $('#password2').val()) {
          $("#password").removeClass( "invalid" ).addClass( "valid" );
          $("#password2").removeClass( "invalid" ).addClass( "valid" );
    } else {
          $("#password").removeClass( "valid" ).addClass( "invalid" );
          $("#password2").removeClass( "valid" ).addClass( "invalid" );
        }
      });
      <?php
      if($signUpDomainEmailEnding != "") {
        ?>
      //email Checker
      $('#email').on('focusout', function () {
        if($('#email').val() == "") {
          $("#email").removeClass( "invalid" );
          $("#email").removeClass( "valid" );
        } else if ($('#email').val().indexOf("<?php echo $signUpDomainEmailEnding; ?>") >= 0) {

          $("#email").removeClass( "invalid" ).addClass( "valid" );
        } else {


          $("#email").removeClass( "validate valid" ).addClass( "invalid" );
          setTimeout(function(){
            $('#email').addClass("validate");
          }, 100);
        }
      });
      <?php
    }
      ?>

      //button disabler
      var submitOpen = 0;
      $(":input").on('keyup', function() {
        console.log($('.valid').length);
        if($('.valid').length == 5) {
          $("#next_step").removeClass( "disabled" ).addClass("eagleBlood white-text");
          submitOpen = 1;
        } else {
          submitOpen = 0;
          $("#next_step").addClass( "disabled" ).removeClass("eagleBlood white-text");;
        }
      });
      //MAGIC!!!!!!!!!!
      $.fn.extend({
    animateCss: function (animationName) {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        this.addClass('animated ' + animationName).one(animationEnd, function() {
            $(this).removeClass('animated ' + animationName);
            });
        }
    });
    function submitAnimate() {
      if(submitOpen == 1){
        $('#mainCard').animateCss('fadeOutLeft');
        $('#mainCard').one('webkitAnimationEnd oanimationend msAnimationEnd animationend',
      function(e) {
        $('#mainCard').hide();
        setTimeout(function(){
            document.getElementById("mainCard").submit();
        }, 1000);

      });
      }
    }
</script>

</html>


<?
if(isset($_POST['submit'])){



foreach ($_POST as $key => $value) {

}
{
$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$usernameadmin = $_POST['usernameadmin'];
$email = $_POST['email'];
$passwordadmin = $_POST['passwordadmin'];
$password2admin = $_POST['password2admin'];






if ($passwordadmin != $password2admin) {
    echo "ERROR: Passwords must match";
} else {
    include "../sqlconnect.php";

    $salt = '$2a$10$' . rand() . $usernameadmin . rand() . rand() . '$';
    echo $salt . "\n";
    $hashedPass = crypt($passwordadmin, $salt);

    echo $hashedPass;
    if ($hashedPass == '*0') {
      echo "Error Encrypting";
    } else {
/*
    $sql = "INSERT INTO admin (username, firstname, lastname, email, password)
    VALUES ('$usernameadmin', '$first_name', '$last_name', '$email', '$hashedPass')";

    if ($conn->query($sql) === TRUE) {
        echo "New account created successfully";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;

    }
    */
  }
    $conn->close();
}

}


}
?>
