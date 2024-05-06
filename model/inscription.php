<?php

class inscription
{
    private $PkInscr;
    private $FkEtud;
    private $FkEpr;
    private $NoDos;
    private $Rw;
    private $Tstart;
    private $Tend;
    private $Temps;

    public function set_PkInscr($t_PkInscr)
    {
        $this->PkInscr=$t_PkInscr;
    }
    public function set_FkEtud($t_FkEtud)
    {
        $this->FkEtud=$t_FkEtud;
    }
    public function set_FkEpr($t_FkEpr)
    {
        $this->FkEpr=$t_FkEpr;
    }
    public function set_NoDos($t_NoDos)
    {
        $this->NoDos=$t_NoDos;
    }
    public function set_Rw($t_Rw)
    {
        $this->Rw=$t_Rw;
    }
    public function set_Tstart($t_Tstart)
    {
        $this->Tstart=$t_Tstart;
    }
    public function set_temps($t_Temps)
    {
        $this->Temps=$t_Temps;
    }
    public function set_Tend($t_Tend)
    {
        $this->Tend=$t_Tend;
    }
    public function get_PkInscr()
    {
        return $this->PkInscr;
    }
    public function get_FkEtud()
    {
        return $this->FkEtud;
    }
    public function get_FkEpr()
    {
        return $this->FkEpr;
    }
    public function get_NoDos()
    {
        return $this->NoDos;
    }
    public function get_Rw()
    {
        return $this->Rw;
    }
    public function get_Tstart()
    {
        return $this->Tstart;
    }
    public function get_Tend()
    {
        return $this->Tend;
    }
    public function get_Temps()
    {
        return $this->Temps;
    }

}