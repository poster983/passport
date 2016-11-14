<?php
  include "../medooconnect.php";
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
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

</head>


<body class="blur-back">
  <div ></div>

    <div class="containerlogin signup-allign">

        <div id="mainCard" class="card-panel animated fadeInDown">

    <div class="container">
      <div class="row">
        <form class="col s12" method="post" id="signUpForm" action="emailConfirmSend.php">
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
                <input type="number" required id="studentID" autocomplete="off" class="validate" name="studentID">
                <label data-error="Must Be A Number!" for="studentID">Student ID</label>
            </p>
        </div>

            <div class="input-field">
                <p>
                    <input type="password" required id="password" autocomplete="off" pattern=".{5,}" title="5 characters minimum" class="validate" name="password1">
                    <label data-error="Passwords Must Match" id="passwordLab" for="password">Password</label>
                </p>
            </div>
            <div class="input-field">
                <p>
                    <input type="password" required id="password2" autocomplete="off" pattern=".{5,}" title="5 characters minimum" class="validate" name="password2">
                    <label data-error="Passwords Must Match" id="passwordLab2" for="password2">Password(again)</label>
                </p>
            </div>
            <div class="divider"></div>

            <br>
            <script>
            selVal = 0;
            yrLock = 0;
            function stYearTall() {

              $("#stYear input[type=text]").addClass('valid');
              if(yrLock == 0) {
                selVal +=1;
                yrLock = 1;
              }
              updateLength();
            }
            </script>
            <div id="stYear" class="input-field col s12">
              <select name="stYear" required onchange="stYearTall()">
                <option value="" disabled selected>Choose a Class</option>
                <option value="9">Freshman</option>
                <option value="10">Sophomore</option>
                <option value="11">Junior</option>
                <option value="12">Senior</option>
              </select>
              <label>Your Class</label>
            </div>
            <script>
                perLock = 0;
                function periodToTeacher(period) {
                  if(perLock == 0) {
                    selVal +=2;
                    perLock = 1;

                  }
                  $("#shPer input[type=text]").addClass('valid');
                  updateLength();
                  $('#shTeacherAJAX').html("<img class='svg-dis' src='/passport/image/rings.svg' /> <h5 class='center'>Loading</h5>");
                  $.ajax({
                url: 'ajaxCreateAccountPeriodToTeacher.php',
                data: {'period': period},
                type: 'get',
                success: function(data) {
                  $('#shTeacherAJAX').html(data);
                },
                error: function(xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
                $('#shTeacherAJAX').html("There was an error.  Please check the console for more details.");
                }
              })};

            </script>
            <div id="shPer" class="input-field col s12">
              <select name="shPeriod" required onchange="periodToTeacher(this.value)">
                <option value="" disabled selected>Choose a Period</option>
                <option value="A">A Period</option>
                <option value="B">B Period</option>
                <option value="C">C Period</option>
                <option value="D">D Period</option>
                <option value="E1">E Period (You Have First Lunch)</option>
                <option value="E2">E Period (You Have Second Lunch)</option>
                <option value="F">F Period</option>
                <option value="G">G Period</option>
                <option value="H">H Period</option>
              </select>
              <label>Study Hall Period</label>
            </div>

            <div id="shTeacherAJAX"></div>

            <a class="waves-effect waves-light btn-large disabled " onclick="submitAnimate();" id="next_step"><i class="material-icons left">fast_forward</i>Next Step</a>

            <div class="progress">
              <div class="determinate" style="width: 100%"></div>
            </div>
        </form>
    </div>
  </div>
</div>
</div>

<script src="/passport/js/materialize.js"></script>
<script src="/passport/js/init.js"></script>
<script>
      $('#password, #password2').on('keyup', function () {
        if ($('#password').val() == $('#password2').val()) {
          $("#password").removeClass( "invalid" ).addClass( "valid" );
          $("#password2").removeClass( "invalid" ).addClass( "valid" );

          if ($('#password').val().length <5 || $('#password2').val().length <5 ) {
            $( '#passwordLab' ).attr( "data-error", "Must be at least 5 characters long" );
            $( '#passwordLab2' ).attr( "data-error", "Must be at least 5 characters long" );
            $("#password2").removeClass( "valid" ).addClass( "invalid" );
            $("#password").removeClass( "valid" ).addClass( "invalid" );


          } else {
            $("#password").removeClass( "invalid" ).addClass( "valid" );
            $("#password2").removeClass( "invalid" ).addClass( "valid" );

          }

    } else {
          $("#password").removeClass( "valid" ).addClass( "invalid" );
          $("#password2").removeClass( "valid" ).addClass( "invalid" );
          $( '#passwordLab' ).attr( "data-error", "Passwords Must Match" );
          $( '#passwordLab2' ).attr( "data-error", "Passwords Must Match" );

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
      function updateLength() {
        if($('.valid').length >8) {
          $("#next_step").removeClass( "disabled" ).addClass("eagleBlood white-text");
          submitOpen = 1;
        } else {
          submitOpen = 0;
          $("#next_step").addClass( "disabled" ).removeClass("eagleBlood white-text");;
        }
      }
      //button disabler
      var submitOpen = 0;
      $(":input").on('keyup', function() {
        console.log($('.valid').length);
        updateLength();
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
        $('#mainCard').animateCss('fadeOutRight');
        $('#mainCard').one('webkitAnimationEnd oanimationend msAnimationEnd animationend',
      function(e) {
        $('#mainCard').hide();
        $('#working').html("<img class='svg-dis' src='/passport/image/rings.svg' /> <h5 class='center'>Working</h5>");
        setTimeout(function(){
            document.getElementById("signUpForm").submit();
        }, 1000);

      });
      }
    }

  $(document).ready(function() {
    $('select').material_select();
  });
  $( document ).ajaxComplete(function() {

    $('select').material_select();
    if(selVal == 1) {
      $("#stYear input[type=text]").addClass('valid');
    } else if(selVal ==2) {
      $("#shPer input[type=text]").addClass('valid');
    } else if(selVal == 3) {
      $("#shPer input[type=text]").addClass('valid');
      $("#stYear input[type=text]").addClass('valid');
    }
    updateLength();
  });
</script>
<div id="working"></div>
</body>
</html>
