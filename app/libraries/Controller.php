<?php
    /*
     * Base Controller
     * Lodas the models and views
     */

    class Controller {
        //Load models
        public function model($model) {
            require_once '../app/models/' . $model . '.php';
            return new $model;
        }

        //Load views
        public function view($view, $data = []): void{
            // Check for view file
            if(file_exists('../app/views/' . $view . '.php')){
                extract($data);
                require_once '../app/views/' . $view . '.php';
            } else {
                // View does not exist
                die('View does not exist');
            }
        }

        //load partials
        public function partial($partials, $data = []): string{
            //Start output buffering
            ob_start();
            // Check for partial file
            if(file_exists('../app/views/partials/' . $partials . '.php')){
                extract($data);
                require_once '../app/views/partials/' . $partials . '.php';
            } else {
                // Partial does not exist
                // Clean the output buffer if no file
                ob_end_clean();
                die('Partial does not exist');
            }
            return ob_get_clean();
        }
    }

