<html>

<head>
    <title>Passr</title>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>

<body>
    <!--Navbar-->
    <nav>
        <div class="nav-wrapper white">
            <a href="#" class="brand-logo center black-text">Passr</a>
        </div>
    </nav>

    <!--Body-->
    <!--Tabs-->
    <br>
    <br>
    <form method="post" action="/submit.php">
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3"><a href="#lec">LEC</a></li>
                    <li class="tab col s3"><a href="#math">Math</a></li>
                    <li class="tab col s3"><a href="#library">Library</a></li>
                    <li class="tab col s3"><a href="#helpDesk">Help Desk</a></li>
                </ul>
            </div>
            <div class="container">
                <div id="lec" class="col s12">
                    <p>
                        <input class="with-gap" type="radio" name="place" value="lec" id="lecConfirm" />
                        <label for="lecConfirm">Confirm LEC</label>
                    </p>
                </div>
                <div id="math" class="col s12">
                    <p>
                        <input class="with-gap" type="radio" name="place" value="math" id="mathConfirm" />
                        <label for="mathConfirm">Confirm Math</label>
                    </p>
                </div>
                <div id="library" class="col s12">
                    <p>
                        <input class="with-gap" type="radio" name="place" value="library" id="libConfirm" />
                        <label for="libConfirm">Confirm Library</label>
                    </p>
                </div>
                <div id="helpDesk" class="col s12">
                    <p>
                        <input class="with-gap" type="radio" name="place" value="hd" id="HDConfirm" />
                        <label for="HDConfirm">Confirm Help Desk</label>
                    </p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col s12">



                    <div class="row">
                        <div class="input-field col s6">
                            <input id="first_name" name="first_name" type="text" class="validate">
                            <label for="first_name">First Name</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="last_name" name="last_name" type="text" class="validate">
                            <label for="last_name">Last Name</label>
                        </div>
                        <div class="input-field col s4 push-s8">
                            <input id="student_id" name="student_id" type="text" class="validate">
                            <label for="student_id">Student ID</label>
                        </div>

                        <div class="input-field col s8 pull-s4">
                            <input id="email" name="email" type="email" class="validate">
                            <label for="email">Email</label>
                        </div>
                        <!--DATE PICKER GOES HERE (my datepicker is broken in jq2.2 so 1 will have to get a new one)-->
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <ul class="tabs">
                                <li class="tab col s3"><a href="#aper">A Period</a></li>
                                <li class="tab col s3"><a href="#bper">B Period</a></li>
                                <li class="tab col s3"><a href="#cper">C Period</a></li>
                                <li class="tab col s3"><a href="#dper">D Period</a></li>
                                <li class="tab col s3"><a href="#eper">E Period</a></li>
                                <li class="tab col s3"><a href="#fper">F Period</a></li>
                                <li class="tab col s3"><a href="#gper">G Period</a></li>
                                <li class="tab col s3"><a href="#hper">H Period</a></li>
                            </ul>
                        </div>
                        <!--Is this the best way?-->
                        <!--AAAAAAAAAAAAAAAAAAA-->
                        <div id="aper" class="col s12">
                            <p>
                                <input class="with-gap" type="radio" name="perTab" value="a" id="aConfirm" />
                                <label for="aConfirm">Confirm Study Hall and Period</label>
                            </p>
                        </div>
                        <!--BBBBBBBBBBBBBBBBBBB-->
                        <div id="bper" class="col s12">
                            <label>Select Study Hall</label>
                            <select class="browser-default" name="shTeacher">
                                <option value="" disabled selected>Choose your option</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                            </select>
                            <p>
                                <input class="with-gap" type="radio" name="perTab" value="b" id="bConfirm" />
                                <label for="bConfirm">Confirm Study Hall and Period</label>
                            </p>
                        </div>
                        <!--CCCCCCCCCCCCCCCCCCCC-->
                        <div id="cper" class="col s12">
                            <p>
                                <input class="with-gap" type="radio" name="perTab" value="c" id="cConfirm" />
                                <label for="cConfirm">Confirm Study Hall and Period</label>
                            </p>
                        </div>
                        <!--DDDDDDDDDDDDDDDDDDDD-->
                        <div id="dper" class="col s12">
                            <p>
                                <input class="with-gap" type="radio" name="perTab" value="d" id="dConfirm" />
                                <label for="dConfirm">Confirm Study Hall and Period</label>
                            </p>
                        </div>
                        <!--EEEEEEEEEEEEEEEEEEEE-->
                        <div id="eper" class="col s12">
                            <p>
                                <input class="with-gap" type="radio" name="perTab" value="e" id="eConfirm" />
                                <label for="eConfirm">Confirm Study Hall and Period</label>
                            </p>
                        </div>
                        <!--FFFFFFFFFFFFFFFFFFFF-->
                        <div id="fper" class="col s12">
                            <p>
                                <input class="with-gap" type="radio" name="perTab" value="f" id="fConfirm" />
                                <label for="fConfirm">Confirm Study Hall and Period</label>
                            </p>
                        </div>
                        <!--GGGGGGGGGGGGGGGGGGGG-->
                        <div id="gper" class="col s12">
                            <p>
                                <input class="with-gap" type="radio" name="perTab" value="g" id="gConfirm" />
                                <label for="gConfirm">Confirm Study Hall and Period</label>
                            </p>
                        </div>
                        <!--HHHHHHHHHHHHHHHHHHHH-->
                        <div id="hper" class="col s12">
                            <p>
                                <input class="with-gap" type="radio" name="perTab" value="h" id="hConfirm" />
                                <label for="hConfirm">Confirm Study Hall and Period</label>
                            </p>
                        </div>
                        <!--END-->
                    </div>

                </div>
            </div>
            <button class="btn waves-effect waves-light purple" type="submit" name="submit">Request a pass
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>





    <!--js-->

    <script type="text/javascript" src=/js/passr.js></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>

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
</body>

</html>