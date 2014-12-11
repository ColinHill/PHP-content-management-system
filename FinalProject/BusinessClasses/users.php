<?php
class users
{
    private $id;
    private $first_name;
    private $last_name;
    private $user_name;
    private $password;
    private $salt;
    private $createdBy;
    private $creationDate;
    private $modifyBy;
    private $modifyDate;

    private $privid;
    private $admin;
    private $editor;
    private $author;


    public function __construct($record)
    {
        $this->id = $record['User_ID'];
        $this->first_name = $record['first_name'];
        $this->last_name = $record['last_name'];
        $this->user_name = $record['user_name'];
        $this->password = $record['password'];
        $this->salt = $record['salt'];
        $this->createdBy = $record['CreatedBy'];
        $this->creationDate = $record['CreationDate'];
        $this->modifyBy = $record['ModifyBy'];
        $this->modifyDate = $record['ModifyDate'];

        $this->privid = $record['Privileges_ID'];
        $this->admin = $record['Administrator'];
        $this->editor = $record['Editor'];
        $this->author = $record['Author'];
    }//end constructor

    public function getAdmin()
    {
        return $this->admin;
    }

    public function setAdmin($_admin)
    {
        $this->admin = $_admin;
    }

    public function getEditor()
    {
        return $this->editor;
    }

    public function setEditor($_editor)
    {
        $this->editor = $_editor;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($_author)
    {
        $this->author = $_author;
    }

}//end class

?>