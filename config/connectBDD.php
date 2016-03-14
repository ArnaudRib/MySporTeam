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
      $this->db = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return $this->db;
  }

  function requeteSQL($sql, $parametres=[]){
    {
      if (empty($parametres)){
        return $this->connectBDD()->query($sql);
      }else{
        $query=$this->connectBDD()->prepare($sql); //a mettre dans model
        $query->execute($parametres);
        return $query;
      }
    }
  }
}