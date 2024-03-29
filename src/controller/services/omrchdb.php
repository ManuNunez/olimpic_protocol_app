<?php
require '../config/con.php';
class omrchdb{
    protected $db;
    public function __construct(){
        try{
            $this->db = new mysqli(HOST,USER_BD,PASS_BD,BD);
            if (mysqli_connect_errno()){
                throw new Exception("Could not connect to database.");
            }
        }catch (Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    public function select($query="", $params = []){
        try{
            $con = $this->query($query,$params[]);
            $ans = $con->get_result()->fetch_all(MYSQLI_ASSOC);
            $con->close();
            return $ans;
        }catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
        return false;
    }


}