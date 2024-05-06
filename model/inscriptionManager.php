<?php
include_once 'dbManager.php';
include_once 'inscription.php';
class inscriptionManager extends dbManager
{
    public function get_stat_run() //Retourne la statistiques concernant les coureurs/marcheurs
    {
        try
        {
            $query = "select round((select(SELECT count(*) FROM inscr i INNER JOIN epr e ON i.FkEpr = e.PkEpr WHERE e.Date < CURDATE() and i.Rw=1 and i.Temps!='00:00:00' ORDER BY e.Date LIMIT 10)/(select count(*) from inscr i INNER JOIN epr e ON i.FkEpr = e.PkEpr WHERE e.Date < CURDATE() LIMIT 10)*100),2)";
            $run=$this->pdb->prepare($query);
            $run->execute();
            $resultat_coureur = $run->fetch();
            $query = "select round((select(SELECT count(*) FROM inscr i INNER JOIN epr e ON i.FkEpr = e.PkEpr WHERE e.Date < CURDATE() and i.Rw=0 and i.Temps!='00:00:00' ORDER BY e.Date LIMIT 10)/(select count(*) from inscr i INNER JOIN epr e ON i.FkEpr = e.PkEpr WHERE e.Date < CURDATE() LIMIT 10)*100),2)";
            $run=$this->pdb->prepare($query);
            $run->execute();
            $resultat_marcheur = $run->fetch();
            $query = "select round((select(SELECT count(*) FROM inscr i INNER JOIN epr e ON i.FkEpr = e.PkEpr WHERE e.Date < CURDATE() and i.Temps='00:00:00' ORDER BY e.Date LIMIT 10)/(select count(*) from inscr i INNER JOIN epr e ON i.FkEpr = e.PkEpr WHERE e.Date < CURDATE() LIMIT 10)*100),2)";
            $run=$this->pdb->prepare($query);
            $run->execute();
            $resultat_abstention = $run->fetch();
            $Tstat=array(
                "coureur"=>$resultat_coureur[0],
                "marcheur"=>$resultat_marcheur[0],
                "abstention"=>$resultat_abstention[0]
            );
            return $Tstat;
        }
        catch (PDOException $Exc)
        {
            $this->erreursql($Exc);
        }
    }
    public function get_max_id($PkEpr) //Retourne le numéro de dossard maximum qui a été attribué dans la table des inscriptions (pour créer un nouveau numéro de dossard)
    {
        try
        {
            $query = "SELECT MAX(NoDos) FROM inscr where FkEpr='$PkEpr'";
            $run=$this->pdb->prepare($query);
            $run->execute();
            $resultat = $run->fetch();
            return $resultat[0];
        }
        catch (PDOException $Exc)
        {
            $this->erreursql($Exc);
        }
    }
    public function get_nbre_inscr($PkEpr)  //Pour connaitre le nombre d'inscription du point de vue de l'épreuve
    {
        try
        {
            $query = "SELECT count(*) FROM inscr INNER JOIN epr on inscr.FkEpr=epr.PkEpr WHERE inscr.FkEpr='$PkEpr'";
            $run=$this->pdb->prepare($query);
            $run->execute();
            $resultat = $run->fetch();
            return $resultat[0];
        }
        catch (PDOException $Exc)
        {
            $this->erreursql($Exc);
        }
    }
    public function get_nom_etudiant($FkEtud)  // retourne le nom de l'étudiant dans la liste des inscriptions (point de vue de l'épreuve)
    {
        try
        {
            $query = "select etud.Nom from etud where etud.PkEtud = '$FkEtud'";
            $run=$this->pdb->prepare($query);
            $run->execute();
            $resultat = $run->fetch();
            return $resultat[0];
        }
        catch (PDOException $Exc)
        {
            $this->erreursql($Exc);
        }
    }
    public function get_date_epr($FkEpr)  // retourne la date de l'épreuve dans la liste des inscriptions
    {
        try
        {
            $query = "select epr.Date from epr where epr.PkEpr = '$FkEpr'";
            $run=$this->pdb->prepare($query);
            $run->execute();
            $resultat = $run->fetch();
            return $resultat[0];
        }
        catch (PDOException $Exc)
        {
            $this->erreursql($Exc);
        }
    }

