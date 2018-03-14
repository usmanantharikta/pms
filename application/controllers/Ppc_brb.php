<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * This class is use for all function on brb fiture
 */
class Ppc_brb extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('general_model');
    $this->load->library('excel');
  }

  // show view create BRB
  public function create_brb()
  {
    $sql="SELECT * FROM dkp_master d
    join sppr_master s on s.id_sppr=d.sppr_id
    where d.status='approved' and d.status_project='open' order by id_dkp asc";
    $no_sppr_all=$this->general_model->select($sql);
    // var_dump($no_sppr_all);
    // exit;
    $id_dkp=$this->input->get('id_dkp');
    if($id_dkp==''){
      $sql1="SELECT d.id_dkp, d.no_sppr, d.create_date, s.customer, s.order_date, s.delivery_date, ss.name_project, ss.quantity, ss.satuan, d.status FROM dkp_master d
      join sppr_master s on d.sppr_id=s.id_sppr
      JOIN sppr_spesification ss on ss.sppr_id=s.id_sppr
      WHERE d.status='approved' and d.status_project='approved' order by id_dkp asc";
      $dkp_all=$this->general_model->select($sql1);
    }
    else{
      $dkp_all=null;
    }
    //var_dump($no_sppr_all);
    $no_sppr=$this->input->get('sppr');
    $data['no_sppr_all']=$no_sppr_all;
    $data['no_sppr']=$no_sppr;
    $data['id_dkp']=$id_dkp;
    $data['id_dkp_all']=$dkp_all;
    $this->load->view('ppc/brb/create_brb', $data);
  }

  //get list materia
  public function get_material_by_dkp($id_dkp)
	{
		$sql="SELECT DISTINCT * FROM dkp_material m
		join dkp_group g on g.id=m.group_id
		join dkp_main_group mg on mg.id=g.level1
    join bpmb_material bm on bm.material_id=m.id_material
		WHERE m.dkp_id=$id_dkp and status_material!='open'
		order by g.level1 DESC";
		$data=$this->general_model->select($sql);
		$table=array();
		$type="'dkp_material'";
		$colom="'id_material'";
		foreach ($data as $key) {
			if($key['status_material']=='open'){
				$button='<a class="btn btn-sm btn-success" title="create" onclick="detail_item('.$key['id_material'].','.$colom.','.$type.')"><i class="fa fa-pencil"></i> Input Detail</a>'; //detail
			}else {
				$button='<a class="btn btn-sm btn-info" title="create" onclick="detail_item('.$key['id_material'].','.$colom.','.$type.')"><i class="fa fa-pencil"></i>Edit</a>'; //detail
				// $button='<a class="btn btn-sm btn-success" title="create" onclick="edit_item('.$key['id_material'].','.$colom.','.$type.')"><i class="fa fa-truck"></i> BPMB</a>
				// 			<a class="btn btn-sm btn-info" title="create" onclick="create_pr('.$key['id_material'].','.$colom.','.$type.')"><i class="fa fa-shopping-cart"></i> PR</a>'; //pr
			}
			array_push($table, array(
				'<td>
					<input type="checkbox" name="id_bpmb[]" class="checkboxes" value="'.$key['id_bpmb'].'"/>
				</td>',
				$key['bpmb_no'],
				$key['material_no'],
				$key['name'],
				$key['level2'],
				$key['material_dec'],
				$key['material_name'],
				// $key['qty'],
				$key['unit'],
				$key['weight'],
				$key['date_bth'],
				$key['qty_budget'],
				$key['qty_pr'],
				$key['qty_req_bpmb'],
				$key['qty_bpb'],
				// intval($key['qty_budget'])*intval($key['basic_price_budget']),
				//create mr dan pr
			));
	}
	echo json_encode(array('data'=>$table));
}

function build_brb()
{
  $id_bpmb=$this->input->post('id_bpmb');
  $table=array();
  for ($i=0; $i < count($id_bpmb) ; $i++) {
    array_push($table, $this->get_item_by_id($id_bpmb[$i]));
  }
  $material_no=$table[0][1];
  $material_no=explode('-',$material_no);
  $dkp=explode('-', $table[0][8]);
  echo json_encode(array('isinya'=>$id_bpmb, 'table'=>$table, 'material_no'=>$material_no, 'dkp'=>$dkp, 'brb_no'=>$this->get_last_id_brb()));
}

