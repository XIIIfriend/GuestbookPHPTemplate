
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sulzer Guestbook</title>


</head>

<body>



<?php

if (isset($_POST["commit"])) {

    //Textfeldeingaben filtern
    function daten_reiniger($inhalt)
    {
        if (!empty($inhalt)) {
            //HTML- und PHP-Code entfernen.
            $inhalt = strip_tags($inhalt);
            //Umlaute und Sonderzeichen in
            //HTML-Schreibweise umwandeln
            $inhalt = htmlentities($inhalt);
            //Entfernt überflüssige Zeichen
            //Anfang und Ende einer Zeichenkette
            $inhalt = trim($inhalt);
            //Backslashes entfernen
            $inhalt = stripslashes($inhalt);
        }
        return $inhalt;
    }

    foreach ($_POST as $key => $element) {
        //Dynamische Variablen erzeugen, wie g_fname, etc.
        //und die Eingaben Filtern
        ${"g_" . $key} = daten_reiniger($element);
    }


    if(strlen($g_fname) <3 || strlen($g_finhalt)<3) {
        $eintrag="";
    }
    else {
        $g_fdatum = date("Y-m-d H:i:s");
        $g_finhalt = nl2br($g_finhalt);
        $eintrag = " 
            <div class=\"form-group\">
            <label>Datum: </label>
            $g_fdatum
            <p/>
            <label>Name:</label>
            $g_fname
            <p/>
            <label>Email:</label>
            $g_femail
            <p/>
            <label>Comment:</label>
            $g_finhalt
            <p/>
            <hr>
            </div>";
    }
}

// Buchdatei
$datei = "buch_inhalt.htm";

if (file_exists($datei)) {
    // Falls die Datei existiert, wird sie ausgelesen und
    // die enthaltenen Daten werden durch den neuen Beitrag
    // ergänzt
    $fp=fopen($datei,"r+");
    $daten=fread($fp,filesize($datei));
    rewind($fp);
    flock($fp,2);
    fputs($fp,"$eintrag \n $daten");
    flock($fp,3);
    fclose($fp);
    echo "$eintrag \n $daten" ;
    //include("autorespond.php");
    //header("Location:buch.php");
}else if (!file_exists($datei) && isset($_POST["commit"])) {
    // Die Datei buch_inhalt.htm existiert nicht, sie wird
    // neu angelegt und mit dem aktuellen Beitrag gespeichert.
    $fp=fopen($datei,"w");
    fputs($fp,"$eintrag \n");
    fclose($fp);
    echo $eintrag;
    //header("Location:buch.php");
}
?>

<!-- Hier kommt der Input -->
<form method='post' action='guestbook.php'>


    <footer class="footer">
        <p>&copy; 2017 Sulzer, GmbH</p>
    </footer>
</form>


</body>
</html>