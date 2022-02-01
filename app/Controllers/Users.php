<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $db = db_connect();
        $query = $db->query('SELECT * FROM 5mb_db.tbl_Locations_Library;');

        $row = $query->getRowArray();

        $data = [];
        helper(['form']);

        echo view('templates/header', $data);
        echo view('login');
        echo view('templates/footer');

    }

    public function register(){

        $data = [];
        helper(['form','form_validation']);

        if ($this->request->getMethod() == 'post') {
            //Validation Goes Here
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[20]',
                'lastname' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' =>  'required|min_length[8]|max_length[255]',
                'password_confirm' =>  'matches[password]',
            ];

            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {

            }
        }

        echo view('templates/header', $data);
        echo view('register');
        echo view('templates/footer');
    }
}
