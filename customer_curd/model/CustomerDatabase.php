<?php

namespace model;
//thực hiện insert dữ liệu vào databases
class CustomerDatabase
{
    public $connection;
    
    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    
    public function create($customer)
    {
        $structuredQueryLanguage = 'INSERT INTO customers(customerName, customerEmail, customerAddress) VALUES (?, ?, ?)';
        $statement = $this->connection->prepare($structuredQueryLanguage);
        $statement->bindParam(1, $customer->customerName);
        $statement->bindParam(2, $customer->customerEmail);
        $statement->bindParam(3, $customer->customerAddress);
        return $statement->execute();
    }
    
    public function getAll()
    {
        $structuredQueryLanguage = "SELECT * FROM customers";
        $statement = $this->connection->prepare($structuredQueryLanguage);
        $statement->execute();
        $result = $statement->fetchAll();
        $customers = [];
        foreach ($result as $row) {
            $customer = new Customer($row['customerName'], $row['customerEmail'], $row['customerAddress']);
            $customer->id = $row["id"];
            array_push($customers, $customer);
        }
        return $customers;
    }
    
    public function get($id)
    {
        $structuredQueryLanguage = "SELECT * FROM customers WHERE id = ?";
        $statement = $this->connection->prepare($structuredQueryLanguage);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $customer = new Customer($row['customerName'], $row['customerEmail'], $row['customerAddress']);
        $customer->id = $row["id"];
        return $customer;
    }
    
    public function delete($id)
    {
        $structuredQueryLanguage = "DELETE FROM customers WHERE id = ?";
        $statement = $this->connection->prepare($structuredQueryLanguage);
        $statement->bindParam(1, $id);
        $statement->execute();
        return $statement;
    }
    
    public function update($id, $customer)
    {
        $structuredQueryLanguage = "UPDATE customers SET customerName = ?, customerEmail = ?, customerAddress = ? WHERE id = ?";
        $statement = $this->connection->prepare($structuredQueryLanguage);
        $statement->bindParam(1, $customer->customerName);
        $statement->bindParam(2, $customer->customerEmail);
        $statement->bindParam(3, $customer->customerAddress);
        $statement->bindParam(4, $id);
        return $statement->execute();
    }
    
    public function search($search)
    {
        $searchKey = $_POST['search'];
        $structuredQueryLanguage = "SELECT * FROM customer WHERE customerName LIKE '%$searchKey%'";
        $statement = $this->connection->prepare($structuredQueryLanguage);
        $statement->excute();
    }
}