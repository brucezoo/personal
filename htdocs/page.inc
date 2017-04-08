<?php

class page
{
    public $content;
    public $title="tla consulting pty ltd";
    public $keywords="tla consulting,three letter abbreviation,some of my best friends are search engines";
    public $buttons=array("Home"=>"home.php",
        "Contact"=>"contact.php",
        "Service"=>"service.php",
        "Site Map"=>"mao.php");
    public function __set($name, $value)
    {
    $this->$name=$value;    // TODO: Implement __set() method.
    }
    public function display()
    {
        echo "<html>\n<head>\n";
       $this->displaytitle();
        $this->displaykeywords();
        $this->displaystyle();
        echo "</head>\n<body>\n";
        $this->displayheader();
        $this->displaymenu($this->buttons);
        echo $this->content;
        $this->displayfooter();
        echo "</body>\n</html>\n";
    }
    public function displaytitle()
    {
        echo "<title>".$this->title."</title>";
    }
    public function displaykeywords()
    {
        echo "<meta name=\"keywords\"
        content=\"".$this->keywords."\"/>";
    }
    public function displaystyle()
    {
        ?>
<style>
    h1 {color: white;font-size: 24pt;text-align: center;
        font-family:arial,sans-serif}
    .menu {color: white;font-size: 12pt;text-align: center;
        font-family:arial,sans-serif;font-weight: bold}
    td {background: black}
    p {color:black;font-size: 24pt;text-align: center;
        font-family:arial,sans-serif}
    p.foot{color:white;font-size: 9pt;text-align: center;
        font-family:arial,sans-serif;font-weight: bold}
    a:link,a:visited,a:active{color:white}
</style>
<?php
    }
    public function displayheader()
    {
        ?>
        <table width="100%"cellpadding="12"cellspacing="0"border="0">
    <tr bgcolor="black">
        <td align="left"color="white"><img src="logo.gif"/></td>
    <td>
        <h1>tla consulting pty ltd</h1>
    </td>
        <td align="right"><img src="logo.gif"/></td>
    </tr>
</table>
        <?php
    }
public function displaymenu($buttons)
{
    echo "<table width=\"100%\"bgcolor=\"white\"cellpadding=\"4\"cellspacing=\"4\">\n";
    echo "<tr>\n";
    $width=100/count($buttons);
    while(list($name,$url)=each($buttons)){
        $this->displaybutton($width,$name,$url,!$this->isurlcurrentpage($url));
    }
    echo "</tr>\n";
    echo "</table>\n";
}
    public function isurlcurrentpage($url)
    {
        if(strpos($_SERVER["PHP_SELF"],$url)==false)
        {
            return false;
        }else{
            return true;
        }
    }
    public function displaybutton($width,$name,$url,$active=true)
    {
        if($active){
            echo "<td width=\"".$width."%\">
           <a href=\"".$url."\">
            <img src=\"s-logo.gif\"border=\"0\"/></a>
            <a href=\"".$url."\"><span class=\"menu\">".$name."</span></a></td>";
        }else{
            echo "<td width=\"".$width."%\">
            <img src=\"side-logo.gif\">
            <span class=\"menu\">".$name."</span></td>";
        }
    }
    public function displayfooter()
    {
        ?>
<table width="100%"bgcolor="black" cellpadding="12"border="0">
    <tr>
        <td>
            <p class="foot">&copy;tla consulting pty ltd.</p>
            <p class="foot">please see our <a href="legal.php">legal information page</a> </p>
        </td>
    </tr>
</table>
<?php
    }
    }

?>