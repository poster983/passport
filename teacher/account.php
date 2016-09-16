<?
include("common.php");
checklogin();
$msg = "";



?>
<!--

The MIT License (MIT)

Copyright (c) 2016 Joseph Hassell joseph@thehassellfamily.net

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
    <title>Teacher Dashboard</title>

    <? include "../personalCode.php";
	     trackerGA(); ?>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/passport/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/passport/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/passport/css/passr.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/passport/css/kiosk.css" type="text/css" rel="stylesheet" media="screen,projection" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!--<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script> -->
    <script src="/passport/js/materialize.js"></script>
    <script src="/passport/js/init.js"></script>

</head>

<body class="grey darken-4">

  <!-- Dropdown Structure -->
  <ul id="threeDot" class="dropdown-content">
    <li><a href="account.php">Account</a></li>
    <li class="divider"></li>
    <li><a href="logout.php">Logout<i class="material-icons right">lock</i></a></li>
  </ul>
  <!-- Nav Bar-->
  <nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo left">Teachers</a>
      <ul id="nav-mobile" class="right">
        <!--<li class="right"><a href="logout.php">Logout<i class="material-icons right">lock</i></a></li>-->
        <li><a href="index.php"><i class="material-icons">refresh</i></a></li>
        <li><a class="dropdown-button" href="#!" data-activates="threeDot">	&nbsp; &nbsp; &nbsp;	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<i class="material-icons left">more_vert</i> </a></li>
        <li><a href=""></a></li>
      </ul>
    </div>
  </nav>
  <div style='color: #ecf0f1'>
  <div class="container">
    <h1 class="center">Your Account</h1>
    <div class="section" id="changePassword">
      <div class="divider"></div>
      <h2 class="center">Password</h2>
      <div>
        <form method="post" action="">
            <div class="input-field">
                <p>
                    <input type="password" required name="oldPassword" autocomplete="off" id="oldPass" />
                    <label for="oldPass">Old Password</label>
                </p>
            </div>
            <div class="input-field">
              <p>
                  <input type="password" required name="newPassword" autocomplete="off" id="newPass" />
                  <label for="newPass">New Password</label>
              </p>
            </div>
            <div class="input-field">
              <p>
                  <input type="password" required name="newPassword2" autocomplete="off" id="newPass2" />
                  <label for="newPass2">New Password (again)</label>
              </p>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="submit">Change Password
                <i class="material-icons right">lock_outline</i>
            </button>
          </form>
      </div>
    </div>
  </div>
</div>




  <footer class="page-footer grey darken-3">
<div class="footer-copyright">
  <div class="container">
      <a class="black-text left" href="https://www.josephhassell.com/">Copyright © 2016 Joseph Hassell</a> &nbsp &nbsp
      <a class="black-text right" href="https://github.com/poster983/passport/blob/master/LICENSE">License </a> &nbsp &nbsp
      <a class="black-text right" href="https://poster983.github.io/passport/">Project Page &nbsp &nbsp</a>&nbsp &nbsp
  </div>
</div>
</footer>


<?
    $email = $_SESSION['teacherEmail'];
    echo "the email is " . $email;
    if(isset($_POST['submit'])) {
      include "../sqlconnect.php";
      //Vars
      $oldPass = $_POST['oldPassword'];
      $newPass1 = $_POST['newPassword'];
      $newPass2 = $_POST['newPassword2'];


      //Check if old pass is right
      mysqli_report(MYSQLI_REPORT_ERROR);
      if ($stmt = $conn->prepare("SELECT email, password FROM teachers WHERE email = ?")) {
        /* bind parameters for markers */
        echo "1";
       $stmt->bind_param("s", $email);
       /* execute query */
        $stmt->execute();
        $stmt->store_result();
        /* bind result variables */
        $stmt->bind_result($void, $hashedPass);
        echo "2";
    	   if($stmt->num_rows > "0") {
           echo "3";
           while ($stmt->fetch()) {
             echo "4";
           $hashedPass;
         }
    		if(crypt($oldPass, $hashedPass) == $hashedPass) {
          echo "5";
          $oldIsGood = 1;
        } else {
          echo "6";
          $oldIsGood = 0;
        }
      } else {
        echo "7";
        echo "<script> Materialize.toast('Incorect Password', 10000) </script>";
        $oldIsGood = 0;
      }
      $stmt->close();
    } else {
      echo "8";
      echo "<script> Materialize.toast('Its all broken, Contact IT.', 10000) </script>";
    }
      if ($oldIsGood == 1) {
      //check same
        if ($newPass1 != $newPass2) {
            echo "<script> Materialize.toast('Error, Passwords are not the same!', 10000) </script>";
        } else {


            $salt = '$2a$10$' . rand() . rand() . rand() . rand() . rand() . '$';
            echo $salt . "\n";
            $newHhashedPass = crypt($newPass1, $salt);

            echo $newHashedPass;
            if ($newHashedPass == '*0') {
              echo "<script> Materialize.toast('Error, Encryption Failed', 10000) </script>";
            } else {
              echo "it all works";
          }
        }
      } else {

      }
    }


?>


</body>
</html>
