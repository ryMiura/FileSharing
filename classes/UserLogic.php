<?php
require_once("../db_init.php");

class UserLogic{
  /**
   * ユーザーを登録する
   * @param array $userData
   * @return bool $result
   */
  public static function createUser($userData){

    //$sql="INSERT INTO `logintable`(user,pass) VALUES(?,?)";
    $sql == "SELECT * FROM `logintable`";
    //ユーザーデータを配列にいれる
    $arr=[];
    $arr[]=$userData['u'];
    $arr[]=passwprd_hash($userData['p'],PASSWORD_DEFAULT);

    $result=false;

    try{
    $stmt=connect()->prepare($sql);
    $result=$stmt->execute($arr);

    return $result;


    }catch(Exception $e){

      return $result;
    }
  }
}



 ?>
