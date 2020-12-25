<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Bajuadat_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */
use GuzzleHttp\Client;
class Bajuadat_model extends CI_Model {
    private $_client;

    public function __construct()
  {
    $this->_client = new Client([
      'base_uri' =>'http://localhost:8080/bajuadat/index.php/'
        
    ]);
  }
  
  public function getAllBajuadat()
  {
    $response = $this->_client->request('GET','Baju_adat',[
        'query' =>[
            'X-API-KEY' => '112233'
          ]
    ]);

    $result = json_decode($response->getBody()->getContents(), true);
    return $result['data'];
    //   return $this->db->get('katalog_baju')->result_array();
  }

  public function tambahDataBajuadat()
  {
      $data = [
          "nama" => $this->input->post('nama', true),
          "daerah" => $this->input->post('daerah', true),
          "stok" => $this->input->post('stok', true),
          "harga" => $this->input->post('harga', true), 
          'X-API-KEY' => '112233'
      ];

      $response = $this->_client->request('POST','Baju_adat',[
        'form_params' => $data
      ]);
    //   $this->db->insert('katalog_baju', $data);
  }

  public function hapusDataBajuadat($id)
  {
    $response = $this->_client->request('DELETE','Baju_adat',[
        'form_params' =>[
          'X-API-KEY' => '112233',
          'id' => $id
        ]
      ]);
  
      $result = json_decode($response->getBody()->getContents(), true);
      return $result;
  
      // $this->db->where('id', $id);
    //   $this->db->delete('katalog_baju', ['id' => $id]);
  }

  public function getBajuadatById($id)
  {
      return $this->db->get_where('katalog_baju', ['id' => $id])->row_array();
  }

  public function ubahDataBajuadat()
  {
      $data = [
          "nama" => $this->input->post('nama', true),
          "daerah" => $this->input->post('daerah', true),
          "stok" => $this->input->post('stok', true),
          "harga" => $this->input->post('harga', true), 
          "id" => $this->input->post('id', true), 
          'X-API-KEY' => '112233'
      ];

      $response = $this->_client->request('PUT','Baju_adat',[
        'form_params' => $data
      ]);

      $result = json_decode($response->getBody()->getContents(), true);
      return $result;

    //   $this->db->where('id', $this->input->post('id'));
    //   $this->db->update('katalog_baju', $data);
  }
}

/* End of file Bajuadat_model.php */
/* Location: ./application/models/Bajuadat_model.php */