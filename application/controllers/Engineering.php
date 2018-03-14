<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Engineering extends CI_Controller {

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
    	$this->load->view('engineering/home');
  }

  public function list_sppr()
  {
		$sql='SELECT distinct no_sppr FROM sppr_master';
		$arr_sppr=$this->general_model->select($sql);
		$sql1='SELECT distinct name_customer, id_customer FROM customer_name';
		$arr_sppr1=$this->general_model->select($sql1);
		$data['sppr']=$arr_sppr;
		$data['customer']=$arr_sppr1;
    $this->load->view('engineering/e_list_sppr',$data);
  }

	public function list_dkp_draf()
	{
		$this->load->view('engineering/e_list_dkp_draf');
	}

	public function list_dkp_approval()
	{
		$this->load->view('engineering/e_list_dkp_approval');
	}

	public function list_dkp_approved()
	{
		$this->load->view('engineering/e_list_dkp_approved');
	}

	//e_list_sppr get sppr all
  public function get_sppr()
  {
		$where='';
		$flag=true;
		$colom=array('no_sppr', 'order_date', 'delivery_date', 'customer');
		$data=array();
		for ($i=0; $i < count($colom) ; $i++) {
			// array_push($data, array(
			// 	$colom[$i]=>$this->input->post($colom[$i])
			// ));
			if($flag && $this->input->post($colom[$i])!=''){
				$where.=' where (m.'.$colom[$i].'="'.$this->input->post($colom[$i]).'")';
				$flag=false;
			}
			elseif (!$flag && $this->input->post($colom[$i])!='') {
				$where.=' and (m.'.$colom[$i].'="'.$this->input->post($colom[$i]).'")';
			}
		}
		// echo $where;
		// $sql='SELECT m.id_sppr, m.no_sppr, m.customer, m.order_date, m.delivery_date , m.status, s.name_project, s.satuan, s.quantity FROM sppr_master m JOIN sppr_spesification s on s.sppr_id=m.id_sppr'.$where;
		$sql='SELECT m.id_sppr, m.no_sppr, c.name_customer, m.order_date, m.delivery_date , m.status, s.name_project, s.satuan, s.quantity FROM sppr_master m
		JOIN sppr_spesification s on s.sppr_id=m.id_sppr
		join customer_name c on c.id_customer=m.customer'.$where;
    $arr_sppr=$this->general_model->select($sql);
    $table=array(); // for dataTables
    foreach ($arr_sppr as $key) {
      if($key['status']=='open'){
        $stat='<span class="label label-sm label-success">Open</span>';
        $button='<a class="btn btn-sm btn-primary" title="create" href="'.site_url().'engineering/create_dkp?sppr='.$key['no_sppr'].'"><i class="glyphicon glyphicon-pencil"></i> Create DKP</a>';
      }elseif ($key['status']=='hold') {
				$stat='<span class="label label-sm label-warning">Hold</span>';
        $button='';
      }
      else{
        $stat='<span class="label label-sm label-danger">Cancel</span>';
        $button='';
      }
      array_push($table,array(
        '<a onclick="show_detail('.$key['id_sppr'].')">'.$key['no_sppr'].'</a>',
        $key['name_customer'],
        $key['order_date'],
        $key['delivery_date'],
        $stat,
        $key['name_project'].' - '.$key['quantity'].' '.$key['satuan'],
        $button,
      ));
    }
    echo json_encode(array('isi'=>$table));
  }

  public function create_dkp()
  {
		$sql="SELECT no_sppr FROM `sppr_master` where status='open'  order by no_sppr asc ";
		$no_sppr_all=$this->general_model->select($sql);
		$id_dkp=$this->input->get('id_dkp');
		//var_dump($no_sppr_all);
    $no_sppr=$this->input->get('sppr');
		$data['no_sppr_all']=$no_sppr_all;
    $data['no_sppr']=$no_sppr;
		$data['id_dkp']=$id_dkp;
		$data['dkp_no']=$this->input->get('dkp_no');
		$data['dwg_no']=$this->input->get('dwg_no');

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

			$dir = 'uploads/dkp/'.$id_dkp;

			if(is_dir($dir)){
				$files=scandir($dir);
			}else{
				$files='';
			}
			$data['files']=$files;
			// var_dump($data['files']);
			// exit;

		}else{
			$data['id_material_counter']=1;
		}

    $this->load->view('engineering/form_create_dkp', $data);
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
		$data['dkp_no']=$this->input->get('dkp_no');

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
		$this->load->view('engineering/form_create_dkp', $data);
	}

	public function save_dkp_master()
	{
		// $this->validate_dkp();
		$data=array(
			'sppr_id' =>$this->input->post('id_sppr'),
			'dkp_no'=>$this->input->post('dkp_no'),
			'dwg_no'=>$this->input->post('dwg_no'),
			'tag_number'=>$this->input->post('tag_number'),
			'no_sppr'	=>$this->input->post('no_sppr'),
			'status' 	=>'draf',
			'create_date'=>date('Y-m-d'),
			'create_by'=>$this->session->userdata('nik')
		);
		// print_r($data);
		$id_dkp=$this->general_model->insert('dkp_master', $data);
		echo json_encode(array('dkp_id'=>$id_dkp, 'dkp_no'=>$this->input->post('dkp_no')));
	}

	//get dkp draf
	public function get_dkp_draf()
	{
		$sql="SELECT d.id_dkp, d.dkp_no, d.tag_number, d.dwg_no, d.no_sppr, d.create_date, s.customer, s.order_date, s.delivery_date, ss.name_project, ss.quantity, ss.satuan,d.dwg_no,  d.status, c.name_customer FROM dkp_master d
		join sppr_master s on d.sppr_id=s.id_sppr
		join customer_name c on c.id_customer=s.customer
		JOIN sppr_spesification ss on ss.sppr_id=s.id_sppr
		WHERE d.status='draf'";
		$data=$this->general_model->select($sql);
		$table=array();
		foreach ($data as $key) {
			array_push($table, array(
				$key['id_dkp'],
				$key['dkp_no'],
				$key['no_sppr'],
				$key['name_customer'],
				$key['order_date'],
				$key['delivery_date'],
				$key['name_project'].' - '.$key['quantity'].' '.$key['satuan'],
				$key['tag_number'],
				$key['dwg_no'],
				'<span class="label label-sm label-info">'.$key['status'].'</span>',
				$button='<a class="btn btn-sm btn-primary" title="create" href="'.site_url().'engineering/create_dkp?sppr='.$key['no_sppr'].'&id_dkp='.$key['id_dkp'].'&dkp_no='.$key['dkp_no'].'&dwg_no='.$key['dwg_no'].'"><i class="glyphicon glyphicon-pencil"></i> Edit DKP</a>'
			));
		}
		echo json_encode(array('data'=>$table));
	}

	//get dkp approval
	public function get_dkp_approval()
	{
		$sql="SELECT d.id_dkp, d.dkp_no,d.tag_number, d.dwg_no, d.no_sppr, d.create_date, s.customer, s.order_date, s.delivery_date, ss.name_project, ss.quantity, ss.satuan, d.status, c.name_customer FROM dkp_master d
		join sppr_master s on d.sppr_id=s.id_sppr
		join customer_name c on c.id_customer=s.customer
		JOIN sppr_spesification ss on ss.sppr_id=s.id_sppr
		WHERE d.status='approval'";
		$data=$this->general_model->select($sql);
		$table=array();
		foreach ($data as $key) {
			$button='<a class="btn btn-sm btn-primary" title="create" onclick=approve_dkp("'.$key['id_dkp'].'")><i class="fa fa-check"></i> Approve</a>';
			if($_SESSION['level']!='kabag'){
				$button='';
			}
			array_push($table, array(
				'<a class="btn btn-sm btn-info" title="create" href="'.site_url().'engineering/approve_dkp?sppr='.$key['no_sppr'].'&id_dkp='.$key['id_dkp'].'&status='.$key['status'].'&dkp_no='.$key['dkp_no'].'" target="_blank" >'.$key['id_dkp'].'</a>',
				$key['dkp_no'],
				$key['no_sppr'],
				$key['name_customer'],
				$key['order_date'],
				$key['delivery_date'],
				$key['name_project'].' - '.$key['quantity'].' '.$key['satuan'],
				$key['tag_number'],
				$key['dwg_no'],
				'<span class="label label-sm label-warning">'.$key['status'].'</span>',
				$button,
			));
		}
		echo json_encode(array('data'=>$table));
	}

	//approve_dkp
	public function get_dkp_approved()
	{
		$sql="SELECT d.id_dkp, d.dkp_no, d.dwg_no, d.tag_number, d.no_sppr, d.create_date, s.customer, s.order_date, s.delivery_date, ss.name_project, ss.quantity, ss.satuan, d.status, d.date_approv_eng, d.approve_by, c.name_customer FROM dkp_master d
		join sppr_master s on d.sppr_id=s.id_sppr
		join customer_name c on c.id_customer=s.customer
		JOIN sppr_spesification ss on ss.sppr_id=s.id_sppr
		WHERE d.status='approved' or d.status='hold'";
		$data=$this->general_model->select($sql);
		$table=array();
		foreach ($data as $key) {
			$button='<a class="btn btn-sm btn-primary" title="create" onclick=approve_dkp("'.$key['id_dkp'].'")><i class="glyphicon glyphicon-pencil"></i> Approve</a>';
			if($_SESSION['level']!='kabag'){
				$button='';
			}

			if($this->cek_all_item($key['id_dkp'])){
				$status='<span class="label label-sm label-success">Approved</span>';
			}else{
				$status='<span class="label label-sm label-danger">Cancel</span>';
			}
			array_push($table, array(
				'<a class="btn btn-sm btn-info" title="create" href="'.site_url().'engineering/approve_dkp?sppr='.$key['no_sppr'].'&id_dkp='.$key['id_dkp'].'&status='.$key['status'].'&dkp_no='.$key['dkp_no'].'" target="_blank" >'.$key['id_dkp'].'</a>',
				$key['dkp_no'],
				$key['no_sppr'],
				$key['name_customer'],
				$key['order_date'],
				$key['delivery_date'],
				$key['name_project'].' - '.$key['quantity'].' '.$key['satuan'],
				$key['tag_number'],
				$key['dwg_no'],
				$status,
				$key['date_approv_eng'],
				$key['approve_by']
			));
		}
		echo json_encode(array('data'=>$table));
	}

	public function cek_all_item($dkp_id)
	{
		$sql="SELECT * FROM `dkp_material` WHERE `dkp_id` = $dkp_id and group_id is not null order by status_material DESC" ;

		$res=$this->general_model->select($sql);

		$status=FALSE;

		foreach ($res as $key) {
			if($key['status_material']!='cancel'){
				$status=TRUE;
				return $status;
				exit;
			}
		}
		return $status;
	}

