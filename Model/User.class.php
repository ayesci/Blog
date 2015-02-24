<?php


Class Model_User
{
    // propriétés
    private $db;

    // methodes
    public function __construct()
    {
        $this->db = new Helper_Database();
    }

    public function verif_login($userName, $password)
    {
        $query = "SELECT * FROM blog.users WHERE userName = :userName";
        $data = array("userName"=>$userName);
        $user_result = $this->db->fetchOne($query, $data);

        if(password_verify($password, $user_result['password']))
        {
            $_SESSION['id'] = $user_result['id'];
            $_SESSION['userName'] = $user_result['userName'];
            return true;
        }
        else
        {
            return false;
        }
    }

    public function userName_exist($userName)
    {
        $query = "SELECT * FROM blog.users WHERE userName = :userName";
        $data = array("userName"=>$userName);
        $user_result = $this->db->fetchOne($query, $data);

        if($user_result == true)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function logout()
    {
        session_destroy();
    }

    public function addUser($userName, $password)
    {
        $query= "INSERT INTO blog.users (userName, password)
                  VALUES(:userName, :password)";
        $data = array(
            "userName" => $userName,
            "password"=>password_hash($password,PASSWORD_DEFAULT)
                    );
        $new_user = $this->db->insert($query, $data);
        $_SESSION['id'] = $new_user;
        $_SESSION['userName'] = $userName;
        return $new_user;
    }



}






// FUNCTION

