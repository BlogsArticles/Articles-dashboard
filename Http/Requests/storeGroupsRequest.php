<?php
namespace Http\Requests;

use Core\App;
use Core\Database;


class storeGroupsRequest
{

    protected $errors=[];
    protected $db;

    public function __construct(){
        $this->db = App::resolve(Database::class);
        $this->rules();
    }

    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public function rules(){

    /**
     *  validate data
     */
    if (! self::string($_POST['name'], 5, 100)) {
        $this->errors['name'] = 'Group name should be between 5 ,100 characters.';
    }
    /**
     *  check if icon exists in database
     */
    $isIcon=$this->db->query("select * from `icons` where name = :name",["name"=>$_POST['icon']])->find();
    if ($isIcon==false) {
        $this->errors['icon'] = 'Group should have an icon from menu.';
    }

    if (! self::string($_POST['description'], 10, 255)) {
        $this->errors['description'] = 'A Group description of no more than 255 and no less than 10 characters is required.';
    }

    /**
     *  check if group already exist
     */
    $groups_exists=$this->db->query("select * from `groups` where name = :name",["name"=>$_POST['name']])->find();
    /**
     *  if group already exist add error message
     */
    if ($groups_exists) {
        $this->errors['name'] = 'Group name should be unique.';
    }

        return $this->errors;
    }

    
    
    
}
