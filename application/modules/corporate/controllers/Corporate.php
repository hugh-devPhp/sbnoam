<?php defined('BASEPATH') or exit('No direct script access allowed');

class Corporate extends MX_Controller
{


    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('index');
    }

    public function about()
    {
        $this->load->view('pages/about');
    }

    public function project()
    {
        $this->load->view('pages/project');
    }

    public function events()
    {
        $this->load->view('pages/events');
    }

    public function blog()
    {
        $this->load->view('pages/blog');
    }

    public function contact()
    {
        $this->load->view('pages/contact');
    }
}
