<?php

class PolicyModel
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPolicy()
    {
        $this->db->query('SELECT *
                            FROM policy
                            WHERE delete_flag!=1
                            ORDER BY id DESC');
        $result = $this->db->resultSet();

        return $result;
    }

    public function addPolicy($data)
    {
        $this->db->query('INSERT INTO policy(first_name, last_name, policy_number,premium,start_date,end_date) 
                            VALUES (:first_name, :last_name, :policy_number,:premium,:start_date,:end_date)');
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':policy_number', $data['policy_number']);
        $this->db->bind(':premium', $data['premium']);
        $this->db->bind(':start_date', $data['start_date']);
        $this->db->bind(':end_date', $data['end_date']);

        //execute 
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getPolicyById($id)
    {
        $this->db->query('SELECT * FROM policy WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();

        return $row;
    }

    public function updatePolicy($data)
    {
        $this->db->query('UPDATE policy SET first_name = :first_name, last_name = :last_name, policy_number = :policy_number, premium = :premium, start_date= :start_date, end_date= :end_date  WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':policy_number', $data['policy_number']);
        $this->db->bind(':premium', $data['premium']);
        $this->db->bind(':start_date', $data['start_date']);
        $this->db->bind(':end_date', $data['end_date']);


        //execute 
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //delete a po;icy
    public function deletePolicy($id)
    {
        $this->db->query('DELETE FROM policy WHERE id = :id');
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    //soft delete
    public function softDeletePolicy($id)
    {
        $this->db->query('UPDATE policy SET delete_flag = 1 WHERE id = :id');
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
