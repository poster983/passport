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
<html>

<head>
    <title>Passr</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />


    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />



</head>

<body>
    <!--Navbar-->
    <nav>
        <div class="nav-wrapper red darken-4">
            <a href="#" class="brand-logo center black-text">Passr</a>
        </div>
    </nav>

    <!--Body-->
    <div>
        <a href="https://github.com/poster983/passr"><img style="position: absolute; top: 0; left: 0; border: 0;" src="https://camo.githubusercontent.com/82b228a3648bf44fc1163ef44c62fcc60081495e/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f6c6566745f7265645f6161303030302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_left_red_aa0000.png"></a>
    </div>

    <!--Tabs-->
    <br>
    <br>
    <br>
    <? include "sqlconnect.php"; ?>
        <form method="post" action="/submit.php">
            <div class="row">
                <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s3"><a href="#lec">LEC</a></li>
                        <li class="tab col s3"><a href="#math">Math</a></li>
                        <li class="tab col s3"><a href="#library">Library</a></li>
                        <li class="tab col s3"><a href="#helpDesktab">Help Desk</a></li>
                        <li class="tab col s3"><a href="#writingLabtab">Writing Lab</a></li>
                        <li class="tab col s3"><a href="#FLtab">Foreign Language</a></li>
                    </ul>
                </div>

                <div class="container">
                    <? include "function.php"; ?>
                        <div id="lec" class="col s12">
                            <p>
                                <? LECout(); ?>
                                    <? LECmess(); ?>
                                        <input class="with-gap" type="radio" name="place" value="lec" required id="lecConfirm" />
                                        <label for="lecConfirm">Confirm LEC</label>
                                        <br>
                                        <br>
                                        <br>
                                        <select name="whylec" class="browser-default">
                                            <option selected disabled value="">Why are you coming today?</option>
                                            <?
                                    $sql="SELECT dep, why FROM why WHERE dep='LEC' ORDER BY why"; 
                                    $result = $conn->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            
                                            echo '<option value="'.$row['why'].'">' . $row['why']. "</option>";
                                        }
                                        
                                    }
                                            ?>
                                        </select>
                            </p>
                        </div>
                        <div id="math" class="col s12">
                            <p>
                                <? MATHout(); ?>
                                    <? MATHmess(); ?>
                                        <input class="with-gap" type="radio" name="place" value="math" id="mathConfirm" />
                                        <label for="mathConfirm">Confirm Math</label>
                                        <br>
                                        <br>
                                        <br>
                                        <select name="whymath" class="browser-default">
                                            <option selected disabled value="">Why are you coming today?</option>
                                            <?
                                    $sql="SELECT dep, why FROM why WHERE dep='Math Department' ORDER BY why"; 
                                    $result = $conn->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            
                                            echo '<option value="'.$row['why'].'">' . $row['why']. "</option>";
                                        }
                                        
                                    }
                                            ?>
                                        </select>
                            </p>
                        </div>
                        <div id="library" class="col s12">
                            <p>
                                <? LIBout(); ?>
                                    <? LIBmess(); ?>

                                        <input class="with-gap" type="radio" name="place" value="library" id="libConfirm" />
                                        <label for="libConfirm">Confirm Library</label>
                                        <br>
                                        <br>
                                        <br>
                                        <select name="whylib" class="browser-default">
                                            <option selected disabled value="">Why are you coming today?</option>
                                            <?
                                    $sql="SELECT dep, why FROM why WHERE dep='Library' ORDER BY why"; 
                                    $result = $conn->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            
                                            echo '<option value="'.$row['why'].'">' . $row['why']. "</option>";
                                        }
                                        
                                    }
                                            ?>
                                        </select>
                            </p>
                        </div>
                        <div id="helpDesktab" class="col s12">
                            <p>
                                <? HDout(); ?>
                                    <? HDmess(); ?>
                                        <input class="with-gap" type="radio" name="place" value="hd" id="HDConfirm" />
                                        <label for="HDConfirm">Confirm Help Desk</label>
                                        <br>
                                        <br>
                                        <br>
                                        <select name="whyhd" class="browser-default">
                                            <option selected disabled value="">Why are you coming today?</option>
                                            <?
                                    $sql="SELECT dep, why FROM why WHERE dep='Help Desk' ORDER BY why"; 
                                    $result = $conn->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            
                                            echo '<option value="'.$row['why'].'">' . $row['why']. "</option>";
                                        }
                                        
                                    }
                                            ?>
                                        </select>
                            </p>
                        </div>
                        <div id="writingLabtab" class="col s12">
                            <p>
                                <? WLout(); ?>
                                    <? WLmess(); ?>
                                        <input class="with-gap" type="radio" name="place" value="Writing Lab" id="WLConfirm" />
                                        <label for="WLConfirm">Confirm Writing Lab</label>
                                        <br>
                                        <br>
                                        <br>
                                        <select name="whywl" class="browser-default">
                                            <option selected disabled value="">Why are you coming today?</option>
                                            <?
                                    $sql="SELECT dep, why FROM why WHERE dep='Writing Lab' ORDER BY why"; 
                                    $result = $conn->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            
                                            echo '<option value="'.$row['why'].'">' . $row['why']. "</option>";
                                        }
                                        
                                    }
                                            ?>
                                        </select>
                            </p>
                        </div>
                        <div id="FLtab" class="col s12">
                            <p>
                                <? FLout(); ?>
                                    <? FLmess(); ?>
                                        <input class="with-gap" type="radio" name="place" value="Foreign Language" id="FLConfirm" />
                                        <label for="FLConfirm">Confirm Foreign Language</label>
                                        <br>
                                        <br>
                                        <br>
                                        <select name="whyfl" class="browser-default">
                                            <option selected disabled value="">Why are you coming today?</option>
                                            <?
                                    $sql="SELECT dep, why FROM why WHERE dep='Foreign Language' ORDER BY why"; 
                                    $result = $conn->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            
                                            echo '<option value="'.$row['why'].'">' . $row['why']. "</option>";
                                        }
                                        
                                    }
                                            ?>
                                        </select>
                            </p>
                        </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col s12">



                        <div class="row">
                            <div class="input-field col s6">
                                <input id="first_name" name="first_name" type="text" required class="validate">
                                <label for="first_name">First Name</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="last_name" name="last_name" type="text" required class="validate">
                                <label for="last_name">Last Name</label>
                            </div>
                            <div class="input-field col s4 push-s8">
                                <input id="student_id" name="student_id" type="text" required class="validate">
                                <label for="student_id">Student ID</label>
                            </div>

                            <div class="input-field col s8 pull-s4">
                                <input id="email" name="email" type="email" required class="validate">
                                <label for="email">Email</label>
                            </div>
                            <div class="section">
                                <h5 class="center">Pick the day that you are coming.*</h5>

                                <div>
                                    <p class="center">
                                        <input type="radio" id="monday" name="day" required value="<? echo date( 'Y-m-d', strtotime(" monday this week ")); ?>">
                                        <label for="monday">Monday</label>
                                        &nbsp &nbsp
                                        <input type="radio" id="tuesday" name="day" value="<? echo date( 'Y-m-d', strtotime(" tuesday this week ")); ?>">
                                        <label for="tuesday">Tuesday</label>
                                        &nbsp &nbsp
                                        <input type="radio" id="wednesday" name="day" value="<? echo date( 'Y-m-d', strtotime(" wednesday this week ")); ?>">
                                        <label for="wednesday">Wednesday</label>
                                        &nbsp &nbsp
                                        <input type="radio" id="thursday" name="day" value="<? echo date( 'Y-m-d', strtotime(" thursday this week ")); ?>">
                                        <label for="thursday">Thursday</label>
                                        &nbsp &nbsp
                                        <input type="radio" id="friday" name="day" value="<? echo date( 'Y-m-d', strtotime(" friday this week ")); ?>">
                                        <label for="friday">Friday</label>

                                    </p>
                                    <p class="right">*All days relative to current week</p>
                                </div>
                            </div>
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

                            <!--AAAAAAAAAAAAAAAAAAA-->

                            <div id="aper" class="col s12">
                                <p>
                                    <select name="shTeacherA" class="browser-default">
                                        <option selected value="">Choose Your Teacher</option>

                                        <?
                                    include "sqlconnect.php";
                           

                                    $sql="SELECT id,name_title,lastname FROM teachers WHERE period='a' ORDER BY lastname"; 
                                    $result = $conn->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            
                                            echo '<option value="'.$row['name_title'] . ' ' . $row['lastname'].'">' .$row['name_title'] . ' ' . $row['lastname'] . "</option>";
                                        }
                                        
                                    } else {
                                         $conn->close();
                                    }
                                ?>
                                    </select>
                                    <input class="with-gap" type="radio" name="perTab" value="a" required id="aConfirm" />
                                    <label for="aConfirm">Confirm Study Hall and Period</label>
                                </p>
                            </div>
                            <!--BBBBBBBBBBBBBBBBBBB-->
                            <div id="bper" class="col s12">
                                <p>
                                    <select name="shTeacherB" class="browser-default">
                                        <option selected value="">Choose Your Teacher</option>

                                        <?
                                    include "sqlconnect.php";
                           

                                    $sql="SELECT id,name_title,lastname FROM teachers WHERE period='b' ORDER BY lastname"; 
                                    $result = $conn->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            
                                            echo '<option value="'.$row['name_title'] . ' ' . $row['lastname'].'">' .$row['name_title'] . ' ' . $row['lastname'] . "</option>";
                                        }
                                        
                                    } else {
                                         $conn->close();
                                    }
                                ?>
                                    </select>


                                    <input class="with-gap" type="radio" name="perTab" value="b" id="bConfirm" />
                                    <label for="bConfirm">Confirm Study Hall and Period</label>
                                </p>
                            </div>
                            <!--CCCCCCCCCCCCCCCCCCCC-->
                            <div id="cper" class="col s12">
                                <p>

                                    <select name="shTeacherC" class="browser-default">
                                        <option selected value="">Choose Your Teacher</option>

                                        <?
                                    include "sqlconnect.php";
                           

                                    $sql="SELECT id,name_title,lastname FROM teachers WHERE period='c' ORDER BY lastname"; 
                                    $result = $conn->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            
                                            echo '<option value="'.$row['name_title'] . ' ' . $row['lastname'].'">' .$row['name_title'] . ' ' . $row['lastname'] . "</option>";
                                        }
                                        
                                    } else {
                                         $conn->close();
                                    }
                                ?>
                                    </select>

                                    <input class="with-gap" type="radio" name="perTab" value="c" id="cConfirm" />
                                    <label for="cConfirm">Confirm Study Hall and Period</label>
                                </p>
                            </div>
                            <!--DDDDDDDDDDDDDDDDDDDD-->
                            <div id="dper" class="col s12">
                                <p>
                                    <select name="shTeacherD" class="browser-default">
                                        <option selected value="">Choose Your Teacher</option>

                                        <?
                                    include "sqlconnect.php";
                           

                                    $sql="SELECT id,name_title,lastname FROM teachers WHERE period='d' ORDER BY lastname"; 
                                    $result = $conn->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            
                                            echo '<option value="'.$row['name_title'] . ' ' . $row['lastname'].'">' .$row['name_title'] . ' ' . $row['lastname'] . "</option>";
                                        }
                                        
                                    } else {
                                         $conn->close();
                                    }
                                ?>
                                    </select>
                                    <input class="with-gap" type="radio" name="perTab" value="d" id="dConfirm" />
                                    <label for="dConfirm">Confirm Study Hall and Period</label>
                                </p>
                            </div>
                            <!--EEEEEEEEEEEEEEEEEEEE-->
                            <div id="eper" class="col s12">
                                <p>
                                    <select name="shTeacherE" class="browser-default">
                                        <option selected value="">Choose Your Teacher</option>

                                        <?
                                    include "sqlconnect.php";
                           

                                    $sql="SELECT id,name_title,lastname FROM teachers WHERE period='e' ORDER BY lastname"; 
                                    $result = $conn->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            
                                            echo '<option value="'.$row['name_title'] . ' ' . $row['lastname'].'">' .$row['name_title'] . ' ' . $row['lastname'] . "</option>";
                                        }
                                        
                                    } else {
                                         $conn->close();
                                    }
                                ?>
                                    </select>
                                    <input class="with-gap" type="radio" name="perTab" value="e" id="eConfirm" />
                                    <label for="eConfirm">Confirm Study Hall and Period</label>
                                </p>
                            </div>
                            <!--FFFFFFFFFFFFFFFFFFFF-->
                            <div id="fper" class="col s12">
                                <p>
                                    <select name="shTeacherF" class="browser-default">
                                        <option selected value="">Choose Your Teacher</option>

                                        <?
                                    include "sqlconnect.php";
                           

                                    $sql="SELECT id,name_title,lastname FROM teachers WHERE period='f' ORDER BY lastname"; 
                                    $result = $conn->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            
                                            echo '<option value="'.$row['name_title'] . ' ' . $row['lastname'].'">' .$row['name_title'] . ' ' . $row['lastname'] . "</option>";
                                        }
                                        
                                    } else {
                                         $conn->close();
                                    }
                                ?>
                                    </select>
                                    <input class="with-gap" type="radio" name="perTab" value="f" id="fConfirm" />
                                    <label for="fConfirm">Confirm Study Hall and Period</label>
                                </p>
                            </div>
                            <!--GGGGGGGGGGGGGGGGGGGG-->
                            <div id="gper" class="col s12">
                                <p>
                                    <select name="shTeacherG" class="browser-default">
                                        <option selected value="">Choose Your Teacher</option>

                                        <?
                                    include "sqlconnect.php";
                           

                                    $sql="SELECT id,name_title,lastname FROM teachers WHERE period='g' ORDER BY lastname"; 
                                    $result = $conn->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            
                                            echo '<option value="'.$row['name_title'] . ' ' . $row['lastname'].'">' .$row['name_title'] . ' ' . $row['lastname'] . "</option>";
                                        }
                                        
                                    } else {
                                         $conn->close();
                                    }
                                ?>
                                    </select>
                                    <input class="with-gap" type="radio" name="perTab" value="g" id="gConfirm" />
                                    <label for="gConfirm">Confirm Study Hall and Period</label>
                                </p>
                            </div>
                            <!--HHHHHHHHHHHHHHHHHHHH-->
                            <div id="hper" class="col s12">
                                <p>
                                    <select name="shTeacherH" class="browser-default">
                                        <option selected value="">Choose Your Teacher</option>

                                        <?
                                    include "sqlconnect.php";
                           

                                    $sql="SELECT id,name_title,lastname FROM teachers WHERE period='h' ORDER BY lastname"; 
                                    $result = $conn->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            
                                            echo '<option value="'.$row['name_title'] . ' ' . $row['lastname'].'">' .$row['name_title'] . ' ' . $row['lastname'] . "</option>";
                                        }
                                        
                                    } else {
                                         $conn->close();
                                    }
                                ?>
                                    </select>
                                    <input class="with-gap" type="radio" name="perTab" value="h" id="hConfirm" />
                                    <label for="hConfirm">Confirm Study Hall and Period</label>
                                </p>
                            </div>
                            <!--END-->
                            <!--SH Select-->

                        </div>

                    </div>
                </div>

                <button class="btn waves-effect waves-light red darken-2 tooltipped" data-position="top" data-delay="50" data-tooltip="You CANNOT cancel this pass.  You are required to come. " type="submit" name="submit">Request a pass
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>




        <!-- Footer -->


        <footer class="page-footer white">
            <div class="footer-copyright">
                <div class="container">
                    <a class="black-text left" href="">Copyright © 2016 Joseph Hassell</a> &nbsp &nbsp
                    <a class="black-text right" href="http://lijo.pw/1668">Licence </a> &nbsp &nbsp
                    <a class="black-text right" href="http://lijo.pw/1669">Project Page &nbsp &nbsp</a>&nbsp &nbsp
                </div>
            </div>
        </footer>




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

