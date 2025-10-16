<?php
namespace App\models;
use CodeIgniter\model;
class EmployeeModel extends model{
    protected $table='employees';
    protected $primaryKey= 'id';
    protected $allowfeilds=['name,email,phone,image'];
}
