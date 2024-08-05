<?php
$conn = new mysqli ('localhost' , 'root' , '' , 'my-work');

if(!$conn == true){
    echo "<br> CONNECTION SUCCESSFUL!";
}
?>