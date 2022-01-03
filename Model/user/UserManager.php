<?php
require_once("./Model/user/User.php");

class UserManager {
    private $db;
    private $collection;
    
    public function __construct($db) {
        $this->db = $db;
        $this->collection = $this->db->planningPatate->users;
    }
    
    public function create(User $user) {
        try { $this->collection->insertOne($user->getJson()); }
        catch (MongoDB\Driver\Exception\BulkWriteException $e) { echo($e->getMessage()); }
    }
    
    public function findOne($id) {
        try { $cursor = $this->collection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]); }
        catch (MongoDB\Driver\ConnectionException $e) { echo($e->getMessage()); }
        return $cursor;
    }
    
    public function findByEmail(string $email) {
        try { $cursor = $this->collection->findOne(['email' => $email]); }
        catch (MongoDB\Driver\ConnectionException $e) { echo($e->getMessage()); }
        return $cursor;
    }
    
    public function findAll() {
        try { $cursor = $this->collection->find(); }
        catch (MongoDB\Driver\ConnectionException $e) { echo($e->getMessage()); }
        return $cursor->toArray();
    }
    
    public function update($id, User $user, int $admin) {
        try {
            $this->collection->updateOne(
                ['_id' => new MongoDB\BSON\ObjectId($id)],
                ['$set' => [
                    'email' => $user->getEmail(),
                    'firstName' => $user->getFirstName(),
                    'lastName' => $user->getLastName(),
                    'address' => $user->getAddress(),
                    'postalCode' => $user->getPostalCode(),
                    'city' => $user->getCity(),
                    'country' => $user->getCountry(),
                    'colorId' => $user->getColorId(),
                    'admin' => $admin
                    ]]
                );
            } catch (MongoDB\Driver\Exception\BulkWriteException $e) { echo($e->getMessage()); }
        }
        
        public function delete($id) {
            try { $this->collection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]); }
            catch (MongoDB\Driver\Exception\BulkWriteException $e) { echo($e->getMessage()); }
        }
        
        public function login(string $email, string $password) {
            $user = $this->findByEmail($email);
            if ($user && password_verify($password, $user->password)) return $user;
        }
        
        public function changePassword($id, string $newPassword) {
            try {
                $this->collection->updateOne(
                    ['_id' => new MongoDB\BSON\ObjectId($id)],
                    ['$set' => ['password' => password_hash($newPassword, PASSWORD_BCRYPT)]],
                );
            } catch (MongoDB\Driver\Exception\BulkWriteException $e) { echo($e->getMessage()); }
        }
        
        public function findByDate(string $date) {
            try { $cursor = $this->collection->findOne(['agenda' => $date]); }
            catch (MongoDB\Driver\ConnectionException $e) { echo($e->getMessage()); }
            return $cursor;
        }
        
        public function addDate(string $email, string $date) {
            try {
                $this->collection->updateOne(
                    ['email' => $email],
                    ['$push' => ['agenda' => $date]],
                );
            } catch (MongoDB\Driver\Exception\BulkWriteException $e) { echo($e->getMessage()); }
        }
        
        public function removeDate(string $email, string $date) {
            try {
                $this->collection->updateOne(
                    ['email' => $email],
                    ['$pull' => ['agenda' => $date]],
                );
            } catch (MongoDB\Driver\Exception\BulkWriteException $e) { echo($e->getMessage()); }
        }
        
        public function getAgendaSizeInAscOrder() {
            try {
                $cursor = $this->collection->aggregate([
                    ['$project' => [
                        'email' => '$email',
                        'datesNb' => ['$size' => '$agenda']
                        ]],
                        ['$sort' => ['datesNb' => 1]]
                    ]);
                } catch (MongoDB\Driver\ConnectionException $e) { echo($e->getMessage()); }
                return $cursor->toArray();
            }
            
            public function getDatesNbByYear($annee) {
                try {
                    $cursor = $this->collection->aggregate([
                        ['$unwind' => '$agenda'],
                        ['$project' => [
                            'dateBool' => [
                                '$regexMatch' => [
                                    'input' => '$agenda',
                                    'regex' => $annee
                                    ]]
                                    ]]
                                ]);
                            } catch (MongoDB\Driver\ConnectionException $e) { echo($e->getMessage()); }
                            return $cursor->toArray();
                        }
                    }
                    ?>
