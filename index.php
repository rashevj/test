<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <title>Тест</title>
 </head>
 <body> 
 <form action="/" method="GET">
<?php

try {
    $dbh = new PDO('mysql:host=localhost;dbname=zayavki', root, "");
    $departments = array();
    echo "<select name='parent_depart'>";
    foreach($dbh->query('SELECT * from depart where parent_id = 0') as $row) {
    	echo "<option ".(($_GET['parent_depart']==$row['id'])?"selected='selected'":"")." value='".$row['id']."'>".$row['department']."</option>";
    }
    echo "</select>";
    if($_GET['parent_depart']){
	    echo "<select>";
	    foreach($dbh->query('SELECT * from depart where parent_id = '.$_GET['parent_depart']) as $row) {
	    	echo "<option value='".$row['id']."'>".$row['department']."</option>";
	    }
	    echo "<select>";
	}
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>
<button>refresh</button>
</form>
 </body>
</html>

