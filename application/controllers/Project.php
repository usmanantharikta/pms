<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

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

  public function index()
  {
    	$this->load->view('project/home');
  }

	public function edit_dkp()
	{
		$sql="SELECT * FROM dkp_master d
		join sppr_master s on s.id_sppr=d.sppr_id
		where d.status='approved' and d.status_project='open' order by id_dkp asc";
		$no_sppr_all=$this->general_model->select($sql);
		// var_dump($no_sppr_all);
		// exit;
		$id_dkp=$this->input->get('id_dkp');
		//var_dump($no_sppr_all);
    $no_sppr=$this->input->get('sppr');
		$data['no_sppr_all']=$no_sppr_all;
    $data['no_sppr']=$no_sppr;
		$data['id_dkp']=$id_dkp;
		$dir = 'uploads/dkp/'.$id_dkp;
		if(is_dir($dir)){
			$files=scandir($dir);
		}else{
			$files='';
		}
		$data['files']=$files;

		$this->load->view('project/form_edit_dkp',$data);
	}

	public function get_file($id_dkp)
	{
		$dir = 'uploads/dkp/'.$id_dkp;
		if(is_dir($dir)){
			$files=scandir($dir);
		}else{
			$files='';
		}
		$link=array();
		for ($i=2; $i <count($files) ; $i++) {
			array_push($link,'<li>
				<a >
				<div class="col1">
					<div class="cont">
						<div class="cont-col1">
							<div class="label label-sm label-success">
								<i class="fa fa-file-o"></i>
							</div>
						</div>
						<div class="cont-col2">
							<div class="desc">
								 '.$files[$i].'
							</div>
						</div>
					</div>
				</div>
				</a>
			</li>');
		}
		// $data['files']=$files;
		// echo json_encode(array('data'=>$files));
		return $link;
	}
	public function list_dkp()
	{
		$this->load->view('project/p_list_dkp');
	}

	public function list_dkp_approval()
	{
		$this->load->view('project/p_list_dkp_approval');
	}

	public function list_dkp_approved()
	{
		$this->load->view('project/p_list_dkp_approved');
	}

	public function get_id_sppr($id)
	{
		$sql="SELECT * FROM `dkp_master` WHERE `id_dkp` = $id";
		$result=$this->general_model->select_row($sql);
		$no_sppr='';
		if(count($result)>0){
			$no_sppr=$result['no_sppr'];
		}
		$files=$this->get_file($id);
		echo json_encode(array('no_sppr'=>$no_sppr, 'link'=>$files));
	}

	public function get_materal($id_dkp){
		$sql="SELECT * FROM dkp_material m
		join dkp_group g on g.id=m.group_id
		join dkp_main_group mg on mg.id=g.level1
		WHERE m.dkp_id=$id_dkp and m.status_material='open' order by g.level1 DESC";
		$data=$this->general_model->select($sql);
		$table=array();
		$type="'dkp_material'";
		$colom="'id_material'";
		foreach ($data as $key) {
			$bp='';//basic price
			$bpb='';//basic price budget
			$tot_bpb=''; //basic price gudget

			if($_SESSION['level']=='spv'){
				$bp=number_format($key['basic_price']);//basic price
				$bpb=number_format($key['basic_price_budget']);//basic price budget
				$tot_bpb=number_format(floatval($key['qty_budget'])*floatval($key['basic_price_budget'])); //basic price gudget
			}

			array_push($table, array(
				$key['id_material'],
				'<a class="btn btn-sm btn-success" title="create" onclick="edit_item('.$key['id_material'].','.$colom.','.$type.')"><i class="glyphicon glyphicon-pencil"></i>Edit</a>',
				$key['material_no'],
				$key['name'],
				$key['level2'],
				$key['material_dec'],
				$key['material_name'],
				$key['qty'],
				$bp,
				$key['unit'],
				$key['weight'],
				$key['remarks'],
				$key['qty_budget'],
				$bpb,
				$tot_bpb,
				$key['update_by_bp']
			));
		}
		echo json_encode(array('data'=>$table));
	}

	public function get_item()
	{
		$id=$this->input->post('id_item');
		$colom=$this->input->post('colom');
		$table=$this->input->post('table');
		$sql="SELECT dkp_id, id_material, material_dec, material_name, qty, basic_price, unit, weight, remarks, basic_price_budget, keterangan_project  FROM $table WHERE $colom='$id'";
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

	public function material_save(){
		$col=array('description', 'qty_budget', 'basic_price_budget');
		// $id_material=$this->input->post('id_material');
		$data=array(
			'qty_budget'=>$this->input->post('qty_budget'),
			'basic_price_budget'=>$this->input->post('basic_price_budget'),
			'material_dec'=>$this->input->post('material_dec'),
			'keterangan_project'=>$this->input->post('keterangan_project'),
			'update_by_bp'=>$_SESSION['nik']
		);
		// var_dump($data);
		$update=$this->general_model->update('dkp_material', $data, array('id_material'=>$this->input->post('id_material')));
		echo json_encode(array('status'=>TRUE, 'id'=>$update));
	}

	//sent to approval
	public function sent(){
		$id_dkp=$this->input->post('id_dkp');
		$row=$this->general_model->update('dkp_master', array('status_project'=>'approval'), array('id_dkp'=>$id_dkp));
		echo json_encode(array('status'=>true, 'id'=>$row, 'id_dkp'=>$id_dkp));
	}

	//get dkp approval
	public function get_dkp_approval()
	{
		$sql="SELECT d.id_dkp, d.no_sppr, d.tag_number, d.create_date, s.customer, s.order_date, s.delivery_date, ss.name_project, ss.quantity, ss.satuan, d.status, d.status_project, c.name_customer FROM dkp_master d
		join sppr_master s on d.sppr_id=s.id_sppr
		JOIN sppr_spesification ss on ss.sppr_id=s.id_sppr
		join customer_name c on c.id_customer=s.customer
		WHERE d.status_project='approval'";
		$data=$this->general_model->select($sql);
		$table=array();
		foreach ($data as $key) {
			$button='<a class="btn btn-sm btn-primary" title="create" onclick=approve_dkp("'.$key['id_dkp'].'")><i class="glyphicon glyphicon-pencil"></i> Approve</a>';
			if($_SESSION['level']!='kabag'){
				$button='';
			}
			array_push($table, array(
				'<a class="btn btn-sm btn-info" title="create" href="'.site_url().'project/approve_dkp?sppr='.$key['no_sppr'].'&id_dkp='.$key['id_dkp'].'&status='.$key['status_project'].'" >'.$key['id_dkp'].'</a>',
				$key['no_sppr'],
				$key['name_customer'],
				$key['order_date'],
				$key['delivery_date'],
				$key['name_project'].' - '.$key['quantity'].' '.$key['satuan'],
				$key['tag_number'],
				'<span class="label label-sm label-warning">'.$key['status_project'].'</span>',
				$button,
			));
		}
		echo json_encode(array('data'=>$table));
	}

	//Approve
	public function approve(){
		$id_dkp=$this->input->post('id_dkp');
		$row=$this->general_model->update('dkp_master', array('status_project'=>'approved', 'date_approv_project'=>date('Y-m-d')), array('id_dkp'=>$id_dkp));
		echo json_encode(array('status'=>true, 'id'=>$row, 'id_dkp'=>$id_dkp));
	}

	//approve_dkp
		public function get_dkp_approved()
		{
			$sql="SELECT d.id_dkp, d.no_sppr,d.tag_number, d.create_date, s.customer, s.order_date, s.delivery_date, ss.name_project, ss.quantity, ss.satuan, d.status, d.date_approv_project, c.name_customer FROM dkp_master d
			join sppr_master s on d.sppr_id=s.id_sppr
			JOIN sppr_spesification ss on ss.sppr_id=s.id_sppr
			join customer_name c on c.id_customer=s.customer
			WHERE d.status_project='approved'";
			$data=$this->general_model->select($sql);
			$table=array();
			foreach ($data as $key) {
				$button='<a class="btn btn-sm btn-primary" title="create" onclick=approve_dkp("'.$key['id_dkp'].'")><i class="glyphicon glyphicon-pencil"></i> Approve</a>';
				if($_SESSION['level']!='kabag'){
					$button='';
				}
				array_push($table, array(
					'<a class="btn btn-sm btn-info" title="create" href="'.site_url().'project/approve_dkp?sppr='.$key['no_sppr'].'&id_dkp='.$key['id_dkp'].'&status='.$key['status'].'" target="_blank" >'.$key['id_dkp'].'</a>',
					$key['no_sppr'],
					$key['name_customer'],
					$key['order_date'],
					$key['delivery_date'],
					$key['name_project'].' - '.$key['quantity'].' '.$key['satuan'],
					$key['tag_number'],
					'<span class="label label-sm label-success">'.$key['status'].'</span>',
					$key['date_approv_project']
					// $button,
				));
			}
			echo json_encode(array('data'=>$table));
		}

		//get dkp for page list_dkp
			public function get_dkp()
			{
				$sql="SELECT d.id_dkp, d.no_sppr, d.create_date, d.tag_number, s.customer, s.order_date, s.delivery_date, ss.name_project, ss.quantity, ss.satuan, d.status, c.name_customer FROM dkp_master d
				join sppr_master s on d.sppr_id=s.id_sppr
				JOIN sppr_spesification ss on ss.sppr_id=s.id_sppr
				join customer_name c on c.id_customer=s.customer
				WHERE d.status='approved' and d.status_project='open'";
				$data=$this->general_model->select($sql);
				$table=array();
				foreach ($data as $key) {
					$button='<a class="btn btn-sm btn-primary" title="create" href="'.site_url().'project/edit_dkp?sppr='.$key['no_sppr'].'&id_dkp='.$key['id_dkp'].'"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
					// if($_SESSION['level']!='kabag'){
					// 	$button='';
					// }
					if($this->cek_all_item($key['id_dkp'])){
						$status='<span class="label label-sm label-success">Open</span>';
					}else{
						$status='<span class="label label-sm label-danger">Cancel</span>';
					}
					array_push($table, array(
						// '<a class="btn btn-sm btn-info" title="create" href="'.site_url().'project/approve_dkp?sppr='.$key['no_sppr'].'&id_dkp='.$key['id_dkp'].'&status='.$key['status'].'" target="_blank" >'.$key['id_dkp'].'</a>',
						$key['id_dkp'],
						$key['no_sppr'],
						$key['name_customer'],
						$key['order_date'],
						$key['delivery_date'],
						$key['name_project'].' - '.$key['quantity'].' '.$key['satuan'],
						$key['tag_number'],
						$status,
						$button,
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

		public function approve_dkp()
		{
			$sql="SELECT no_sppr FROM `sppr_master` order by no_sppr asc";
			$no_sppr_all=$this->general_model->select($sql);
			$id_dkp=$this->input->get('id_dkp');
			//var_dump($no_sppr_all);
			$no_sppr=$this->input->get('sppr');
			$data['no_sppr_all']=$no_sppr_all;
			$data['no_sppr']=$no_sppr;
			$data['id_dkp']=$id_dkp;
			$data['status_progress']=$this->input->get('status');

			$dir = 'uploads/dkp/'.$id_dkp;

			if(is_dir($dir)){
				$files=scandir($dir);
			}else{
				$files='';
			}
			$data['files']=$files;

			$this->load->view('project/view_dkp', $data);
		}
}
