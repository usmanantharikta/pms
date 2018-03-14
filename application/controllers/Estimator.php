<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estimator extends CI_Controller {
  /**
   * This controller use for access to application like
   * view login
   */

  public function __construct()
  {
    parent::__construct();
    $this->load->model('general_model');
    // $this->load->model('marketing_model');
  }

  public function  list_dkp()
  {
    $this->load->view('estimator/e_list_dkp_input_bp');
  }

  //get dkp approval
  public function get_dkp_approval()
  {
    $sql="SELECT d.id_dkp, d.no_sppr, d.create_date, s.customer, s.order_date, s.delivery_date, ss.name_project, ss.quantity, ss.satuan, d.status, c.name_customer FROM dkp_master d
    join sppr_master s on d.sppr_id=s.id_sppr
    join customer_name c on c.id_customer=s.customer
    JOIN sppr_spesification ss on ss.sppr_id=s.id_sppr
    where d.status='approved'";
    $data=$this->general_model->select($sql);
    $table=array();
    foreach ($data as $key) {
      $button='<a class="btn btn-sm btn-primary" title="create" onclick=approve_dkp("'.$key['id_dkp'].'")><i class="fa fa-check"></i> Approve</a>';
      // if($_SESSION['level']!='kabag'){
      //   $button='';
      // }
      array_push($table, array(
        '<a class="btn btn-sm btn-info" title="create" href="'.site_url().'estimator/approve_dkp?sppr='.$key['no_sppr'].'&id_dkp='.$key['id_dkp'].'&status='.$key['status'].'" target="_blank" >'.$key['id_dkp'].'</a>',
        $key['no_sppr'],
        $key['name_customer'],
        $key['order_date'],
        $key['delivery_date'],
        $key['name_project'].' - '.$key['quantity'].' '.$key['satuan'],
        $key['status'],
        // '<span class="label label-sm label-info">'.$key['status'].'</span>',
        '<a class="btn btn-sm btn-info" title="create" href="'.site_url().'estimator/approve_dkp?sppr='.$key['no_sppr'].'&id_dkp='.$key['id_dkp'].'&status='.$key['status'].'" target="_blank" ><i class="fa fa-pencil"></i>Edit</a>',
      ));
    }
    echo json_encode(array('data'=>$table));
  }

  public function approve_dkp()
  {
    // $sql="SELECT no_sppr FROM `sppr_master` order by no_sppr asc";
    // $no_sppr_all=$this->general_model->select($sql);
    $id_dkp=$this->input->get('id_dkp');
    // //var_dump($no_sppr_all);
    // $no_sppr=$this->input->get('sppr');
    // $data['no_sppr_all']=$no_sppr_all;
    // $data['no_sppr']=$no_sppr;
    // $data['id_dkp']=$id_dkp;
    //
    $dir = 'uploads/dkp/'.$id_dkp;

    if(is_dir($dir)){
      $files=scandir($dir);
    }else{
      $files='';
    }
    $data['files']=$files;
    //
    // $this->load->view('engineering/view_dkp', $data);
    $sql="SELECT no_sppr FROM `sppr_master` where status!='cancel' order by no_sppr asc ";
    $no_sppr_all=$this->general_model->select($sql);
    $id_dkp=$this->input->get('id_dkp');
    //var_dump($no_sppr_all);
    $no_sppr=$this->input->get('sppr');
    $data['no_sppr_all']=$no_sppr_all;
    $data['no_sppr']=$no_sppr;
    $data['id_dkp']=$id_dkp;

    if($id_dkp!=''){
      $last_material=$this->general_model->select_row("SELECT * FROM `dkp_material` WHERE dkp_id='$id_dkp' ORDER BY `id_material` DESC LIMIT 1");
      if(count($last_material)>0){
        $id_last_mat=$last_material['material_no'];
        $last_material_array=explode("-", $id_last_mat);
        $now_id_material=intval($last_material_array[2])+1;
        // var_dump($now_id_material);
        // exit;
        $data['id_material_counter']=$now_id_material;
      }else {
        $data['id_material_counter']=1;
      }
    }else{
      $data['id_material_counter']=1;
    }
    $data['status_prog']=$this->input->get('status');
    $this->load->view('estimator/es_form_edit_dkp', $data);
  }

  public function get_materal($id_dkp){
    $sql="SELECT * FROM dkp_material m
    join dkp_group g on g.id=m.group_id
    join dkp_main_group mg on mg.id=g.level1
    WHERE m.dkp_id=$id_dkp order by g.level1 DESC";
    $data=$this->general_model->select($sql);
    $table=array();
    $type="'dkp_material'";
    $colom="'id_material'";
    // $st="<span class='label label-md succes'>".$key['status_material']."</span>";
    foreach ($data as $key) {
      if($key['status_material']=='open'){
          $st='<span class="label label-sm label-success">'.$key['status_material'].'</span>';
          $button='<a class="btn btn-sm btn-success" title="create" onclick="edit_item('.$key['id_material'].','.$colom.','.$type.')"><i class="glyphicon glyphicon-pencil"></i>Edit</a>
          <a class="btn btn-sm btn-warning" title="create" onclick="cancel_item('.$key['id_material'].','.$colom.','.$type.')"><i class="glyphicon glyphicon-stop"></i>Cancel</a>';
      }else{
          $st='<span class="label label-sm label-warning">'.$key['status_material'].'</span>';
          $button='';
      }
      array_push($table, array(
        $button,
        $key['id_material'],
        $key['material_no'],
        $key['name'],
        $key['level2'],
        $key['material_dec'],
        $key['material_name'],
        $key['qty'],
        $key['unit'],
        $key['weight'],
        $key['remarks'],
        $key['basic_price'],
        $key['tot_basic_price'],
        $st,
        $key['create_by'],
        $key['update_by'],
        // $key['status_material']
      ));
    }
    echo json_encode(array('data'=>$table));
  }

  //save edit
  public function edit_material()
  {
    $id_material=$this->input->post('id_material');
    $col=array('material_name', 'material_no', 'material_dec', 'unit', 'qty', 'weight', 'group_id', 'remarks', 'basic_price', 'tot_basic_price');
    $data=array('dkp_id'=>$this->input->post('id_dkp'));
    for ($i=0; $i <count($col) ; $i++) {
      $dump=array($col[$i]=>$this->input->post($col[$i]));
      $data=array_merge($data, $dump);
    }
    $create=array('update_by_bp'=>$_SESSION['nik'], 'update_date_bp'=>date('Y-m-d'));
    $data=array_merge($data, $create);
    $update=$this->general_model->update('dkp_material', $data, array('id_material'=>$id_material));
    echo json_encode(array('status'=>TRUE, 'id'=>$update));
  }

}
