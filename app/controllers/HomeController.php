<?php
require_once '../models/Photo.php';

class HomeController {
        public function index(){
            $photoModel = new Photo();
            $photo = $photoModel->getPhotos();
            include '../views/home.php';
        }
}