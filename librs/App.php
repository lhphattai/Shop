<?php 
class App {
    public $http_host;
    public $root;
    public $urls;
    public function __construct() {
        $root = str_replace('/index.php','', $_SERVER['SCRIPT_FILENAME']);
        $uri = $_SERVER['REQUEST_URI'];
        $app_folder = str_replace('/index.php','', $_SERVER['SCRIPT_NAME']);
        $http_host = 'http://'.$_SERVER['HTTP_HOST'].$app_folder;
        $uri = str_replace($app_folder, '', $uri);
        $uri = ltrim($uri, '/');
        $uri = rtrim($uri, '/');
        $urls = explode('/', $uri);

        $this->root = $root;
        $this->http_host = $http_host;
        $this->urls = $urls;
    }
    
    public function url($path) {
        echo $this->http_host.'/'.$path;
    }

    public function run() {
       

        if (count($this->urls) == 0 || $this->urls[0] == '') {
            include $this->root.'/views/main.php';
        } else {
            $view = $this->root.'/views/'.$this->urls[0].'.php';
            if (file_exists($view)) {
                include $view;
            } else {
                include $this->root.'/views/404.php';
            }
            
        }
    }
}