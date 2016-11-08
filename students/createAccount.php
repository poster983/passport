<?php
  include "../medooconnect.php";
  $failshake = "";
  $fadein = "animated fadeInDown";
?>

<!--
The MIT License (MIT)

Copyright (c) Monday November 7 2016 Joseph Hassell joseph@thehassellfamily.net

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<html>


<head>
    <title>Sign Up</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/passport/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/passport/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/passport/css/passr.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/passport/css/animate.css" type="text/css" rel="stylesheet" media="screen,projection" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


</head>


<body class="blur-back">

    <div class="containerlogin signup-allign">

        <div class="card-panel <? echo $fadein; ?>">

<body>
    <div class="container">
      <div class="row">
        <form class="col s12" method="post" action="">
            <h4 class="center">Sign Up For Passport</h4>
            <div class="input-field">
                <p>
                    <input type="text" required id="firstname" autocomplete="off" class="validate" name="firstname">
                    <label for="firstname">First Name</label>
                </p>
            </div>
            <div class="input-field">
                <p>
                    <input type="text" required id="lastname" autocomplete="off" class="validate" name="lastname">
                    <label for="lastname">Last Name</label>
                </p>
            </div>
            <div class="row">
        <div class="col s6">

            <div class="input-field">

                    <input type="email" required id="email" autocomplete="off" class="validate" name="email">
                    <label data-error="Must be an email" for="email">Email</label>
                    <span for="email">@gmail.com</span>


            </div>
          </div>
        </div>

            <div class="input-field">
                <p>
                    <input type="password" required id="password" autocomplete="off" class="validate" name="passwordadmin">
                    <label data-error="Passwords Must Match" for="password">Password</label>
                </p>
            </div>
            <div class="input-field">
                <p>
                    <input type="password" required id="password2" autocomplete="off" class="validate" name="password2admin">
                    <label data-error="Passwords Must Match" for="password2">Password(again)</label>
                </p>
            </div>


            <p>
                <button class="btn waves-effect waves-light" type="submit" name="submit">Next Step
                    <i class="material-icons right">fast_forward</i>
                </button>
            </p>
            <div class="progress">
              <div class="determinate" style="width: 20%"></div>
            </div>
        </form>
    </div>
  </div>
</div>
</div>


</body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="/passport/js/materialize.js"></script>
<script src="/passport/js/init.js"></script>
<script>
      $('#password, #password2').on('keyup', function () {
        if ($('#password').val() == $('#password2').val()) {
          $("#password").removeClass( "invalid" ).addClass( "valid" );
          $("#password2").removeClass( "invalid" ).addClass( "valid" );
    } else {
          $("#password").removeClass( "valid" ).addClass( "invalid" );
          $("#password2").removeClass( "invalid" ).addClass( "valid" );
        }
      });
</script>

</html>


<?
if(isset($_POST['submit'])){



foreach ($_POST as $key => $value) {

}
{
$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$usernameadmin = $_POST['usernameadmin'];
$email = $_POST['email'];
$passwordadmin = $_POST['passwordadmin'];
$password2admin = $_POST['password2admin'];
if(preg_match('/^[a-zA-Z0-9.]+$/', $usernameadmin) == 1) {





if ($passwordadmin != $password2admin) {
    echo "ERROR: Passwords must match";
} else {
    include "../sqlconnect.php";

    $salt = '$2a$10$' . rand() . $usernameadmin . rand() . rand() . '$';
    echo $salt . "\n";
    $hashedPass = crypt($passwordadmin, $salt);

    echo $hashedPass;
    if ($hashedPass == '*0') {
      echo "Error Encrypting";
    } else {
/*
    $sql = "INSERT INTO admin (username, firstname, lastname, email, password)
    VALUES ('$usernameadmin', '$first_name', '$last_name', '$email', '$hashedPass')";

    if ($conn->query($sql) === TRUE) {
        echo "New account created successfully";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;

    }
    */
  }
    $conn->close();
}
} else {
  echo "you may only use a-z A-Z 0-9 in your username";
}
}


}
?>