public function get_last_id_brb()
{
  $sql="SELECT id_brb_master FROM `brb_master` ORDER by id_brb_master DESC limit 1";
  $res=$this->general_model->select_row($sql);

  if(count($res)>0){
    $lastID=$res['id_brb_master'];
    $lastID=sprintf('%06d', intval($lastID)+1);
    return 'BRB'.$lastID;
  }else {
    return 'BRB000001';
  }
}

private function get_item_by_id($id)
{
  $sql="SELECT dm.*, m.id_dkp, m.dkp_no, bm.* FROM dkp_material dm
        join dkp_master m on m.id_dkp=dm.dkp_id
        join bpmb_material bm on bm.material_id=dm.id_material
         WHERE bm.id_bpmb='$id'";
  $key=$this->general_model->select_row($sql);
  // var_dump($key);
  // var_dump($result);
  $budget=intval($key['qty_budget']);
  $qty_pr=intval($key['qty_pr']);
  $qty_req_bpmb=intval($key['qty_req_bpmb']);
  $qty_bpmb=($budget-$qty_pr)-$qty_req_bpmb;
  $values=array(
        '<input name="material_id[]"  value="'.$key['id_material'].'">',
        $key['material_no'],
        $key['material_dec'],
        '<input name="name_dan_spec[]" class="form-control" value=""> <span class="help-block"></span>',
        $key['bpmb_no'].'<input type="hidden" name="bpmb_id[]"  value="'.$key['bpmb_no'].'">',
        '<input name="qty_brb[]" class="form-control" value=""> <span class="help-block"></span>',
        '<input name="unit[]" class="form-control" value=""> <span class="help-block"></span>',
        '<input name="reason[]" class="form-control" value=""> <span class="help-block"></span>',
        $key['id_dkp'].'-'.$key['dkp_no'],
      );
  return $values;
}

public function save_brb()
{
  $brb_no=$this->input->post('brb_no');
  $spbp_no=$this->input->post('spbp_no');
  $material_id=$this->input->post('material_id');
  $name_and_spec=$this->input->post('name_dan_spec');
  $bpmb_id=$this->input->post('bpmb_id');
  $qty_brb=$this->input->post('qty_brb');
  $unit=$this->input->post('unit');
  $reason=$this->input->post('reason');

  // var_dump($name_and_spec);

  $master=array(
    'brb_no'=>$brb_no,
    'spbp_no'=>$spbp_no,
    'create_date'=>$this->input->post('create_date'),
    'create_by'=>$_SESSION['nik'],
  );

  $id_master=$this->general_model->insert('brb_master', $master);
  $id_brb_save=array();
  if($id_master!=0){
    for ($i=0; $i < count($material_id) ; $i++) {
      $dump=array(
        'brb_master_id'=>$id_master,
        'material_id'=>$material_id[$i],
        'bpmb_id'=>$bpmb_id[$i],
        'name_and_spec'=>$name_and_spec[$i],
        'qty_brb'=>$qty_brb[$i],
        'unit_brb'=>$unit[$i],
        'reason'=>$reason[$i]
      );

      $insert=$this->general_model->insert('brb_material', $dump);
      array_push($id_brb_save, $dump);
    } //end for
  } //end if

  // return to view as json''
  echo json_encode(array('status'=>true, 'id'=>$id_brb_save));
}

