<?php

class user
{
    private $PkUser;
    private $Login;
    private $Pswd;
    private $Admin;
    public function set_PkUser($t_PkUser)
    {
        $this->PkUser = $t_PkUser;
    }
    public function set_Login($t_Login)
    {
        $this->Login = $t_Login;
    }
    public function set_Pswd($t_Pswd)
    {
        $this->Pswd = $t_Pswd;
    }
    public function set_Admin($t_Admin)
    {
        $this->Admin = $t_Admin;
    }
    public function get_PkUser()
    {
        return $this->PkUser;
    }

    public function get_Login()
    {
        return $this->Login;
    }
    public function get_Pswd()
    {
        return $this->Pswd;
    }
    public function get_Admin()
    {
        return $this->Admin;
    }
}