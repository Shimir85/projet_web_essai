<?php

class dbManager
{
    protected $pdb;

    public function __construct()
    {
        try
        {
            $this->pdb=new pdo('mysql:host=localhost; dbname=projet_web','root','');
        }
        catch (PDOException $Exc)
        {
            $this->erreursql($Exc);
        }
    }

}