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

    <? include "nav.php"; ?>
    <? include "functions.php"; ?>
        <? //include "../checkbo.php"; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.bundle.js"></script>
            <!--Tabs-->
            <div class="row">
                <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s3"><a class="active" href="#lec">LEC Dash</a></li>
                        <li class="tab col s3"><a href="#math">Math Dash</a></li>
                        <li class="tab col s3"><a href="#lib">Library Dash</a></li>
                        <li class="tab col s3"><a href="#HD">Help Desk Dash</a></li>
                        <li class="tab col s3"><a href="#WL">Writing Lab Dash</a></li>
                        <li class="tab col s3"><a href="#FL">Foreign Language Dash</a></li>
                        <li class="tab col s3"><a href="#AM">Athletic Mentor Dash</a></li>
                    </ul>
                </div>

                <div id="lec" class="col s12">
                    <? barChartTally('LEC');
                    //lineChartMonth('lec');
                    ?>


                </div>
                <div id="math" class="col s12">
                    <? barChartTally('Math') ?>
                </div>
                <div id="lib" class="col s12">
                    <? barChartTally('Library') ?>
                </div>
                <div id="HD" class="col s12">
                    <? barChartTally('Help Desk') ?>
                </div>
                <div id="WL" class="col s12">
                    <? barChartTally('Writing Lab') ?>
                </div>
                <div id="FL" class="col s12">
                    <? barChartTally('Foreign Language') ?>
                </div>
                <div id="AM" class="col s12">
                    <? barChartTally('Athletic Mentor') ?>
                </div>
            </div>

            </body>

            <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
            <script src="/passport/js/materialize.js"></script>
            <script src="/passport/js/init.js"></script>




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
