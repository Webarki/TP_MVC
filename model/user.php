<?php

class User extends Database
{
    //Attribut
    public $email;
    public $createdAt;
    public $role;
    public $pass;

    /**
     * Method construct qui ce connecte a ma base de données
     */
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Method qui permet de recuperer les infos d'un user via son mail
     */
    public function getUserMail()
    {
        $query = 'SELECT * FROM `ajax_user` WHERE `email`=:email;';
        $fetchProfil = $this->db->prepare($query);
        $fetchProfil->bindValue(':email', $this->email, PDO::PARAM_STR);
        $fetchProfil->execute();
        return $fetchProfil->fetch(PDO::FETCH_OBJ);
    }
}
