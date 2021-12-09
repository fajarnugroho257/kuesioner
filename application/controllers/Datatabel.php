<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Datatabel extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
 
        /* Standard Libraries of codeigniter are required */
        $this->load->database();
        $this->load->helper('url');
        /* ------------------ */ 
 
        $this->load->library('grocery_CRUD');
 
    }

    public function _example_output($output = null)
	{
		if($this->session->userdata('username') !='')
        {
            
            $this->load->view('admin_data.php',(array)$output);
            
        }
        else
        {
            redirect(base_url() . 'Admin/login');
        }
    }
    
    public function data($data){
            $this->load->view("admin_data", $data);
    }
 
   

    function login()
    {
        $this->load->view("login");
    }


    function login_validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', "Username", 'required');
        $this->form_validation->set_rules('password', "Password", 'required');
        if($this->form_validation->run())
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->load->model('login_model');
            if($this->login_model->can_login($username, $password))
            {
                $session_data = array(
                    'username' => $username
                );
                $this->session->set_userdata($session_data);
                redirect(base_url() . 'Admin');
            }
            else
            {
                $this->session->set_flashdata('error', 'username dan password salah');
                redirect(base_url() . 'Admin/login');
            }
        }
        else
        {
            $this->login();
        }

    }
    public function index(){
        if($this->session->userdata('username') !='')
        {
            
            $this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
            
        }
        else
        {
            redirect(base_url() . 'Admin/login');
        }
    }
    function logout()
    {
        $this->session->unset_userdata('username');
        redirect(base_url() . 'Admin/login');
    }
 
    public function user()
    {
        
        $crud = new grocery_CRUD();
        $crud->set_table('admin');
        $output = $crud->render();
 
        $this->_example_output($output);    
    }



    public function datamahasiswa()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('mahasiswa');
        $crud->columns('npm','nama','nomor_handphone','id_prodi','id_fakultas');
        $crud->display_as('id_prodi','Nama Prodi');
        $crud->display_as('id_fakultas', 'Nama Fakultas');
        $crud->set_relation('id_fakultas', 'fakultas', 'nama_fakultas');
        $crud->set_relation('id_prodi', 'prodi', 'nama_prodi');
        $output = $crud->render();
 
        $this->_example_output($output);        
    }

    public function kategori()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('kategori');
        $output = $crud->render();
 
        $this->_example_output($output);       
    }

    public function datapertanyaan()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('pertanyaan');
        $crud->columns('pertanyaan','jwb1','jwb2','jwb3','jwb4','jwb5', 'id_kategori');
        $crud->field_type('id_kategori','dropdown',
            array('1' => 'Kategori 1', '2' => 'Kategori 2','3' => 'Kategori 3' , '4' => 'Kategori 4' , '5' => 'Kategori 5'));
        $output = $crud->render();
 
        $this->_example_output($output);              
    } 
    
    public function hasil()
    {
        $this->load->model("input_model");
        $array['per'] = $this->input_model->count('pertanyaan');//menghitung pertanyaan
        $array['npm'] = $this->input_model->getnpm()->result_array();//mendapatkan npm
        $array['data'] = $this->input_model->hasil()->result_array();//mendapatkan data hasil jawaban
        if (empty($array['data'])) {
             $array['n'] = null;
        } else{
            $c =count($array['npm']);
            for ($i=0; $i <$c ; $i++) { 
            $npm = $array['npm'][$i]['npm'];
            $array['n'][$i] = $this->input_model->getnpmwhere($npm)->result_array();
            }
        }
        $array['npm'] = $this->input_model->getnpm()->result_array();
        $this->load->view("hasilku",$array);
    } 

    public function cetakExcel()
    {
        $this->load->model("input_model");
        $array['per'] = $this->input_model->count('pertanyaan');//menghitung pertanyaan
        $array['npm'] = $this->input_model->getnpm()->result_array();//mendapatkan npm
        $array['data'] = $this->input_model->hasil()->result_array();//mendapatkan data hasil jawaban
        if (empty($array['data'])) {
             $array['n'] = null;
        } else{
            $c =count($array['npm']);
            for ($i=0; $i <$c ; $i++) { 
            $npm = $array['npm'][$i]['npm'];
            $array['n'][$i] = $this->input_model->getnpmwhere($npm)->result_array();
            }
        }
        $array['npm'] = $this->input_model->getnpm()->result_array();
        $this->load->view("cetak",$array);//mengirimkan data ke view catak excel
    }

    public function cetakPrint()
    {
        $this->load->model("input_model");
        $array['per'] = $this->input_model->count('pertanyaan');//menghitung pertanyaan
        $array['npm'] = $this->input_model->getnpm()->result_array();//mendapatkan npm
        $array['data'] = $this->input_model->hasil()->result_array();//mendapatkan data hasil jawaban
        if (empty($array['data'])) {
             $array['n'] = null;
        } else{
            $c =count($array['npm']);
            for ($i=0; $i <$c ; $i++) { 
            $npm = $array['npm'][$i]['npm'];
            $array['n'][$i] = $this->input_model->getnpmwhere($npm)->result_array();
            }
        }
        $array['npm'] = $this->input_model->getnpm()->result_array();
        $this->load->view("cetakPrint",$array);//mengirimkan data ke view catak print
    }

    public function deleteAll()
    {
        $this->load->model("input_model");
        $this->input_model->delete();
        redirect('Datatabel/hasil');
    }      

    public function detailHasil($npm)
    {
        $this->load->model("input_model");
        $data['dataHasil'] = $this->input_model->detailHasil($npm);//mendapatkan hasil jawaban dari satu npm
        $data['kat1'] = null;
        $data['kat2'] = null;
        $data['kat3'] = null;
        $data['kat4'] = null;
        $data['kat5'] = null;
        for ($i=0; $i <count($data['dataHasil']) ; $i++) { 
           if ($data['dataHasil'][$i]['id_kategori'] == 1) {
               $data['kat1'][] = $data['dataHasil'][$i];
           }
        }

        for ($i=0; $i <count($data['dataHasil']) ; $i++) { 
           if ($data['dataHasil'][$i]['id_kategori'] == 2) {
               $data['kat2'][] = $data['dataHasil'][$i];
           }
        }

        for ($i=0; $i <count($data['dataHasil']) ; $i++) { 
           if ($data['dataHasil'][$i]['id_kategori'] == 3) {
               $data['kat3'][] = $data['dataHasil'][$i];
           }
        }

        for ($i=0; $i <count($data['dataHasil']) ; $i++) { 
           if ($data['dataHasil'][$i]['id_kategori'] == 4) {
               $data['kat4'][] = $data['dataHasil'][$i];
           }
        }

        for ($i=0; $i <count($data['dataHasil']) ; $i++) { 
           if ($data['dataHasil'][$i]['id_kategori'] == 5) {
               $data['kat5'][] = $data['dataHasil'][$i];
           }
        }
        $this->load->view("detailHasil", $data);//mengirimkan data jawaban disetiap kategori ke view
    }

    public function grafikKategori()
    {
        $this->load->model("input_model");
        $data["jumper"] =  $this->input_model->count('pertanyaan');//menghitung jumlah pertanyaan
        $data['pertanyaan'] =  $this->input_model->datatable('pertanyaan')->result_array();//mendapatkan data pertanyaan
        for ($i=0; $i <$data['jumper']; $i++) { 
            $id_pertanyaan[] = $data["pertanyaan"][$i]['id_pertanyaan'];//id_pertanyaan
        }
        $jbw = ['Sangat Puas', 'Puas', 'Cukup Puas', 'Tidak Puas', 'Sangat Tidak Puas'];
        for ($i=0; $i <$data['jumper']; $i++) { 
            for ($wb=0; $wb <5; $wb++) { 
                $dataa[$i][$wb] =  $this->input_model->getnilai($jbw[$wb], $id_pertanyaan[$i])->result_array();//mencari jumlah jawaban di semua pertanyaan
            }
        }
        for ($i=0; $i <3 ; $i++) { 
            $c[$i] = [$dataa[$i][0][0]['hasil'], $dataa[$i][1][0]['hasil'], $dataa[$i][2][0]['hasil'], $dataa[$i][3][0]['hasil'], $dataa[$i][4][0]['hasil']];//membuat aary jumlah jawaban di semua pertanyaan
        }
        for ($i=0; $i <3; $i++) { 
            $data['hasil'][$i] = $c[$i];
        }
        $this->load->view("grafikKategori", $data);//mengirikan hasilnya ke iew grafikkategori
    }

}