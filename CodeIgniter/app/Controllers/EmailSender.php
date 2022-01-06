<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\User_model;


// class users extends ResourceController
class EmailSender extends BaseController
{
    use ResponseTrait;


    // all users
    public function index()
    {
        $validation =  \Config\Services::validation();

        $validation->setRules([
            'From_Email' => [
                'label' => 'From_Email',
                'rules' => 'required|valid_email'
            ],
            'To_Email' => [
                'label' => 'To_Email',
                'rules' => 'required|valid_email'
            ],
            'subject' => [
                'label' => 'subject',
                'rules' => 'required|max_length[50]'
            ],
            'message' => [
                'label' => 'message',
                'rules' => 'required'
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            if ($validation->hasError('From_Email')) {
                echo $validation->getError('From_Email');
            }

            if ($validation->hasError('To_Email')) {
                echo $validation->getError('To_Email');
            }

            if ($validation->hasError('subject')) {
                echo $validation->getError('subject');
            }

            if ($validation->hasError('message')) {
                echo $validation->getError('message');
            }
        } else {

            $data = $this->getData($this->request);
            
            $email = \Config\Services::email();

            $email->setFrom($data["From_Email"], 'Mohamamd Kanjo');
            $email->setTo($data["To_Email"]);
            $email->setCC('another@another-example.com');
            $email->setBCC('them@their-example.com');

            $email->setSubject($data["subject"]);
            $email->setMessage($data["message"]);

            $email->send();
            $email->printDebugger(['headers']);


            echo "The email has been sent!";
        }
    }
}
