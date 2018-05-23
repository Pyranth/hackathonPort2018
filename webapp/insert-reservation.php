<?php

$db = new mysqli('10.71.9.138', 'monty', 'some_pass', 'hackathon');

if ($db->connect_error){
	die("error");
}

$query = $db->query('DESCRIBE `reservation`');
$fields = array();
while($row = $query->fetch_assoc()) {
    $fields[] = $row['Field'];
}

?>

<form id="generate-form" type="POST">
    <?php foreach($fields as $field): ?>
        <label>
            <?php echo "$field: "; ?>
            <input type="text" name="<?php echo $field; ?>" />
        </label><br/>
    <?php endforeach; ?>
    <input type="submit" name="submit" />
</form>