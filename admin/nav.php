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
                <li><a href="editteacher.php">Add Teachers</a></li>
                <li><a href="teacherlist.php">View/Delete Teachers</a></li>

                <li><a href="createadmin.php">Create New Admin</a></li>
                <li class="right"><a href="/admin/logout.php">Logout<i class="material-icons right">lock</i></a></li>
            </ul>

            <ul id="nav-mobile" class="side-nav">
                <p class="center-align black-text"></p>
                <li><a href="passsearch.php">Passes</a></li>
                <li><a href="blackout.php">Blackout Dates</a></li>
                <li><a href="editteacher.php">Add Teachers</a></li>
                <li><a href="teacherlist.php">View/Delete Teachers</a></li>
                <li><a href="createadmin.php">Create New Admin</a></li>
                <li> <a href="/admin/logout.php">Logout<i class="material-icons right">lock_outline</i></a></li>
            </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse left"><i class="material-icons">menu</i></a>
        </div>
    </nav>