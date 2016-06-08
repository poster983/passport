<?
include("common.php");
checklogin();
$msg = "";
?>
    <!--

The MIT License (MIT)

Copyright (c) Mon May 23 2016 Joseph Hassell joseph@thehassellfamily.net

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


        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

        <script>
            $(document).ready(function () {
                $("#datepicker").datepicker({
                    dateFormat: 'yy-mm-dd'
                , });
            });
        </script>


        <body>
            <div class="container">
                <h5 class="center">Search and print the Passes by day.</h5>
                <form method="post" action="passdisplay.php">
                    <div class="row">
                        <div class="input-field col s3">
                            <input type="text" id="datepicker" name="datesearch" />
                            <label for="datepicker">Choose a day to display.</label>
                        </div>
                        <div>
                            <p>
                                <input name="view" type="radio" id="signin" value="signin" />
                                <label for="signin">Sign In View</label>
                                &nbsp &nbsp
                                <input name="view" type="radio" id="teacherv" value="teacher" />
                                <label for="teacherv">Teacher View</label>
                            </p>
                        </div>
                    </div>
                    <p>
                        <button class="btn waves-effect waves-light" type="submit" name="search">Search
                            <i class="material-icons right">search</i>
                        </button>
                    </p>
                </form>
            </div>
            <iframe src="passdisplay.php" style="border: 0; width: 100%; height: 100%">Could not load preview, please search for the date instead.</iframe>
        </body>

        <script src="/js/materialize.js"></script>
        <script src="/js/init.js"></script>

        </html>