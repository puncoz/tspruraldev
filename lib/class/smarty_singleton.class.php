<?php

require_once(LIB_PATH.DS.'smarty'.DS.'Smarty.class.php');

class Smarty_Singleton
{
    static private $instance;
    
    private function __construct() {}
    
    private function __clone() {}
    
    private function __wakeup() {}
    
    static public function instance()
    {
        if( !isset( self::$instance ) )
        {
            $smarty = new Smarty;
            
            $smarty->setTemplateDir(dirname(LIB_PATH).DS.'public'.DS.'tmpl'.DS.'templates'.DS);
            $smarty->setCompileDir(dirname(LIB_PATH).DS.'public'.DS.'tmpl'.DS.'templates_c'.DS);
            $smarty->setConfigDir(dirname(LIB_PATH).DS.'public'.DS.'tmpl'.DS.'configs'.DS);
            $smarty->setCacheDir(dirname(LIB_PATH).DS.'public'.DS.'tmpl'.DS.'cache'.DS);
            
            //$smarty->caching = Smarty::CACHING_LIFETIME_CURRENT;
            $smarty->debugging = false;
            
            #define( 'CFG_DIR_TEMPLATES', $smarty->getTemplateDir(0) );
            
            self::$instance = $smarty;
        };
        return self::$instance;
    }
    
}
