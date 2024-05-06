<?php
include_once 'etudiant.php';
class classe
{
private $Pkclas;
private $Niv;
private $Ident;
private $Nbinsc;
private $TabEtud = array();


    public function __destruct()
    {
        foreach ($this->TabEtud as $key => $value)
        {
            unset($this->TabEtud[$key]);
        }
        unset($this->TabEtud);
        unset($this->Pkclas);
        unset($this->Niv);
        unset($this->Ident);
    }

    public function set_PkClas($t_PkClas)
    {
        $this->Pkclas = $t_PkClas;
    }
    public function set_Nbinsc($t_Nbinsc)
    {
        $this->Nbinsc = $t_Nbinsc;
    }
    public function set_Niv($t_Niv)
    {
        $this->Niv = $t_Niv;
    }
    public function set_Ident($t_Ident)
    {
        $this->Ident = $t_Ident;
    }
    public function get_PkClas()
    {
        return $this->Pkclas;
    }

    public function get_Niv()
    {
        return $this->Niv;
    }
    public function get_Ident()
    {
        return $this->Ident;
    }
    public function get_Nbinsc()
    {
        return $this->Nbinsc;
    }
}