<?php
include_once 'dbManager.php';
include_once 'epreuve.php';
class epreuveManager extends dbManager
{

    public function Nbinsc_epr($PkEpr) // pour retourner le nombre de participant à une épreuve
    {
        try
        {
            $query="select count(*) from inscr where FkEpr='$PkEpr'";
            $req = $this->pdb->prepare($query);
            $req->execute();
            $resultat=$req->fetch();
            return $resultat[0];
        }
        catch (PDOException $Exc)
        {
            $this->erreursql($Exc);
        }
    }
    public function Ansco($date) // pour effectuer la requête créant l'année scolaire
    {
        try
        {
            $query="select concat((CASE WHEN MONTH('$date') >= 9 THEN YEAR('$date') ELSE (YEAR('$date')-1) END), '-', (CASE WHEN MONTH('$date') >= 9 THEN (YEAR('$date')+1) ELSE YEAR('$date') END))";
            $req = $this->pdb->prepare($query);
            $req->execute();
            $resultat=$req->fetch();
            return $resultat[0];
        }
        catch (PDOException $Exc)
        {
            $this->erreursql($Exc);
        }
    }
    public function create($t_epreuve)
    {

        try
        {
            $date=$t_epreuve->get_Date();
            $heure=$t_epreuve->get_Tstart();
            $Distance=$t_epreuve->get_Distance();
            $ansco=$this->Ansco($date);
            $query ="INSERT INTO epr VALUES (null,'$date','$heure','$Distance','$ansco')";
            $run=$this->pdb->prepare($query);
            $run->execute();
        }
        catch (PDOException $Exc) {
            $this->erreursql($Exc);
        }
    }

    public function read()
    {
        $Tepreuve = array();
        //read arg
        if (func_num_args())
        {
            $arg = func_get_arg(0);
            $query = "SELECT * FROM epr where PkEpr='$arg'";
        }
        else
        {
            $query = "SELECT * FROM epr where 1 order by Date,Tstart";
        }
        try
        {
            $req=$this->pdb->prepare($query);
            $req->execute();
            $result = $req->fetchAll();
            foreach($result as $row)
            {
                $t_epreuve = new epreuve();
                $t_epreuve->set_PkEpr($row['PkEpr']);
                $t_epreuve->set_Date($row['Date']);
                $t_epreuve->set_Tstart($row['Tstart']);
                $t_epreuve->set_Distance($row['Dist']);
                $t_epreuve->set_Ansco($row['Ansco']);
                $Tepreuve[]=$t_epreuve;
            }
        }
        catch (PDOException $Exc)
        {
            $this->erreursql($Exc);
        }
        return $Tepreuve;
    }

    public function delete($t_Pkepreuve)
    {
        try
        {
            $query="DELETE FROM epr WHERE PkEpr='$t_Pkepreuve'";
            $req = $this->pdb->prepare($query);
            $req->execute();
        }

        catch (PDOException $exc)
        {
            switch($exc->getCode())
            {
                case 23000:
                    $message="Impossible de supprimer une épreuve tant qu'il y a des élèves inscrits";
                    break;
                default:
                    $message="problème avec la requête SQL";
            }
            die("<br> Accès SQL invalide: ". $message);
        }
    }

    public function update($t_epreuve, $t_Pkepreuve)
    {
        try
        {
            $date=$t_epreuve->get_Date();
            $heure=$t_epreuve->get_Tstart();
            $dist=$t_epreuve->get_Distance();
            $ansco=$t_epreuve->get_Ansco();
            $query="UPDATE epr SET Date='$date', Tstart='$heure', Dist='$dist', Ansco='$ansco' WHERE PkEpr='$t_Pkepreuve'";  //where '' pour la sécurisation contre l'injection SQL
            $req = $this->pdb->prepare($query);
            $req->execute();
            $query="UPDATE inscr set Tstart='$heure' where FkEpr='$t_Pkepreuve'"; //mise à jour du Tstart de la table inscription
            $req = $this->pdb->prepare($query);
            $req->execute();
        }
        catch (PDOException $Exc)
        {
            $this->erreursql($Exc);
        }
    }
}