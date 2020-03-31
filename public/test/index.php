Heelo test
<?php

$dbconn = pg_connect("host=database dbname=instagram user=root password=password");
// Show the client and server versions

if (!$dbconn) {
    die('Error: Could not connect: ' . pg_last_error());
}

$query = 'select * from test;';

$result = pg_query($query);

$i = 0;
echo '<html><body><table><tr>';
while ($i < pg_num_fields($result)) {
    $fieldName = pg_field_name($result, $i);
    echo '<td>' . $fieldName . '</td>';
    $i = $i + 1;
}
echo '</tr>';
$i = 0;

while ($row = pg_fetch_row($result)) {
    echo '<tr>';
    $count = count($row);
    $y = 0;
    while ($y < $count) {
        $c_row = current($row);
        echo '<td>' . $c_row . '</td>';
        next($row);
        $y = $y + 1;
    }
    echo '</tr>';
    $i = $i + 1;
}
pg_free_result($result);

echo '</table></body></html>';
?>