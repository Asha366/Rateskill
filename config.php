<?php
class clscon
{
    private $link;
    public function db_connect()
    {
        $host="localhost";
        $uname="root";
        $pwd="";
        $this->link= mysqli_connect($host, $uname, $pwd,"myskill") or die('database connection error'.mysqli_error($this->link));
        return $this->link;
    }
    public function db_close()
    {
        mysqli_close($this->link);
    }
}

?>
