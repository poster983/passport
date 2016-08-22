<!--

The MIT License (MIT)

Copyright (c) Wed Jul 06 2016 Joseph Hassell joseph@thehassellfamily.net

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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> </head>

<body>
    <nav>
        <div class="nav-wrapper red darken-4"> <a href="/admin/index.php" class="brand-logo Center">Add Yourself.</a> </div>
    </nav>



    <!-- Modal Structure -->
    <div id="instructions" class="modal">
        <div class="modal-content">
            <h4>NOTICE!</h4>
            <p>Please fill out all of the fields. </p>
            <!--<p>If you have multiple study halls with different room numbers, please fill in the form again for each room number with the appropriate periods respectively. </p>-->
        </div>
        <div class="modal-footer"> <a href="#!" class=" modal-action modal-close waves-effect waves-red btn-flat">Continue</a> </div>
    </div>



    <div class="container">
        <form method="post" action="">
            <div class="input-field">
                <p>
                    <input type="text" required name="name_title" id="name_title" />
                    <label for="name_title">Title</label>
                </p>
            </div>
            <div class="input-field">
                <p>
                    <input type="text" required name="first_name" id="first_name" />
                    <label for="firstname">First Name</label>
                </p>
            </div>
            <div class="input-field">
                <p>
                    <input type="text" required name="last_name" id="last_name" />
                    <label for="lastname">Last Name</label>
                </p>
            </div>
            <div class="input-field">
                <p>
                    <input type="email" required name="email" id="email" />
                    <label for="email">Email</label>
                </p>
            </div>
            <div class="input-field">
                <p>
                    <input type="number" disabled name="room" id="room" />
                    <label for="room">Room Number (No longer Required)</label>
                </p>
            </div>

            <p>
                <input type="checkbox" id="aper" name="aper" value="A" />
                <label for="aper">A Period</label> &nbsp &nbsp
                <input type="checkbox" id="bper" name="bper" value="B" />
                <label for="bper">B Period</label> &nbsp &nbsp
                <input type="checkbox" id="cper" name="cper" value="C" />
                <label for="cper">C Period</label> &nbsp &nbsp
                <input type="checkbox" id="dper" name="dper" value="D" />
                <label for="dper">D Period</label> &nbsp &nbsp
                <input type="checkbox" id="eper" name="eper" value="E" />
                <label for="eper">E Period</label> &nbsp &nbsp
                <input type="checkbox" id="fper" name="fper" value="F" />
                <label for="fper">F Period</label> &nbsp &nbsp
                <input type="checkbox" id="gper" name="gper" value="G" />
                <label for="gper">G Period</label> &nbsp &nbsp
                <input type="checkbox" id="hper" name="hper" value="H" />
                <label for="hper">H Period</label>
            </p>
            <p>
                <button class="btn waves-effect waves-light" type="submit" name="add_new_entry">Submit <i class="material-icons right">send</i> </button>
            </p>
        </form>  </div>
</body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="/js/materialize.js"></script>
<script src="/js/init.js"></script>
            <!-- Modal Trigger -->
    <script>
  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered

      $('#instructions').openModal();
  });
   </script>

</html>
<?php
if(isset($_POST['add_new_entry'])){


        foreach ($_POST as $key => $value) {

  }
    {
        $first_name = htmlspecialchars($_POST['first_name'],ENT_QUOTES);
        $last_name = htmlspecialchars($_POST['last_name'],ENT_QUOTES);
        $name_title = $_POST['name_title'];
        $email = strtolower($_POST['email']);
        $room = $_POST['room'];
        $aper = $_POST['aper'];
        $bper = $_POST['bper'];
        $cper = $_POST['cper'];
        $dper = $_POST['dper'];
        $eper = $_POST['eper'];
        $fper = $_POST['fper'];
        $gper = $_POST['gper'];
        $hper = $_POST['hper'];

        $per = "$aper $bper $cper $dper $eper $fper $gper $hper";

        $perarray = explode(" ", $per);

        $perarray_null = array_filter($perarray, 'strlen');

        $percount = count($perarray_null);

        echo $per;

        echo $percount;

        {
            echo "First Name: " . $first_name;
            echo "Last Name: " . $last_name;
            echo "Title: " . $name_title;
            echo "Email: " . $email;
            echo "Room: " . $room;

        }
        include "../../sqlconnect.php";
        foreach($perarray_null as $forper) {
            $sql = "INSERT INTO teachers (name_title, firstname, lastname, email, period)
            VALUES ('$name_title', '$first_name', '$last_name', '$email', '$forper')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    $conn->close();
    }
}

?>