<?php

/*

if(!isset($_POST['submit'])) exit();

// Required field names
$required = array('first_name', 'last_name', 'student_id', 'email', 'perTab', 'place', 'day');

// Loop over field names, make sure each one exists and is not empty
$error = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}

if ($error) {
  echo "All fields are required.";
} else {

    
    foreach ($_POST as $key => $value) {

  }
    {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $student_id = $_POST['student_id'];
        $email = $_POST['email'];
        $place = $_POST['place'];
        $perTab = $_POST['perTab'];
        $shTeacherA = $_POST['shTeacherA'];
        $shTeacherB = $_POST['shTeacherB'];
        $shTeacherC = $_POST['shTeacherC'];
        $shTeacherD = $_POST['shTeacherD'];
        $shTeacherE = $_POST['shTeacherE'];
        $shTeacherF = $_POST['shTeacherF'];
        $shTeacherG = $_POST['shTeacherG'];
        $shTeacherH = $_POST['shTeacherH'];
        $day = $_POST['day'];
        {
            if ($perTab === "a") {
                $shTeacher = $shTeacherA;
        } 
            elseif ($perTab === "b") {
                $shTeacher = $shTeacherB;
            }
            elseif ($perTab === "c") {
                $shTeacher = $shTeacherC;
            }
            elseif ($perTab === "d") {
                $shTeacher = $shTeacherD;
            }
            elseif ($perTab === "e") {
                $shTeacher = $shTeacherE;
            }
            elseif ($perTab === "f") {
                $shTeacher = $shTeacherF;
            }
            elseif ($perTab === "g") {
                $shTeacher = $shTeacherG;
            }
            elseif ($perTab === "h") {
                $shTeacher = $shTeacherH;
            }
            else {
            echo "ERROR, INVALID PERIOD";
        }
        }
        
        
        
        {
            echo "First Name: " . $first_name;
            echo "Last Name: " . $last_name;
            echo "Student ID: " . $student_id;
            echo "Email: " . $email;
            echo "Place: " . $place;
            echo "Chosen Period: " . $perTab;
            echo "Chosen Teacher: " . $shTeacher;
            echo "Day to come: " . $day;
        }
        {
            include "sqlconnect.php";
            
            $sql = "INSERT INTO passes (firstname, lastname, email, student_id, period, sh_teacher, place, day_to_come)
            VALUES ('$first_name', '$last_name', '$email', '$student_id', '$perTab', '$shTeacher', '$place', '$day')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
    }

    }*/
    ?>