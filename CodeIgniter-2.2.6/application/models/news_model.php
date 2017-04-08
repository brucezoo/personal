<?php
session_start();
date_default_timezone_set('prc');
class News_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        
    }
    public  function get_navs()
    {
        $query=$this->db->get("navs");
        return $query->result_array();
    }
    public  function get_head_image()
    {
       $this->db->select("head_image");
        @$this->db->where('account',$_SESSION["valid_user"]);
        @$this->db->or_where('nickname',$_SESSION["valid_user"]);
        $query=$this->db->get("new");
        return $query->row_array();
    }
    public  function get_articles()
    {
        $query=$this->db->get("article");
        return $query->result_array();
    }
    public  function get_sub_articles($id)
    {
        $query=$this->db->get_where("article",array("id"=>$id));
        return $query->row_array();
    }
    public  function get_feedbacks($id,$num,$offset)
    {
        $this->db->select("username");
        $this->db->select("feedback");
        $this->db->select("feedbackdate");
        $this->db->where("id",$id);
        $this->db->order_by("feedbackdate", "desc");
        $query=$this->db->get("feedback",$num,$offset);
        return $query->result_array();
        }
   public function get_table_rownum($id)
   {
       $quety=$this->db->get_where("feedback",array("id"=>$id));
       return $quety->num_rows();
   }
    public function set_feedback($id)
    {
        $data=array(
            "username"=>$_SESSION["valid_user"],
            "feedback"=>$this->input->post("feedback"),
            "feedbackdate"=>date('Y-m-d H:i:s'),
            "id"=>$id
        );
        return $this->db->insert("feedback",$data);
    }
    public  function get_personnel_article()
    {
        $query=$this->db->get_where("article",array("author"=>$_SESSION["valid_user"]));
        return $query->result_array();
    }
    public  function get_personnel_article_rownum()
    {
        $query=$this->db->get_where("article",array("author"=>$_SESSION["valid_user"]));
        return $query->num_rows();
    }
    public  function get_nav_item($article_classid)
    {
        $query = $this->db->get_where("navs", array("article_classid" => $article_classid));
        return $query->row_array();
    }
    public  function get_nav_article($article_classid)
    {
        $query = $this->db->get_where("article", array("article_classid" => $article_classid));
        return $query->result_array();
    }
    public function write_blog()
    {
        $data = array(
            "title" => $this->input->post("title"),
            "content" => $this->input->post("content"),
            "author" => $_SESSION["valid_user"],
            "articledate" => date('Y-m-d H:i:s'),
            "count" => 0,
            "article_classid" => $this->input->post("choose_label")
        );
        return $this->db->insert("article", $data);
    }
    public function get_news($slug = FALSE){
        if ($slug === FALSE)
        {
            $query = $this->db->get('news');
            return $query->result_array();
        }

        $query = $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
    }
    public function set_news()
    {
        $this->load->helper('url');

        $slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('text'),

        );

        return $this->db->insert('news', $data);
    }
    public function set_navs()
    {
        $this->load->helper('url');
        $data = array(
            array('class_name'=>"新闻"),array('class_name'=>"热点"),array('class_name'=>"社会"),array( 'class_name'=>"视频"),array( 'class_name'=>"娱乐"),array( 'class_name'=>"图片"),array( 'class_name'=>"科技"),array( 'class_name'=>"汽车"),array('class_name'=>"体育"),array( 'class_name'=>"军事"),array( 'class_name'=>"国际"),array( 'class_name'=>"教育"),array( 'class_name'=>"健康"),array( 'class_name'=>"历史"),array( 'class_name'=>"养生"),array( 'class_name'=>"文化")
    );

        return $this->db->insert_batch('navs', $data);
    }
    public function upload_head_image()
    {
        $data=array("head_image"=>$_FILES["userfile"]["name"]);
        $this->db->where("account",$_SESSION["valid_user"]);
        $this->db->or_where("nickname",$_SESSION["valid_user"]);
        return $this->db->update("new",$data);
    }
}