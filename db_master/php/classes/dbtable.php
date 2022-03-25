<?php
class dbTable {

    protected $conn;
    protected $table;
    protected $fields = array();
    protected $properties = array();

    public function __construct($conn, $table, $fields, $id = false) { 
        $this->conn = $conn;
        $this->table = $table;
        $this->fields = array();
        $this->fields = $fields;
        $this->properties = array_fill_keys($this->fields, null); 

        if ($id) {
            $this->findById($id); 
        }
    }

    protected function findById($id) {
        $fields = implode(",", $this->fields);
        $sql = "SELECT $fields FROM $this->table WHERE id = $id"; 

        $result = $this->conn->query($sql);
        $row = $result->fetch_object();
        foreach ($this->fields as $field) {
            $this->properties[$field] = $row->$field; 
        }
    }
    
    public function delete($dataid) {
        $sql = "DELETE FROM $this->table WHERE id = '$dataid'";
        if ($this->conn->query($sql) === TRUE) {
            echo "Success";
        } else {
            echo "Error";
        }
    }

    protected function cleanValues() { 
        foreach($this->properties as $key => $value){ 
            $this->properties[$key] = $this->conn->real_escape_string($value); 
        }
    }
/*
    public function save() {
        if ($this->properties["id"] > 0) {
            $this->update();
        }
        else {
            $this->insert();
        }
    }
    
    */
    public function update($table,$id,$values) {
        $string = "";
        foreach($values as $fields => $values) {
            $string .= $fields ."='". $values ."',";
        }
        $string = substr($string, 0, -1);
        $sql = "UPDATE $table SET $string WHERE id=".$id; 
        
        return $this->conn->query($sql);
    }

    public function insert($table,$values) {
        //$fields = implode(",", $this->fields); 
        //$properties = implode("','", $this->properties); 
        $fieldss = "";
        $properties = "";
        foreach($values as $fields => $values) {
            $fieldss .=  $fields . ",";
            $properties .= "'" . $values . "',";
        }
        $fieldss = substr($fieldss, 0, -1);
        $properties = substr($properties, 0, -1);
        return $sql = "INSERT INTO $table ($fieldss) VALUES ($properties)"; 
        return $this->conn->query($sql); 
    }
}