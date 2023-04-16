<?php
use Core\App;
use Core\Database;
use Core\Logger;

$query = 'select count(*) as count , groups.name from users , gps where gps.id = users.group_id group by gps.name';

try {

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
    
  }catch (Exception $e) {

    Logger::error($e);
    view("403.php");
  }
