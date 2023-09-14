<?php
class Person {
    private $db;

    public function __construct()
    {
        // Create a new instance of the Database class
        $this->db = new Database();
    }

    public function createPerson(array $data)
    {
        // Prepare the SQL query
        $sql = "INSERT INTO persons (name, phone, email) VALUES (:name, :phone, :email)";
        $this->db->query($sql);
        
        // Bind parameters with data types
        $this->db->bind(':name', $data['name'], PDO::PARAM_STR);
        $this->db->bind(':phone', $data['phone'], PDO::PARAM_STR);
        $this->db->bind(':email', $data['email'], PDO::PARAM_STR);

        // Execute the query
        if ($this->db->execute()) {
            return true; // Successfully inserted the person
        } else {
            return false; // Failed to insert the person
        }
    }
    
    public function getPerson($id)
    {
        // Prepare the SQL query
        $sql = "SELECT * FROM persons WHERE id = :id";
        $this->db->query($sql);

        // Bind parameters
        $this->db->bind(':id', $id);

        // Execute the query and return the result
        return $this->db->single();
    }
    
    public function updatePerson($id, $data)
    {
        // Initialize an array to hold the update expressions
        $updateExpressions = [];
    
        // Check and add non-null fields to the update expressions
        if ($data['name'] !== null) {
            $updateExpressions[] = 'name = :name';
        }
    
        if ($data['phone'] !== null) {
            $updateExpressions[] = 'phone = :phone';
        }
    
        if ($data['email'] !== null) {
            $updateExpressions[] = 'email = :email';
        }
    
        // If there are no fields to update, return false
        if (empty($updateExpressions)) {
            return false;
        }
    
        // Prepare the SQL query
        $sql = "UPDATE persons SET " . implode(', ', $updateExpressions) . " WHERE id = :id";
        $this->db->query($sql);
    
        // Bind parameters
        $this->db->bind(':id', $id);
    
        if ($data['name'] !== null) {
            $this->db->bind(':name', $data['name'], PDO::PARAM_STR);
        }
    
        if ($data['phone'] !== null) {
            $this->db->bind(':phone', $data['phone'], PDO::PARAM_STR);
        }
    
        if ($data['email'] !== null) {
            $this->db->bind(':email', $data['email'], PDO::PARAM_STR);
        }
    
        // Execute the query
        if ($this->db->execute()) {
            return true; // Successfully updated the person
        } else {
            return false; // Failed to update the person
        }
    }
    
    
    public function deletePerson($id)
    {
        // Prepare the SQL query
        $sql = "DELETE FROM persons WHERE id = :id";
        $this->db->query($sql);

        // Bind parameters
        $this->db->bind(':id', $id);

        // Execute the query
        if ($this->db->execute()) {
            return true; // Successfully deleted the person
        } else {
            return false; // Failed to delete the person
        }
    }
}
