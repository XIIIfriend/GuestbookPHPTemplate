
<html>
    <head>
        <title>simple php File</title>
    </head>

    <body>

    <?php

    //Hier beginnt php code

    // Das ist eine Variablendefinition
    $x = 1;
    $y = 2;
    $z = $x + $y;

    echo "$x + $y = ";
    echo $z;


    // Wir fügen einen Paragraph ein
    echo "<p></p>";

    //Kopf   //Name
    function add($x,$y)
    {
        //Bauch
        return ($x + $y);
    }

    $result = add(5,4);

    echo "Ergebnis ist $result.";



    ?>

    </body>

</html>