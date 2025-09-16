<?php
require_once "../app/models/Photo.php";
class UploadController{
  public function upload(){
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['photo'])){
      $targetDir = '../public/assets/images/';
      $targetFile = $targetDir . basename($_FILES['photo']['name']);

      if(move_uploaded_file($_FILES['photo']['tmp_name'],$targetFile)){
        $photoModel = new Photo();
        $photoModel->addPhoto($_FILES['photo']['name']);
        header("Location: index.php?success=true");
        exit;
      }else{
        header("Location: index.php?error=true");
        exit;
      }
    }
  }
}