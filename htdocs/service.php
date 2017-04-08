<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/12
 * Time: 10:49
 */
require ("page.inc");
class servicepage extends page
{
    private $row2buttons=array(
        "re-engineering"=>"re-engineering.php",
        "standards compliance"=>"standards.php",
        "buzzword compliance"=>"buzzword.php",
        "mission statements"=>"mission.php"
    );
    public function display()
    {
        echo "<html>\n<head>\n";
        $this->displaytitle();
        $this->displaykeywords();
        $this->displaystyle();
        echo "</head>\n<body>\n";
        $this->displayheader();
        $this->displaymenu($this->buttons);
        $this->displaymenu($this->row2buttons);
        echo $this->content;
        $this->displayfooter();
        echo "</body>\n</html>\n";
    }
}
$service=new servicepage();
$service->content="<p>fnja n a aa oah na fo aanajfna n nafa fn aa lnal fnafn aofanjndajn annla nf nf fn jnfjf uuefhsnvsjkgb uf fsnsnsjn fsjnf.</p>";
$service->display();
?>