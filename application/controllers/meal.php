<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class meal extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('model');
    }

    public function index() {
        $this->load->view('header');
        $data['meals'] = $this->model->getDocument('meals');
        /* foreach ($data['meals'] as $doc) {
          var_dump($doc);
          } */
        $this->load->view('meal_view', $data);
        $this->load->view('footer');
    }

    function add() {
        $this->load->view('header');
        $this->load->view('add_meal_view');
        $this->load->view('footer');
    }

    function takeadd() {
        $meal['name'] = $this->input->post('name');
        $meal['pic'] = $this->input->post('pic');
        $meal['price'] = $this->input->post('price');
        $meal['description'] = $this->input->post('description');
        $this->model->saveDocument("meals", $meal);
    }

    function takeorder() {
        if ($this->input->post("personId") == "") {
            $oreder['person'] = $this->model->savePerson(['name' => $this->input->post("name")]);
        } else {
            $oreder['person'] = $this->input->post("personId");
        }
        $oreder['meal'] = $this->input->post("meal");
        $oreder['table'] = $this->input->post("table");
        $oreder['status'] = '1';
        $oreder['table_name'] = '8';
        $this->model->saveDocument("orders", $oreder);
        $this->index();
    }

    function orders() {
        $data['orders'] = $this->model->getDocument('orders');
        $this->load->view('header');
        $this->load->view('orders_view', $data);
        $this->load->view('footer');
    }

    function conf($order) {
        $mongo_id = new MongoID($order);
        $this->model->updateDoc("orders", ['_id' => $mongo_id], ['status' => '2']);
        $this->orders();
    }

    function getmeals() {
        $orders = $this->model->getDocument('meals');
        $ordersArray = array();
        foreach ($orders as $order) {
            array_push($ordersArray, $order);
        }
        $this->json_file("meals.json", $ordersArray);
        $attachment_location = "meals.json";
        if (file_exists($attachment_location)) {
            header($_SERVER["SERVER_PROTOCOL"] . " 200 OK");
            header("Cache-Control: public");
            header("Content-Type: application/json");
            header("Content-Transfer-Encoding: Binary");
            header("Content-Length:" . filesize($attachment_location));
            header("Content-Disposition: attachment; filename=meals.json");
            readfile($attachment_location);
            die();
        } else {
            die("Error: File not found.");
        }
    }

    private function json_file($title, $content) {
        $fh = fopen($title, 'w') or die("can't open file");
        $stringData = json_encode($content);
        fwrite($fh, $stringData);
        fclose($fh);
    }

    function make_order() {
        $order['person'] = $this->model->savePerson(['name' => $this->input->get('name', TRUE), 'surname' => $this->input->get('surname', TRUE)]);
        $order['meal'] = $this->input->get('meal', TRUE);
        if (!$order['meal']) {
            return; //varētu kļudas ziņu atpakal uz otru sistēmu
        }
        $order['table_name'] = 'Ārējs';
        $order['table'] = '54bbf4d488dba016e4f0491a';
        $order['status'] = '1';
        $this->model->saveDocument("orders", $order);
        print_r($order);
    }

}