//save_material
	public function material_save(){
		$col=array('material_name', 'material_no', 'material_dec', 'unit', 'qty', 'weight', 'basic_price', 'tot_basic_price', 'group_id', 'remarks');
		$data=array('dkp_id'=>$this->input->post('id_dkp'));
		for ($i=0; $i <count($col) ; $i++) {
			$dump=array($col[$i]=>$this->input->post($col[$i]));
			$data=array_merge($data, $dump);
		}
		$create=array('create_by'=>$_SESSION['nik'], 'create_date'=>date('Y-m-d'), 'qty_budget'=>$this->input->post('qty'));
		$data=array_merge($data, $create);
		$insert=$this->general_model->insert('dkp_material', $data);
		echo json_encode(array('status'=>TRUE, 'id'=>$insert));
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
		$create=array('update_by'=>$_SESSION['nik'], 'update_date'=>date('Y-m-d'));
		$data=array_merge($data, $create);
		$update=$this->general_model->update('dkp_material', $data, array('id_material'=>$id_material));
		echo json_encode(array('status'=>TRUE, 'id'=>$update));
	}

	public function save_type()
	{
		$data=array(
			'level1'=>$this->input->post('level1'),
			'level2'=>$this->input->post('level2')
		);
		// var_dump($data);
		$insert=$this->general_model->insert('dkp_group', $data);
		echo json_encode(array('status'=>TRUE, 'id'=>$insert));
	}

	public function save_main_type()
	{
		$data=array(
			'name'=>$this->input->post('main_name')
		);
		$insert=$this->general_model->insert('dkp_main_group', $data);
		echo json_encode(array('status'=>TRUE, 'id'=>$insert));
	}

