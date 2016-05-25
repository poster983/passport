<?
include("adminconnect.php");
include("common.php");
checklogin();
$msg = "";
?>



    <!--

The MIT License (MIT)

Copyright (c) Wed May 25 2016 Joseph Hassell joseph@thehassellfamily.net

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
        <title>Admin Dashboard</title>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
        <link href="/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />



        <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    </head>

    <body>

        <nav>
            <div class="nav-wrapper red darken-4">
                <a href="#" class="brand-logo center">passr Admin Dashboard</a>
                <ul id="nav-desktop" class="left hide-on-med-and-down">
                    <li><a href="sass.html">Sass</a></li>
                    <li><a href="badges.html">Components</a></li>
                    <li><a href="collapsible.html">JavaScript</a></li>
                    <li class="right"><a href="/admin/logout.php">Logout</a></li>
                </ul>

                <ul id="nav-mobile" class="side-nav">
                    <p class="center-align black-text"></p>
                    <li> <a href="">jjjjjjjjjjjj</a></li>
                    <li> <a href="/admin/logout.php">Logout</a></li>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse right"><i class="material-icons">menu</i></a>
            </div>
        </nav>




        <!--Tabs-->
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3"><a href="#test1">LEC Dash</a></li>
                    <li class="tab col s3"><a class="active" href="#test2">Math Dash</a></li>
                    <li class="tab col s3"><a href="#test3">Library Dash</a></li>
                    <li class="tab col s3"><a href="#test4">Help Desk</a></li>
                </ul>
            </div>
            <div id="test1" class="col s12">Nothing Here Yet</div>
            <div id="test2" class="col s12">Nothing Here Yet</div>
            <div id="test3" class="col s12">Nothing Here Yet</div>
            <div id="test4" class="col s12">Nothing Here Yet</div>
        </div>

    </body>




    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="/js/materialize.js"></script>
    <script src="/js/init.js"></script>

    <!-- Scripts -->
    <!--[if lte IE 8]><script src="assets/js/respond.min.js"></script><![endif]-->
    <script>
        if ('addEventListener' in window) {
            window.addEventListener('load', function () {
                document.body.className = document.body.className.replace(/\bis-loading\b/, '');
            });
            document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
        }
    </script>

    </html>