public function save_brb_edited()
{
  $brb_no=$this->input->post('brb_no');
  $spbp_no=$this->input->post('spbp_no');
  $material_id=$this->input->post('material_id');
  $name_and_spec=$this->input->post('name_dan_spec');
  $bpmb_id=$this->input->post('bpmb_id');
  $qty_brb=$this->input->post('qty_brb');
  $unit=$this->input->post('unit');
  $reason=$this->input->post('reason');
  $id_brb_detail=$this->input->post('id_brb_detail');
  $brb_master_id=$this->input->post('brb_master_id');

  // var_dump($name_and_spec);

  // $master=array(
  //   'brb_no'=>$brb_no,
  //   'spbp_no'=>$spbp_no,
  //   'create_date'=>$this->input->post('create_date'),
  //   'create_by'=>$_SESSION['nik'],
  // );

  // $id_master=$this->general_model->insert('brb_master', $master);
  $id_brb_save=array();
    for ($i=0; $i < count($material_id) ; $i++) {
      $dump=array(
        'brb_master_id'=>$brb_master_id[$i],
        'material_id'=>$material_id[$i],
        'bpmb_id'=>$bpmb_id[$i],
        'name_and_spec'=>$name_and_spec[$i],
        'qty_brb'=>$qty_brb[$i],
        'unit_brb'=>$unit[$i],
        'reason'=>$reason[$i]
      );

      $insert=$this->general_model->update('brb_material', $dump, array('id_brb_detail'=>$id_brb_detail[$i]));
      array_push($id_brb_save, $dump);
    } //end for

  // return to view as json''
  echo json_encode(array('status'=>true, 'id'=>$id_brb_save));
}

public function get_brb_approval()
{
  $sql="SELECT * FROM brb_master bm
        -- join brb_master m on m.id_brb_master=bm.brb_master_id
        where status_brb!='approved'";

  $result=$this->general_model->select($sql);
  // var_dump($result);
  $table=array();
  foreach ($result as $key) {
    $id_brb_master=$key['id_brb_master'];
    if($key['status_brb']=='open'){
      $stat='<span class="label label-sm label-info">Open</span>';
      $button='<a class="btn btn-sm btn-warning" title="Cancel" onclick="cancel('.$id_brb_master.')"><i class="glyphicon glyphicon-stop"></i> Cancel</a>
      <a class="btn btn-sm btn-warning" title="Cancel" onclick="edit_bpmb('.$id_brb_master.')"><i class="glyphicon glyphicon-stop"></i> Edit</a>';
      if($_SESSION['level']=='kabag')
      {
        $button1='<a class="btn btn-sm btn-success" title="Cancel" onclick="approve('.$id_brb_master.')"><i class="glyphicon glyphicon-pencil"></i> Approve</a>';
      }else {
        $button1='';
      }
    }
    elseif ($key['status_brb']=='approved') {
      $stat='<span class="label label-sm label-success">Approved</span>';
      $button1='';
      $button='';
    }
    else{
      $stat='<span class="label label-sm label-danger">Cancel</span>';
      $button='';
      if($_SESSION['level']=='kabag')
      {
        $button1='';
      }else{
        $button1='';
      }
    }

    array_push($table, array(
      $key['id_brb_master'],
      '<a onclick="show_brb('.$id_brb_master.')">'.$key['brb_no'].'</a>',
      $key['spbp_no'],
      $key['create_date'],
      $key['create_by'],
      $stat,
      $button.' '.$button1
    ));
  }

  echo json_encode(array('table'=>$table));
}

public function cancel_brb($id_brb_master)
{
  $update=$this->general_model->update('brb_master', array('status_brb'=>'cancel', 'approve_date'=>date('Y-m-d'), 'approve_by'=>$_SESSION['nik']), array('id_brb_master'=>$id_brb_master));
  echo json_encode(array('status'=>true, 'update'=>$update));
}

public function approve_brb($id_brb_master)
{
  $update=$this->general_model->update('brb_master', array('status_brb'=>'approved', 'approve_date'=>date('Y-m-d'), 'approve_by'=>$_SESSION['nik']), array('id_brb_master'=>$id_brb_master));
  echo json_encode(array('status'=>true, 'update'=>$update));
}

