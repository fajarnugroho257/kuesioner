<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Input extends CI_Controller {

    public function index()
    {
        $this->load->model("input_model");
        $data2["fetch_data2"] = $this->input_model->fetch_data2();
        $data2["kategori1"] = $this->input_model->dataPertanyaan('1')->result_array();
        $data2["kategori2"] = $this->input_model->dataPertanyaan('2')->result_array();
        $data2["kategori3"] = $this->input_model->dataPertanyaan('3')->result_array();
        $data2["kategori4"] = $this->input_model->dataPertanyaan('4')->result_array();
        $data2["kategori5"] = $this->input_model->dataPertanyaan('5')->result_array();
        $data2["kategori"] = $this->input_model->datatable('kategori')->result_array();
        $this->load->view("input",$data2);
    }

    public function form_validation(){
        $this->load->model("input_model");
        $count = $this->input_model->count('pertanyaan');
        $this->load->library('form_validation');
        
        for ($i=0; $i <$count ; $i++) { 
            $data["fetch_data2"] = $this->input_model->fetch_data2()->result_array();
            $data["essay"] = $this->input_model->fetch_data2()->result_array();
            $data2 = $data['fetch_data2'][$i]['id_pertanyaan'];

            $this->form_validation->set_rules("npm", "Npm", 'required');
            $this->form_validation->set_rules("nama", "Nama", 'required');
            // $this->form_validation->set_rules("fakultas", "Fakultas", 'required');
            // $this->form_validation->set_rules("prodi", "Prodi ", 'required');
            $this->form_validation->set_rules("hp", "Nomor HP", 'required');
            $this->form_validation->set_rules("jawaban".$data['fetch_data2'][$i]['id_pertanyaan'], "Jawaban ini ", 'required');
        }
        // $essay = $this->input_model->count('essay');
        // $data["essay"] = $this->input_model->datatable('essay')->result_array();
        // for ($i=0; $i <$essay; $i++) { 
        //     $this->form_validation->set_rules("jawabanessay".$data["essay"][$i]['id_essay'], "Jawaban essay ini ", 'required');
        // }
        if($this->form_validation->run())
        {
            $this->load->model("input_model");
            $getnpm = $this->input->post("npm");
            $pecah = explode(".", $getnpm);
            echo($pecah[1]);
            // die;
            // 0201
            $hnpm = $pecah[1];
            if ($hnpm == '0101') {
                $prodi = '1';
                $fakultas = '1';
            }elseif ($hnpm == '0102') {
                $prodi = '2';
                $fakultas = '1';
            }elseif ($hnpm == '0201') {
                $prodi = '3';
                $fakultas = '2';
            }elseif ($hnpm == '0301') {
                $prodi = '4';
                $fakultas = '3';
            }elseif ($hnpm == '0304') {
                $prodi = '5';
                $fakultas = '3';
            }elseif ($hnpm == '0305') {
                $prodi = '6';
                $fakultas = '3';
            }elseif ($hnpm == '0401') {
                $prodi = '7';
                $fakultas = '4';
            }elseif ($hnpm == '0404') {
                $prodi = '8';
                $fakultas = '4';
            }elseif ($hnpm == '0405') {
                $prodi = '9';
                $fakultas = '';
            }elseif ($hnpm == '0406') {
                $prodi = '10';
                $fakultas = '';
            }elseif ($hnpm == '0501') {
                $prodi = '11';
                $fakultas = '5';
            }elseif ($hnpm == '0502') {
                $prodi = '12';
                $fakultas = '5';
            }elseif ($hnpm == '0503') {
                $prodi = '13';
                $fakultas = '5';
            }elseif ($hnpm == '0504') {
                $prodi = '14';
                $fakultas = '5';
            }elseif ($hnpm == '0601') {
                $prodi = '16';
                $fakultas = '6';
            }elseif ($hnpm == '0602') {
                $prodi = '18';
                $fakultas = '6';
            }elseif ($hnpm == '0603') {
                $prodi = '15';
                $fakultas = '6';
            }elseif ($hnpm == '0604') {
                $prodi = '19';
                $fakultas = '6';
            }elseif ($hnpm == '0605') {
                $prodi = '17';
                $fakultas = '6';
            }elseif ($hnpm == '0801') {
                $prodi = '20';
                $fakultas = '7';
            }elseif ($hnpm == '0802') {
                $prodi = '21';
                $fakultas = '7';
            }
            $datamhs = array(
                "npm"       =>$this->input->post("npm"),
                "nama"       =>$this->input->post("nama"),
                "nomor_handphone"     =>$this->input->post("hp"),
                "id_prodi"        =>$prodi,
                "id_fakultas"        =>$fakultas,

            );

            $this->input_model->insert_data_mahasiswa($datamhs);
            for ($i=0; $i <$count ; $i++) { 
                $data["fetch_data2"] = $this->input_model->fetch_data2()->result_array();
                $data2 = $data['fetch_data2'][$i]['id_pertanyaan'];
                $datajawaban[$i] = array(
                    "id_pertanyaan"     =>$this->input->post("id_pertanyaan".$data['fetch_data2'][$i]['id_pertanyaan']),
                    "npm"       =>$this->input->post("npm"),
                    "jawaban"         =>$this->input->post("jawaban".$data['fetch_data2'][$i]['id_pertanyaan']),

                );
                $this->input_model->insert_data_jawaban('hasil', $datajawaban[$i]);
            }
            for ($i=0; $i <$essay ; $i++) { 
                $data["essay"] = $this->input_model->datatable('essay')->result_array();
                $datajawabanessay[$i] = array(
                    "npm"       =>$this->input->post("npm"),
                    "id_essay"     =>$this->input->post("id_essay".$data['essay'][$i]['id_essay']),
                    "jawaban"         =>$this->input->post("jawabanessay".$data['essay'][$i]['id_essay']),   
                );
                $this->input_model->insert_data_jawaban('jwb_essay', $datajawabanessay[$i]);
            }        
            redirect(base_url() . 'Input/Berhasil');
        }
        else
        {
            $this->index();
        }
    }

    public function inserted()
    {
        $this->index();
    }

    public function Berhasil()
    {
        $this->load->view("berhasil");
    }

    public function gethasil()
    {
        $this->load->model("input_model");
        $count = $this->input_model->count('hasil');
        for ($i=0; $i <$count ; $i++) { 
            $array = $this->input_model->hasil()->result_array();
            $hasil = 'jawaban';
            array_push($array[$i], $hasil);
            $data['n'][$i] = $array[$i];
            // echo "<pre>";print_r($array[$i]);
            // $result =  array_merge($array[0],$array[1],$array[2]);
            // $result = array_merge($array[$i]);
        }
        echo "<pre>";print_r($data['n']);      
        
        // die;
    }

    public function datahasil()
    {
        $this->load->model("input_model");
        $array['per'] = $this->input_model->count('pertanyaan');
        $array['npm'] = $this->input_model->getnpm()->result_array();
        $array['data'] = $this->input_model->hasil()->result_array();
        $c =count($array['npm']);
        for ($i=0; $i <$c ; $i++) { 
            $npm = $array['npm'][$i]['npm'];
            $array['n'][$i] = $this->input_model->getnpmwhere($npm)->result_array();
            // echo "<pre>";print_r($ar['z']);
        }
        // echo "<pre>";print_r($array['npm']);
        // die;
        $array['npm'] = $this->input_model->getnpm()->result_array();
        $this->load->view("hasil2", $array);   
    }


}