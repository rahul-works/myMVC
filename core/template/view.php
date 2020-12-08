<?php class view {
    private $file;
    private $vars = array();

    public function __construct($file) {
        try{
            $this->file = $file;
        } catch( Exception $e) {
            echo '<pre>';
            print_r($e);
            print_r(debug_backtrace());
        }
    }

    public function __set($key, $val) {
        
        try{
            $this->vars[$key] = $val;
        } catch( Exception $e) {
            echo '<pre>';
            print_r($e);
            print_r(debug_backtrace());
        }
    }

    public function __get($key) {
        try{
            return (isset($this->vars[$key])) ? $this->vars[$key] : null;
        } catch( Exception $e) {
            echo '<pre>';
            print_r($e);
            print_r(debug_backtrace());
        }
    }

    public function render() {
        try {
        //start output buffering (so we can return the content)
        ob_start();
        
            //bring all variables into "local" variables using "variable variable names"
            foreach($this->vars as $k => $v) {
                $$k = $v;
            }
       

        //include view
        include($this->file);

        $str = ob_get_contents();//get teh entire view.
        ob_end_clean();//stop output buffering
        return $str;
    } catch( Exception $e) {
        echo '<pre>';
        print_r($e);
        print_r(debug_backtrace());
    }
    }
}
?>