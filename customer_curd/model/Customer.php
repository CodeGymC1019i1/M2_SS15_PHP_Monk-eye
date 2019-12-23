<?php

namespace Model;
//Class Customer Model đại điện cho một khách hàng
class Customer
{
    public $id;
    public $customerName;
    public $customerEmail;
    public $customerAddress;

    public function __construct($customerName, $customerEmail, $customerAddress)
    {
        $this->customerName = $customerName;
        $this->customerEmail = $customerEmail;
        $this->customerAddress = $customerAddress;
    }
}