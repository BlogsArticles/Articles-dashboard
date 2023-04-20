<?php

namespace Core;
use Aws\S3\S3Client;
class AwsS3Bucket
{
    private $MyBucket;

    public function __construct()
    {
        try{
            $this->connect();
        }catch (Aws\S3\Exception\S3Exception $e){
            throw new Exception ('There was an error connecting AWS');
        }
    }

    private function connect(){
        $this->MyBucket= S3Client::factory(array(
            'credentials' => array(
                'key' => (require base_path('config.php'))['s3']['_ACCESS_KEY_'],
                'secret' => (require base_path('config.php'))['s3']['_SECRET_'],
            ), 'region' => "us-east-1",
            'version' => 'latest'
        ));

    }

    public function uploadImage($imageName,$tempPath){
        try {
            $upload = $this->MyBucket->putObject([
                'Bucket' => (require base_path('config.php'))['s3']['_S3_Bucket_'],
                'Key'    => $imageName,
                'SourceFile' => $tempPath
            ]);
        }catch (Aws\S3\Exception\S3Exception $e) {
            throw new Exception ('There was an error uploading the file');
        }
        return $upload;
    }

    public function downloadImage ($imageName) {
        try{
            $image = $this->MyBucket->getObject([
                'Bucket' => (require base_path('config.php'))['s3']['_S3_Bucket_'],
                'Key'    => $imageName // Stored in the database
            ]);
        }catch (Aws\S3\Exception\S3Exception $e) {
            throw new Exception ('There was an error uploading the file');
        }
        $imageData = base64_encode($image['Body']); // Convert binary image data to base64 string
        $imageSrc = 'data:image/jpg;base64,'.$imageData; // Set image source for HTML img tag
        return $imageSrc ; // to access the image use $image['Body']
    }
}