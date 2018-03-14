<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppc extends CI_Controller {

	/**
	 * This controller use for access to application like
	 * view login
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('general_model');
		$this->load->library('excel');
		// $this->load->model('marketing_model');
	}

	public function index()
	{
		$this->load->view('ppc/home');
	}

	public function list_dkp()
	{
		$this->load->view('ppc/ppc_list_dkp');
	}

	public function list_bpmb_approval()
	{
		$sql1="SELECT d.id_dkp, d.no_sppr, d.create_date, s.customer, s.order_date, s.delivery_date, ss.name_project, ss.quantity, ss.satuan, d.status FROM dkp_master d
		join sppr_master s on d.sppr_id=s.id_sppr
		JOIN sppr_spesification ss on ss.sppr_id=s.id_sppr
		WHERE d.status='approved' and d.status_project='approved' order by id_dkp asc";
		$dkp_all=$this->general_model->select($sql1);

		$sql="SELECT * FROM sppr_master";
		$no_sppr_all=$this->general_model->select($sql);


		$data['id_dkp_all']=$dkp_all;
		$data['sppr']=$no_sppr_all;
		$this->load->view('ppc/ppc_list_bpmb', $data);
	}

	public function list_pr()
	{
		$sql1="SELECT d.id_dkp, d.no_sppr, d.create_date, s.customer, s.order_date, s.delivery_date, ss.name_project, ss.quantity, ss.satuan, d.status FROM dkp_master d
		join sppr_master s on d.sppr_id=s.id_sppr
		JOIN sppr_spesification ss on ss.sppr_id=s.id_sppr
		WHERE d.status='approved' and d.status_project='approved' order by id_dkp asc";
		$dkp_all=$this->general_model->select($sql1);

		$sql="SELECT * FROM sppr_master";
		$no_sppr_all=$this->general_model->select($sql);


		$data['id_dkp_all']=$dkp_all;
		$data['sppr']=$no_sppr_all;
		$this->load->view('ppc/ppc_list_pr', $data);
	}

	public function list_bpmb_approved()
	{
		$sql1="SELECT d.id_dkp, d.no_sppr, d.create_date, s.customer, s.order_date, s.delivery_date, ss.name_project, ss.quantity, ss.satuan, d.status FROM dkp_master d
		join sppr_master s on d.sppr_id=s.id_sppr
		JOIN sppr_spesification ss on ss.sppr_id=s.id_sppr
		WHERE d.status='approved' and d.status_project='approved' order by id_dkp asc";
		$dkp_all=$this->general_model->select($sql1);

		$sql="SELECT * FROM sppr_master";
		$no_sppr_all=$this->general_model->select($sql);


		$data['id_dkp_all']=$dkp_all;
		$data['sppr']=$no_sppr_all;
		$this->load->view('ppc/ppc_list_bpmb_approved', $data);
	}

	public function list_pr_approved()
	{
		$sql1="SELECT d.id_dkp, d.no_sppr, d.create_date, s.customer, s.order_date, s.delivery_date, ss.name_project, ss.quantity, ss.satuan, d.status FROM dkp_master d
		join sppr_master s on d.sppr_id=s.id_sppr
		JOIN sppr_spesification ss on ss.sppr_id=s.id_sppr
		WHERE d.status='approved' and d.status_project='approved' order by id_dkp asc";
		$dkp_all=$this->general_model->select($sql1);

		$sql="SELECT * FROM sppr_master";
		$no_sppr_all=$this->general_model->select($sql);


		$data['id_dkp_all']=$dkp_all;
		$data['sppr']=$no_sppr_all;
		$this->load->view('ppc/list_pr_approved', $data);
	}

	//get dkp for page list_dkp
	public function get_dkp()
	{
		$sql="SELECT d.id_dkp, d.no_sppr, d.create_date, s.customer, s.order_date, s.delivery_date, ss.name_project, ss.quantity, ss.satuan, d.status, c.name_customer FROM dkp_master d
		join sppr_master s on d.sppr_id=s.id_sppr
		join customer_name c on c.id_customer=s.customer
		JOIN sppr_spesification ss on ss.sppr_id=s.id_sppr
		WHERE d.status='approved' and d.status_project='approved'";
		$data=$this->general_model->select($sql);
		$table=array();
		foreach ($data as $key) {
			$button='<a class="btn btn-sm btn-primary" title="create" href="'.site_url().'ppc/edit_dkp?sppr='.$key['no_sppr'].'&id_dkp='.$key['id_dkp'].'" target="_blank"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
			// if($_SESSION['level']!='kabag'){
			// 	$button='';
			// }
			array_push($table, array(
				'<a class="btn btn-sm btn-info" title="create" href="'.site_url().'ppc/edit_dkp?sppr='.$key['no_sppr'].'&id_dkp='.$key['id_dkp'].'&status='.$key['status'].'" target="_blank" >'.$key['id_dkp'].'</a>',
				$key['no_sppr'],
				$key['name_customer'],
				$key['order_date'],
				$key['delivery_date'],
				$key['name_project'].' - '.$key['quantity'].' '.$key['satuan'],
				// $key['status'],
				$button,
			));
		}
		echo json_encode(array('data'=>$table));
	}

	//view edit dkp
	public function edit_dkp()
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
		$this->load->view('ppc/form_edit_dkp',$data);
	}

	//view crete bpmb_material
	public function create_bpmb()
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
		$this->load->view('ppc/ppc_create_bpmb',$data);
	}

	//view create pr material_id
	public function create_pr()
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
		$this->load->view('ppc/ppc_create_pr',$data);
	}


	public function get_materal($id_dkp){
	$sql="SELECT * FROM dkp_material m
	join dkp_group g on g.id=m.group_id
	join dkp_main_group mg on mg.id=g.level1
	WHERE m.dkp_id=$id_dkp and m.status_material!='cancel' order by g.level1 DESC";
	$data=$this->general_model->select($sql);
	$table=array();
	$type="'dkp_material'";
	$colom="'id_material'";
	foreach ($data as $key) {

		$qty_bud=$key['qty_budget'];
		$qty_req_bpmb=$key['qty_req_bpmb'];
		$qty_req_pr=$key['qty_req_pr'];

		$sisa=floatval($qty_req_bpmb)+floatval($qty_req_pr);

		if($key['status_material']=='open'){
			$button='<a class="btn btn-sm btn-success" title="create" onclick="detail_item('.$key['id_material'].','.$colom.','.$type.')"><i class="fa fa-pencil"></i> Input Detail</a>'; //detail
		}elseif($key['status_material']=='progress') {
			$button='<a class="btn btn-sm btn-info" title="create" onclick="detail_item('.$key['id_material'].','.$colom.','.$type.')"><i class="fa fa-pencil"></i> Edit</a>'; //detail
			// $button='<a class="btn btn-sm btn-success" title="create" onclick="edit_item('.$key['id_material'].','.$colom.','.$type.')"><i class="fa fa-truck"></i> BPMB</a>
			// 			<a class="btn btn-sm btn-info" title="create" onclick="create_pr('.$key['id_material'].','.$colom.','.$type.')"><i class="fa fa-shopping-cart"></i> PR</a>'; //pr
		}

		if(floatval($qty_bud)<=$sisa){
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
			// $key['qty'],
			$key['unit'],
			$key['weight'],
			$key['date_bth'],
			$key['qty_budget'],
			$key['qty_pr'],
			floatval($key['qty_budget'])-floatval($key['qty_req_bpmb']),
			floatval($key['qty_pr'])-floatval($key['qty_req_pr']),
			$key['qty_bpb'],
			// floatval($key['qty_budget'])*floatval($key['basic_price_budget']),
			//create mr dan pr
		));
	}

	echo json_encode(array('data'=>$table));
	}

	function build_bpmb()
	{
		$id_material=$this->input->post('id_mat');
		$table=array();
		for ($i=0; $i < count($id_material) ; $i++) {
			array_push($table, $this->get_item_by_id($id_material[$i]));
		}
		$material_no=$table[0][1];
		$material_no=explode('-',$material_no);
		$dkp=explode('-', $table[0][9]);
		echo json_encode(array('isinya'=>$id_material, 'table'=>$table, 'material_no'=>$material_no, 'dkp'=>$dkp, 'bpmb_no'=>$this->get_last_id_bpmb()));
	}

	function edit_bpmb()
	{
		$bpmb_no=$this->input->post('bpmb_no');

		$sql="SELECT md.*, dm.*, dd.*, cn.*, ss.*  FROM bpmb_material md
					join dkp_material dm on dm.id_material=md.material_id
					join dkp_master dd on dd.id_dkp=dm.dkp_id
					join sppr_master s on s.no_sppr=md.no_sppr_bpmb
					join customer_name cn on cn.id_customer=s.customer
					join sppr_spesification ss on ss.sppr_id=s.id_sppr
					where bpmb_no='$bpmb_no'";

		$result=$this->general_model->select($sql);

		$table=array();
		foreach ($result as $key ) {
			array_push($table,array(
				'<input name="id_nya[]"  value="'.$key['id_bpmb'].'"> <input name="material_id[]"  value="'.$key['id_material'].'">',
				$key['material_no'],
				$key['item'],
				$key['jenis_bahan'],
				$key['nama_bahan'],
				'<input name="'.$key['id_bpmb'].'" class="form-control" value="'.$key['qty_angka'].'"> <span class="help-block"></span>',
				$key['unit'],
				$key['date_bth'],
				$key['keterangan'],
				$key['id_dkp'].'-'.$key['dkp_no']
			));
		}
		$detail=array($result[0]['bpmb_no'],$result[0]['name_customer'], $result[0]['create_date']);
		$material_no=$table[0][1];
		$material_no=explode('-',$material_no);
		$dkp=explode('-', $table[0][9]);
		echo json_encode(array('detail'=>$detail, 'title'=>$result[0]['name_project'].'-'.$key['quantity'].'-'.$key['unit'],'table'=>$table, 'material_no'=>$material_no, 'dkp'=>$dkp));
	}

	private function get_item_by_id($id)
	{
		$colom=$this->input->post('colom');
		$table=$this->input->post('table');
		$sql="SELECT dm.*, m.id_dkp, m.dkp_no FROM dkp_material dm
					join dkp_master m on m.id_dkp=dm.dkp_id WHERE id_material='$id'";
		$key=$this->general_model->select_row($sql);
		// var_dump($result);
		$budget=floatval($key['qty_budget']);
		$qty_pr=floatval($key['qty_pr']);
		$qty_req_bpmb=floatval($key['qty_req_bpmb']);
		$qty_bpb=floatval($key['qty_bpb']);
		$qty_bpmb=($budget-$qty_pr+$qty_bpb)-$qty_req_bpmb;
		$values=array(
					'<input name="id_nya[]"  value="'.$key['id_material'].'">',
					$key['material_no'],
					$key['item'],
					$key['jenis_bahan'],
					$key['nama_bahan'],
					'<input name="'.$key['id_material'].'" class="form-control" value="'.$qty_bpmb.'"> <span class="help-block"></span>',
					$key['unit'],
					$key['date_bth'],
					$key['keterangan'],
					$key['id_dkp'].'-'.$key['dkp_no']
				);
		return $values;
	}



	public function save_bpmb_final()
	{
		$bpmb_no=$this->input->post('bpmb_no');
		$date_create=$this->input->post('create_date');
		$dkp_id=$this->input->post('dkp_id_bpmb');
		$no_sppr_bpmb=$this->input->post('no_sppr_bpmb');
		$nama=$this->input->post('id_nya');
		$all_data=array();

		//_validate
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		for ($i=0; $i <count($nama) ; $i++) {
			if($this->qty_bpmb_sisa($nama[$i]) < floatval($this->input->post($nama[$i])))
			{
				$data['inputerror'][] = $nama[$i];
				$data['error_string'][] ='Qty Max is '.$this->qty_bpmb_sisa($nama[$i]);
				$data['status'] = FALSE;
			}
		}

		if(count($this->general_model->select("select * from bpmb_master where bpmb_no='$bpmb_no'"))>0){
			$data['inputerror'][] = 'bpmb_no';
			$data['error_string'][] ='Duplicate BPMB NO';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
				echo json_encode($data);
				exit();
		}

		for ($i=0; $i <count($nama) ; $i++) {
			$data=array(
				'bpmb_no'=>$bpmb_no,
				'material_id'=>$nama[$i],
				'create_date'=>date('Y-m-d'),
				'no_sppr_bpmb'=>$no_sppr_bpmb,
				'dkp_id'=>$dkp_id,
				'create_by'=>$_SESSION['nik'],
				'qty_angka'=>$this->input->post($nama[$i]),
			);
			$insert=$this->general_model->insert('bpmb_material', $data);
			if($insert!=0){
				$this->general_model->update('dkp_material', array('qty_req_bpmb'=>$this->get_qty_req_bpmb($nama[$i])+floatval($this->input->post($nama[$i]))), array('id_material'=>$nama[$i]));
			}
			array_push($all_data, $insert);
		}

		if(count($all_data)>0){
			$this->general_model->insert('bpmb_master', array('bpmb_no'=>$bpmb_no));
		}
		echo json_encode(array('status'=>true, 'data'=>$all_data));
	}

	public function save_bpmb_edited()
	{
		$bpmb_no=$this->input->post('bpmb_no');
		$date_create=$this->input->post('create_date');
		$dkp_id=$this->input->post('dkp_id_bpmb');
		$no_sppr_bpmb=$this->input->post('no_sppr_bpmb');
		$nama=$this->input->post('material_id'); //material id
		$id_bpmb=$this->input->post('id_nya');
		// var_dump($nama);
		// var_dump($id_bpmb);
		$all_data=array();
		//_validate
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		for ($i=0; $i <count($nama) ; $i++) {
			$max=($this->get_qty_bpmb_by_id($id_bpmb[$i]))+($this->qty_bpmb_sisa($nama[$i]));
			// var_dump($max);
			if($max < floatval($this->input->post($id_bpmb[$i])))
			{
				$data['inputerror'][] = $id_bpmb[$i];
				$data['error_string'][] ='Qty Max is '.$max;
				$data['status'] = FALSE;
			}
		}

		if($data['status'] === FALSE)
		{
				echo json_encode($data);
				exit();
		}

		for ($i=0; $i <count($nama) ; $i++) {
			$data=array(
				'create_by'=>$_SESSION['nik'],
				'qty_angka'=>$this->input->post($id_bpmb[$i]),
			);
			$insert=$this->general_model->update('bpmb_material', $data, array('id_bpmb'=>$id_bpmb[$i]));
			// var_dump($insert);
			$total_bpmb=$this->get_qty_bpmb($nama[$i]);
			// var_dump($total_bpmb);
			// exit;
			if($insert!=0){
				$this->general_model->update('dkp_material', array('qty_req_bpmb'=>$total_bpmb), array('id_material'=>$nama[$i]));
			}

			array_push($all_data, $insert);
		}

		// if(count($all_data)>0){
		// 	$this->general_model->insert('bpmb_master', array('bpmb_no'=>$bpmb_no));
		// }
		echo json_encode(array('status'=>true, 'data'=>$all_data));
	}

	public function get_qty_bpmb($material_id){
		$sql="SELECT * FROM `bpmb_material` WHERE `material_id` = '$material_id'";
		$result=$this->general_model->select($sql);
		$sum=0;
		foreach ($result as $key) {
			$sum+=floatval($key['qty_angka']);
		}
		return $sum;
	}

	public function get_qty_bpmb_by_id($id_bpmb){
		$sql="SELECT * FROM `bpmb_material` WHERE `id_bpmb` = '$id_bpmb'";
		$result=$this->general_model->select($sql);
		$sum=0;
			$sum+=floatval($result[0]['qty_angka']);
		return $sum;
	}

	public function qty_bpmb_sisa($id_material)
	{
		$sql="SELECT qty_bpb, dkp_id, id_material, material_no, material_dec, qty_req_bpmb, material_name, qty_budget, unit, weight, remarks, qty_pr, jenis_bahan, item, nama_bahan, keterangan FROM dkp_material WHERE id_material='$id_material'";
		$key=$this->general_model->select_row($sql);
		// var_dump($result);
		$budget=floatval($key['qty_budget']);
		$qty_pr=floatval($key['qty_pr']);
		$qty_req_bpmb=floatval($key['qty_req_bpmb']);
		$qty_bpb=floatval($key['qty_bpb']);
		$qty_bpmb=($budget-$qty_pr+$qty_bpb)-$qty_req_bpmb;
		return $qty_bpmb;
	}



	public function get_qty_req_bpmb($id){
		$data=$this->general_model->select_row("SELECT * FROM `dkp_material` WHERE `id_material` = $id ORDER BY `status_material` DESC");
		// var_dump($data);
		// echo floatval($data['qty_req_bpmb']);
		return floatval($data['qty_req_bpmb']);
	}

	public function get_qty_req_pr($id){
		$data=$this->general_model->select_row("SELECT * FROM `dkp_material` WHERE `id_material` = $id ORDER BY `status_material` DESC");
		// var_dump($data);
		// echo floatval($data['qty_req_bpmb']);
		return floatval($data['qty_req_pr']);
	}



	public function get_material_progress($id_dkp)
	{
		$sql="SELECT * FROM dkp_material m
		join dkp_group g on g.id=m.group_id
		join dkp_main_group mg on mg.id=g.level1
		WHERE m.dkp_id=$id_dkp and m.status_material='progress'
		-- and (m.qty_budget-m.qty_pr)-m.qty_req_bpmb!=0
		and (m.qty_budget-m.qty_pr+m.qty_bpb)-m.qty_req_bpmb!=0
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
					<input type="checkbox" name="id_mat[]" class="checkboxes" value="'.$key['id_material'].'"/>
				</td>',
				$button,
				$key['id_material'],
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
				// floatval($key['qty_budget'])*floatval($key['basic_price_budget']),
				//create mr dan pr
			));
	}
	echo json_encode(array('data'=>$table));
}

	public function get_item()
	{
		$id=$this->input->post('id_item');
		$colom=$this->input->post('colom');
		$table=$this->input->post('table');
		$sql="SELECT dkp_id, id_material, material_dec, material_name, qty_budget, unit, weight, remarks, qty_bpmb, jenis_bahan, item, nama_bahan, qty_pr, keterangan, material_no, date_bth FROM $table WHERE $colom='$id'";
		$result=$this->general_model->select_row($sql);
		// var_dump($result);
		$values=array();
		if(count($result)>0){
			array_push($values, $result['id_material']);
			foreach ($result as $key => $value)  {
				array_push($values, $value);
			}
		}
		echo json_encode(array('material'=>$values));
	}

	public function save_bpmb()
	{
		$colom=array('dkp_id', 'material_id', 'unit', 'create_date', 'jenis_bahan', 'kode_bahan', 'item', 'nama_bahan', 'qty_angka', 'qty_huruf', 'remarks');
		$data=array('no_sppr_bpmb'=>$this->input->post('no_sppr_bpmb'));
		// echo $this->input->post('no_sppr_bpmb').'ddddd';
		// exit;
		for ($i=0; $i < count($colom); $i++) {
			// echo $colom[$i];
			$dump=array(
				$colom[$i]=>$this->input->post($colom[$i])
			);
			$data=array_merge($data, $dump);
		}
		$nik=array('create_by'=>$_SESSION['nik']);
		$data=array_merge($data, $nik);
		$insert=$this->general_model->insert('bpmb_material', $data);
		if($insert!=0){
			$id=$this->input->post('material_id');
			$query=$this->general_model->select_row("SELECT * FROM dkp_material where id_material=$id");
			$qty_req=$query['qty_requested'];
			$ins=$this->general_model->update('dkp_material', array('qty_requested'=>$qty_req+floatval($this->input->post('qty_angka'))), array('id_material'=>$id));

		}
		echo json_encode(array('status'=> true, 'id'=>$insert, 'nik'=>$_SESSION['nik']));

	}

	public function save_detail()
	{
		$id_material=$this->input->post('material_id');
		$colom=array('item', 'nama_bahan', 'qty_pr', 'keterangan', 'date_bth', 'satuan', 'kode_barang');
		$data=array('jenis_bahan'=>$this->input->post('jenis_bahan'));

		//get data from form to array
		for ($i=0; $i < count($colom); $i++) {
			$dump=array(
				$colom[$i]=>$this->input->post($colom[$i])
			);
			$data=array_merge($data, $dump);
		}
		$stat=array('status_material'=>'progress');
		$data=array_merge($data, $stat);
		$update=$this->general_model->update('dkp_material', $data, array('id_material'=>$id_material));
		echo json_encode(array('status'=> true, 'id'=>$update ));

	}

	//list_bpmb_approval
	public function filter_new($status)
	{
		if($status=='approved'){
			$where="where bm.status_bpmb='approved'";
		}else{
			$where="where bm.status_bpmb!='approved'";
		}
// 		SELECT bm.id_bpmb_master, bm.bpmb_no, bm.status_bpmb FROM bpmb_master bm
// join bpmb_material m on m.bpmb_no=bm.bpmb_no
// join sppr_master s on s.no_sppr=m.no_sppr_bpmb
// join customer_name c on c.id_customer=s.customer


	$sql="SELECT DISTINCT bm.id_bpmb_master, bm.bpmb_no, bm.status_bpmb, s.no_sppr, c.name_customer, m.dkp_id, m.create_date, ss.* FROM bpmb_master bm
				join bpmb_material m on m.bpmb_no=bm.bpmb_no
				join sppr_master s on s.no_sppr=m.no_sppr_bpmb
				join customer_name c on c.id_customer=s.customer
				join sppr_spesification ss on ss.sppr_id=s.id_sppr ".$where;
	$result=$this->general_model->select($sql);
	$table=array();

	foreach ($result as $key) {
		$sppr="'".$key['no_sppr']."'";
		$id_bpmb_nya="'".$key['bpmb_no']."'";
		// echo $bmpb_;
		if($key['status_bpmb']=='open'){
			$stat='<span class="label label-sm label-info">Open</span>';
			$button='<a class="btn btn-sm btn-warning" title="Cancel" onclick="cancel('.$id_bpmb_nya.')"><i class="glyphicon glyphicon-stop"></i> Cancel</a>
			<a class="btn btn-sm btn-warning" title="Cancel" onclick="edit_bpmb('.$id_bpmb_nya.')"><i class="glyphicon glyphicon-stop"></i> Edit</a>';
			if($_SESSION['level']=='kabag')
			{
				$button1='<a class="btn btn-sm btn-success" title="Cancel" onclick="approve('.$id_bpmb_nya.')"><i class="glyphicon glyphicon-pencil"></i> Approve</a>';
			}else {
				$button1='';
			}
		}
		elseif ($key['status_bpmb']=='approved') {
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
		array_push($table,array(
			'<a onclick="show_bpmb('.$id_bpmb_nya.')">'.$key['bpmb_no'].'</a>',
			'<a onclick="show_detail('.$sppr.')">'.$key['no_sppr'].'</a>',
			'<a target="_blank" href="'.site_url().'ppc/edit_dkp?sppr='.$key['no_sppr'].'&id_dkp='.$key['dkp_id'].'">'.$key['dkp_id'].'</a>',
			$key['name_customer'],
			$key['name_project'].'-'.$key['quantity'].'-'.$key['satuan'],
			$key['create_date'],
			$stat,
			$button.' '.$button1,
		));
	}
	echo json_encode(array('isi'=>$table));
}

	public function filter()
	{
		$where='';
		$flag=true;
		$colom=array('no_sppr_bpmb', 'dkp_id', 'material_id', 'jenis_bahan', 'kode_bahan');
		$data=array();
		for ($i=0; $i < count($colom) ; $i++) {
			// array_push($data, array(
			// 	$colom[$i]=>$this->input->post($colom[$i])
			// ));
			if($flag && $this->input->post($colom[$i])!=''){
				$where.=' where (b.'.$colom[$i].'="'.$this->input->post($colom[$i]).'")';
				$flag=false;
			}
			elseif (!$flag && $this->input->post($colom[$i])!='') {
				$where.=' and (b.'.$colom[$i].'="'.$this->input->post($colom[$i]).'")';
			}
		}

		if($where==''){
			$where.=' where b.status!="approved"';
		}else{
			$where.=' and b.status!="approved"';
		}

		// echo $where;
		$sql='SELECT * FROM bpmb_material b JOIN dkp_material m on m.id_material=b.material_id'.$where;
		// echo $sql;
		// exit;
		$arr_sppr=$this->general_model->select($sql);
		$table=array(); // for dataTables
		// print_r($arr_sppr);
		// echo $_SESSION['level']."cfgdfffffffffffffffffffffff";
		// exit;
		foreach ($arr_sppr as $key) {
			if($key['status']=='sent'){
				$stat='<span class="label label-sm label-success">Sent</span>';
				$button='<a class="btn btn-sm btn-warning" title="Cancel" onclick="cancel('.$key['id_bpmb'].')"><i class="glyphicon glyphicon-stop"></i> Cancel</a>';
				if($_SESSION['level']=='kabag')
				{
					$button1='<a class="btn btn-sm btn-success" title="Cancel" onclick="approve('.$key['id_bpmb'].')"><i class="glyphicon glyphicon-pencil"></i> Approve</a>';
				}else {
					$button1='';
				}
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
			array_push($table,array(
				'<a onclick="show_bpmb('.$key['id_bpmb'].')">'.$key['id_bpmb'].'</a>',
				'<a onclick="show_detail('.$key['no_sppr_bpmb'].')">'.$key['no_sppr_bpmb'].'</a>',
				'<a target="_blank" href="'.site_url().'ppc/edit_dkp?sppr='.$key['no_sppr_bpmb'].'&id_dkp='.$key['dkp_id'].'">'.$key['dkp_id'].'</a>',
				'<a onclick="show_material('.$key['material_id'].')">'.$key['material_id'].'</a>',
				$key['jenis_bahan'],
				$key['kode_bahan'],
				$key['item'],
				$key['nama_bahan'],
				$key['qty_angka'],
				$key['unit'],
				$stat,
				$button.' '.$button1,
			));
		}
		echo json_encode(array('isi'=>$table));
	}

	public function filter_pr()
	{
		$where='';
		$flag=true;
		$colom=array('sppr_no', 'dkp_no', 'material_id', 'jenis_bahan', 'kode_bahan');
		$data=array();
		for ($i=0; $i < count($colom) ; $i++) {
			// array_push($data, array(
			// 	$colom[$i]=>$this->input->post($colom[$i])
			// ));
			if($flag && $this->input->post($colom[$i])!=''){
				$where.=' where (b.'.$colom[$i].'="'.$this->input->post($colom[$i]).'")';
				$flag=false;
			}
			elseif (!$flag && $this->input->post($colom[$i])!='') {
				$where.=' and (b.'.$colom[$i].'="'.$this->input->post($colom[$i]).'")';
			}
		}

		if($where==''){
			$where.=' where b.status_matpr!="approved"';
		}else{
			$where.=' and b.status_matpr!="approved"';
		}

		// echo $where;
		$sql='SELECT * FROM pr_material b JOIN dkp_material m on m.id_material=b.material_id join pr_material_detail md on md.matpr_id=b.id_matpr'.$where;
		// echo $sql;
		// exit;
		$arr_sppr=$this->general_model->select($sql);
		$table=array(); // for dataTables
		// print_r($arr_sppr);
		// echo $_SESSION['level']."cfgdfffffffffffffffffffffff";
		// exit;
		foreach ($arr_sppr as $key) {
			if($key['status_matpr']=='sent'){
				$stat='<span class="label label-sm label-success">Sent</span>';
				$button='<a class="btn btn-sm btn-warning" title="Cancel" onclick="cancel('.$key['id_matpr'].')"><i class="glyphicon glyphicon-stop"></i> Cancel</a>';
				if($_SESSION['level']=='kabag')
				{
					$button1='<a class="btn btn-sm btn-success" title="Cancel" onclick="approve('.$key['id_matpr'].')"><i class="glyphicon glyphicon-pencil"></i> Approve</a>';
				}
				else{
					$button1='';
				}
			}
			else{
				$stat='<span class="label label-sm label-danger">Cancel</span>';
				$button='';
				if($_SESSION['level']=='kabag')
				{
					$button1='';
				}else {
					$button1='';
				}
			}
			array_push($table,array(
				'<a onclick="show_pr('.$key['id_matpr'].')">'.$key['id_matpr'].'</a>',
				'<a onclick="show_detail('.$key['sppr_no'].')">'.$key['sppr_no'].'</a>',
				'<a target="_blank" href="'.site_url().'ppc/edit_dkp?sppr='.$key['sppr_no'].'&id_dkp='.$key['dkp_id'].'">'.$key['dkp_id'].'</a>',
				'<a onclick="show_material('.$key['material_id'].')">'.$key['material_id'].'</a>',
				$key['matpr_datebth'],
				$key['kode_barang'],
				$key['item'],
				$key['material_dec'],
				$key['qty_order'],
				$key['unit'],
				$stat,
				$button.' '.$button1,
			));
		}
		echo json_encode(array('isi'=>$table));
	}

	public function filter_pr_approved()
	{
		$where='';
		$flag=true;
		$colom=array('sppr_no', 'dkp_no', 'material_id', 'jenis_bahan', 'kode_bahan');
		$data=array();
		for ($i=0; $i < count($colom) ; $i++) {
			// array_push($data, array(
			// 	$colom[$i]=>$this->input->post($colom[$i])
			// ));
			if($flag && $this->input->post($colom[$i])!=''){
				$where.=' where (b.'.$colom[$i].'="'.$this->input->post($colom[$i]).'")';
				$flag=false;
			}
			elseif (!$flag && $this->input->post($colom[$i])!='') {
				$where.=' and (b.'.$colom[$i].'="'.$this->input->post($colom[$i]).'")';
			}
		}

		if($where==''){
			$where.=' where b.status_matpr="approved"';
		}else{
			$where.=' and b.status_matpr="approved"';
		}

		// echo $where;
		$sql='SELECT * FROM pr_material b JOIN dkp_material m on m.id_material=b.material_id join pr_material_detail md on md.matpr_id=b.id_matpr'.$where;
		// echo $sql;
		// exit;
		$arr_sppr=$this->general_model->select($sql);
		$table=array(); // for dataTables
		// print_r($arr_sppr);
		// echo $_SESSION['level']."cfgdfffffffffffffffffffffff";
		// exit;
		foreach ($arr_sppr as $key) {
			if($key['status_matpr']=='sent'){
				$stat='<span class="label label-sm label-success">Sent</span>';
				$button='<a class="btn btn-sm btn-warning" title="Cancel" onclick="cancel('.$key['id_matpr'].')"><i class="glyphicon glyphicon-stop"></i> Cancel</a>';
				if($_SESSION['level']=='kabag')
				{
					$button1='<a class="btn btn-sm btn-success" title="Cancel" onclick="approve('.$key['id_matpr'].')"><i class="glyphicon glyphicon-pencil"></i> Approve</a>';
				}
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
			array_push($table,array(
				'<a onclick="show_pr('.$key['id_matpr'].')">'.$key['id_matpr'].'</a>',
				'<a onclick="show_detail('.$key['sppr_no'].')">'.$key['sppr_no'].'</a>',
				'<a target="_blank" href="'.site_url().'ppc/edit_dkp?sppr='.$key['sppr_no'].'&id_dkp='.$key['dkp_id'].'">'.$key['dkp_id'].'</a>',
				'<a onclick="show_material('.$key['material_id'].')">'.$key['material_id'].'</a>',
				$key['matpr_datebth'],
				$key['kode_barang'],
				$key['item'],
				$key['material_dec'],
				$key['qty_order'],
				$key['unit'],
				'<span class="label label-sm label-success">'.$key['status_matpr'].'</span>',
				// $button.' '.$button1,
			));
		}
		echo json_encode(array('isi'=>$table));
	}

	public function filter_approved()
	{

		$sql="SELECT DISTINCT bm.*, s.no_sppr, c.name_customer, m.dkp_id, m.create_date, ss.* FROM bpmb_master bm
					join bpmb_material m on m.bpmb_no=bm.bpmb_no
					join sppr_master s on s.no_sppr=m.no_sppr_bpmb
					join customer_name c on c.id_customer=s.customer
					join sppr_spesification ss on ss.sppr_id=s.id_sppr
					where bm.status_bpmb='approved'";
		$result=$this->general_model->select($sql);
		$table=array();

		foreach ($result as $key) {
			$sppr="'".$key['no_sppr']."'";
			$id_bpmb_nya="'".$key['bpmb_no']."'";
			// echo $bmpb_;
			if($key['status_bpmb']=='open'){
				$stat='<span class="label label-sm label-info">Open</span>';
				$button='<a class="btn btn-sm btn-warning" title="Cancel" onclick="cancel('.$id_bpmb_nya.')"><i class="glyphicon glyphicon-stop"></i> Cancel</a>';
				if($_SESSION['level']=='kabag')
				{
					$button1='<a class="btn btn-sm btn-success" title="Cancel" onclick="approve('.$id_bpmb_nya.')"><i class="glyphicon glyphicon-pencil"></i> Approve</a>';
				}else {
					$button1='';
				}
			}
			elseif ($key['status_bpmb']=='approved') {
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
			array_push($table,array(
				'<a onclick="show_bpmb('.$id_bpmb_nya.')">'.$key['bpmb_no'].'</a>',
				'<a onclick="show_detail('.$sppr.')">'.$key['no_sppr'].'</a>',
				'<a target="_blank" href="'.site_url().'ppc/edit_dkp?sppr='.$key['no_sppr'].'&id_dkp='.$key['dkp_id'].'">'.$key['dkp_id'].'</a>',
				$key['name_customer'],
				$key['name_project'].'-'.$key['quantity'].'-'.$key['satuan'],
				$key['create_date'],
				$stat,
				$key['approve_by'],
				$key['date_approve'],
				$button.' '.$button1,
			));
		}
		echo json_encode(array('isi'=>$table));

		// $where='';
		// $flag=true;
		// $colom=array('no_sppr_bpmb', 'dkp_id', 'material_id', 'jenis_bahan', 'kode_bahan');
		// $data=array();
		// for ($i=0; $i < count($colom) ; $i++) {
		// 	// array_push($data, array(
		// 	// 	$colom[$i]=>$this->input->post($colom[$i])
		// 	// ));
		// 	if($flag && $this->input->post($colom[$i])!=''){
		// 		$where.=' where (b.'.$colom[$i].'="'.$this->input->post($colom[$i]).'")';
		// 		$flag=false;
		// 	}
		// 	elseif (!$flag && $this->input->post($colom[$i])!='') {
		// 		$where.=' and (b.'.$colom[$i].'="'.$this->input->post($colom[$i]).'")';
		// 	}
		// }
    //
		// if($where==''){
		// 	$where.=' where b.status="approved"';
		// }else{
		// 	$where.=' and b.status="approved"';
		// }
    //
		// // echo $where;
		// $sql='SELECT * FROM bpmb_material b JOIN dkp_material m on m.id_material=b.material_id'.$where;
		// // echo $sql;
		// // exit;
		// $arr_sppr=$this->general_model->select($sql);
		// $table=array(); // for dataTables
		// // print_r($arr_sppr);
		// // echo $_SESSION['level']."cfgdfffffffffffffffffffffff";
		// // exit;
		// foreach ($arr_sppr as $key) {
		// 	// if($key['status']=='sent'){
		// 	// 	$stat='<span class="label label-sm label-success">Sent</span>';
		// 	// 	$button='<a class="btn btn-sm btn-warning" title="Cancel" onclick="cancel('.$key['id_bpmb'].')"><i class="glyphicon glyphicon-stop"></i> Cancel</a>';
		// 	// 	if($_SESSION['level']=='kabag')
		// 	// 	{
		// 	// 		$button1='<a class="btn btn-sm btn-success" title="Cancel" onclick="approve('.$key['id_bpmb'].')"><i class="glyphicon glyphicon-pencil"></i> Approve</a>';
		// 	// 	}
		// 	// }
		// 	// else{
		// 	// 	$stat='<span class="label label-sm label-danger">Cancel</span>';
		// 	// 	$button='';
		// 	// 	if($_SESSION['level']=='kabag')
		// 	// 	{
		// 	// 		$button1='';
		// 	// 	}
		// 	// }
		// 	array_push($table,array(
		// 		'<a onclick="show_bpmb('.$key['id_bpmb'].')">'.$key['id_bpmb'].'</a>',
		// 		'<a onclick="show_detail('.$key['no_sppr_bpmb'].')">'.$key['no_sppr_bpmb'].'</a>',
		// 		'<a target="_blank" href="'.site_url().'ppc/edit_dkp?sppr='.$key['no_sppr_bpmb'].'&id_dkp='.$key['dkp_id'].'">'.$key['dkp_id'].'</a>',
		// 		'<a onclick="show_material('.$key['material_id'].')">'.$key['material_id'].'</a>',
		// 		$key['jenis_bahan'],
		// 		$key['kode_bahan'],
		// 		$key['item'],
		// 		$key['nama_bahan'],
		// 		$key['qty_angka'],
		// 		$key['unit'],
		// 		'<span class="label label-sm label-success">'.$key['status'].'</span>',
		// 		// $button.' '.$button1,
		// 	));
		// }
		// echo json_encode(array('isi'=>$table));
	}

	public function approve_bpmb($id)
	{
		$update=$this->general_model->update('bpmb_master', array('status_bpmb'=>'approved', 'approve_by'=>$_SESSION['nik'], 'date_approve'=>date('Y-m-d')), array('bpmb_no'=>$id));
		echo json_encode(array('status'=>true, 'id'=>$update));
	}

	//cancel bpmb
	public function cancel($id)
	{
		$update=$this->general_model->update('bpmb_master', array('status_bpmb'=>'cancel', 'approve_by'=>$_SESSION['nik'], 'date_approve'=>date('Y-m-d')), array('bpmb_no'=>$id));

		$sql="SELECT * FROM `bpmb_material` WHERE `bpmb_no` LIKE '$id'";
		$result=$this->general_model->select($sql);
		$indikator=array();
		foreach ($result as $key) {
			//call function update qty req qty_req_bpmb
			$up=$this->update_qty($key['material_id'], floatval($key['qty_angka']), 'qty_req_bpmb');
			array_push($indikator, $up);
		}
		echo json_encode(array('status'=>true, 'id'=>$update, 'indikator'=>$indikator));
	}

	private function update_qty($id_material, $qty_req, $colom)
	{
		$sql="UPDATE dkp_material set $colom=$colom-$qty_req where id_material=$id_material";
		$update=$this->db->query($sql);
		return $update;
	}

	public function approve_pr($id)
	{
		$update=$this->general_model->update('pr_master', array('status_pr'=>'approved', 'approve_by'=>$_SESSION['nik'], 'date_approve'=>date('Y-m-d')), array('pr_no'=>$id));
		echo json_encode(array('status'=>true, 'id'=>$update));
	}

	public function cancel_pr($id)
	{
		$update=$this->general_model->update('pr_master', array('status_pr'=>'cancel', 'approve_by'=>$_SESSION['nik'], 'date_approve'=>date('Y-m-d')), array('pr_no'=>$id));

		// $sql="SELECT * from pr_material_detail` where pr_no like '$id'";
		$sql="SELECT * FROM `pr_material_detail` WHERE `pr_no` LIKE '$id'";
		$result=$this->general_model->select($sql);
		// var_dump($result);
		// exit;
		$id_updated=array();

		foreach ($result as $key) {
			$id_up=$this->update_qty($key['material_id'], floatval($key['qty_angka']), 'qty_req_pr');
			array_push($id_updated, $id_up);
		}
		echo json_encode(array('status'=>true, 'id'=>$update, 'id_updated'=>$id_updated));
	}

	public function save_material_pr()
	{
		$col1=array('matpr_no','sppr_no', 'dkp_no','note', 'material_id', 'date_pr', 'date_dt','dwg_no', 'unit', 'user', 'create_date', 'note', 'matpr_datebth','matpr_date_resch');//pr maste
		$data1=array('matpr_no'=>$this->input->post('matpr_no'));
		for ($i=0; $i <count($col1) ; $i++) {
			$dump=array($col1[$i]=>$this->input->post($col1[$i]));
			$data1=array_merge($data1, $dump);
		}
		$insert1=$this->general_model->insert('pr_material', $data1);

		$col2=array('qty_order','matpr_no', 'uraian_stock_order', 'stock_order','item_tgl_bth', 'qty_budget', 'material_dec', 'qty_unit', 'dimention', 'material', 'item', 'kode_barang');

		if($insert1!=0){
			$data2=array('material_std'=>$this->input->post('material_dec'));
			for ($i=0; $i <count($col2) ; $i++) {
				$dump=array($col2[$i]=>$this->input->post($col2[$i]));
				$data2=array_merge($data2, $dump);
			}
			$insert2=$this->general_model->insert('pr_material_detail', $data2);

			$id=$this->input->post('material_id');
			$query=$this->general_model->select_row("SELECT * FROM dkp_material where id_material=$id");
			$qty_req=$query['qty_requested'];
			$ins=$this->general_model->update('dkp_material', array('qty_requested'=>$qty_req+floatval($this->input->post('qty_order'))), array('id_material'=>$id));
		}

		echo json_encode(array('insert1'=>$insert1, 'insert2'=>$insert2));
	}

	public function get_material_by_id($id)
	{
		$sql="SELECT id_material, dkp_id, material_dec, material_name, unit, weight, qty_budget, basic_price_budget, remarks FROM `dkp_material` where id_material='$id'";
		$data=$this->general_model->select_row($sql);
		$hasil=array();

		foreach ($data as $key => $value) {
			array_push($hasil, $value);
		}

		echo json_encode(array('data'=>$hasil));

	}

	//get pr items selectwed
	public function get_items_pr()
	{
		$pr_no=$this->input->post('pr_no');

		$sql="SELECT md.pr_no, md.no_sppr, dm.keterangan, dm.nama_bahan, md.qty_angka, dm.unit, md.date_need, cn.*, ss.*, dm.*  FROM pr_material_detail md
					join dkp_material dm on dm.id_material=md.material_id
					join sppr_master s on s.no_sppr=md.no_sppr
					join customer_name cn on cn.id_customer=s.customer
					join sppr_spesification ss on ss.sppr_id=s.id_sppr
					where pr_no='$pr_no'";

		$result=$this->general_model->select($sql);

		$table=array();
		$no=1;
		foreach ($result as $key ) {
			array_push($table,array(
				$no,
				$key['keterangan'],
				$key['nama_bahan'],
				$key['qty_angka'].'-'.$key['unit'],
				$key['date_bth']
			));
			$no+=1;
		}
		// var_dump($result);
		$detail=array($result[0]['pr_no'], $result[0]['no_sppr'], $result[0]['name_customer'], $result[0]['name_project'].'-'.$result[0]['quantity'].'-'.$result[0]['satuan'], $this->get_status_pr($result[0]['pr_no']));

		echo json_encode(array('table'=>$table, 'detail'=>$detail));
	}

	private function get_status_pr($pr_no)
	{
		$result=$this->general_model->select_row("SELECT * FROM pr_master WHERE pr_no='$pr_no'");
		return $result['status_pr'];
	}

	//get item bpmb selected
	public function get_items_bpmb()
	{
		$bpmb_no=$this->input->post('bpmb_no');

		$sql="SELECT md.*, dm.*, cn.*, ss.*  FROM bpmb_material md
					join dkp_material dm on dm.id_material=md.material_id
					join sppr_master s on s.no_sppr=md.no_sppr_bpmb
					join customer_name cn on cn.id_customer=s.customer
					join sppr_spesification ss on ss.sppr_id=s.id_sppr
					where bpmb_no='$bpmb_no'";

		$result=$this->general_model->select($sql);

		$table=array();
		$no=1;
		foreach ($result as $key ) {
			array_push($table,array(
				$no,
				'<input name="id_nya[]"  value="'.$key['id_material'].'">',
				$key['material_no'],
				$key['item'],
				$key['jenis_bahan'],
				$key['nama_bahan'],
				$key['qty_angka'],
				$key['unit'],
				$key['date_bth'],
				$key['keterangan'],
			));
			$no+=1;
		}
		// var_dump($result);
		$detail=array($result[0]['bpmb_no'], $result[0]['no_sppr_bpmb'], $result[0]['name_customer'], $result[0]['name_project'].'-'.$result[0]['quantity'].'-'.$result[0]['satuan'], $this->get_status_bpmb($result[0]['bpmb_no']));

		echo json_encode(array('table'=>$table, 'detail'=>$detail));
	}

	private function get_status_bpmb($bpmb_no)
	{
		$result=$this->general_model->select_row("SELECT * FROM bpmb_master WHERE bpmb_no='$bpmb_no'");
		return $result['status_bpmb'];
	}

	//list pproved pr
	public function get_list_pr_approved()
	{
		$status='approved';
			if($status=='approved'){
				$where="where bm.status_pr='approved'";
			}else{
				$where="where bm.status_pr!='approved'";
			}

			$sql="SELECT DISTINCT  bm.*, s.no_sppr, c.name_customer, m.dkp_id, m.create_date, ss.* FROM pr_master bm
						join pr_material_detail m on m.pr_no=bm.pr_no
						join sppr_master s on s.no_sppr=m.no_sppr
						join customer_name c on c.id_customer=s.customer
						join sppr_spesification ss on ss.sppr_id=s.id_sppr ".$where;
			$result=$this->general_model->select($sql);
			$table=array();

			foreach ($result as $key) {
				$sppr="'".$key['no_sppr']."'";
				$pr_no="'".$key['pr_no']."'";
				if($key['status_pr']=='open'){
					$stat='<span class="label label-sm label-success">Open</span>';
					$button='<a class="btn btn-sm btn-warning" title="Cancel" onclick="cancel('.$pr_no.')"><i class="glyphicon glyphicon-stop"></i> Cancel</a>';
					if($_SESSION['level']=='kabag')
					{
						$button1='<a class="btn btn-sm btn-success" title="Cancel" onclick="approve('.$pr_no.')"><i class="glyphicon glyphicon-pencil"></i> Approve</a>';
					}else {
						$button1='';
					}
				}
				elseif ($key['status_pr']=='approved') {
					$stat='<span class="label label-sm label-success">Approved</span>';
					$button1='';
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
				array_push($table,array(
					'<a onclick="show_pr('.$pr_no.')">'.$key['pr_no'].'</a>',
					'<a onclick="show_detail('.$sppr.')">'.$key['no_sppr'].'</a>',
					'<a target="_blank" href="'.site_url().'ppc/edit_dkp?sppr='.$key['no_sppr'].'&id_dkp='.$key['dkp_id'].'">'.$key['dkp_id'].'</a>',
					$key['name_customer'],
					$key['name_project'].'-'.$key['quantity'].'-'.$key['satuan'],
					$key['create_date'],
					$stat,
					$key['approve_by'],
					$key['date_approve']
					// $button.' '.$button1,
				));
			}
			echo json_encode(array('isi'=>$table));
	}

	public function get_last_id_bpmb()
	{
		$sql="SELECT id_bpmb_master FROM `bpmb_master` ORDER by id_bpmb_master DESC limit 1";
		$res=$this->general_model->select_row($sql);

		if(count($res)>0){
			$lastID=$res['id_bpmb_master'];
			$lastID=sprintf('%06d', intval($lastID)+1);
			return 'BPMB'.$lastID;
		}else {
			return 'BPMB000001';
		}
	}

		/**
		 ***********************************************************************************************************************************************************************
		 * On this bottom is all function on create_pr
		 ***********************************************************************************************************************************************************************
		 */

		 public function get_material_progress_pr($id_dkp)
		 {
		 	$sql="SELECT * FROM dkp_material m
		 	join dkp_group g on g.id=m.group_id
		 	join dkp_main_group mg on mg.id=g.level1
		 	WHERE m.dkp_id=$id_dkp and m.status_material='progress'
		 	and m.qty_pr-m.qty_req_pr!=0
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
		 				<input type="checkbox" name="id_mat[]" class="checkboxes" value="'.$key['id_material'].'"/>
		 			</td>',
		 			$button,
		 			$key['id_material'],
		 			$key['material_no'],
		 			$key['name'],
		 			$key['level2'],
		 			$key['material_dec'],
		 			$key['material_name'],
		 			// $key['qty'],
		 			$key['unit'],
		 			$key['weight'],
		 			// $key['remarks'],
		 			$key['qty_budget'],
		 			$key['qty_pr'],
		 			$key['qty_req_bpmb'],
		 			$key['qty_bpb'],
		 			// floatval($key['qty_budget'])*floatval($key['basic_price_budget']),
		 			//create mr dan pr
		 		));
		 }
		 echo json_encode(array('data'=>$table));
		 }


		public function build_pr()
	 	{
	 		$id_material=$this->input->post('id_mat');
	 		$table=array();
	 		for ($i=0; $i < count($id_material) ; $i++) {
	 			array_push($table, $this->get_item_by_id_pr($id_material[$i]));
	 		}
	 		$material_no=$table[0][1];
	 		$material_no=explode('-',$material_no);
			$dkp=explode('-', $table[0][8]);
	 		echo json_encode(array('isinya'=>$id_material, 'table'=>$table, 'material_no'=>$material_no, 'dkp'=>$dkp, 'pr_no'=>$this->get_last_id_pr()));
	 	}

 	private function get_item_by_id_pr($id)
 	{
 		$colom=$this->input->post('colom');
 		$table=$this->input->post('table');
 		$sql="SELECT mt.*, ma.* FROM dkp_material mt
		JOIN dkp_master ma ON ma.id_dkp=mt.dkp_id  WHERE id_material='$id'";
 		$key=$this->general_model->select_row($sql);
 		// var_dump($result);
 		$budget=floatval($key['qty_budget']);
 		$qty_pr=floatval($key['qty_pr']);
 		$qty_req_pr=floatval($key['qty_req_pr']);
 		$qty_bpmb=$qty_pr-$qty_req_pr;
 		$values=array(
 					'<input name="id_nya[]"  value="'.$key['id_material'].'">',
 					$key['material_no'],
 					$key['item'],
 					$key['nama_bahan'],
 					'<input name="'.$key['id_material'].'" class="form-control" value="'.$qty_bpmb.'"><span class="help-block"></span>',
 					// '<input name="date_need[]" type="text" class="form-control datepicker" placeholder="Tanggal">',
 					$key['date_bth'],
 					$key['satuan'],
 					$key['keterangan'],
					$key['id_dkp'].'-'.$key['dkp_no'],
				);
 		return $values;
 	}

	public function qty_pr_sisa($id_material)
	{
		$sql="SELECT * FROM dkp_material WHERE id_material='$id_material'";
		$key=$this->general_model->select_row($sql);
		// var_dump($key);
		// exit;
		// $budget=floatval($key['qty_budget']);
		$qty_pr=floatval($key['qty_pr']);
		$qty_req_pr=floatval($key['qty_req_pr']);
		// $qty_bpmb=($budget-$qty_pr)-$qty_req_bpmb;
		// var_dump($qty_pr);
		// exit;
		return $qty_pr-$qty_req_pr;
	}

	public function save_pr_final()
	{
		$pr_no=$this->input->post('pr_no');
		$date_create=$this->input->post('create_date');
		$dkp_id=$this->input->post('dkp_id_bpmb');
		$no_sppr_bpmb=$this->input->post('no_sppr_bpmb');
		$nama=$this->input->post('id_nya'); //id material
		$tgl_need=$this->input->post('date_need');
		$all_data=array();

		//_validate
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('pr_no')=='')
		{
			$data['inputerror'][] = 'pr_no';
			$data['error_string'][] ="Can't Empty";
			$data['status'] = FALSE;
		}

		if(count($this->general_model->select("select * from pr_master where pr_no='$pr_no'"))>0){
			$data['inputerror'][] = 'pr_no';
			$data['error_string'][] ='Duplicate PR NO';
			$data['status'] = FALSE;
		}

		for ($i=0; $i <count($nama) ; $i++) {
			if($this->qty_pr_sisa($nama[$i]) < floatval($this->input->post($nama[$i])))
			{
				$data['inputerror'][] = $nama[$i];
				$data['error_string'][] ='Qty Max is '.$this->qty_pr_sisa($nama[$i]);
				$data['status'] = FALSE;
			}
		}

		if($data['status'] === FALSE)
		{
				echo json_encode($data);
				exit();
		}

		$pr_master_id=$this->general_model->insert('pr_master', array('pr_no'=>$pr_no));

		for ($i=0; $i <count($nama) ; $i++) {
			$data=array(
				'pr_master_id'=>$pr_master_id,
				'pr_no'=>$pr_no,
				'material_id'=>$nama[$i],
				'create_date'=>date('Y-m-d'),
				'no_sppr'=>$no_sppr_bpmb,
				'dkp_id'=>$dkp_id,
				// 'date_need'=>$tgl_need[$i],
				'create_by'=>$_SESSION['nik'],
				'qty_angka'=>$this->input->post($nama[$i]),
			);
			$insert=$this->general_model->insert('pr_material_detail', $data);
			if($insert!=0){
				$this->general_model->update('dkp_material', array('qty_req_pr'=>$this->get_qty_req_pr($nama[$i])+floatval($this->input->post($nama[$i]))), array('id_material'=>$nama[$i]));
			}
			array_push($all_data, $insert);
		}
		echo json_encode(array('status'=>true, 'data'=>$all_data));
	}

	public function get_last_id_pr()
	{
		$sql="SELECT id_pr_master FROM `pr_master` ORDER by id_pr_master DESC limit 1";
		$res=$this->general_model->select_row($sql);

		if(count($res)>0){
			$lastID=$res['id_pr_master'];
			$lastID=sprintf('%06d', intval($lastID)+1);
			return 'PR'.$lastID;
		}else {
			return 'PR000001';
		}
	}

	/**
	 ***********************************************************************************************************************************************************************
	 * On this bottom is all function of list PR
	 ***********************************************************************************************************************************************************************
	 */

	public function filter_pr_new($status)
	{
		// 		SELECT bm.id_bpmb_master, bm.bpmb_no, bm.status_bpmb FROM bpmb_master bm
		// join bpmb_material m on m.bpmb_no=bm.bpmb_no
		// join sppr_master s on s.no_sppr=m.no_sppr_bpmb
		// join customer_name c on c.id_customer=s.customer
		$status='approval';
			if($status=='approved'){
				$where="where bm.status_pr='approved'";
			}else{
				$where="where bm.status_pr!='approved'";
	}

	$sql="SELECT DISTINCT  bm.pr_no, bm.status_pr, s.no_sppr, c.name_customer, m.dkp_id, m.create_date, ss.* FROM pr_master bm
				join pr_material_detail m on m.pr_no=bm.pr_no
				join sppr_master s on s.no_sppr=m.no_sppr
				join customer_name c on c.id_customer=s.customer
				join sppr_spesification ss on ss.sppr_id=s.id_sppr ".$where;
	$result=$this->general_model->select($sql);
	$table=array();

	foreach ($result as $key) {
		$sppr="'".$key['no_sppr']."'";
		$pr_no="'".$key['pr_no']."'";
		if($key['status_pr']=='open'){
			$stat='<span class="label label-sm label-success">Open</span>';
			$button='<a class="btn btn-sm btn-warning" title="Cancel" onclick="cancel('.$pr_no.')"><i class="glyphicon glyphicon-stop"></i> Cancel</a>
			<a class="btn btn-sm btn-info" title="Edit" onclick="edit_pr('.$pr_no.')"><i class="glyphicon glyphicon-pencil"></i>Edit</a>';
			if($_SESSION['level']=='kabag')
			{
				$button1='<a class="btn btn-sm btn-success" title="Cancel" onclick="approve('.$pr_no.')"><i class="glyphicon glyphicon-pencil"></i> Approve</a>';
			}else {
				$button1='';
			}
		}
		elseif ($key['status_pr']=='approved') {
			$stat='<span class="label label-sm label-success">Approved</span>';
			$button1='';
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
		array_push($table,array(
			'<a onclick="show_pr('.$pr_no.')">'.$key['pr_no'].'</a>',
			'<a onclick="show_detail('.$sppr.')">'.$key['no_sppr'].'</a>',
			'<a target="_blank" href="'.site_url().'ppc/edit_dkp?sppr='.$key['no_sppr'].'&id_dkp='.$key['dkp_id'].'">'.$key['dkp_id'].'</a>',
			$key['name_customer'],
			$key['name_project'].'-'.$key['quantity'].'-'.$key['satuan'],
			$key['create_date'],
			$stat,
			$button.' '.$button1,
		));
	}
	echo json_encode(array('isi'=>$table));
}

	//get data for edit pr
	public function edit_pr($pr_no){
		$sql="SELECT md.*, dm.*, dd.*, cn.*, ss.*  FROM pr_material_detail md
					join dkp_material dm on dm.id_material=md.material_id
					join dkp_master dd on dd.id_dkp=dm.dkp_id
					join sppr_master s on s.no_sppr=md.no_sppr
					join customer_name cn on cn.id_customer=s.customer
					join sppr_spesification ss on ss.sppr_id=s.id_sppr
					where md.pr_no='$pr_no'";

		$result=$this->general_model->select($sql);
		// var_dump($result);
		$table=array();

		//extrac array to table
		foreach ($result as $key) {
			array_push($table, array(
				'<input name="id_pr[]"  value="'.$key['id_pr'].'"> <input name="id_nya[]"  value="'.$key['id_material'].'">',
				$key['material_no'],
				$key['item'],
				$key['nama_bahan'],
				'<input name="'.$key['id_pr'].'" class="form-control" value="'.$key['qty_angka'].'"><span class="help-block"></span>',
				// '<input name="date_need[]" type="text" class="form-control datepicker" placeholder="Tanggal">',
				$key['date_bth'],
				$key['unit'],
				$key['keterangan'],
				$key['id_dkp'].'-'.$key['dkp_no'],
			));
		}

		$detail=array($result[0]['pr_no'],$result[0]['name_customer'], $result[0]['create_date']);
		$material_no=$table[0][1];
		$material_no=explode('-',$material_no);
		$dkp=explode('-', $table[0][8]);

		//return to view list sppr as json_encode
		echo json_encode(array('table'=>$table, 'material_no'=>$material_no, 'dkp'=>$dkp, 'detail'=>$detail, 'title'=>$result[0]['name_project'].'-'.$key['quantity'].'-'.$key['unit']));
	}

	//save edited PR
	public function save_pr_edited(){
		$pr_no=$this->input->post('pr_no');
		$date_create=$this->input->post('create_date');
		$dkp_id=$this->input->post('dkp_id_bpmb');
		$no_sppr_bpmb=$this->input->post('no_sppr_bpmb');
		$nama=$this->input->post('material_id'); //material id
		$material_id=$this->input->post('id_nya');
		$id_pr=$this->input->post('id_pr');
		//_validate
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		for ($i=0; $i <count($id_pr) ; $i++) {
			$max=($this->get_qty_pr_by_id($id_pr[$i]))+($this->qty_pr_sisa($material_id[$i]));
			// var_dump($max);
			if($max < floatval($this->input->post($id_pr[$i]))) //cek input qty pr
			{
				$data['inputerror'][] = $id_pr[$i];
				$data['error_string'][] ='Qty Max is '.$max;
				$data['status'] = FALSE;
			}
		}

		if($data['status'] === FALSE)
		{
				echo json_encode($data);
				exit();
		}

		$id_pr_save=array();
		for ($i=0; $i <count($id_pr) ; $i++) {
			$data=array(
				'create_by'=>$_SESSION['nik'],
				'qty_angka'=>$this->input->post($id_pr[$i]),
			);

			$update=$this->general_model->update('pr_material_detail', $data, array('id_pr'=>$id_pr[$i]));

			//get tot req pr
			$tot_qty_req_pr=$this->get_qty_req_pr_qum($material_id[$i]);

			//update qty req o table dkp_material

			if($update!=0){
				$this->general_model->update('dkp_material', array('qty_req_pr'=>$tot_qty_req_pr), array('id_material'=>$material_id[$i]));
			}

			array_push($id_pr_save, $update);
		}

		echo json_encode(array('status'=>true, 'data'=>$id_pr_save));
	}

	private function get_qty_req_pr_qum($material_id){
		$sql="SELECT * FROM `pr_material_detail` WHERE `material_id` = '$material_id'";

		$res=$this->general_model->select($sql);

		$sum=0;
		foreach ($res as $key) {
			$dump=floatval($key['qty_angka']);
			$sum+=$dump;
		}

		return $sum;
	}

	public function get_qty_pr_by_id($id_pr){
		$sql="SELECT * FROM `pr_material_detail` WHERE `id_pr` = '$id_pr'";
		$result=$this->general_model->select($sql);
		$sum=0;
			$sum+=floatval($result[0]['qty_angka']);
		return $sum;
	}

	public function get_code_barang()
	{
		$sql="SELECT id_barang as 'id', kode_barang as 'text' FROM `tbl_barang` ORDER BY `kode_barang` DESC limit 3000";
		$res=$this->general_model->select_db2($sql);
		$tambahan=array(array('id'=>0, 'text'=>'Select One'));
		$result=array_merge($tambahan, $res);
		echo json_encode(array('kode_barang'=>$result));
	}

	public function get_detail_barang($id)
	{
		$sql="SELECT nama_barang, stn, kode_barang FROM `tbl_barang` WHERE id_barang=$id";
		$result=$this->general_model->select_db2($sql);
		echo json_encode(array('detail_barang'=>$result[0]));
	}


} //end class
