<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Html</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>

<form method='post' action='post.php'>

    <div class="form-group">
        <label for="usr">Name:</label>
        <input type="text" name="fname" class="form-control" id="usr">
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" name="femail" class="form-control" id="email">
    </div>

    <div class="form-group">
        <label for="comment">Comment:</label>
        <textarea name="finhalt" class="form-control" rows="5" id="comment"></textarea>
    </div>

    <button input type='submit' type="button" class="btn" name="commit" value="commit"> Commit</button>

    </footer>
</form>

<?php

if(isset($_POST["commit"])) {
    echo "data was send!";
    echo "<p></p>";
    var_dump($_POST);
}
?>



</body>
</html>