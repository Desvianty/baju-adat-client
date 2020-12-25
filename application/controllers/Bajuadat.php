<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Bajuadat
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Bajuadat extends CI_Controller
{
    
  public function __construct()
  {
      parent::__construct();
      $this->load->model('Bajuadat_model');
  }

  public function index()
  {
      $this->load->view('v_beranda');
  }
  public function data_bajuadat()
  {
      $data['bajuadat'] = $this->Bajuadat_model->getAllBajuadat();
      $this->load->view('v_databaju', $data);
  }
  public function tambah()
  {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('daerah','Daerah','required');
        $this->form_validation->set_rules('stok','Stok','required');
        $this->form_validation->set_rules('harga','Harga','required');
        if($this->form_validation->run()== false)
        {
          $this->load->view('v_tambah_baju');
        }
        else
        {
            $this->Bajuadat_model->tambahDataBajuadat();
            $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">
            Data Berhasil Ditambahkan
          </div>');
            redirect('Bajuadat/data_bajuadat');
        }
    }

    public function ubah($id)
    {
          $this->load->helper('form');
          $this->load->library('form_validation');
          $this->load->library('session');
  
          
          $data['bajuadat'] = $this->Bajuadat_model->getBajuadatById($id);

          $this->form_validation->set_rules('nama','Nama','required');
          $this->form_validation->set_rules('daerah','Daerah','required');
          $this->form_validation->set_rules('stok','Stok','required');
          $this->form_validation->set_rules('harga','Harga','required');
          
      if ($this->form_validation->run() == false) {
        $this->load->view('v_ubah_baju', $data);

    } else {
        $this->Bajuadat_model->ubahDataBajuadat();
        $this->session->set_flashdata('flash', 'Diubah');
        redirect('Bajuadat/data_bajuadat');
    }
      }

      public function hapus($id)
      {
          $this->load->library('session');
          $this->Bajuadat_model->hapusDataBajuadat($id);
          $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">
          Data Berhasil Dihapus
        </div>');
          redirect('Bajuadat/data_bajuadat');
      }
}


/* End of file Bajuadat.php */
/* Location: ./application/controllers/Bajuadat.php */