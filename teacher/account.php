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
    <!--FavIcon-->

    <link rel="shortcut icon" type="image/png" href="/passport/image/favicon.png"/>
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
      <a href="index.php" class="brand-logo left">Teachers</a>
      <ul id="nav-mobile" class="right">

        <li><a class="dropdown-button" href="#!" data-activates="threeDot">	&nbsp; &nbsp; &nbsp;	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<i class="material-icons left">more_vert</i> </a></li>
        <li><a href=""></a></li>
      </ul>
    </div>
  </nav>
  <div style='color: #ecf0f1'>
  <div class="container">
    <h1 class="center">Your Account</h1>
    <div class="divider"></div>

    <ul class="collapsible white black-text" data-collapsible="accordion">
      <li>
        <div class="collapsible-header black-text"><i class="material-icons">access_time</i>Change Period</div>
        <div class="collapsible-body">
          <div class="container">
          <form method="post" action="">
            <h4 class="center">Change Your Period</h4>
            <div id="periodChecks">
            <input type="checkbox" id="aper" name="aper" value="A" />
            <label for="aper">A Period</label>
            &nbsp &nbsp
            <input type="checkbox" id="bper" name="bper" value="B" />
            <label for="bper">B Period</label>
            &nbsp &nbsp
            <input type="checkbox" id="cper" name="cper" value="C" />
            <label for="cper">C Period</label>
            &nbsp &nbsp
            <input type="checkbox" id="dper" name="dper" value="D" />
            <label for="dper">D Period</label>
            &nbsp &nbsp
            <input type="checkbox" id="e1per" name="e1per" value="E1" />
            <label for="e1per">E Period (You Have First Lunch)</label>
            &nbsp; &nbsp;
            <input type="checkbox" id="e2per" name="e2per" value="E2" />
            <label for="e2per">E Period (You Have Second Lunch)</label>
            &nbsp &nbsp
            <input type="checkbox" id="fper" name="fper" value="F" />
            <label for="fper">F Period</label>
            &nbsp &nbsp
            <input type="checkbox" id="gper" name="gper" value="G" />
            <label for="gper">G Period</label>
            &nbsp &nbsp
            <input type="checkbox" id="hper" name="hper" value="H" />
            <label for="hper">H Period</label>
          </div>
            <br>
            <a class="waves-effect waves-light btn" onclick="sendNewPeriodsToAjax();">Change Periods</a>
          </form>
        </div>
        </div>
      </li>
      <li>
        <div class="collapsible-header"><i class="material-icons">lock</i>Change Password</div>
        <div class="collapsible-body">
          <h4 class="center">Change Your Password</h4>
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
                <button class="btn waves-effect waves-light" type="submit" name="submitPass">Change Password
                    <i class="material-icons right">lock_outline</i>
                </button>
              </form>
          </div>
        </div>
      </li>
    </ul>

    <div id="ajaxReturnDom"></div>
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

<script>
$(document).ready(function(){
    $('.collapsible').collapsible();
  });

  //Search Ajax Request
  function sendNewPeriodsToAjax() {


    var checked = [];
    $("#periodChecks input:checkbox").each(function ()
    {
      if($(this).is(":checked")) {
        checked.push($(this).val());
      } else {
        checked.push("");
      }
    });
      console.log(checked);
      console.log(checked.join(','));
      var checkStr = checked.join(',')
    $('#ajaxReturnDom').html("    <div class=\"preloader-wrapper big active\">\r\n      <div class=\"spinner-layer spinner-blue\">\r\n        <div class=\"circle-clipper left\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"gap-patch\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"circle-clipper right\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div>\r\n      <\/div>\r\n\r\n      <div class=\"spinner-layer spinner-red\">\r\n        <div class=\"circle-clipper left\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"gap-patch\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"circle-clipper right\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div>\r\n      <\/div>\r\n\r\n      <div class=\"spinner-layer spinner-yellow\">\r\n        <div class=\"circle-clipper left\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"gap-patch\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"circle-clipper right\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div>\r\n      <\/div>\r\n\r\n      <div class=\"spinner-layer spinner-green\">\r\n        <div class=\"circle-clipper left\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"gap-patch\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div><div class=\"circle-clipper right\">\r\n          <div class=\"circle\"><\/div>\r\n        <\/div>\r\n      <\/div>\r\n    <\/div> <h5>Loading</h5>");
    $.ajax({
  url: 'teacherAJAX/account.php',
  data: {'whatToDo':'period','checked':checkStr},
  type: 'post',
  success: function(data) {
    $('#ajaxReturnDom').html(data.code);
    //console.log(data.code);
    if(data.status == "success") {
      Materialize.toast('Changed Period Successfully', 5000);
      console.log(data.code);
    } else if (data.status == "error") {
      if (data.code == "3001") {
        Materialize.toast('Error Code: 3001, See Console For More Details', 15000);
        console.error("Passport Info Code System: Returned with code \"" + data.code + "\"-Database Error");
      } else {
        Materialize.toast('Error Code: 1111, See Console For More Details', 15000);
        console.error("Passport Info Code System: Returned with code 1111 - Unknown Error");
      }
    }

  },
  error: function(xhr, desc, err) {
    console.warn("Passport Info Code System: Returned with code \"1001\"-AJAX Error");
    console.log(xhr);
    console.error("Details: " + desc + "\nError:" + err);
    console.warn(xhr.responseText)
    $('#ajaxReturnDom').html("There was an error.  Please check the console for more details.");
  }
})
};
</script>

<?
    $teaID = $_SESSION['teacherID'];
    echo "the ID is " . $teaID;
    if(isset($_POST['submitPass'])) {
      include "../sqlconnect.php";
      //Vars
      $oldPass = $_POST['oldPassword'];
      $newPass1 = $_POST['newPassword'];
      $newPass2 = $_POST['newPassword2'];


      //Check if old pass is right
      mysqli_report(MYSQLI_REPORT_ERROR);
      if ($stmt = $conn->prepare("SELECT password FROM teachers WHERE id = ?")) {
        /* bind parameters for markers */
    //    echo "1";
       $stmt->bind_param("i", $teaID);
       /* execute query */
        $stmt->execute();
        $stmt->store_result();
        /* bind result variables */
        $stmt->bind_result($hashedPass);
    //    echo "2";
    	   if($stmt->num_rows > "0") {
          // echo "3";
           while ($stmt->fetch()) {
        //     echo "4";
           $hashedPass;
         }
    		if(crypt($oldPass, $hashedPass) == $hashedPass) {
          //echo "5";
          $oldIsGood = 1;
        } else {
        //  echo "6";
          $oldIsGood = 0;
        }
      } else {
      //  echo "7";
        echo "<script> Materialize.toast('Incorect Password', 10000) </script>";
        $oldIsGood = 0;
      }
      $stmt->close();
    } else {
      //echo "8";
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
              $sql = "UPDATE teachers SET password='$newHhashedPass' WHERE id='$teaID'";

              if ($conn->query($sql) === TRUE) {
                echo "<script> Materialize.toast('Your Password has now been updated.', 10000) </script>";
              } else {
                echo "<script> Materialize.toast('Error updating record: " . $conn->error . "', 10000) </script>";
              }

          }
        }
      } else {

      }
    }


?>


</body>
</html>
