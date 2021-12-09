<?php 

class Request {
    function createUser($user){
        try {
            $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
            $single_insert = new MongoDB\Driver\BulkWrite();
            $single_insert->insert($user);
            $manager->executeBulkWrite('planningPatate.User', $single_insert) ;
            
        }
        catch (\MongoDB\Driver\Exception\BulkWriteException $e ){
            echo $e->getMessage();
        }
    }

} 
