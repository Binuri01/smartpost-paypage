<?php
    class Customer {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function addCustomer($data){
            //prepare query
            $this->db->query('INSERT INTO customers (id, name, email, amount) VALUES (:id, :name, :email, :amount)');

            //Bind Values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':NIC', $data['NIC']);
            $this->db->bind(':amount', $data['amount']);

            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getCustomers(){
            $this->db->query('SELECT * FROM customers ORDER BY created_at DESC');

            $results = $this->db->resultset();

            return $results;
        }
    }