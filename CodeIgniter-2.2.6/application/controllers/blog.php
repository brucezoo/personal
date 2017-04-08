<?php
class Blog extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');


    }
    public function index(){
        $data['navs'] = $this->news_model->get_navs();
        $data['articles'] = $this->news_model->get_articles();
        $data['head_image'] = $this->news_model->get_head_image();
        $data['title'] = '博客主页';
        $this->load->view('blog/blog_homep', $data);
//      var_dump($_SESSION["valid_user"]);
    }
    public function view($id){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $data['navs'] = $this->news_model->get_navs();
        $data['head_image'] = $this->news_model->get_head_image();
        $data['sub_articles_item'] = $this->news_model->get_sub_articles($id);
        $data["number"]=$this->news_model->get_table_rownum($id);
        if (empty($data['sub_articles_item']))
        {
            show_404();
        }
        $data['title'] = $data['sub_articles_item']['title'];

        $config['base_url'] = 'http://localhost/index.php/blog/view/'.$id;
        $config['total_rows'] = $this->news_model->get_table_rownum($id);
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['first_link'] = '首页';
        $config['last_link'] = '末页';
        $config['next_link'] = '下一页 ';
        $config['prev_link'] = '上一页';
        $config['cur_page']=$this->uri->segment(4);
        $data['feedback'] = $this->news_model->get_feedbacks($id,$config['per_page'],$config['cur_page']);
        $this->pagination->initialize($config);
        $data["page"]=$this->pagination->create_links();

        $this->form_validation->set_rules('feedback', 'feedback', 'required');
        if ($this->form_validation->run() === true)
        {
            $this->news_model->set_feedback($id);
        }
        $this->load->view('blog/blog_subp', $data);
        
    }
public function personnel_blog()
{
    $data['navs'] = $this->news_model->get_navs();
    $data['head_image'] = $this->news_model->get_head_image();
    $data["title"]=$_SESSION["valid_user"];
    $data["personnel_article"]=$this->news_model->get_personnel_article();
    $data["personnel_article_rownum"]=$this->news_model->get_personnel_article_rownum();
    $this->load->view("blog/personnel_blog",$data);
}
    public function nav($article_classid)
    {
        $data['navs'] = $this->news_model->get_navs();
        $data['head_image'] = $this->news_model->get_head_image();
        $data["title"]=$this->news_model->get_nav_item($article_classid);
        $data["nav_article"]=$this->news_model->get_nav_article($article_classid);
        $this->load->view("blog/blog_nav",$data);
    }
    public function writeblog()
    {
        $data['navs'] = $this->news_model->get_navs();
        $data['head_image'] = $this->news_model->get_head_image();
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("title","title","required");
        $this->form_validation->set_rules("content","content","required");
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('blog/blog_write',$data);
        }
        else
        {
            $this->news_model->write_blog();
            $this->load->view("blog/write_validation");
        }
    }
    public function validation()
    {

        if ($this->form_validation->run()===false)
        {
            echo "ajefnjk ";
exit();
        }


//        var_dump($this->news_model->write_blog());
    }
    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a news item';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');

        if ($this->form_validation->run() === FALSE)
        {

            $this->load->view('news/create');



        }
        else
        {
            $this->news_model->set_news();
            $this->load->view('news/success');
        }
    }
}
?>

