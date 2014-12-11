<?php

class page
{
    private $id;
    private $name;
    private $alias;
    private $description;
    private $createdBy;
    private $creationDate;
    private $modifyBy;
    private $modifyDate;

    public function __construct($record)
{
    $this->id = $record['SitePages_ID'];
    $this->name= $record['Name'];
    $this->alias = $record['Alias'];
    $this->description = $record['Description'];
    $this->createdBy = $record['CreatedBy'];
    $this->creationDate = $record['CreationDate'];
    $this->modifyBy = $record['ModifyBy'];
    $this->modifyDate = $record['ModifyDate'];
}//end constructor

    public static function getPage($_alias)
    {
       $db = dbConnect::getReadOnly();

        $query = "SELECT * FROM SitePages WHERE Alias='$_alias';";
        $result = mysqli_query($db, $query);

        $page = new self(mysqli_fetch_assoc($result));

       dbConnect::closeConnection($db);

        return $page;

    }//end getPage

    public static function getAllPages($_alias)
    {
        $db = dbConnect::getReadOnly();

        $query = "SELECT * FROM SitePages;";

        $result = mysqli_query($db, $query);

        while($row = mysqli_fetch_assoc($result))
        {
            $pages[] = new self($row);
        }//end while

        dbConnect::closeConnection($db);

        return $pages;

    }//end getAllPages

    public function getName()
    {
        return $this->name;
    }//end getName

    public function getID()
    {
        return $this->id;
    }//end getID

    public function getAlias()
    {
        return $this->alias;
    }//end getAlias

    public function setName($_name)
    {
        $this->name = $_name;
    }//end setName

    public function setAlias($_alias)
    {
        $this->alias = $_alias;
    }//end setName

}//end class


?>