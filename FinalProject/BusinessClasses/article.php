<?php
class article
{
    private $id;
    private $name;
    private $title;
    private $description;
    private $page;
    private $contentArea;
    private $htmlSnippet;
    private $allPages;
    private $createdBy;
    private $creationDate;
    private $modifyBy;
    private $modifyDate;

    public function __construct($record)
    {
        $this->id = $record['Articles_ID'];
        $this->name= $record['Name'];
        $this->title = $record['Title'];
        $this->description = $record['Description'];
        $this->page = $record['Page'];
        $this->contentArea = $record['ContentArea'];
        $this->htmlSnippet = $record['HTMLSnippet'];
        $this->allPages = $record['AllPages'];
        $this->createdBy = $record['CreatedBy'];
        $this->creationDate = $record['CreationDate'];
        $this->modifyBy = $record['ModifyBy'];
        $this->modifyDate = $record['ModifyDate'];
    }//end constructor

    public static function getArticle($_area, $_page)
    {
        $db = dbConnect::getReadOnly();

        $query = "SELECT * FROM Articles WHERE (Page='$_page' OR AllPages=1) AND ContentArea = '$_area';";

        $result = mysqli_query($db, $query);

        while($row = mysqli_fetch_assoc($result))
        {
            $articleArray[] = new self($row);
        }//end while

        dbConnect::closeConnection($db);

        return $articleArray;

    }//end getPage

    public function getName()
    {
        return $this->name;
    }//end getName


    public function getContent()
    {
        return $this->htmlSnippet;
    }//end getContent

}//end class

?>