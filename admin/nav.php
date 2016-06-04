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

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />



    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


</head>

<body>

    <nav>
        <div class="nav-wrapper red darken-4">
            <a href="/admin/index.php" class="brand-logo right">passr Admin Dashboard</a>
            <ul id="nav-desktop" class="left hide-on-med-and-down">
                <li><a href="passsearch.php">Passes</a></li>
                <li><a href="blackout.php">Blackout Dates</a></li>
                <li><a href="editteacher.php">Teachers</a></li>
                <!--<li><a href="teacherlist.php">View/Delete Teachers</a></li>-->
                <li><a href="createmessage.php">Messages</a></li>
                <li><a href="createadmin.php">Admins</a></li>
                <li class="right"><a href="/admin/logout.php">Logout<i class="material-icons right">lock</i></a></li>
            </ul>

            <ul id="nav-mobile" class="side-nav">
                <p class="center-align black-text"></p>
                <li><a href="passsearch.php">Passes</a></li>
                <li><a href="blackout.php">Blackout Dates</a></li>
                <li><a href="editteacher.php">Add Teachers</a></li>
                <li><a href="createmessage.php">Messages</a></li>
                <!-- <li><a href="teacherlist.php">View/Delete Teachers</a></li>-->
                <li><a href="createadmin.php">Admins</a></li>
                <li> <a href="/admin/logout.php">Logout<i class="material-icons right">lock_outline</i></a></li>
            </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse left"><i class="material-icons">menu</i></a>
        </div>
    </nav>