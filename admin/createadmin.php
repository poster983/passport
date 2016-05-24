<!--

The MIT License (MIT)

Copyright (c) Tue May 24 2016 Joseph Hassell joseph@thehassellfamily.net

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
    <title>Passr-Create Admin</title>
</head>

<body>
    <div>
        <form method="post" action="">
            <p>
                <input type="text" required id="firstname" name="firstname">
                <label for="firstname">First Name</label>
            </p>
            <p>
                <input type="text" required id="lastname" name="lastname">
                <label for="lastname">Last Name</label>
            </p>
            <p>
                <input type="text" required id="username" name="usernameadmin">
                <label for="username">Username</label>
            </p>
            <p>
                <input type="password" required id="password" name="passwordadmin">
                <label for="password">Password</label>
            </p>
            <p>
                <input type="password" required id="password2" name="password2admin">
                <label for="password2">Password(again)</label>
            </p>
            <p>
                <input type="email" required id="email" name="email">
                <label for="email">Email</label>
            </p>
            <p>
                <input type="submit" name="submit" value="Create Account">
            </p>
        </form>
    </div>


</body>

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

        if ($passwordadmin != $password2admin) {
            echo "ERROR: Passwords must match";
        } else {
            include "../sqlconnect.php";
            
            $sql = "INSERT INTO admin (username, firstname, lastname, email, password)
            VALUES ('$usernameadmin', '$first_name', '$last_name', '$email', '$passwordadmin')";

            if ($conn->query($sql) === TRUE) {
                echo "New account created successfully";

            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;

            }

            $conn->close();
        }
    }
    
    
} 
?>