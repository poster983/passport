<?
include("common.php");
checklogin();
$msg = "";
date_default_timezone_set('America/Chicago');
//include "../medooconnect.php";
?>
<!--

The MIT License (MIT)

Copyright (c) Wed Dec 21 2016 Joseph Hassell joseph@thehassellfamily.net

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORTOR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
-->

<html>
    <head>
        <title>Sign in Kiosk</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/passport/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />

    <link href="/passport/css/passr.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/passport/css/kiosk.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
      background-color: #212121;
    }

    main {
      flex: 1 0 auto;
    }
    .stuIDForm {
      transition-timing-function: ease-in;
      transition: opacity 1s;
      opacity: 1;
    }
    @keyframes grow {
      from {transform: scale(0);}
      to {transform: scale(3);}
    }
    .circleThing {
      position: absolute;
      display: inline-block;
      opacity: 0;
      top: 0%;
      left: 0%;
      width: 100vw;
      height: 100vw;
    	border-radius: 50%;
      z-index: -5;
      animation-duration: 0.5s;
      animation-fill-mode: forwards;
    }
    .circleThingContainer{
      position: absolute;
      display: inline-block;
      top: 0%;
      left: 0%;
      width:100vw;
      height: 100%;
      overflow: hidden;
    }
    .circleGrow {
      animation-name: grow;
      opacity: 1;
      animation-timing-function: ease-in;

    }
    /*fail "x" animation */
    @keyframes XleftIn {
      0% {
        top: 40%;
        opacity: 0;
        transform: rotate(20deg);
      }
      100% {
        top: 30%;
        opacity: 1;
        transform: rotate(45deg);
      }
    }
    @keyframes XleftOut {
      0% {
        top: 30%;
        opacity: 1;
        transform: rotate(45deg);
      }
      100% {
        top: 15%;
        opacity: 0;
        transform: rotate(75deg);
      }
    }


    @keyframes XrightIn {
      0% {
        top: 40%;
        opacity: 0;
        transform: rotate(-20deg);
      }
      100% {
        top: 30%;
        opacity: 1;
        transform: rotate(-45deg);
      }
    }
    @keyframes XrightOut {
      0% {
        top: 30%;
        opacity: 1;
        transform: rotate(-45deg);
      }
      100% {
        top: 15%;
        opacity: 0;
        transform: rotate(-75deg);
      }
    }

    .Xleft {
      position: absolute;
      display: inline-block;
      top: 30%;
      left: 50%;
      opacity: 1;
      width: 20px;
      height: 250px;
      transform: rotate(45deg);
      background-color: white;
      animation-duration: 1s;
      animation-fill-mode: forwards;
    }
    .Xright {
      position: absolute;
      display: inline-block;
      top: 30%;
      left: 50%;
      opacity: 1;
      width: 20px;
      height: 250px;
      transform: rotate(-45deg);
      background-color: white;
      animation-duration: 1s;
      animation-fill-mode: forwards;


    }
    .Xleft.XleftIn {
      animation-name: XleftIn;
      animation-timing-function: ease-out;
    }
    .Xright.XrightIn {
      animation-name: XrightIn;
      animation-timing-function: ease-out;
    }
    .Xleft.XleftOut {
      animation-name: XleftOut;
      animation-timing-function: ease-out;
    }
    .Xright.XrightOut {
      animation-name: XrightOut;
      animation-timing-function: ease-out;
    }

    /*success animation*/
    @keyframes CleftIn {
      0% {
        transform: rotate(15deg);
        left: 15px;
        opacity: 0;
      }
      50% {
        opacity: 1;
      }
      100% {
        transform: rotate(20deg);
        left: 30px;
      }
    }
    @keyframes CleftOut {
      0% {
        transform: rotate(20deg);
        left: 30px;

      }
      50% {
        opacity: 1;
      }
      100% {
        transform: rotate(70deg);
        left: 90px;
        opacity: 0;
      }
    }

    @keyframes CrightIn {
      0% {
        transform: rotate(15deg);
        left: 0px;
        top: 95px;
        opacity: 0;
      }
      50% {
        opacity: 1;
      }
      100% {
        transform: rotate(-50deg);
        left: -65px;
        top: 115px;
      }
    }
    @keyframes CrightOut {
      0% {
        transform: rotate(-50deg);
        left: -65px;
        top: 115px;
      }
      50% {
        opacity: 1;
      }
      100% {
        transform: rotate(-70deg);
        opacity: 0;
        left: -80px;
        top: 65px;
      }
    }
 @keyframes checkMarkUpIn {
   0% {
     top: 35%;
   }
   100% {
     top: 30%;
   }
 }
 @keyframes checkMarkUpOut {
   0% {
     top: 30%;
   }
   100% {
     top: 25%;
   }
 }
      .checkmarkContainer{
        position: relative;
        display: run-in;
        top: 30%;
        left: 50%;
        animation-duration: 1s;
        animation-fill-mode: forwards;
        z-index: 10;
      }
    .Cleft {
      position: absolute;
      display: inline-block !important;
      top: 30%;
      left: 30px;
      opacity: 1;
      width: 20px;
      height: 250px;
      transform: rotate(20deg);
      background-color: white;
      border-bottom-right-radius: 1em;
      animation-duration: 1s;
      animation-fill-mode: forwards;
    }
    .Cright {
      position: absolute;
      display: inline-block !important
      top: 115px;
      left: -65px;
      opacity: 1;
      width: 20px;
      height: 150px;
      transform: rotate(-50deg);
      background-color: white;
      border-bottom-left-radius: 1em;
      border-bottom-right-radius: 1em;
      animation-duration: 1s;
      animation-fill-mode: forwards;
    }
    .Cleft.CleftIn {
      animation-name: CleftIn;
      animation-timing-function: ease-in-out;
    }
    .Cleft.CleftOut {
      animation-name: CleftOut;
      animation-timing-function: ease-in-out;
    }
    .Cright.CrightIn {
      animation-name: CrightIn;
      animation-timing-function: ease-in-out;
    }
    .Cright.CrightOut {
      animation-name: CrightOut;
      animation-timing-function: ease-in-out;
    }
    .checkmarkContainer.checkmarkContainerIn {
      animation-name: checkMarkUpIn;
      animation-timing-function: ease-in-out;
    }
    .checkmarkContainer.checkmarkContainerOut {
      animation-name: checkMarkUpOut;
      animation-timing-function: ease-in-out;
    }
    </style>

    </head>
    <body>
      <div class="circleThingContainer"><div id="circleThing" class="circleThing"></div></div>
      <span id="Xleft"></span>
      <span id="Xright"></span>
      <div id="checkmarkContainer" class="">
      <span id="Cleft" class=""></span>
      <span id="Cright" class=""></span>
    </div>
      <main>
        <h1 class="center" style='color: #ecf0f1'>Student Sign In</h1>
        <form class="stuIDForm" id="stuIDForm">
          <div class="row">
              <div class="input-field col s4 offset-s4 white-text">
                <input  id="stu_ID" type="number" class="validate">
                <label for="stu_ID">Your Student ID</label>
              </div>
              <div class="col s1">
                  <a onclick="validateContent();" class="btn-floating waves-effect waves-light green"><i class="material-icons">trending_flat</i></a>
                  <!--<a onclick="visResponse('error');" class="btn-floating waves-effect waves-light red"><i class="material-icons">report_problem</i></a>
                  <a onclick="visResponse('unknownError');" class="btn-floating waves-effect waves-light orange"><i class="material-icons">info</i></a>-->
              </div>
          </div>
        </form>
        <div class="center white-text" id="response"></div>
 <!--
        <footer class="page-footer grey darken-3">
            <div class="footer-copyright">
                <div class="container">
                    <a class="white-text left" href="https://www.josephhassell.com/">Copyright © 2016 Joseph Hassell</a> &nbsp &nbsp
                    <a class="white-text right" href="https://github.com/poster983/passr/blob/master/LICENSE">License </a> &nbsp &nbsp
                    <a class="white-text right" href="https://poster983.github.io/passr/">Project Page &nbsp &nbsp</a>&nbsp &nbsp
                </div>
            </div>
        </footer>
      -->
      </main>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>

        <script>
        function visResponse(action) {
          if (action == "success") {
            $('#stuIDForm').css('opacity', '0');
            $('#checkmarkContainer').addClass('checkmarkContainer checkmarkContainerIn');
            $('#Cleft').addClass('Cleft CleftIn');
            $('#Cright').addClass('Cright CrightIn');
            $('#circleThing').removeClass().addClass('circleThing circleGrow green accent-3');
            $('#circleThing').one('webkitAnimationEnd oanimationend msAnimationEnd animationend',
              function(e) {
                $('body').addClass('green accent-3');
                $('#circleThing').removeClass().addClass('circleThing');
                setTimeout(function() {
                  $('#Cleft').removeClass('CleftIn');
                  $('#Cright').removeClass('CrightIn');
                  $('#checkmarkContainer').removeClass('checkmarkContainerIn');

                  $('#circleThing').removeClass().addClass('circleThing circleGrow grey darken-4');

                  $('#checkmarkContainer').addClass('checkmarkContainerOut');
                  $('#Cleft').addClass('CleftOut');
                  $('#Cright').addClass('CrightOut');

                  $('#circleThing').one('webkitAnimationEnd oanimationend msAnimationEnd animationend',
                    function(e) {
                      $('body').removeClass('green accent-3');
                      $('#circleThing').removeClass().addClass('circleThing');
                      setTimeout(function() {
                        $('#Cleft').removeClass();
                        $('#Cright').removeClass();
                        $('#checkmarkContainer').removeClass();
                      }, 500);
                  });

                  $('#stuIDForm').css('opacity', '1');
                }, 1000);
            });

          } else if (action == "error") {
            $('#stuIDForm').css('opacity', '0');
            $('#Xleft').addClass('Xleft XleftIn');
            $('#Xright').addClass('Xright XrightIn');
            $('#circleThing').removeClass().addClass('circleThing circleGrow red accent-4');
            $('#circleThing').one('webkitAnimationEnd oanimationend msAnimationEnd animationend',
              function(e) {
                $('body').addClass('red accent-4');
                $('#circleThing').removeClass().addClass('circleThing');

                setTimeout(function() {
                  $('#Xleft').removeClass('XleftIn');
                  $('#Xright').removeClass('XrightIn');

                  $('#Xleft').addClass('XleftOut');
                  $('#Xright').addClass('XrightOut');

                  $('#circleThing').removeClass().addClass('circleThing circleGrow grey darken-4');

                  $('#circleThing').one('webkitAnimationEnd oanimationend msAnimationEnd animationend',
                    function(e) {
                      $('body').removeClass('red accent-4');
                      $('#circleThing').removeClass().addClass('circleThing');
                        setTimeout(function() {
                          $('#Xleft').removeClass();
                          $('#Xright').removeClass();
                        }, 500);
                  });

                  $('#stuIDForm').css('opacity', '1');
                }, 1000);
            });
          } else {

            $('#stuIDForm').css('opacity', '0');

            $('#circleThing').removeClass().addClass('circleThing circleGrow orange accent-4');
            $('#circleThing').one('webkitAnimationEnd oanimationend msAnimationEnd animationend',
              function(e) {
                $('body').addClass('orange accent-4');
                $('#circleThing').removeClass().addClass('circleThing');
                setTimeout(function() {
                  $('#circleThing').removeClass().addClass('circleThing circleGrow grey darken-4');

                  $('#circleThing').one('webkitAnimationEnd oanimationend msAnimationEnd animationend',
                    function(e) {
                      $('body').removeClass('orange accent-4');
                      $('#circleThing').removeClass().addClass('circleThing');
                  });

                  $('#stuIDForm').css('opacity', '1');
                }, 1000);
            });
          }
        };


        function submitStuIDToAJAX() {
          $('#response').html("<img class='svg-dis' src='/passport/image/rings.svg' /> <h5 class='center'>Loading</h5>");
          $.ajax({
            url: 'ajaxStuIDSignin.php',
            data: {'id': $('#stu_ID').val()},
            type: 'get',
            //dataType: "json",
            success: function(data) {
              if(data.status == "success") {
                visResponse("success");
                console.log("Passport Info Code System: Returned with code \"" + data.code + "\"-Successful Transaction");

                $('#stu_ID').val('');
                $('#response').html(" ");
              } else if (data.status == "error"){
                visResponse("error");
                if(data.code == "2401") {
                  visResponse("error");
                  console.warn("Passport Info Code System: Returned with code \"" + data.code + "\"-Incorect Creds");
                  $('#stu_ID').joseValidate("error", true, "Incorect Student ID");
                  $('#response').html("Passport does not have an entry for this ID. Please try again or ask a faculty member.");
                } else if (data.code == "5001"){
                  console.warn("Passport Info Code System: Returned with code \"" + data.code + "\"-Already Authed");
                  visResponse("warn");
                  $('#stu_ID').joseValidate("error", true, "You have already signed in");
                  $('#response').html("You have already signed in, if not contact a faculty member");
                } else {
                  console.error("Passport Info Code System: Returned with code \"1111\"-unknown error");
                  console.error("Something Went Wrong. No error data returned.");
                  visResponse("error");
                  $('#response').html("There was an error.  Please check the console for more details and try again.");
                }

              } else {
                console.error("Passport Info Code System: Returned with code \"1111\"-unknown error");
                console.warn("Something Went Wrong. No useful data returned.");
                visResponse("warn");
                $('#response').html("There was an error.  Please check the console for more details and try again.");
              }
              //console.log(data.content);
            },
            error: function(xhr, desc, err) {
            console.warn("Passport Info Code System: Returned with code \"1001\"-AJAX Error");
            console.log(xhr);
            console.error("Details: " + desc + "\nError:" + err);
            console.warn(xhr.responseText)
            visResponse("error");

            $('#response').html("There was an error.  Please check the console for more details.");
            }

          })

          $( document ).ajaxComplete(function() {
            $('#stu_ID').focus();
          });

        }

        $("#stu_ID").keyup(function(event){
            if(event.keyCode == 13){
                validateContent();
            }
        });
        function validateContent() {
          if($('#stu_ID').val() != '') {
            submitStuIDToAJAX();
          } else {
            $('#stu_ID').focus();
            $('#stu_ID').joseValidate("error", true, "Must Type In Your Student ID");

          }
        }
        $('#stuIDForm').submit(function() {
          return false;
        });

        (function ( $ ) {
          $.fn.joseValidate = function(state, setIt, message) {
              this.each(function(){
                if(state === "success") {
                  $("label[for='" + $(this).attr('id') + "']").attr( "data-success", message );
                  if(setIt == true) {
                    if($(this).hasClass('validate')) {
                      $(this).removeClass('invalid').addClass('valid');
                    } else {
                      $(this).removeClass('invalid').addClass('validate valid');
                    }
                  }
                } else if (state === "error") {
                  $("label[for='" + $(this).attr('id') + "']").attr( "data-error", message );
                  if(setIt == true) {
                    if($(this).hasClass('validate')) {
                      $(this).removeClass('valid').addClass('invalid');
                    } else {
                      $(this).removeClass('valid').addClass('validate invalid');
                    }
                  }
                } else if (state === "remove"){
                  $(this).removeClass('validate invalid valid');
                } else {
                  console.error("joseValidate: Invalid prams");
                }
              });
          };
        }( jQuery ));
        </script>
      </body>
</html>
