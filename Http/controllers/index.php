<?php
use Core\App;
use Core\Database;

$query = 'select count(*) as count , gps.name from users , gps where gps.id = users.group_id group by gps.name';

$db = App::resolve(Database::class);
$groups = $db->query($query, [])->get();
$name = [];
$count = [];

foreach ($groups as $group) {

    $name[] = $group['name'];
    $count[] = $group['count'];

}

view("index.view.php", [
    'heading' => 'Home',
    'name' => $name,
    'count' => $count
]);