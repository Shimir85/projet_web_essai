<?php

class epreuve
{
private $PkEpr;
private $Date;
private $Tstart;
private $Distance;
private $AnSco;

public function set_PkEpr($t_PkEpr)
{
    $this->PkEpr=$t_PkEpr;
}
public function set_Date($t_Date)
{
    $this->Date=$t_Date;
}
public function set_Tstart($t_Tstart)
{
    $this->Tstart=$t_Tstart;
}
public function set_Distance($t_Distance)
{
    $this->Distance=$t_Distance;
}
public function set_Ansco($t_Ansco)
{
    $this->AnSco=$t_Ansco;
}
public function get_PkEpr()
{
    return $this->PkEpr;
}
public function get_Date()
{
    return $this->Date;
}
public function get_Tstart()
{
    return $this->Tstart;
}
public function get_Distance()
{
    return $this->Distance;
}
public function get_Ansco()
{
    return $this->AnSco;
}


}