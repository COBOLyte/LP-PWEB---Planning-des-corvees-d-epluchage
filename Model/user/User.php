<?php
class User {
    private $email;
    private $password;
    private $lastName;
    private $firstName;
    private $address;
    private $postalCode;
    private $city;
    private $country;
    private $agenda;
    private $colorId;
    private $admin;

    public function __construct(
        string $email,
        string $password,
        string $firstName,
        string $lastName,
        string $address,
        string $postalCode,
        string $city,
        string $country,
        string $colorId
    ) {
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_BCRYPT);
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->address = $address;
        $this->postalCode = $postalCode;
        $this->city = $city;
        $this->country = $country;
        $this->agenda = [];
        $this->colorId = $colorId;
        $this->admin = 0;
    }
    
    public final function getEmail() { return $this->email; }
        
    public final function getPassword() { return $this->password; }
        
    public final function getFirstName() { return $this->firstName; }
    
    public final function getLastName() { return $this->lastName; }
    
    public final function getAddress() { return $this->address; }
        
    public final function getPostalCode() { return $this->postalCode; }
        
    public final function getCity() { return $this->city; }
    
    public final function getCountry() { return $this->country; }

    public final function getColorId() { return $this->colorId; }
        
    public final function getJson() {
        return array(
            "email" => $this->email,
            "password" => $this->password,
            "firstName" => $this->firstName,
            "lastName" => $this->lastName,
            "address" => $this->address,
            "postalCode" => $this->postalCode,
            "city" => $this->city,
            "country" => $this->country,
            "agenda" => $this->agenda,
            "colorId" => $this->colorId,
            "admin" => $this->admin
        );
    }
}
?>
