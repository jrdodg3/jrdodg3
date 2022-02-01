<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $db = db_connect();
        $query = $db->query('SELECT * FROM 5mb_db.tbl_Locations_Library;');

        $row = $query->getRowArray();

        $sstring = "";
        foreach ($query->getResultArray() as $row) {
           $sstring .= " ". $row["Location_Name"] . "<br />";
        }
        $data['Office'] = $sstring;

        return view('Home/index', $data);
        //return view('welcome_message');
    }
}
