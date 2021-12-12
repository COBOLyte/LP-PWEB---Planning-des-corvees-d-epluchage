<?php
require_once("./Model/user/user.php");

class UserManager {
    private $db;
    private $collectionName;
    
    public function __construct($db) {
        $this->db = $db;
        $this->collectionName = "planningPatate.users";
    }
    
    public function create(User $user) {
        try {
            $single_insert = new MongoDB\Driver\BulkWrite();
            $single_insert->insert($user->getJson());
            $this->db->executeBulkWrite($this->collectionName, $single_insert);
        } catch (MongoDB\Driver\Exception\BulkWriteException $e) { echo($e->getMessage()); }
    }
    
    public function findOne($id) {
        try {
            $filter = ["_id" => new MongoDB\BSON\ObjectId($id)];
            $option = [];
            $read = new MongoDB\Driver\Query($filter, $option);
            $users = $this->db->executeQuery($this->collectionName, $read);
            foreach ($users as $userEntry) {
                $user = $userEntry;
                break;
            }
        } catch (MongoDB\Driver\ConnectionException $e) { echo($e->getMessage()); }
        return $user;
    }
    
    public function findByEmail(string $email) {
        try {
            $filter = ["email" => $email];
            $option = [];
            $read = new MongoDB\Driver\Query($filter, $option);
            $users = $this->db->executeQuery($this->collectionName, $read);
            foreach ($users as $userEntry) {
                $user = $userEntry;
                break;
            }
        } catch (MongoDB\Driver\ConnectionException $e) { echo($e->getMessage()); }
        return $user;
    }
    
    public function findAll() {
        try {
            $filter = [];
            $option = [];
            $read = new MongoDB\Driver\Query($filter, $option);
            $usersFound = $this->db->executeQuery($this->collectionName, $read);
            foreach ($usersFound as $user) $users[] = $user;
        } catch (MongoDB\Driver\ConnectionException $e) { echo($e->getMessage()); }
        return $users;
    }
    
    public function update($id, User $user, int $admin) {
        try {
            $updates = new MongoDB\Driver\BulkWrite();
            $updates->update(
                ["_id" => new MongoDB\BSON\ObjectId($id)],
                ['$set' => [
                    "email" => $user->getEmail(),
                    "firstName" => $user->getFirstName(),
                    "lastName" => $user->getLastName(),
                    "address" => $user->getAddress(),
                    "postalCode" => $user->getPostalCode(),
                    "city" => $user->getCity(),
                    "country" => $user->getCountry(),
                    "admin" => $admin
                    ]
                ],
                ["multi" => true, "upsert" => true]
            );
            $this->db->executeBulkWrite($this->collectionName, $updates);
        } catch (MongoDB\Driver\Exception\BulkWriteException $e) { echo($e->getMessage()); }
    }
    
    public function delete($id) {
        try {
            $bulk = new MongoDB\Driver\BulkWrite();
            $bulk->delete(["_id" => new MongoDB\BSON\ObjectId($id)]);
            $this->db->executeBulkWrite($this->collectionName, $bulk);
        } catch (MongoDB\Driver\Exception\BulkWriteException $e) { echo($e->getMessage()); }
    }
    
    public function login(string $email, string $password) {
        $user = $this->findByEmail($email);
        if ($user && password_verify($password, $user->password)) return $user;
    }
    
    public function changePassword($id, string $newPassword) {
        try {
            $updates = new MongoDB\Driver\BulkWrite();
            $updates->update(
                ["_id" => new MongoDB\BSON\ObjectId($id)],
                ['$set' => [
                    "password" => password_hash($newPassword, PASSWORD_BCRYPT)
                    ]
                ],
                ["multi" => true, "upsert" => true]
            );
            $this->db->executeBulkWrite($this->collectionName, $updates);
        } catch (MongoDB\Driver\Exception\BulkWriteException $e) { echo($e->getMessage()); }
    }
}
?>
