<?php
use Core\App;
use Core\Database;
use Core\Validator;
use Http\Requests\UpdateGroupsRequest;
use Core\Logger;
use Core\Response;


try{
    $db = App::resolve(Database::class);
    
    $errors = (new UpdateGroupsRequest())->rules();
    
    /**
     *  save old values
     */
    $old=[];
    $old["name"]=$_POST['name']??'';
    $old["icon"]=$_POST['icon']??'';
    $old["description"]=$_POST['description']??'';
    $old["id"]=$_POST['id']??'';
    /**
     *  if all data is good save and redirect to index
     */
    if(empty($errors)){
        $updated=$db->query('update `groups`  set name= :name, description= :description,icon= :icon where id=:id', [
            'name' => $_POST['name'],
            'description' => $_POST['description'],
            'icon' =>$_POST['icon'],
            'id' =>$_POST['id'],
        ]);
        // dd($updated);
        header("location: /groups");
        die();
    
    }
    
    
    
    /**
     *  data isn't valid
     *  reload create group page again 
     */
    $icons = $db->query('select * from `icons`')->get();

    view("groups/edit.view.php",[
        "old"=>$old,
        "errors"=>$errors,
        "icons"=>$icons
    ]);
}catch(\Exception $e){
    Logger::error($e);
    abort(Response::INTERNAL_ERROR);


}


