<?php
    /*
     * App Core Class
     * Creates URL & loads core controllers
     * URL FORMAT = /controllers/method/params
     */

    class Core {
        protected string|object $currentController = 'Pages';
        protected string|object $currentMethod = 'index';
        protected array $params = [];


        public function __construct(){
            //print_r($this->getURL());
            //Get the URL
            $url = $this->getURL();
            $newURL= $url ?? '';

            //Look into controllers for first value
            if(file_exists('../app/controllers/' . ucwords($newURL[0]) . '.php')) {
                //If exists, then set as controllers
                $this->currentController = ucwords($url[0]);
                //unset 0 index
                unset($url[0]);
            }
            //Require the correct controllers
            require_once '../app/controllers/' . $this->currentController . '.php';

            //Instantiate controllers class
            //Ex: $pages = new Pages
            $this->currentController = new $this->currentController;

            //Check for second part of URL (method)
            if(isset($url[1])) {
                //Check to see if the method is in the controller
                if(method_exists($this->currentController, $url[1])){
                    $this->currentMethod = $url[1];
                    //Unset 1 index
                    unset($url[1]);
                }
            }

            //Get params
            $this->params = $url ? array_values($url) : [];

            //Call a callback with array of params
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }

        public function getURL() {
            //Check to see if a URL is set
            if(isset($_GET['url'])) {
                //Remove the ending slash
                $url = rtrim($_GET['url'], '/');
                //Remove any characters that a URL should not have
                $url = filter_var($url, FILTER_SANITIZE_URL);
                //Break URL out into an array
                $url = explode('/', $url);
                return $url;
            }
        }

    }