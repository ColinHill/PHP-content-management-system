<?php

class dbConnect
{
    static public function getConnection()
    {
        return mysqli_connect("localhost", "root", "inet2005", "CMS");
    }//end getConnection

    static public function closeConnection($db)
    {
        mysqli_close($db);
    }//end closeConnection

}//end class

?>
