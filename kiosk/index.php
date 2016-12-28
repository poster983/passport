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
      transition-timing-function: ease-in;
      transition: background-color 1s;
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
      top: 0%;
      left: 0%;
      width: 100vw;
      height: 100vw;
    	border-radius: 50%;
      background-color: #7ac142;
      z-index: -2;
    }
    .circleThingContainer{
      position: absolute;
      display: inline-block;
      top: 0%;
      left: 0%;
      width:100vw;
      height: 100%;
      overflow: hidden
    }
    .circleThing .circleGrow {
      animation-name: grow;
      animation-duration: 1s;
      animation-timing-function: ease-in;
      animation-fill-mode: forwards;
    }
    </style>

    </head>
    <body>
      <div class="circleThingContainer"><div class="circleThing"></div></div>
      <main>
        <h1 class="center" style='color: #ecf0f1'>Student Sign In</h1>
        <form class="stuIDForm" id="stuIDForm">
          <div class="row">
              <div class="input-field col s4 offset-s4 white-text">
                <input  id="stu_ID" type="number" class="validate">
                <label for="stu_ID">Your Student ID</label>
              </div>
              <div class="col s1">
                  <a onclick="visResponse('success');" class="btn-floating waves-effect waves-light red"><i class="material-icons">trending_flat</i></a>
              </div>
          </div>
        </form>
        <div id="response"></div>
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
            //$('body').css('background-color', '#7ac142');
            $('#stuIDForm').css('opacity', '0');
            $('.circleThing').addClass('circleGrow');
            setTimeout(function(){
              $('body').css('background-color', '#212121');
              $('#stuIDForm').css('opacity', '1');
            }, 2000);
          } else if (action == "error") {
            $('body').css('background-color', '#d50000');
            setTimeout(function(){
              $('body').css('background-color', '#212121');
            }, 3000);
          } else {
            $('body').css('background-color', '#FF9800');
          }
          console.log($('#stu_ID').val());
        };
        function submitStuIDToAJAX() {
          $('#ReasonAJAX').html("<img class='svg-dis' src='/passport/image/rings.svg' /> <h5 class='center'>Loading</h5>");
          $.ajax({
            url: 'ajaxStuIDSignin.php',
            data: {'id': $('#stu_ID').val()},
            type: 'get',
            success: function(data) {
              $('#ReasonAJAX').html(data);
            },
            error: function(xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
            $('#ReasonAJAX').html("There was an error.  Please check the console for more details.");
            }
          })
          /*
          $( document ).ajaxComplete(function() {

            $('select').material_select();
            if(selVal == 1) {
              $("#depDiv input[type=text]").addClass('valid');
            } else if(selVal ==2) {
              $("#shPer input[type=text]").addClass('valid');
            } else if(selVal == 3) {
              $("#shPer input[type=text]").addClass('valid');
              $("#stYear input[type=text]").addClass('valid');
            }

          });
          */
        }
        </script>
      </body>
</html>
