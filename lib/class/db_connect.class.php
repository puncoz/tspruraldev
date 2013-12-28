<?php
    
/**
 * Database actions (DB access, validatiion, etc.)
 *
 * PHP version 5
 *
 * LICENSE: This source file is subject to the ... License, available
 * at http://
 *
 * @author      Deepak Adhikari <deeps.adhi@gmail.com>
 * @copyright   2013
 * @license     http://
 */

/**
 * Load database configuration file
 */
require_once(LIB_PATH.DS.'config'.DS.'db_cred.inc.php');

class DB_Connect
{
    /**
     * Stores a database object
     *
     * @var object A database object
     */
    protected static $db;

    /**
     * Stores a logger
     *
     * @var static class A logger static class
     */
    protected static $log;

    /**
     * Protect from cloning/dublication 
     */
    private function __clone() {}

    /**
     * Connects to database
     */
    private function __construct(){
        self::$log = Logger::getLogger(__CLASS__);
        /**
         * Define constants for configuration info
         * Constants are defined in lib/config/db_cred.inc.php
         */
        $dsn = 'mysql:host=' . DB_Cred\DB_HOST . ';dbname=' . DB_Cred\DB_NAME;
        try{
            @self::$db = new PDO($dsn, DB_Cred\DB_USER, DB_Cred\DB_PASS);
            @self::$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch(Exception $e){
            /**
             * If the DB connection fails, output the error
             */
            self::$log->fatal($e->getMessage());
            die('Could not complete your request :(');
        }
     }

    /**
     * Checks for a DB object or creates one if one isn't found
     *
     * @return object $db A database object
     */
     public static function getConnection(){
        if(!self::$db){
            new self();
        }
        return self::$db;
    }
} 
