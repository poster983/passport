<!--

The MIT License (MIT)

Copyright (c) Sun May 29 2016 Joseph Hassell joseph@thehassellfamily.net

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
    <? include "../personalCode.php";
	     trackerGA(); ?>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/passport/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    
    <link href="/passport/css/hamburgers.css" rel="stylesheet">

    <script>
    /*
    $('.button-collapse').sideNav({
      menuWidth: 300, // Default is 240
      closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
    }
  );
  $('.collapsible').collapsible();
  */
  </script>


    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


</head>

<body>

    <nav>
        <div class="nav-wrapper">
            <a href="index.php" class="brand-logo right">Passport Admin Dashboard</a>
            <!--
            <ul id="nav-desktop" class="left hide-on-med-and-down">
                <li><a href="passsearch.php">Passes</a></li>
                <li><a href="blackout.php">Blackout</a></li>
                <li><a href="editteacher.php">Teachers</a></li>

                <li><a href="createmessage.php">Messages</a></li>
                <li><a href="createwhy.php">Reasons</a></li>
                <li><a href="editlimits.php">Limits</a></li>
                <li><a href="createadmin.php">Admins</a></li>
                <li class="right"><a href="logout.php">Logout<i class="material-icons right">lock</i></a></li>
            </ul>
          -->
            <ul id="slide-out" class="side-nav">
                <p class="center-align black-text"></p>
                <li><a class="waves-effect" href="passsearch.php">Passes</a></li>
                <!--Blackout Dropdown-->
                <li><a class="dropdown-button waves-effect" href="#!" data-activates="dropdownBO">Blackout<i class="material-icons right">arrow_drop_down</i></a></li>
                 <ul id='dropdownBO' class='dropdown-content'>
                   <li><a class="waves-effect" href="blackout.php">Schedule a blackout </a></li>
                   <li><a class="waves-effect" href="blackoutcal.php">View Blackouts</a></li>
                 </ul>
                <!--Teacher Dropdown-->
                <li><a class="dropdown-button waves-effect" href="#!" data-activates="dropdownTea">Teachers<i class="material-icons right">arrow_drop_down</i></a></li>
                 <ul id='dropdownTea' class='dropdown-content'>
                   <li><a class="waves-effect" href="editteacher.php">New Teacher</a></li>
                   <li><a class="waves-effect" href="teacherlist.php">View Teachers</a></li>
                   <li><a class="waves-effect" href="/passport/teacher/index.php" target="_blank"><i class="material-icons">open_in_new</i>Go to Teacher Panel</a></li>
                 </ul>

                <!--Messages Dropdown-->
                <li><a class="dropdown-button waves-effect" href="#!" data-activates="dropdownMes">Messages<i class="material-icons right">arrow_drop_down</i></a></li>
                 <ul id='dropdownMes' class='dropdown-content'>
                   <li><a class="waves-effect" href="createmessage.php">New Message</a></li>
                   <li><a class="waves-effect" href="messagelist.php">View Messages</a></li>
                 </ul>

                <!--Reason Dropdown-->
                <li><a class="dropdown-button waves-effect" href="#!" data-activates="dropdownRea">Reasons<i class="material-icons right">arrow_drop_down</i></a></li>
                 <ul id='dropdownRea' class='dropdown-content'>
                   <li><a class="waves-effect" href="createwhy.php">New Reason</a></li>
                   <li><a class="waves-effect" href="whylist.php">View Reasons</a></li>
                 </ul>
                <li><a class="waves-effect" href="editlimits.php">Limits</a></li>
                <li><a class="waves-effect" href="createadmin.php">Admins</a></li>
                <li><div class="divider"></div></li>
                <li> <a class="waves-effect" href="logout.php">Logout<i class="material-icons right">lock_outline</i></a></li>
            </ul>
            <a href="#" data-activates="slide-out" class="button-collapse left-allign show-on-large"><i class="material-icons">menu</i></a>

        </div>
    </nav>

<? date_default_timezone_set('America/Chicago'); ?>
