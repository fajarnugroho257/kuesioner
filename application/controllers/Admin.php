<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {


    public function index()
    {
        if ($this->session->userdata('username') != '') {
            $this->load->model("input_model");
            $jumProdi = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21'];
            $jumFakultas = ['1', '2', '3', '4', '5', '6', '7'];
            $id_kategori = ['1', '2', '3', '4', '5'];
            for ($i = 0; $i < 21; $i++) {
                $mhs = $jumProdi[$i];
                $data['hslProdi'][$i] = $this->input_model->hitungProdi($mhs); //menghitung jumlah data mahasiswa setiap prodi
            }
            for ($i = 0; $i < 7; $i++) {
                $mhs = $jumFakultas[$i];
                $data['hslFakultas'][$i] = $this->input_model->hitungFakultas($mhs); //menghitung jumlah data mahasiswa setiap fakultas
            }
            $data['prodi'] =  $this->input_model->datatable('prodi')->result_array(); //menampilkan data prodi
            $data['pertanyaan'] =  $this->input_model->datatable('prodi')->result_array(); //menampilkan data pertanyaan
            $data['fakultas'] =  $this->input_model->datatable('fakultas')->result_array(); //menampilkan data fakultas
            $data['kategori'] =  $this->input_model->datatable('kategori')->result_array(); //menampilkan data kategori

            $this->load->model("input_model");
            $data["jumper"] =  $this->input_model->count('pertanyaan');//menghitung jumlah data pertanyaan
            $mahasiswa =  $this->input_model->count('mahasiswa'); //menghitung jumlah mahasiswa
            $data['pertanyaan'] =  $this->input_model->datatable('pertanyaan')->result_array();
            for ($i=0; $i <$data['jumper']; $i++) { 
            $id_pertanyaan[] = $data["pertanyaan"][$i]['id_pertanyaan'];//mencari id_pertanyaan
            }
            $jbw = ['Sangat Puas', 'Puas', 'Cukup Puas', 'Tidak Puas', 'Sangat Tidak Puas'];//jawaban
            for ($i=0; $i <$data['jumper']; $i++) { 
                for ($wb=0; $wb <5; $wb++) { 
                    $dataa[$i][$wb] =  $this->input_model->getnilai($jbw[$wb], $id_pertanyaan[$i])->result_array();//menghitung jumlah jawaban berdasarkan class jawaban setiap pertanyaan
                }
            }
            for ($i=0; $i <$data["jumper"] ; $i++) { 
                $c[$i] = [$dataa[$i][0][0]['hasil'], $dataa[$i][1][0]['hasil'], $dataa[$i][2][0]['hasil'], $dataa[$i][3][0]['hasil'], $dataa[$i][4][0]['hasil']];//membuat array jumlah jawaban disemua pertanyaan yang ada
            }

            for ($i=0; $i <$data["jumper"]; $i++) { 
                $data['hasil'][$i] = $c[$i];//mengirimkan data hasil jumlah jawaban disemua pertanyaan yang ada ke view dashboard
            }

            $kate = ['1', '2', '3', '4', '5' ];
            for ($is=0; $is <5; $is++) { 
                for ($wb=0; $wb <5; $wb++) { 
                $data['perkategori'][$is][]=  $this->input_model->grafikKategori($kate[$wb], $jbw[$is])->result_array();//mencari jumlah jawaban per kategori
              }
            }
            for ($z=0; $z <5 ; $z++) { 
                $data['gori'][] = [$data['perkategori'][$z][0][0]['hasil'], $data['perkategori'][$z][1][0]['hasil'], $data['perkategori'][$z][2][0]['hasil'], $data['perkategori'][$z][3][0]['hasil'], $data['perkategori'][$z][4][0]['hasil']];//mengirimkan data jumlah jawaban per kategori ke view 
            }
            for ($kp=0; $kp <5 ; $kp++) { 
                $jumlah_pertanyaan[]=  $this->input_model->countPertanyaanKategori('pertanyaan', $id_kategori[$kp]);//mencari jumlah pertanyaan setiap kategori
                $hitung[] =  $this->input_model->h($kate[$kp])->result_array();//mencari hasil jawaban pertanyaan setiap kategori

                for ($l=0; $l <count($hitung[$kp]) ; $l++) { //merubah string ke angka
                    if ($hitung[$kp][$l]['jawaban'] == 'Sangat Puas') {
                        $v = '5';
                    }elseif ($hitung[$kp][$l]['jawaban'] == 'Puas') {
                        $v = '4';
                    }elseif ($hitung[$kp][$l]['jawaban'] == 'Cukup Puas') {
                        $v = '3';
                    }elseif ($hitung[$kp][$l]['jawaban'] == 'Tidak Puas') {
                        $v = '2';
                    }elseif ($hitung[$kp][$l]['jawaban'] == 'Sangat Tidak Puas') {
                        $v = '1';
                    }
                    array_push($hitung[$kp][$l], $v);
                }
                $SK[] = 5*$jumlah_pertanyaan[$kp]*$mahasiswa;//memasukkan hasil SK ke array SK
            }

            for ($aa=0; $aa <count($hitung[0]) ; $aa++) { 
                    $a[] = $hitung[0][$aa][0];
                }
            $SH[] = array_sum($a);
            for ($bb=0; $bb <count($hitung[1]) ; $bb++) { 
                    $b[] = $hitung[1][$bb][0];
                }
            $SH[] = array_sum($b);
            for ($cc=0; $cc <count($hitung[2]) ; $cc++) { 
                    $c[] = $hitung[2][$cc][0];
                }
            $SH[] = array_sum($c);
            for ($dd=0; $dd <count($hitung[3]) ; $dd++) { 
                    $d[] = $hitung[3][$dd][0];
                }
            $SH[] = array_sum($d);
            for ($ee=0; $ee <count($hitung[4]) ; $ee++) { 
                    $e[] = $hitung[4][$ee][0];
                }
            $SH[] = array_sum($e);//memasukkan hasil SH ke array SH

            for ($q=0; $q <5 ; $q++) { //menampilan penilaian dari hasil perhitungan
                $data['presentase'][] = $SH[$q]/$SK[$q]*100;
                if ($data['presentase'][$q] >=0 && $data['presentase'][$q] <=20) {
                    $data['minat'][] = "Sangat Tidak Puas";
                }elseif ($data['presentase'][$q] >=21 && $data['presentase'][$q] <=40) {
                    $data['minat'][] = "Tidak Puas";
                }elseif ($data['presentase'][$q] >=41 && $data['presentase'][$q] <=60) {
                    $data['minat'][] = "Cukup Puas";
                }elseif ($data['presentase'][$q] >=61 && $data['presentase'][$q] <=80) {
                    $data['minat'][] = "Puas";
                }elseif ($data['presentase'][$q] >=81 && $data['presentase'][$q] <=100) {
                    $data['minat'][] = "Sangat Puas";
                }
            }
        $this->load->view("admin", $data);
    } else {
        redirect(base_url() . 'Admin/login');
    }
}

function login()
{
    $this->load->view("login");
}


function login_validation()
{
    $this->load->library('form_validation');
    $this->form_validation->set_rules('username', "username", 'required');
    $this->form_validation->set_rules('password', "password", 'required');
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

function logout()
{
    $this->session->unset_userdata('username');
    redirect(base_url() . 'Admin/login');
}
}