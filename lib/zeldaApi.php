<?php
/**
 * Created by PhpStorm.
 * User: 13entley
 * Date: 7/3/17
 * Time: 8:29 PM
 */


namespace Api;
use \PDO;

class ZeldaApi
{
    public static $pdo = null;

    public function __construct()
    {
        $ini_data = parse_ini_file(__DIR__.'/../.env');

        try {
            static::$pdo = new PDO(
                'mysql:dbname='.$ini_data['dbname'].';host='.$ini_data['dbhost'].';charset=utf8',
                $ini_data['dbuser'],
                $ini_data['dbpass']
            );
            static::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}