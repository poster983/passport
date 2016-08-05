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
        <script>
            $(document).ready(function () {
                $("#viewType li").click(function(){
                    $("#search-type").val($(this).attr("value"));
                    });
                });
        </script>


        <body>
            <div class="container">
                <h5 class="center">Search and print the Passes by day.</h5>
                <form method="get" action="passdisplay.php">
                    <div class="row">
                        <div class="input-field col s3">
                            <input type="text" id="datepicker" name="datesearch" />
                            <label for="datepicker">Choose a day to display.</label>
                        </div>
                        
                            <div class="col s8">
                                 <input type="hidden" id="search-type" name="view" value="teacher">
                                <ul class="tabs" id="viewType">
                                    <li class="tab col s3" name="view-option" id="signinview" value="signin"><a href="#signinv">Sign In View</a></li>
                                    <li class="tab col s3"name="view-option" id="teacherview" value="teacher"><a class="active" href="#teacherv">Instructor View</a></li>

                                </ul>
                            </div>
                            <div id="signinv" class="col s12">Test 1</div>
                            <div id="teacherv">
                                <div class="col s9 offset-s3">
                                <p>Filter By Period</p>
                                <input name="tper" type="radio" id="a" value="a" />
                                <label for="a">A Period</label>
                                &nbsp &nbsp
                                <input name="tper" type="radio" id="b" value="b" />
                                <label for="b">B Period</label>
                                &nbsp &nbsp
                                <input name="tper" type="radio" id="c" value="c" />
                                <label for="c">C Period</label>
                                &nbsp &nbsp
                                <input name="tper" type="radio" id="d" value="d" />
                                <label for="d">D Period</label>
                                &nbsp &nbsp
                                <input name="tper" type="radio" id="e" value="e" />
                                <label for="e">E Period</label>
                                &nbsp &nbsp
                                <input name="tper" type="radio" id="f" value="f" />
                                <label for="f">F Period</label>
                                &nbsp &nbsp
                                <input name="tper" type="radio" id="g" value="g" />
                                <label for="g">G Period</label>
                                &nbsp &nbsp
                                <input name="tper" type="radio" id="h" value="h" />
                                <label for="h">H Period</label>
                                &nbsp &nbsp
                                </div>
                                <div class="col s9 offset-s3">
                                <p>Filter By Department</p>
                                <input name="tdep" type="radio" id="tlec" value="lec" />
                                <label for="tlec">LEC</label>
                                &nbsp &nbsp
                                <input name="tdep" type="radio" id="tmath" value="math" />
                                <label for="tmath">Math</label>
                                &nbsp &nbsp
                                    <input name="tdep" type="radio" id="tlib" value="library" />
                                <label for="tlib">Library</label>
                                &nbsp &nbsp
                                    <input name="tdep" type="radio" id="tlec" value="hd" />
                                <label for="tlec">Help Desk</label>
                                &nbsp &nbsp
                                    <input name="tdep" type="radio" id="twl" value="Writing Lab" />
                                <label for="twl">Writing Lab</label>
                                &nbsp &nbsp
                                    <input name="tdep" type="radio" id="tfl" value="Foreign Language" />
                                <label for="tfl">Foreign Language</label>
                                &nbsp &nbsp
                                </div>
                            </div>
                        
                    </div>
                  <!--      <div>
                            <p>
                                <input name="view" type="radio" id="signin" value="signin" />
                                <label for="signin">Sign In View</label>
                                &nbsp &nbsp
                                <input name="view" type="radio" id="teacherv" value="teacher" />
                                <label for="teacherv">Teacher View</label>
                            </p>
                        </div> -->
                    
                    <p>
                        <button class="btn waves-effect waves-light" type="submit" name="search">Search
                            <i class="material-icons right">search</i>
                        </button>
                        </div>
                    </p>
                </form>
            </div>
            <!--<iframe src="passdisplay.php" style="border: 0; width: 100%; height: 100%">Could not load preview, please search for the date instead.</iframe>-->
        </body>

        <script src="/js/materialize.js"></script>
        <script src="/js/init.js"></script>

        </html>