<?php
namespace SerriStephan\Forteroche\Model;
class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=blog de jean forteroche;charset=utf8', 'root', '');
        return $db;
    }

}