<?php
require_once '../app/models/Photo.php';

class HomeController {
        public function index(){
            $photoModel = new Photo();
            $photo = $photoModel->getPhotos();
            include '../app/views/home.php';
        }
}