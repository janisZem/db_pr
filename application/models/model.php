<?php

class Model extends CI_Model {

    function __construct() {

        parent::__construct();
        $this->load->library('cimongo');
        session_start();
    }

    function saveDocument($collection = "", $doc = array()) {
        if ($collection == "") {
            return false;
        }
        $this->cimongo->insert($collection, $doc);
    }

    function getDocument($collection) {
        return $this->cimongo->get($collection);
    }

    function getDocumentById($collection, $docID) {
        return $this->cimongo->getById($collection, $docID);
    }

    function saveTable($collection = "", $doc = array()) {
        $this->cimongo->insert($collection, $doc);
        $id = $this->cimongo->insert_id();
        $_SESSION["tableId"] = $id . '';
        return $id . '';
    }

    function getTableId() {
        if (isset($_SESSION["tableId"]))
            return $_SESSION["tableId"];
    }

    function closeTable() {
        session_destroy();
    }

    function getWhere($collection = "", $where = array()) {
        return $this->cimongo->get_where($collection, $where);
    }

    function savePerson($name) {
        $this->cimongo->insert("persons", $name);
        $id = $this->cimongo->insert_id();
        return $id;
    }

    function updateDoc($collection, $where = array(), $data = array()) {
        $this->cimongo->where($where)->update($collection, $data);
    }

}
