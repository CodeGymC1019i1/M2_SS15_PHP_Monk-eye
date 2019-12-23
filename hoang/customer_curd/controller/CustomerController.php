<?php

namespace controller;

use model\Customer;
use model\CustomerDatabase;
use model\DatabaseConnect;

ob_start();

class CustomerController
{
    public $customerDatabase;
    
    public function __construct()
    {
        $dataSourceName = 'mysql:host=127.0.0.1;dbname=customer-management-application';
        $userName = 'root';
        $passWord = '1037212a';
        $connection = new DatabaseConnect($dataSourceName, $userName, $passWord);
        $this->customerDatabase = new CustomerDatabase($connection->connect());
        
    }
    
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            include "view/add.php";
        } else {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            
            $customer = new Customer($name, $email, $address);
            $this->customerDatabase->create($customer);
            $message = 'Customer created';
            include 'view/add.php';
        }
    }
    
    public function index()
    {
        $customers = $this->customerDatabase->getAll();
        include "view/list.php";
    }
    
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET["id"];
            $customer = $this->customerDatabase->get($id);
            include "view/delete.php";
        } else {
            $id = $_POST["id"];
            $this->customerDatabase->delete($id);
            header('Location: index.php');
        }
    }
    
    public function edit()
    {
        if ($_SERVER["REQUEST_METHOD"] === 'GET') {
            $id = $_GET['id'];
            $customer = $this->customerDatabase->get($id);
            include 'view/edit.php';
        } else {
            $id = $_POST['id'];
            $customer = new Customer($_POST['name'], $_POST['email'], $_POST['address']);
            $this->customerDatabase->update($id, $customer);
            header('Location: index.php');
        }
    }
    
    public function search()
    {
    }
}