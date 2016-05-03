<?php

class BaseDeDonnes
{
  private $servername = "localhost";
  private $username = "root";
  private $password = "";
  private $dbname = "MySporTeamBDD";
  private $db;

  function connectBDD(){
    if ($this->db==null){
      $this->db = new PDO("mysql:host=$this->servername;dbname=$this->dbname;charset=utf8", $this->username, $this->password);
      $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
    return $this->db;
  }

  function requeteSQL($sql, $parametres=[]){
    {
      try {
        if (empty($parametres)){
          return $this->connectBDD()->query($sql);
        }else{
          $query=$this->connectBDD()->prepare($sql); //a mettre dans model
          $query->execute($parametres);
          return $query;
        }
      } catch (Exception $e) {
        echo $e->getMessage();
      }
    }
  }
}
