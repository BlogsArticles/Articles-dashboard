<?php
namespace Http\Requests;

use Core\App;
use Core\Response;
class StoreArticlesRequest {

    protected $errors=[];
    private   $UPLOAD_MAX_FILESIZE = 8388608;
    /*
     * How to use this class
     * Example:
     *        $errors = (new StoreArticlesRequest)->titleValidator()->getErrors(); // Specific validation not all
     *
     * Or use this to validate all:
     *        $errors = (new StoreArticlesRequest)->validateAll();
     *
     * */
    public function getErrors () {
        return $this->errors;
    }

    public function  validateAll() {
        $this->titleValidator();
        $this->imageValidator();
        $this->contentValidator();
        $this->summaryValidator();

        return $this->getErrors();
    }
    /*
     * validate article title
     * */
    public function titleValidator () {
        if( empty($_POST['title']) ){
            $this->errors['title'] = 'Please fill out the required field: Title';
        }
    }
    /*
     * validate article image
     * */
    public function imageValidator () {

        if( empty($_FILES['image']) ){
            $this->errors['image'] = 'Please fill out the required field: Article Image';
        }
        $extension = explode('/' , $_FILES["image"]["type"])[1];

        if ($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg'){
            $this->errors['image'] = 'Article Image must be jpg, jpeg or png';
        }
        if ( $_FILES["image"]["size"] > $this->UPLOAD_MAX_FILESIZE  ){
            $this->errors['image'] = 'Article Image size must be less than 8MB';
        }

    }
    /*
     * validate article content
     * */
    public function contentValidator () {
        if( empty($_POST['content']) ){
            $this->errors['content'] = 'Please fill out the required field: Content';
        }
    }
    /*
     * validate article content
     * */
    public function summaryValidator () {
        if( empty($_POST['summary']) ){
            $this->errors['summary'] = 'Please fill out the required field: Summary';
        }
    }
}