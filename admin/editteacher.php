<?
include("common.php");
checklogin();
$msg = "";
?>
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

    <? include "nav.php"; ?>

        <body>
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
                            <input type="number" required name="room" id="room" />
                            <label for="room">Room Number</label>
                        </p>
                    </div>
                    <p>
                        <input type="radio" name="period" value="a" id="perioda" />
                        <label for="perioda">A Period</label>
                        <input type="radio" name="period" value="b" id="periodb" />
                        <label for="periodb">B Period</label>
                        <input type="radio" name="period" value="c" id="periodc" />
                        <label for="periodc">C Period</label>
                        <input type="radio" name="period" value="d" id="periodd" />
                        <label for="periodd">D Period</label>
                        <input type="radio" name="period" value="e" id="periode" />
                        <label for="periode">E Period</label>
                        <input type="radio" name="period" value="f" id="periodf" />
                        <label for="periodf">F Period</label>
                        <input type="radio" name="period" value="g" id="periodg" />
                        <label for="periodg">G Period</label>
                        <input type="radio" name="period" value="h" id="periodh" />
                        <label for="periodh">H Period</label>
                    </p>
                    <p>
                        <button class="btn waves-effect waves-light" type="submit" name="add_new_entry">Add New Teacher
                            <i class="material-icons right">send</i>
                        </button>
                    </p>
                </form>
                <a class="waves-effect waves-light btn-large" href="teacherlist.php">Teacher List</a>
            </div>
        </body>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="/js/materialize.js"></script>
        <script src="/js/init.js"></script>

        </html>

        <?php    
if(isset($_POST['add_new_entry'])){ 

    
        foreach ($_POST as $key => $value) {

  }
    {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $name_title = $_POST['name_title'];
        $email = $_POST['email'];
        $room = $_POST['room'];
        $period = $_POST['period'];
        {
            echo "First Name: " . $first_name;
            echo "Last Name: " . $last_name;
            echo "Title: " . $name_title;
            echo "Email: " . $email;
            echo "Room: " . $room;
            echo "Period: " . $period;
        }
        {
            include "../sqlconnect.php";
            
            $sql = "INSERT INTO teachers (name_title, firstname, lastname, email, room, period)
            VALUES ('$name_title', '$first_name', '$last_name', '$email', '$room', '$period')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
    }
    
    
}  

?>