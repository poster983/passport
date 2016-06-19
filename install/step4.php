<!--

The MIT License (MIT)

Copyright (c) Sat Jun 18 2016 Joseph Hassell joseph@thehassellfamily.net

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


<!-- UNUSED -->


<html>

<head>
    <title>Passr-Install-Step 4</title>
</head>

<body>
    <div>
        <h1>Welcome to the Passr auto installer.</h1>
    </div>
    <h3>Step 4</h3>
    <p>Now, a limit is being set on how many passes can be requested</p>
    <p>(You can change it later)</p>
    <div>
        <p>
            <a href="end.php">Next --></a>
        </p>
    </div>


</body>

</html>

<?

    {
            
            $sql = "INSERT INTO studentlimit (studentlimit, dep)
            VALUES ('5', '$first_name')";

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