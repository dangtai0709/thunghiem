<?php

/**
 *
 */
class Hello2 extends CI_Controller
{
    function __construct()
    {
        // this is your constructor abc abc
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
    }

    public function sv()
    {
        $this->load->model('model_sinhvien');
        $sinhvien = $this->model_sinhvien->getlist();

        //echo "<pre>";
        // echo json_encode($sinhvien, JSON_UNESCAPED_UNICODE);
        //print_r($sinhvien);
        return $sinhvien;
    }

    public function add()
    {
        $this->load->model('model_sinhvien');
        @$name = $_GET['name'];
        @$date = $_GET['date'];
        @$class = $_GET['class'];

        $this->model_sinhvien->add($name, $date, $class);
        header('Content-type: application/json');
        echo "1";
    }

    public function info($id)
    {
        $this->load->model('model_sinhvien');
        $sv = $this->model_sinhvien->info($id);
        //echo "<pre>";
        //print_r($sv);
        return $sv;
    }

    public function edit()
    {
        $this->load->model('model_sinhvien');
        @$ID = $_GET['ID'];
        @$name = $_GET['name'];
        @$date = $_GET['date'];
        @$class = $_GET['class'];
        $this->model_sinhvien->edit($ID, $name, $date, $class);
        header('Content-type: application/json');
        echo "1";
    }

    public function delete()
    {

        $this->load->model('model_sinhvien');
        @$ID = $_POST['ID'];
        $this->model_sinhvien->delete($ID);
        //redirect('http://localhost:8080/thunghiem/hello');
        //header('Refresh:0;url=http://localhost:8080/thunghiem/hello2');
        // $this->index();
        header('Content-type: application/json');
        echo "1";
    }

    public function index()
    {
        $data = array();
        $data['sv'] = $this->sv();
        $this->load->view('home/danhsachsinhvien2.php', $data);
    }

}

?>