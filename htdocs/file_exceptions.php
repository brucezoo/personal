<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/13
 * Time: 14:46
 */
class fileopenexception extends Exception
{
    function __toString()
    {
        return "fileopenexception ".$this->getCode().":".$this->getMessage()."<br />".
"in ".$this->getFile()." on line ".$this->getLine()."<br />";
    }
}
class filewriteexception extends Exception
{
    function __toString()
    {
        return "filewriteexception ".$this->getCode().":".$this->getMessage()."<br />".
        "in ".$this->getFile()." on line ".$this->getLine()."<br />";
    }
}
class filelockexception extends Exception
{
    function __toString()
    {
        return "filelockexception ".$this->getCode().":".$this->getMessage()."<br />".
        "in ".$this->getFile()." on line ".$this->getLine()."<br />";
    }
}
?>