<html>

<body>
    <form method="post" action="">
        <?php echo $message; ?>
            <p>
                <input type="text" required name="name_title" id="name_title" />
                <label for="name_title">Title</label>
            </p>
            <p>
                <input type="text" required name="first_name" id="first_name" />
                <label for="firstname">First Name</label>
            </p>
            <p>
                <input type="text" required name="last_name" id="last_name" />
                <label for="lastname">Last Name</label>
            </p>
            <p>
                <input type="email" required name="email" id="email" />
                <label for="email">Email</label>
            </p>
            <p>
                <input type="number" required name="room" id="room" />
                <label for="room">Room Number</label>
            </p>
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
                <input type="submit" name="add_new_entry" value="Add New Entry" />
            </p>
    </form>
</body>

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