<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class user extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('model');
    }

    public function index($mealId="", $mealName="") {
        if ($this->model->getTableId() == "") {
            $table['status'] = '1'; //with ordered meal
            $tableId = $this->model->saveTable("tables", $table); //create new table
        } else {
            
        }

        $hData['tableId'] = $this->model->getTableId();
        $orders = $this->model->getWhere("orders", ['table' => $this->model->getTableId()]);
        $persons = array();
        foreach ($orders as $order) {
            //print_r($order);
            $personDoc = $this->model->getDocumentById("persons", $order['person'] . '');
            if (!in_array(['name' => $personDoc['name'], 'personId' => $order['person'] . ''], $persons)) {
                array_push($persons, ['name' => $personDoc['name'], 'personId' => $order['person'] . '']);
            }
        }
        $data['persons'] = $persons;
        $data['meal'] = $mealName;
        $this->load->view('header', $hData);
        $data['table'] = $this->model->getTableId();
        $data['meal'] = urldecode($mealName);
        $this->load->view('user_view', $data);
        $this->load->view('footer');
    }

    public function contact() {
        $hData['tableId'] = $this->model->getTableId();
        $this->load->view('header');
        $this->load->view('contact_view');
        $this->load->view('footer');
    }

    function payment() {
        $this->model->closeTable();
        header("Location: ".base_url('/meal/index'));
        die();
    }

}
