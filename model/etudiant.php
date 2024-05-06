<?php
include_once 'inscription.php';
class etudiant
{
    private $PkEtud;
    private $FkClas;
    private $Nom;
    private $Pren;
    private  $Sexe;
    private $Nb_Insc;

    public function set_PkEtud ($t_Pketud)
    {
        $this->PkEtud=$t_Pketud;
    }
    public function set_Fkclas($t_FkClas)
    {
        $this->FkClas=$t_FkClas;
    }
    public function set_Nom ($t_Nom)
    {
        $this->Nom=$t_Nom;
    }
    public function set_Pren ($t_Pren)
    {
        $this->Pren=$t_Pren;
    }
    public function set_Sexe($t_Sexe)
    {
        $this->Sexe=$t_Sexe;
    }
    public function set_Nb_Insc($t_Nb_Insc)
    {
        $this->Nb_Insc=$t_Nb_Insc;
    }
    public function get_PkEtud ()
    {
        return $this->PkEtud;
    }
    public function get_FkClas ()
    {
        return $this->FkClas;
    }
    public function get_Nom ()
    {
        return $this->Nom;
    }
    public function get_Pren ()
    {
        return $this->Pren;
    }
    public function get_Sexe ()
    {
        return $this->Sexe;
    }
    public function get_Nb_Insc()
    {
        return $this->Nb_Insc;
    }

}