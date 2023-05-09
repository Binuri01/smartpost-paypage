<?php
    class Transaction {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function addTransaction($data){
            //prepare query
            $this->db->query('INSERT INTO vtransactions (id, customer_id, product, amount, currency, status) VALUES (:id, :customer_id, :product, :amount, :currency, :status)');

            //Bind Values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':customer_id', $data['customer_id']);
            $this->db->bind(':product', $data['product']);
            $this->db->bind(':amount', $data['amount']);
            $this->db->bind(':currency', $data['currency']);
            $this->db->bind(':status', $data['status']);

            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getTransactions(){
            //$this->db->query('SELECT * FROM vtransactions ORDER BY created_at DESC ');
            $this->db->query('SELECT * FROM transactions ORDER BY created_at DESC');

            $results = $this->db->resultset();

            return $results;
        }
    }