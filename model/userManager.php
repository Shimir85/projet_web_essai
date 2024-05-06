<?php
include_once 'dbManager.php';
include_once 'user.php';
class userManager extends dbManager
{
    public function create($t_user)
    {
        try
        {
            $log=$t_user->get_Login();
            $pswd=$t_user->get_PSWD();
            $adm=$t_user->get_Admin();
            $query ="INSERT INTO user VALUES (null,'$log','$pswd','$adm')";
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
        try
        {
            $query = "SELECT * FROM user ORDER BY PkUser ASC LIMIT 1";
            $req=$this->pdb->prepare($query);
            $req->execute();
            $result = $req->fetchAll();
            foreach($result as $row)
            {
                $t_user = new user();
                $t_user->set_PkUser($row['PkUser']);
                $t_user->set_Login($row['Login']);
                $t_user->set_Pswd($row['Pswd']);
                $t_user->set_Admin($row['Admin']);
            }
        }
        catch (PDOException $Exc)
        {
            $this->erreursql($Exc);
        }
        return $t_user;
    }
    public function nbre_user()    //retourne le nombre d'encodage du tableau des users pour empêcher une nouvelle inscription
    {
        try
            {
                $query = "SELECT count(*) FROM user";
                $req=$this->pdb->prepare($query);
                $req->execute();
                $rowCount = $req->fetchColumn();
                return $rowCount;
            }
        catch (PDOException $Exc)
        {
            $this->erreursql($Exc);
        }

    }
}