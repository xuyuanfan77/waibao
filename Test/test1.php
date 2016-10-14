<!DOCTYPE html>
<html>
<body>

<?php
$age=array("Bill"=>"35","Steve"=>"43","Peter"=>"37");
asort($age);

foreach($age as $x=>$x_value)
    {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
    }
?>

</body>
</html>