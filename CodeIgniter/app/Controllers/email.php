<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\User_model;


// class users extends ResourceController
class email extends BaseController
{
    use ResponseTrait;


    public function index()
    {
        return view("email.php");
    }

    

}
