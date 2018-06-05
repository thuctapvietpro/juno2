<?php
  class Database {
    protected $db_host = "localhost";
    protected $db_user = "root";
    protected $db_pass = "";
    protected $db_name = "users_manager";

    protected $conn     = null;
    protected $result   = null;
    protected $num_rows = null;
    protected $row      = null;

    public function connect()
    {
      $this->conn = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
      if($this->conn){
        mysqli_query($this->conn, "SET NAMES 'utf8'");
        // echo "Connected";
      }else{
        echo "Connect Fail!";
      }
    }
    public function free_result()
    {
      if($this->result){
        mysqli_free_result($this->result);
      }
    }
    public function query($sql)
    {
      $this->free_result();
      $this->result = mysqli_query($this->conn, $sql);
    }
    public function num_rows()
    {
      if($this->result){
        $this->rows = mysqli_num_rows($this->result);
        return $this->rows;
      }   
    }
    public function fetch_array()
    {
      if($this->result){
        $this->row = mysqli_fetch_assoc($this->result);
        return $this->row;
      }    
    }

    public function get()
    {
      $data = [];
      if($this->result){
        

        while($row = $this->fetch_array()){
          $data[] = $row;
        }
        
      }
      return $data;
    }
  }

?>
