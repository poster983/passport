<!--

The MIT License (MIT)

Copyright (c) Fri Aug 05 2016 Joseph Hassell joseph@thehassellfamily.net

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
    <title>Feedback</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> </head>

<body>
    <nav>
        <div class="nav-wrapper red darken-4"> <a href="" class="brand-logo center">Feedback Manager</a> </div>
    </nav>
    
    <div class="container">
    
    <?
    
    include "../sqlconnect.php";
    
    $sql = "SELECT id, name, email, comment, rating, report_type, date, role FROM feedback ORDER BY date DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul class='collapsible' data-collapsible='accordion'>";
       
        while($row = $result->fetch_assoc()) {
            if ($row['report_type'] == "bug") {
                $icon = "report_problem";
                $ratingstar = "Priority of ";
            } else {
                $icon = "thumbs_up_down";
                $ratingstar = "Rating of ";
            }
            echo "<li>";
            echo "<div class='collapsible-header'><i class='material-icons'>" . $icon . "</i>" . $row['name'] . " <div class='chip'>" . $ratingstar . $row['rating'] . " </div> &nbsp &nbsp Ticket id: <div class='chip'>" . $row['id'] . " </div> &nbsp &nbsp Date: <div class='chip'>" . $row['date'] . " </div>  &nbsp &nbsp A <div class='chip'>" . $row['role'] . " </div> submitted this</div>";
            echo "<div class='collapsible-body'><p>" . $row['comment'] . "</p> <p><a href='mailto:" . $row['email'] . "?Subject=Passport%20Feedback%20Followup' target='_top'>Send an email</a></p></div>";
            echo "</li>";
        }
        echo "</ul>";
    }
    
    ?>
    
    </div>
    
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="/js/materialize.js"></script>
    <script src="/js/init.js"></script>
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