<?php
include_once 'dbManager.php';
include_once 'inscription.php';
class arriveeManager extends dbManager
{
    public function add_arrivee_inscription($Dossard, $PkEpr)     //ajoute le temps 'Tend' de fin de course à la table "inscription" dans la base de donnée
    {
        $query ="select count(*) from inscr where NoDos='$Dossard' and FkEpr='$PkEpr'";       // vérification pour savoir si le dossard est bien existant pour l'épreuve
        $run=$this->pdb->prepare($query);
        $run->execute();
        $result=$run->fetch();
        if($result[0])
        {
            $query ="select Tend from inscr where NoDos='$Dossard' and FkEpr='$PkEpr'";       // vérification pour savoir si le dossard n'a pas déjà été encodé
            $run=$this->pdb->prepare($query);
            $run->execute();
            $result=$run->fetch();
            if ($result[0]=="00:00:00")
            {
                try
                {
                    $query ="UPDATE inscr set Tend = CURRENT_TIME() WHERE Nodos='$Dossard'";        //Encodage de 'Tend' au moment de la validation du bouton
                    $run=$this->pdb->prepare($query);
                    $run->execute();
                    $query ="UPDATE inscr set Temps = (select TIMEDIFF(Tend, Tstart)) WHERE Nodos='$Dossard'";         //Encodage du différentiel de temps dans 'Temps'
                    $run=$this->pdb->prepare($query);
                    $run->execute();
                }
                catch (PDOException $Exc)
                {
                    $this->erreursql($Exc);
                }
                $erreur = 0;
            }
            else $erreur = 1;
        }
        else $erreur = 2;
        return $erreur;
    }

    public function read($arg,$PkEpr)
    {
        try
        {
            $Tarrivee = array();
            $arg=func_get_arg(0);
                switch($arg)
                {
                    case "coureur":
                        $query = "SELECT * FROM inscr where Temps != '00:00:00' and FkEpr = $PkEpr and Rw=1 order by Temps";
                        break;
                    case "marcheur":
                        $query = "SELECT * FROM inscr where Temps != '00:00:00' and FkEpr = $PkEpr and Rw=0 order by Temps";
                        break;
                    default:
                        $query = "SELECT * FROM inscr i inner join epr e on i.FkEpr=e.PkEpr where i.Temps != '00:00:00' and e.PkEpr = $PkEpr order by Temps";
                        break;
                }
            $req = $this->pdb->prepare($query);
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
                $Tarrivee[]=$t_inscr;
            }
            return $Tarrivee;
        }
        catch (PDOException $Exc)
        {
            $this->erreursql($Exc);
        }
        return $result;
    }
}