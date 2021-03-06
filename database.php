<?php
class Database{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;
    
    public $link;
    public $error;
    
    public function __construct() {
        $this->connectionDB();
    }
    private function connectionDB(){
        $this->link =  new mysqli($this->host , $this->user , $this->pass, $this->dbname);
        if(!$this->link){
            $this->error = "Connection fail".$this->link->connect_error;
            return false;     
        } 
    }
    // Read Data
    public function select($query){
        $result = $this->link->query($query)or die ($this->link->error.__LINE__);
        if($result->num_rows > 0)
            return $result;
        else            
            return flase;
    }
    // Create Data
    public function insert($query){
        $result = $this->link->query($query)or die ($this->link->error.__LINE__);
        if($result){
            header("Location: index.php?msg=".urlencode('Data inserted Succesfully.'));
            exit();
        }
        else
            die("Error");
    }
    
    // update data
        public function update($query){
        $result = $this->link->query($query)or die ($this->link>error.__LINE__);
        if($result){
            header("Location: index.php?msg=".urlencode('Data updated Succesfully.'));
            exit();
        }
        else
            die("Error");
    }
        // Delete data
        public function Delete($query){
        $result = $this->link->query($query)or die ($this->link>error.__LINE__);
        if($result){
            header("Location: index.php?msg=".urlencode('Data Deleted Succesfully.'));
            exit();
        }
        else
            die("Error");
    }
    
}
