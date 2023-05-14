<?php
class Customer {
    private $db;

    public function __construct(){
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function addCustomer($customerData){
        // Prepare Query
        //$query = "INSERT INTO online_utilitycus (name, accNo, fname, email, amount) VALUES (?, ?, ?, ?, ?)";
        $query = "INSERT INTO online_utilitycus ( accNo, fname, email, amount) VALUES ( ?, ?, ?, ?)";

    
        // Prepare statement and bind parameters
        $stmt = $this->db->prepare($query);
        //$stmt->bind_param("ssssi", $customerData['name'], $customerData['accNo'], $customerData['fname'], $customerData['email'], $customerData['amount']);
        $stmt->bind_param("sssi", $customerData['accNo'], $customerData['fname'], $customerData['email'], $customerData['amount']);

        // Execute statement
        $stmt->execute();
    
        // Check for errors
        if ($stmt->error) {
            die("Error adding customer: " . $stmt->error);
        }
    
        // Close statement
        $stmt->close();
    }
    

    public function getCustomers(){
        $query = "SELECT * FROM online_utilitycus";
        $result = $this->db->query($query);

        $customers = array();

        while ($row = $result->fetch_assoc()) {
            $customers[] = $row;
        }

        return $customers;
    }
}


