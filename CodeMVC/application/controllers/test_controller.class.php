<?php

class Test_Controller extends Controller
{
    
    public function __construct()
    {
        parent::__construct();

    }
    
    public function index()
    {
        echo "1338";
    }
    
    public function penis()
    {
        $this->load->model('test_model');
        $this->load->view('test_view', array('var_1' => $this->test_model->getData(),
                                             'var_2' => $_GET['xss_prot']));
    }
    
}

?>