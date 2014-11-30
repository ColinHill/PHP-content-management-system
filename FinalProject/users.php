<?php
class article
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
    }//end constructor

}//end class

?>