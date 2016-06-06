<?php
require_once('config/connectBDD.php');

class AccueilModele extends BaseDeDonnes
{
 function getAide(){
   $sql="SELECT * FROM aide ORDER BY type";
   $resultats=$this->requeteSQL($sql);
   foreach ($resultats as $value) {
     $resultat[$value['type']][]=[$value['question'], $value['reponse'], $value['id']]; //remise en forme
    }
   return $resultat;
 }

 function sendMessage(){
  $sql="INSERT INTO utilisateur_message(id_envoyeur, id_recepteur, objet, message, date) VALUES (?,?,?,?,NOW())";
  $resultats=$this->requeteSQL($sql,[$_SESSION['user']['id'], $_POST['destinataire'], $_POST['objet'], $_POST['message']]);
 }

 function getNotifMessage(){
   $sql="SELECT *, utilisateur_message.id as id_message FROM utilisateur_message JOIN utilisateur ON utilisateur_message.id_envoyeur=utilisateur.id WHERE id_recepteur=?";
   $resultats=$this->requeteSQL($sql, [$_SESSION['user']['id']]);
   return $resultats;
 }

 function getNotifInvitation(){
   $sql="SELECT * FROM utilisateur_invitation JOIN groupe ON groupe.id=utilisateur_invitation.id_groupe WHERE id_utilisateur=?";
   $resultats=$this->requeteSQL($sql, [$_SESSION['user']['id']]);
   return $resultats;
 }

 function deletenotifmessage(){
   $sql="DELETE FROM utilisateur_message WHERE id=?";
   $resultat=$this->requeteSQL($sql, [$_POST['id_message']]);
 }
}
