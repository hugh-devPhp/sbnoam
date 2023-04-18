<?php defined('BASEPATH') or exit('No direct script access allowed');


class Secondaire extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function etab_sec()
    {
        $this->load->view('etab_sec');
    }

    public function docs_sec()
    {
        $this->load->view('docs_sec');
    }
}
