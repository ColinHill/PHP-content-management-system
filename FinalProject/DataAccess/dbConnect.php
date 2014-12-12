<?php

class dbConnect
{

    //front, back and readonly


    static public function getConnection()
    {
        return mysqli_connect("localhost", "root", "inet2005", "CMSTestDB2");
    }//end getConnection

    static public function getReadOnly()
    {
        return mysqli_connect("localhost", "select", "inet2005", "CMSTestDB2");
    }//end getReadOnly

    static public function getArticleConnection()
    {
        return mysqli_connect("localhost", "root", "inet2005", "CMSTestDB2");
    }//end getArticleConnection

    static public function getContentAreaConnection()
    {
        return mysqli_connect("localhost", "root", "inet2005", "CMSTestDB2");
    }//end getContentAreaConnection

    static public function getPagesConnection()
    {
        return mysqli_connect("localhost", "root", "inet2005", "CMSTestDB2");
    }//end getPagesConnection

    static public function getTemplateConnection()
    {
        return mysqli_connect("localhost", "root", "inet2005", "CMSTestDB2");
    }//end getTemplateConnection

    static public function getUserConnection()
    {
        return mysqli_connect("localhost", "root", "inet2005", "CMSTestDB2");
    }//end getUserConnection

    static public function closeConnection($db)
    {
        mysqli_close($db);
    }//end closeConnection

}//end class

?>