//get material
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
					$button='<a class="btn btn-sm btn-success button-edit" title="create" onclick="edit_item('.$key['id_material'].','.$colom.','.$type.')"><i class="glyphicon glyphicon-pencil"></i>Edit</a>
					<a class="btn btn-sm btn-warning button-cancel" title="create" onclick="cancel_item('.$key['id_material'].','.$colom.','.$type.')"><i class="glyphicon glyphicon-stop"></i>Cancel</a>';
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
				number_format($key['basic_price']),
				number_format($key['tot_basic_price']),
				$key['remarks'],
				$st,
				$key['create_by'],
				$key['update_by']
				// $key['status_material']
			));
		}
		echo json_encode(array('data'=>$table));
	}

	public function get_material_by_id()
	{
		$id=$this->input->post('id_item');
		$colom=$this->input->post('colom');
		$table=$this->input->post('table');
		$sql="SELECT dkp_id, id_material, material_no, material_dec, material_name, qty, unit, weight, remarks,  basic_price, tot_basic_price, group_id  FROM $table WHERE $colom='$id'";
		$result=$this->general_model->select_row($sql);
		// var_dump($result);
		$values=array();
		if(count($result)>0){
			foreach ($result as $key => $value)  {
				array_push($values, $value);
			}
		}
		echo json_encode(array('material'=>$values));
	}

	public function delete_item()
	{
		$id=$this->input->post('id_item');
		$colom=$this->input->post('colom');
		$table=$this->input->post('table');
		$this->general_model->delete($id,$colom, $table);
	}

	public function cancel_item()
	{
		$id=$this->input->post('id_item');
		$colom=$this->input->post('colom');
		$table=$this->input->post('table');
		$sql="SELECT * FROM dkp_material where id_material=$id";
		$res=$this->general_model->select_row($sql);

		if($res['status_material']!='open'){
			echo json_encode(array('status'=>false, 'item'=>$res['status_material']));
			exit;
		}
		// $this->general_model->update($table, array('status_material'=>'cancel'), array('id_material'=>$id));
		$this->general_model->update($table, array('status_material'=>'cancel', 'update_by'=>$_SESSION['nik'], 'update_date'=>date('y-m-d')), array('id_material'=>$id));
		echo json_encode(array('status'=>true));
	}

