<?php
include_once 'dbManager.php';
include_once 'classe.php';
class classeManager extends dbManager
{
    public function nbre_etudiant($PkClasse) //fonction pour le comptage des étudiants dans une classe
    {
        try
        {
            $query = "SELECT count(*) FROM etud WHERE FkClas='$PkClasse'";
            $run=$this->pdb->prepare($query);
            $run->execute();
            $resultat = $run->fetch();
            return $resultat[0];
        }
        catch (mysqli_sql_exception $Exc)
        {
            $this->erreursql($Exc);
        }
    }
    public function create($t_classe)
    {

        try
        {
            $niv=$t_classe->get_Niv();
            $ident=$t_classe->get_Ident();
            $query ="INSERT INTO classe VALUES (null,'$niv','$ident', 0)";
            $run=$this->pdb->prepare($query);
            $run->execute();
        }
        catch (PDOException $Exc)
        {
            $this->erreursql($Exc);
        }
    }

    public function read()
    {
        $Tclasse = array();
        //read arg
        if (func_num_args())
        {
            $arg = func_get_arg(0);
            $query = "SELECT * FROM classe where PkClas='$arg'";
        }
        else
        {
            $query = "SELECT * FROM classe where 1 order by Niv,Ident";
        }
        try
        {
            $req=$this->pdb->prepare($query);
            $req->execute();
            $result = $req->fetchAll();
            foreach($result as $row)
            {
                $Pkclas=$row['PkClas'];
                $t_classe = new classe();
                $t_classe->set_PkClas($Pkclas);
                $t_classe->set_Nbinsc($this->nbre_etudiant($Pkclas));
                $t_classe->set_Niv($row['Niv']);
                $t_classe->set_Ident($row['Ident']);
                $Tclasse[]=$t_classe;
            }
        }
        catch (PDOException $Exc)
        {
            $this->erreursql($Exc);
        }
        return $Tclasse;
    }

    public function delete($t_PkClas)
    {
        try
        {
            $query="DELETE FROM classe WHERE PkClas='$t_PkClas'";
            $req = $this->pdb->prepare($query);
            $req->execute();
        }
        catch (PDOException $exc)
        {
            switch($exc->getCode())
            {
                case 23000:
                    $message="Impossible de supprimer une classe tant qu'il y a des élèves encodés";
                    break;
                default:
                    $message="problème avec la requête SQL";
            }
            die("<br> Accès SQL invalide: ". $message);
        }
    }

    public function update($t_classe, $t_Pkclasse)
    {
        try
        {
            $niv = $t_classe->get_Niv();
            $id = $t_classe->get_Ident();
            $query = "UPDATE classe SET Niv='$niv', Ident='$id' WHERE PkClas='$t_Pkclasse'";
            $req = $this->pdb->prepare($query);
            $req->execute();
        }
        catch (PDOException $Exc)
        {
            $this->erreursql($Exc);
        }
    }
}