public function get_brb_approved()
{
  $sql="SELECT * FROM brb_master bm
        -- join brb_master m on m.id_brb_master=bm.brb_master_id
        where status_brb='approved'";

  $result=$this->general_model->select($sql);

  $table=array();

  foreach ($result as $key) {
    $id_brb_master=$key['id_brb_master'];
    if($key['status_brb']=='open'){
      $stat='<span class="label label-sm label-info">Open</span>';
      $button='<a class="btn btn-sm btn-warning" title="Cancel" onclick="cancel('.$id_brb_master.')"><i class="glyphicon glyphicon-stop"></i> Cancel</a>
      <a class="btn btn-sm btn-warning" title="Cancel" onclick="edit_bpmb('.$id_brb_master.')"><i class="glyphicon glyphicon-stop"></i> Edit</a>';
      if($_SESSION['level']=='kabag')
      {
        $button1='<a class="btn btn-sm btn-success" title="Cancel" onclick="approve('.$id_brb_master.')"><i class="glyphicon glyphicon-pencil"></i> Approve</a>';
      }else {
        $button1='';
      }
    }
    elseif ($key['status_brb']=='approved') {
      $stat='<span class="label label-sm label-success">Approved</span>';
      $button1='';
      $button='';
    }
    else{
      $stat='<span class="label label-sm label-danger">Cancel</span>';
      $button='';
      if($_SESSION['level']=='kabag')
      {
        $button1='';
      }else{
        $button1='';
      }
    }

    array_push($table, array(
      $key['id_brb_master'],
      '<a onclick="show_brb('.$id_brb_master.')">'.$key['brb_no'].'</a>',
      $key['spbp_no'],
      $key['create_date'],
      $key['create_by'],
      $stat,
      $key['approve_by'],
      $key['approve_date'],
      $button.' '.$button1
    ));
  }
  echo json_encode(array('table'=>$table));
}

public function list_brb()
{
  $this->load->view('ppc/brb/list_brb');
}

public function list_brb_approved()
{
  $this->load->view('ppc/brb/list_brb_approved');
}

public function get_brb_by_id($id)
{
  $sql="SELECT dm.*, m.id_dkp, m.dkp_no, mat.*, mas.*, ss.*, cn.* FROM dkp_material dm
        join dkp_master m on m.id_dkp=dm.dkp_id
        -- join bpmb_material bm on bm.material_id=dm.id_material
        join sppr_master s on s.no_sppr=m.no_sppr
        join customer_name cn on cn.id_customer=s.customer
        join sppr_spesification ss on ss.sppr_id=s.id_sppr
        join brb_material mat on mat.material_id=dm.id_material
        join brb_master mas on mas.id_brb_master=mat.brb_master_id
       WHERE mat.brb_master_id='$id'";
  $result=$this->general_model->select($sql);
  // var_dump($result);
  $table=array();
  foreach ($result as $key) {
    array_push($table, array(
      '<input name="material_id[]"  value="'.$key['id_material'].'"> <input name="id_brb_detail[]"  value="'.$key['id_brb_detail'].'"> <input name="brb_master_id[]"  value="'.$key['brb_master_id'].'">',
      $key['material_no'],
      $key['material_dec'],
      '<input name="name_dan_spec[]" class="form-control" value="'.$key['name_and_spec'].'"> <span class="help-block"></span>',
      $key['bpmb_id'].'<input type="hidden" name="bpmb_id[]"  value="'.$key['bpmb_id'].'">',
      '<input name="qty_brb[]" class="form-control" value="'.$key['qty_brb'].'"> <span class="help-block"></span>',
      '<input name="unit[]" class="form-control" value="'.$key['unit'].'"> <span class="help-block"></span>',
      '<input name="reason[]" class="form-control" value="'.$key['reason'].'"> <span class="help-block"></span>',
      $key['id_dkp'].'-'.$key['dkp_no'],
    ));
  }

  $material_no=$table[0][1];
  $material_no=explode('-',$material_no);
  $dkp=explode('-', $table[0][8]);
  echo json_encode(array('detail'=>array($result[0]['brb_no'],$result[0]['spbp_no'], $result[0]['create_date'], $result[0]['status_brb'], $result[0]['id_brb_master']), 'customer'=>$result[0]['name_customer'],'title'=>$result[0]['name_project'].'-'.$result[0]['quantity'].'-'.$result[0]['unit'], 'isinya'=>$id, 'table'=>$table, 'material_no'=>$material_no, 'dkp'=>$dkp));
}


}
