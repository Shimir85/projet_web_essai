<?php
include_once 'dbManager.php';
include_once 'etudiant.php';
class etudiantManager extends dbManager
{
    public function get_classe_pketud($Pketud) //fonction pour retrouver la classe de l'étudiant dans le cadre d'un retour vers une liste d'étudiants
    {
        try
        {
            $query = "SELECT FkClas FROM etud WHERE Pketud='$Pketud'";
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
    public function get_nbre_inscr($PkEtud) //Nbre d'inscription du point de vue de l'étudiant
    {
        try
        {
            $query = "SELECT count(*) FROM inscr INNER JOIN epr on inscr.FkEpr=epr.PkEpr WHERE inscr.FkEtud='$PkEtud'";
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
    public function get_nom_classe_complet($Pkclasse) //pour retourner le nom de la classe avec année et identifiant
    {
        try
        {
            $query ="select concat(Niv,' ',Ident) from classe where PkClas='$Pkclasse'";
            $req=$this->pdb->prepare($query);
            $req->execute();
            $resultat=$req->fetch();
            $nom_classe=$resultat[0];
            return $nom_classe;
        }
        catch (PDOException $Exc)
        {
            $this->erreursql($Exc);
        }
    }
    public function create($t_etudiant)
    {
        try
        {
            $fkclas=$t_etudiant->get_FkClas();
            $nom=$t_etudiant->get_Nom();
            $pren=$t_etudiant->get_Pren();
            $sexe=$t_etudiant->get_Sexe();
            $query ="INSERT INTO etud VALUES (null,'$fkclas','$nom','$pren','$sexe',0)";
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
        $TEtudiant = array();
        $nbre_arg=func_num_args();
        switch($nbre_arg)
        {
            case 1:
            {
                $arg = func_get_arg(0);
                $query = "SELECT * FROM etud where FkClas='$arg' order by Nom, Pren";
                break;
            }
            case 2:
            {
                $arg = func_get_arg(0);
                $query = "SELECT * FROM etud where PkEtud='$arg'";
                break;
            }
            default:
                throw new Exception("Argument invalide ou manque d'arguments");
        }
        try
        {
            $req=$this->pdb->prepare($query);
            $req->execute();
            $result = $req->fetchAll();
            foreach($result as $row)
            {
                $t_etudiant = new etudiant();
                $t_etudiant->set_PkEtud($row['PkEtud']);
                $t_etudiant->set_FkClas($row['FkClas']);
                $t_etudiant->set_Nom($row['Nom']);
                $t_etudiant->set_Pren($row['Pren']);
                $t_etudiant->set_Sexe($row['Sexe']);
                $BDMetud=new etudiantManager();
                $nbre_insc=$BDMetud->get_nbre_inscr($row['PkEtud']);
                $t_etudiant->set_Nb_Insc($nbre_insc);
                $TEtudiant[]=$t_etudiant;
            }
        }
        catch (PDOException $Exc)
        {
            $this->erreursql($Exc);
        }
        return $TEtudiant;
    }

    public function delete($t_Pketud)
    {
        try
        {
            $query="DELETE FROM etud WHERE PkEtud='$t_Pketud'";
            $req = $this->pdb->prepare($query);
            $req->execute();
        }
        catch (PDOException $Exc)
        {
            switch($Exc->getCode())
            {
                case 23000:
                    $message="Impossible de supprimer un élève tant qu'il y a des inscriptions encodés";
                    break;
                default:
                    $message="problème avec la requête SQL";
            }
            echo "Fichier : " . $Exc->getFile() . "<br>";
            echo "Ligne : " . $Exc->getLine() . "<br>";
            die("<br> Accès SQL invalide: ". $message);
        }
    }

    public function update($t_etudiant, $t_Pketud)
    {
        try
        {
            $nom=$t_etudiant->get_Nom();
            $pren=$t_etudiant->get_Pren();
            $sexe=$t_etudiant->get_Sexe();
            $query="UPDATE etud SET Nom='$nom', Pren='$pren', Sexe='$sexe' WHERE PkEtud='$t_Pketud'";
            $req = $this->pdb->prepare($query);
            $req->execute();
        }
        catch (PDOException $Exc)
        {
            $this->erreursql($Exc);
        }
    }
}