<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/13
 * Time: 12:36
 */
class myException extends Exception
{
    function __toString()
    {
     return "<table border=\"1\">
   <tr>
   <td><strong>Exception ".$this->getCode()."</strong>:".$this->getMessage()."<br />"."in ".$this->getFile()." on line ".$this->getLine()."
   </td>
   </tr>
   </table><br />";
        // TODO: Implement __toString() method.
    }
}
try{
    throw new myException("A terrible error has occurred",5);
}
catch (myException $m){
    echo "einfoiewnf o  nfweo fnwo ";
}