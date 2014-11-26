<?php

class cssTemplate
{
    private $id;
    private $name;
    private $description;
    private $cssSnippet;
    private $activeState;
    private $createdBy;
    private $creationDate;
    private $modifyBy;
    private $modifyDate;

    public function __construct($record)
    {
        $this->id = $record['CSSTemplates_ID'];
        $this->name= $record['Name'];
        $this->cssSnippet = $record['CSSSnippet'];
        $this->activeState = $record['ActiveState'];
        $this->description = $record['Description'];
        $this->createdBy = $record['CreatedBy'];
        $this->creationDate = $record['CreationDate'];
        $this->modifyBy = $record['ModifyBy'];
        $this->modifyDate = $record['ModifyDate'];
    }//end constructor

    public static function getActiveCSS()
    {
        $db = dbConnect::getConnection();

        $query = "SELECT * FROM CSSTemplates WHERE ActiveState=1;";

        $results = mysqli_query($db, $query);

        $row = mysqli_fetch_assoc($results);

        $activeCSSTemplate = new self($row);

        dbConnect::closeConnection($db);

        return $activeCSSTemplate;

    }//end getActiveCSS

    public function getContent()
    {
        return $this->cssSnippet;
    }//end getContent



}//end class


?>