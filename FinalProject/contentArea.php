<?php

class contentArea
{
    private $id;
    private $name;
    private $alias;
    private $order;
    private $description;
    private $createdBy;
    private $creationDate;
    private $modifyBy;
    private $modifyDate;

    public function __construct($record)
    {
        $this->id = $record['ContentAreas_ID'];
        $this->name= $record['Name'];
        $this->alias = $record['Alias'];
        $this->order = $record['Order'];
        $this->description = $record['Description'];
        $this->createdBy = $record['CreatedBy'];
        $this->creationDate = $record['CreationDate'];
        $this->modifyBy = $record['ModifyBy'];
        $this->modifyDate = $record['ModifyDate'];
    }//end constructor

    public static function getContentArea()
    {
        $db = dbConnect::getConnection();

        $query = "SELECT * FROM ContentAreas;";

        $results = mysqli_query($db, $query);

        while($row = mysqli_fetch_assoc($results))
        {
            $contentAreas[] = new self($row);
        }//end while

        dbConnect::closeConnection($db);

        return $contentAreas;

    }//end getContentAreas

    public function getID()
    {
        return $this->id;
    }//end getID

    public function getAlias()
    {
        return $this->alias;
    }//end getContent

}//end class


?>