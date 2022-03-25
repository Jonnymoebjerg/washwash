<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

include_once 'dbtable.php';
    
class dataClass extends dbTable {

    protected $fields;
    public $properties;
    protected $table;
    
    public function getFields() {
        return $this->fields;
    }
    
    public function getId() {return $this->properties["id"];}
    
    public function getColumn($columnName) {
        $sql = "SELECT $columnName FROM $this->table";
        $result = $this->conn->query($sql);
        $row = $result->fetch_object();
        return $row->$columnName;
    }
    
    public function getColumnInfo() {
        $sql = "SHOW FULL COLUMNS FROM $this->table";
        
        $result = $this->conn->query($sql);
        
        $data = array();
        
        while($row = mysqli_fetch_assoc($result)) {
            $dataColumn = array();
            array_push($dataColumn,$row["Field"],$row["Type"],$row["Comment"]);
            array_push($data,$dataColumn);
        }
        return $data;
    }
    
    public function getColumnCount() {
        $sql = "SELECT * FROM $this->table";
        if ($result = mysqli_query($this->conn, $sql)) {
            $rowcount = mysqli_num_fields($result);
            return $rowcount;
        }
    }

    public function getData($parameter = NULL) {
        $sql = "SELECT id FROM $this->table";
        
        if ($parameter) {
            $sql .= " $parameter";
        }
        
        $result = $this->conn->query($sql);
        
        $data = array();
        while ($row = $result->fetch_object()) {
            $data[$row->id] = new dataClass($this->conn, $this->table, $this->fields, $row->id);
        }
        return $data;
    }
}