// manpower _________________________________________________________________________________________________
	public function manpower_save(){
		$col=array('material_name', 'material_dec', 'unit', 'qty', 'basic_price');
		$col1=array('manpower_name', 'job_clasification', 'unit', 'qty', 'basic_salary');
		$data=array('dkp_id'=>$this->input->post('id_dkp'));
		for ($i=0; $i <count($col) ; $i++) {
			$dump=array($col1[$i]=>$this->input->post($col[$i]));
			$data=array_merge($data, $dump);
		}
		$insert=$this->general_model->insert('dkp_manpower', $data);
		echo json_encode(array('status'=>TRUE, 'id'=>$insert));
	}


	public function get_manpower($id_dkp){
			$sql="SELECT * FROM `dkp_manpower` WHERE dkp_id=$id_dkp order by id_manpower DESC";
			$data=$this->general_model->select($sql);
			$table=array();
			$type="'dkp_manpower'";
			$colom="'id_manpower'";
			foreach ($data as $key) {
				array_push($table, array(
					$key['id_manpower'],
					$key['manpower_name'],
					$key['job_clasification'],
					$key['unit'],
					$key['qty'],
					$key['basic_salary'],
					intval($key['qty'])*intval($key['basic_salary']),
					'<a class="btn btn-sm btn-danger" title="create" onclick="delete_item('.$key['id_manpower'].','.$colom.','.$type.')"><i class="glyphicon glyphicon-trash"></i>Delete</a>',
				));
			}
			echo json_encode(array('data'=>$table));
		}

		public function machinery_save(){
			$col=array('material_name', 'material_dec', 'unit', 'qty', 'basic_price');
			$col1=array('name_machinery', 'spesification', 'unit', 'qty', 'basic_price');
			$data=array('dkp_id'=>$this->input->post('id_dkp'));
			for ($i=0; $i <count($col) ; $i++) {
				$dump=array($col1[$i]=>$this->input->post($col[$i]));
				$data=array_merge($data, $dump);
			}
			$insert=$this->general_model->insert('dkp_machinery', $data);
			echo json_encode(array('status'=>TRUE, 'id'=>$insert));
		}

		public function get_machinery($id_dkp)
		{
			$sql="SELECT * FROM `dkp_machinery` WHERE dkp_id=$id_dkp order by id_machinery DESC";
			$data=$this->general_model->select($sql);
			$table=array();
			$type="'dkp_machinery'";
			$colom="'id_machinery'";
			foreach ($data as $key) {
				array_push($table, array(
					$key['id_machinery'],
					$key['name_machinery'],
					$key['spesification'],
					$key['unit'],
					$key['qty'],
					$key['basic_price'],
					intval($key['qty'])*intval($key['basic_price']),
					'<a class="btn btn-sm btn-danger" title="create" onclick="delete_item('.$key['id_machinery'].','.$colom.','.$type.')"><i class="glyphicon glyphicon-trash"></i>Delete</a>',
				));
			}
			echo json_encode(array('data'=>$table));
		}

		//money ___________________________________________________________________________________
		public function money_save(){
			$col=array('material_name', 'material_dec', 'unit', 'qty', 'basic_price'); //on html
			$col1=array('name_money', 'description', 'unit', 'qty', 'basic_price'); //colom on table
			$data=array('dkp_id'=>$this->input->post('id_dkp'));
			for ($i=0; $i <count($col) ; $i++) {
				$dump=array($col1[$i]=>$this->input->post($col[$i]));
				$data=array_merge($data, $dump);
			}
			$insert=$this->general_model->insert('dkp_money', $data);
			echo json_encode(array('status'=>TRUE, 'id'=>$insert));
		}

		public function get_money($id_dkp)
		{
			$sql="SELECT * FROM `dkp_money` WHERE dkp_id=$id_dkp order by id_money DESC";
			$data=$this->general_model->select($sql);
			$table=array();
			$type="'dkp_money'";
			$colom="'id_money'";
			foreach ($data as $key) {
				array_push($table, array(
					$key['id_money'],
					$key['name_money'],
					$key['description'],
					$key['unit'],
					$key['qty'],
					$key['basic_price'],
					intval($key['qty'])*intval($key['basic_price']),
					'<a class="btn btn-sm btn-danger" title="create" onclick="delete_item('.$key['id_money'].','.$colom.','.$type.')"><i class="glyphicon glyphicon-trash"></i>Delete</a>',
				));
			}
			echo json_encode(array('data'=>$table));
		}

		// subcont ______________________________________________________________________________________________________
		public function subcont_save(){
			$col=array('material_name', 'material_dec', 'unit', 'qty', 'basic_price'); //on html
			$col1=array('name_subcont', 'detail', 'unit', 'qty', 'basic_price'); //colom on table
			$data=array('dkp_id'=>$this->input->post('id_dkp'));
			for ($i=0; $i <count($col) ; $i++) {
				$dump=array($col1[$i]=>$this->input->post($col[$i]));
				$data=array_merge($data, $dump);
			}
			$insert=$this->general_model->insert('dkp_subcont', $data);
			echo json_encode(array('status'=>TRUE, 'id'=>$insert));
		}

		public function get_subcont($id_dkp)
		{
			$sql="SELECT * FROM `dkp_subcont` WHERE dkp_id=$id_dkp order by id_subcont DESC";
			$data=$this->general_model->select($sql);
			$table=array();
			$type="'dkp_subcont'";
			$colom="'id_subcont'";
			foreach ($data as $key) {
				array_push($table, array(
					$key['id_subcont'],
					$key['name_subcont'],
					$key['detail'],
					$key['unit'],
					$key['qty'],
					$key['basic_price'],
					intval($key['qty'])*intval($key['basic_price']),
					'<a class="btn btn-sm btn-danger" title="create" onclick="delete_item('.$key['id_subcont'].','.$colom.','.$type.')"><i class="glyphicon glyphicon-trash"></i>Delete</a>',
				));
			}
			echo json_encode(array('data'=>$table));
		}

		//HSE __________________________________________________________________________________________________________
		public function hse_save(){
			$col=array('material_name', 'material_dec', 'unit', 'qty', 'basic_price'); //on html
			$col1=array('name_hse', 'description', 'unit', 'qty', 'basic_price'); //colom on table
			$data=array('dkp_id'=>$this->input->post('id_dkp'));
			for ($i=0; $i <count($col) ; $i++) {
				$dump=array($col1[$i]=>$this->input->post($col[$i]));
				$data=array_merge($data, $dump);
			}
			$insert=$this->general_model->insert('dkp_hse', $data);
			echo json_encode(array('status'=>TRUE, 'id'=>$insert));
		}

		public function get_hse($id_dkp)
		{
			$sql="SELECT * FROM `dkp_hse` WHERE dkp_id=$id_dkp order by id_hse DESC";
			$data=$this->general_model->select($sql);
			$table=array();
			$type="'dkp_hse'";
			$colom="'id_hse'";
			foreach ($data as $key) {
				array_push($table, array(
					$key['id_hse'],
					$key['name_hse'],
					$key['description'],
					$key['unit'],
					$key['qty'],
					$key['basic_price'],
					intval($key['qty'])*intval($key['basic_price']),
					'<a class="btn btn-sm btn-danger" title="create" onclick="delete_item('.$key['id_hse'].','.$colom.','.$type.')"><i class="glyphicon glyphicon-trash"></i>Delete</a>',
				));
			}
			echo json_encode(array('data'=>$table));
		}

		//OTHER
		public function other_save(){
			$col=array('material_name', 'material_dec', 'unit', 'qty', 'basic_price'); //on html
			$col1=array('o_name', 'dec', 'unit', 'qty', 'basic_price'); //colom on table
			$data=array('dkp_id'=>$this->input->post('id_dkp'));
			for ($i=0; $i <count($col) ; $i++) {
				$dump=array($col1[$i]=>$this->input->post($col[$i]));
				$data=array_merge($data, $dump);
			}
			$insert=$this->general_model->insert('dkp_other', $data);
			echo json_encode(array('status'=>TRUE, 'id'=>$insert));
		}

		public function get_other($id_dkp)
		{
			$sql="SELECT * FROM `dkp_other` WHERE dkp_id=$id_dkp order by id_other DESC";
			$data=$this->general_model->select($sql);
			$table=array();
			$type="'dkp_other'";
			$colom="'id_other'";
			foreach ($data as $key) {
				array_push($table, array(
					$key['id_other'],
					$key['o_name'],
					$key['dec'],
					$key['unit'],
					$key['qty'],
					$key['basic_price'],
					intval($key['qty'])*intval($key['basic_price']),
					'<a class="btn btn-sm btn-danger" title="create" onclick="delete_item('.$key['id_other'].','.$colom.','.$type.')"><i class="glyphicon glyphicon-trash"></i>Delete</a>',
				));
			}
			echo json_encode(array('data'=>$table));
		}

		public function mssql_test()
		{
			$as=$this->general_model->test();
			var_dump($as);
		}

		public function upload_dkp(){
			$id_dkp=$this->input->post('id_dkp_file');
			$filesCount = count($_FILES['userfile']['name']);
			for($i = 0; $i < $filesCount; $i++){
					$_FILES['userFile']['name'] = $_FILES['userfile']['name'][$i];
					$_FILES['userFile']['type'] = $_FILES['userfile']['type'][$i];
					$_FILES['userFile']['tmp_name'] = $_FILES['userfile']['tmp_name'][$i];
					$_FILES['userFile']['error'] = $_FILES['userfile']['error'][$i];
					$_FILES['userFile']['size'] = $_FILES['userfile']['size'][$i];

					$uploadPath = 'uploads/dkp/'.$id_dkp;
					if (!is_dir($uploadPath)) {
							 mkdir($uploadPath, 0777, TRUE);
					 }
					 $config['upload_path'] = $uploadPath;
					 $config['allowed_types'] = '*';
					 $this->load->library('upload', $config);
					 $this->upload->initialize($config);
					 if ( ! $this->upload->do_upload('userFile'))
					 {
						 echo json_encode('upload failed');
					 }else{
						 echo json_encode('upload succes');
					 }
			}
		}

		public function upload_excel(){
			$id_dkp=$this->input->post('id_dkp_file');
			$no_sppr=$this->input->post('no_sppr');
			// echo $no_sppr."sdsdggsdfsfsfsdfs".$id_dkp;
			// exit;
			$uploadPath = 'uploads/temp/'.$id_dkp;
			if (!is_dir($uploadPath)) {
					 mkdir($uploadPath, 0777, TRUE);
			 }
			 $config['upload_path'] = $uploadPath;
			 $config['allowed_types'] = '*';

			 $this->load->library('upload', $config);
			 $this->upload->initialize($config);

			 if ( ! $this->upload->do_upload('userfile'))
			 {
				 // echo json_encode('upload failed');
			 }else{
				 $nama=$this->upload->data('file_name');
				 // echo json_encode("upload $nama succes");
			 }

			 if(isset($nama)){
				 $url=$uploadPath.'/'.$nama;
				 $this->import_material($url, $id_dkp, $no_sppr);
			 }
		}

		public function import_material($url, $id_dkp, $no_sppr)
		{
			$counter=0;
			if($id_dkp!=''){
				$last_material=$this->general_model->select_row("SELECT * FROM `dkp_material` WHERE dkp_id='$id_dkp' ORDER BY `id_material` DESC LIMIT 1");
				if(count($last_material)>0){
					$id_last_mat=$last_material['material_no'];
					$last_material_array=explode("-", $id_last_mat);
					$now_id_material=intval($last_material_array[2])+1;
					// var_dump($now_id_material);
					// exit;
					$counter=$now_id_material;
				}else {
					$counter=1;
				}
			}else{
				$counter=1;
			}

			// $url = "uploads/temp/14/Form_MTO_(1).xlsx";
			$filecontent = file_get_contents($url);
			$tmpfname = tempnam(sys_get_temp_dir(),"tmpxls");
			file_put_contents($tmpfname,$filecontent);

			$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
			$excelObj = $excelReader->load($tmpfname);
			$worksheet = $excelObj->getSheet(0);
			$lastRow = $worksheet->getHighestRow();
			// echo $lastRow;
			$level1='';
			$level2=1;
			$rows=0;
			$row_tab=0;
			$result=array();

			for ($row = 3; $row <= $lastRow-2; $row++) {
				 $no=$worksheet->getCell('A'.$row)->getValue();
				 $style=$worksheet->getStyle('B'.$row)->getFont()->getBold();

				 if($style==1 && !is_numeric($no)){
					$tlevel1=$worksheet->getCell('B'.$row)->getValue();
					$id=$this->general_model->select_row("SELECT * FROM `dkp_main_group` WHERE `name` LIKE '%".$tlevel1."%'");
						if(count($id)>0){
							$level1=$id['id'];
						}
						else
						{
							$level1=$this->general_model->insert('dkp_main_group', array('name'=>$tlevel1));
						}

					}

					elseif ($style==1 && is_numeric($no)) {
						$tlevel2=$worksheet->getCell('B'.$row)->getValue();
						$idlevel2=$this->general_model->select_row("SELECT * FROM `dkp_group` WHERE `level2` LIKE '%".$worksheet->getCell('B'.$row)->getValue()."%' ORDER BY `id` DESC");
						if(count($idlevel2)>0){
							$level2=$idlevel2['id'];
						}
						else
						{
							$level2=$this->general_model->insert('dkp_group', array('level1'=>$level1, 'level2'=>$worksheet->getCell('B'.$row)->getValue()));
						}

					}else{
						if($level2==NULL || $worksheet->getCell('E'.$row)->getValue()==NULL){
							echo json_encode(array('status'=>true, 'all_tab'=>$result, 'message'=>'Column '.$row.' on Excel was Not valid, where data on B'.$row.' is '.$worksheet->getCell('B'.$row)->getValue()));
							exit;
						}
					}
			}


			for ($row = 3; $row <= $lastRow-2; $row++) {
				 $no=$worksheet->getCell('A'.$row)->getValue();
				 $style=$worksheet->getStyle('B'.$row)->getFont()->getBold();

				 if($style==1 && !is_numeric($no)){
				 	$tlevel1=$worksheet->getCell('B'.$row)->getValue();
					$id=$this->general_model->select_row("SELECT * FROM `dkp_main_group` WHERE `name` LIKE '%".$tlevel1."%'");
						if(count($id)>0){
							$level1=$id['id'];
						}
						else
						{
							$level1=$this->general_model->insert('dkp_main_group', array('name'=>$tlevel1));
						}

			 		}

					elseif ($style==1 && is_numeric($no)) {
						$tlevel2=$worksheet->getCell('B'.$row)->getValue();
						$idlevel2=$this->general_model->select_row("SELECT * FROM `dkp_group` WHERE `level2` LIKE '%".$worksheet->getCell('B'.$row)->getValue()."%' ORDER BY `id` DESC");
						if(count($id)>0){
							$level2=$idlevel2['id'];
						}
						else
						{
							$level2=$this->general_model->insert('dkp_group', array('level1'=>$level1, 'level2'=>$worksheet->getCell('B'.$row)->getValue()));
						}

					}else{
						// echo $level1.'->'.$level2.'->'.$worksheet->getCell('B'.$row)->getValue().'</br>';
						$weight=round(floatval($worksheet->getCell('F'.$row)->getValue()), 2);
						$data=array(
							'dkp_id'=>$id_dkp,
							'group_id'=>$level2,
							'material_no'=>'MT-'.$no_sppr.'-'.$counter,
							'material_dec'=>$worksheet->getCell('B'.$row)->getValue(),
							'material_name'=>$worksheet->getCell('C'.$row)->getValue(),
							'qty'=>$worksheet->getCell('D'.$row)->getValue(),
							'qty_budget'=>$worksheet->getCell('D'.$row)->getValue(),
							'unit'=>$worksheet->getCell('E'.$row)->getValue(),
							'weight'=>$weight,
							'basic_price'=>$worksheet->getCell('G'.$row)->getValue(),
							'basic_price_budget'=>$worksheet->getCell('G'.$row)->getValue(),
							'tot_basic_price'=>$worksheet->getCell('H'.$row)->getValue(),
							'remarks'=>$worksheet->getCell('I'.$row)->getValue(),
							'create_by'=>$_SESSION['nik'],
							'create_date'=>date('Y-md')
						);
						if($worksheet->getCell('B'.$row)->getValue()==''){
							continue;
						}
						$row_tab=$this->general_model->insert('dkp_material', $data);
						$counter+=1;
						array_push($result, array(
							'row'=>$row,
							'row_tab'=>$row_tab
						));
						// var_dump($data);
					}
				 // if($no!='' && strlen($no)==1){
					//  $result=$this->general_model->select_row("SELECT * FROM `dkp_group` WHERE `level2` LIKE '%".$worksheet->getCell('B'.$row)->getValue()."%' ORDER BY `id` DESC");
					//  var_dump($result); echo '</br>';
				 // }
			}
			echo json_encode(array('status'=>true, 'all_tab'=>$result, 'message'=>'Success Import'));
			unlink($url);
		}

		//sent to approval
		public function sent(){
			$id_dkp=$this->input->post('id_dkp');
			$row=$this->general_model->update('dkp_master', array('status'=>'approval'), array('id_dkp'=>$id_dkp));
			echo json_encode(array('status'=>true, 'id'=>$row, 'id_dkp'=>$id_dkp));
		}

		//Approve
		public function approve(){
			$id_dkp=$this->input->post('id_dkp');
			$row=$this->general_model->update('dkp_master', array('status'=>'approved', 'date_approv_eng'=>date('Y-m-d'), 'approve_by'=>$_SESSION['nik']), array('id_dkp'=>$id_dkp));
			echo json_encode(array('status'=>true, 'id'=>$row, 'id_dkp'=>$id_dkp));
		}

		//get fann_get_cascade_num_candidate_groups
		public function get_group()
		{
			$option=array();
			$sql="SELECT * FROM `dkp_main_group`";
			$main=$this->general_model->select($sql);
			foreach ($main as $key) {
				$id=$key['id'];
				array_push($option, array(
					'text'=>$key['name'],
					'children'=>$this->general_model->select("SELECT id, level2 as 'text' from dkp_group where level1=$id ")
				));
			}
			$data=array(
				array('text'=>'group 1', 'children'=>array(array('id'=>1, 'text'=>'option1'), array('id'=>1, 'text'=>'option2'), array('id'=>3, 'text'=>'option3'))),
				array('text'=>'group 2', 'children'=>array(array('id'=>1, 'text'=>'option1'), array('id'=>1, 'text'=>'option2'), array('id'=>3, 'text'=>'option3')))
			);
			$main=$this->general_model->select("SELECT id, name as 'text' FROM `dkp_main_group`");
			echo json_encode(array('result'=>$option, 'main'=>$main));
		}
	}
