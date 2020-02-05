<?php
include_once 'config.php';
class clstec
{
    public $teccod,$tecname;
    public function save_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call instec('$this->tecname')";
        $res= mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }
    }
    public function update_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call updtec($this->teccod,'$this->tecname')";
        $res= mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }
    }
    public function delete_rec()
    {
         $con=new clscon();
        $link=$con->db_connect();
        $qry="call deltec($this->teccod)";
        $res= mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }
    }
    public function disp_rec()
    {
         $con=new clscon();
        $link=$con->db_connect();
        $qry="call disptec()";
        $res= mysqli_query($link,$qry);
        $ar=array();
        $i=0;
        while ($r= mysqli_fetch_row($res))
        {
            $ar[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $ar;
    }
    public function find_rec()
    {
         $con=new clscon();
        $link=$con->db_connect();
        $qry="call findtec($this->teccod)";
        $res= mysqli_query($link, $qry);
        if(mysqli_num_rows($res)>0)
        {
            $r= mysqli_fetch_row($res);
            $this->teccod=$r[0];
            $this->tecname=$r[1];
        }
        $con->db_close();
    }
}
class clsqst
{
     public $qstcod,$qstdsc,$qstteccod,$qstlvl,$qstdat;
    public function save_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call insqst('$this->qstdsc',$this->qstteccod,'$this->qstlvl','$this->qstdat')";
        $res= mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }
    }
    public function update_rec()
    {
         $con=new clscon();
        $link=$con->db_connect();
        $qry="call updqst($this->qstcod,'$this->qstdsc',$this->qstteccod,'$this->qstlvl','$this->qstdat')";
        $res= mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }
    }
    public function delete_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call delqst($this->qstcod)";
        $res= mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }
    }
    //clients
     public function dspqst($tcod,$lvl)
    {
         $con=new clscon();
        $link=$con->db_connect();
        $qry="call dspqstbyteclvl($tcod,'$lvl')";
        $res= mysqli_query($link, $qry);
        $ar=array();
        
        $i=0;
        while ($r= mysqli_fetch_row($res))
        {
            $ar[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $ar;
    }
    //admin
    public function disp_rec($tcod)
    {
         $con=new clscon();
        $link=$con->db_connect();
        $qry="call dispqst($tcod)";
        $res= mysqli_query($link, $qry);
        $ar=array();
        $i=0;
        while ($r= mysqli_fetch_row($res))
        {
            $ar[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $ar;
    }
    public function find_rec()
    {
         $con=new clscon();
        $link=$con->db_connect();
        $qry="call findqst($this->qstcod)";
        $res= mysqli_query($link, $qry);
        if(mysqli_num_rows($res)>0)
        {
            $r= mysqli_fetch_row($res);
            $this->qstcod=$r[0];
            $this->qstdsc=$r[1];
            $this->qstteccod=$r[2];
            $this->qstlvl=$r[3];
            $this->qstdat=$r[4];
        }
        $con->db_close();
    }
}
class clsans
{
     public $anscod,$ansqstcod,$ansdsc,$anssts;
    public function save_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call insans($this->ansqstcod,'$this->ansdsc','$this->anssts')";
        $res= mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }
    }
    public function update_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call updans($this->anscod,$this->ansqstcod,'$this->ansdsc','$this->anssts')";
        $res= mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }
    }
    public function delete_rec()
    {
         $con=new clscon();
        $link=$con->db_connect();
        $qry="call delans($this->anscod)";
        $res= mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }
    }
    public function disp_rec($qcod)
    {
        
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call dispans($qcod)";
        $res= mysqli_query($link, $qry);
        $i=0;
        $ar=array();
        while ($r= mysqli_fetch_row($res))
        {
            $ar[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $ar;
    }
    public function find_rec()
    {
        
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call findans($this->anscod)";
        $res= mysqli_query($link, $qry);
        if(mysqli_num_rows($res)>0)
        {
            $r= mysqli_fetch_row($res);
            $this->anscod=$r[0];
            $this->ansqstcod=$r[1];
            $this->ansdsc=$r[2];
            $this->anssts=$r[3];
        }
        $con->db_close();
    }
}
class clsreg
{
    public $regcod,$regeml,$regpwd,$regdat,$regsts;
    
    public function logincheck($eml,$pwd)
    {
       // session_start();
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call logincheck('$eml','$pwd',@cod,@rol)";
        $res=  mysqli_query($link, $qry);
        $res1=  mysqli_query($link,"select @cod,@rol");
        $r=  mysqli_fetch_row($res1);
        $con->db_close();
        if($r[0]==-1 ||$r[0]==-2)
            return FALSE;
        else
        {
            $_SESSION["ucod"]=$r[0];
            $_SESSION["rol"]=$r[1];
            return TRUE;
        }
    }
    public function save_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call insreg('$this->regeml','$this->regpwd','$this->regdat','$this->regsts')";
        $res= mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }
    }
    public function update_rec()
    {
         $con=new clscon();
        $link=$con->db_connect();
        $qry="call updreg($this->regcod,'$this->regeml','$this->regpwd','$this->regdat','$this->regsts')";
        $res= mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }
    }
    public function delete_rec()
    {
          $con=new clscon();
        $link=$con->db_connect();
        $qry="call delreg($this->regcod)";
        $res= mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }
    }
    public function disp_rec()
    {
         $con=new clscon();
        $link=$con->db_connect();
        $qry="call dispreg()";
        $res= mysqli_query($link, $qry);
        $i=0;
        $ar=array();
        while ($r= mysqli_fetch_row($res))
        {
            $ar[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $ar;
    }
    public function find_rec()
    {
         $con=new clscon();
        $link=$con->db_connect();
        $qry="call findreg($this->regcod)";
        $res= mysqli_query($link, $qry);
        if(mysqli_num_rows($res)>0)
        {
            $r= mysqli_fetch_row($res);
            $this->regcod=$r[0];
            $this->regeml=$r[1];
            $this->regpwd=$r[2];
            $this->regdat=$r[3];
            $this->regsts=$r[4];
        }
        $con->db_close();
    }
}
?>
