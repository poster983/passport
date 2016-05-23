<html>

<head>
    <title>Passr-Printout</title>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd'
            , });
        });
    </script>
</head>

<body>
    <h3>Search and print the Passes by day.</h3>
    <form method="post" action="passdisplay.php">
        <input type="text" id="datepicker" name="datesearch" />
        <label for="datepicker">Choose a day to display.</label>
        <p>
            <input type="submit" name="search" id="search" value="Search Passr">
        </p>
    </form>
    <iframe src="passdisplay.php" style="border: 0; width: 100%; height: 100%">Could not load preview, please search for the date instead.</iframe>
</body>

</html>