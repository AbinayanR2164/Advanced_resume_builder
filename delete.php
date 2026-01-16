<?php 

$name=$_POST['name'];

echo "$name";

require 'registerdbcon.php';

 
$sql = "DELETE FROM registers WHERE name='$name'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


?>


<script>
        location.replace("table.php");
</script>