    public function get_Tstart($FkEpr)  // retourne l'heure de départ de la course sélectionnée dans le récap des inscription
    {
        try
        {
            $query = "select epr.Tstart from epr where epr.PkEpr = '$FkEpr'";
            $run=$this->pdb->prepare($query);
            $run->execute();
            $resultat = $run->fetch();
            return $resultat[0];
        }
        catch (PDOException $Exc)
        {
            $this->erreursql($Exc);
        }
    }

    public function create($t_inscription)
    {
        try
        {
            $Fketud=$t_inscription->get_FkEtud();
            $Fkepr=$t_inscription->get_FkEpr();
            $NoDos=$t_inscription->get_NoDos();
            $rw=$t_inscription->get_Rw();
            $Tstart=$t_inscription->get_Tstart();
            $query ="INSERT INTO inscr VALUES (null,'$Fketud','$Fkepr','$NoDos','$rw','$Tstart',0,0)";
            $run=$this->pdb->prepare($query);
            $run->execute();
            return 1;
        }
        catch (PDOException $Exc)
        {
            $this->erreursql($Exc);
        }
    }

    public function read()
    {
        $Tinscr = array();
        $nbre_arg=func_num_args();
        switch ($nbre_arg)
        {
            case 1:                 // point de vue de l'étudiant
                $arg = func_get_arg(0);
                $query = "SELECT * FROM inscr where FkEtud='$arg'";
                break;
            case 2:             //point de vue de l'épreuve
                $arg = func_get_arg(0);
                $query = "SELECT * FROM inscr where FkEpr='$arg' order by NoDos";
                break;
            default:
                $query = "SELECT * FROM inscr where 1";
        }
        try
        {
            $req=$this->pdb->prepare($query);
            $req->execute();
            $result = $req->fetchAll();
            foreach($result as $row)
            {
                $t_inscr = new inscription();
                $t_inscr->set_PkInscr($row['PkInscr']);
                $t_inscr->set_FkEtud($row['FkEtud']);
                $t_inscr->set_FkEpr($row['FkEpr']);
                $t_inscr->set_NoDos($row['NoDos']);
                $t_inscr->set_Rw($row['Rw']);
                $t_inscr->set_Tstart($row['Tstart']);
                $t_inscr->set_temps($row['Temps']);
                $Tinscr[]=$t_inscr;
            }
        }
        catch (PDOException $Exc)
        {
            $this->erreursql($Exc);
        }
        return $Tinscr;
    }

    public function delete($t_Pkinscription)
    {
        try
        {
            $query = "select inscr.Temps from inscr where inscr.PkInscr='$t_Pkinscription'";
            $run=$this->pdb->prepare($query);
            $run->execute();
            $t_resultat = $run->fetch();
            $resultat=$t_resultat[0];
            if ($resultat!="00:00:00") throw new Exception("Impossible de supprimer un élève dont le temps dans l'épreuve a été encodé - faites un retour-arrière pour revenir à la page précédente");
            else
            {
                $query="DELETE FROM inscr WHERE PkInscr='$t_Pkinscription'";
                $req = $this->pdb->prepare($query);
                $req->execute();
            }
        }
        catch (PDOException $Exc)
        {
            $this->erreursql($Exc);
        }
    }

    public function update($PkInscr,$Rw)
    {
        try
        {
            $query="UPDATE inscr SET Rw='$Rw' WHERE PkInscr='$PkInscr'";
            $req = $this->pdb->prepare($query);
            $req->execute();
        }
        catch (PDOException $Exc)
        {
            $this->erreursql($Exc);
        }
    }
}