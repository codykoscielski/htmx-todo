<?php
    /*
     * Base Controller
     * Lodas the models and views
     */

    class Controller {
        //Load models
        public function model($model) {
            //Require the correct model file
            require_once '../app/models/' . $model . '.php';

            //Instantiate model
            //ex: if posts was passed in
            //It would return new Post
            return new $model;
        }
        //Load views
        public function view($view, $data = []): void{
            // Check for view file
            if(file_exists('../app/views/' . $view . '.php')){
                require_once '../app/views/' . $view . '.php';
            } else {
                // View does not exist
                die('View does not exist');
            }
        }

        //load partials
        public function partial($partial, $data = []): void{
            // Check for partial file
            if(file_exists('../app/views/partials/' . $partial . '.php')){
                require_once '../app/views/partials/' . $partial . '.php';
            } else {
                // Partial does not exist
                die('Partial does not exist');
            }
        }
    }

