<?php

class Upload extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model("news_model");
    }

    function index()
    {
        $data['navs'] = $this->news_model->get_navs();
        $data['head_image'] = $this->news_model->get_head_image();
        $data["upload_error"]='';
        $this->load->view('blog/upload_form',$data);
    }

    function do_upload()
    {
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10';
        $config['max_width']  = '50';
        $config['max_height']  = '65';

        $this->load->library('upload',$config);

        if ( ! $this->upload->do_upload())
        {
            $error = array('upload_error' => $this->upload->display_errors(),
                'navs'=>$this->news_model->get_navs(),
            'head_image'=> $this->news_model->get_head_image());
            $this->load->view('blog/upload_form', $error);
        }
        else
        {
            $data = array(
                'upload_error' => $this->upload->display_errors(),
                'upload_data' => $this->upload->data(),
             'navs'=>$this->news_model->get_navs(),
            'head_image'=> $this->news_model->get_head_image()
            );
            $this->news_model->upload_head_image();
            $this->load->view('blog/upload_success', $data);
        }
    }
}
?>