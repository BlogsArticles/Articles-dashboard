<?php
use Core\App;
use Core\Database;
$db = App::resolve(Database::class);
// dd($_GET);
if(isset($_GET["search"])){
    $groups = $db->query('select * from articles_blog.groups where name like :search or description like :search',["search"=>'%'.$_GET["search"].'%'])->get();
    
}else{
    $groups = $db->query('select * from articles_blog.groups')->get();

}
// dd($groups);
view("groups/index.view.php",[
    "groups"=>$groups
]);