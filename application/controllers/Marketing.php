<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marketing extends CI_Controller {

	/**
	 * This controller use for all activity marketing
	 *
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('general_model');
		$this->load->model('marketing_model');
	}

	/*
	*
	* THIS FUNCTIO IS ALL FOR LOAD THE PAGE ON MARKETING PORTAL
	*
	*/

	//dashboard
  public function index()
  {
    	$this->load->view('marketing/home');
  }

	//insert or create sppr_master
	public function create_sppr()
	{
		$data['attach']=$this->marketing_model->get_attach();
		$data['nonhyg']=$this->marketing_model->get_nonhyg();
		$data['finishing']=$this->marketing_model->get_fin();
		$data['certif']=$this->general_model->select('SELECT * FROM `sppr_certification`');
		$data['other']=$this->general_model->select('SELECT * FROM `sppr_other`');
		// var_dump($data);
		$this->load->view('marketing/form_sppr', $data);
	}

	//list all sppr
	public function list_sppr()
	{
		$data['attach']=$this->marketing_model->get_attach();
		$data['nonhyg']=$this->marketing_model->get_nonhyg();
		$data['finishing']=$this->marketing_model->get_fin();
		$data['certif']=$this->general_model->select('SELECT * FROM `sppr_certification`');
		$data['other']=$this->general_model->select('SELECT * FROM `sppr_other`');

		$sql='SELECT distinct no_sppr FROM sppr_master';
		$arr_sppr=$this->general_model->select($sql);
		$sql1='SELECT distinct name_customer, id_customer FROM customer_name';
		$arr_sppr1=$this->general_model->select($sql1);
		$data['sppr']=$arr_sppr;
		$data['customer']=$arr_sppr1;
		$this->load->view('marketing/list_sppr', $data);
	}

	//input new costumer
	public function input_customer()
	{
		$this->load->view('marketing/form_add_customer');
	}

	//list customer
	public function list_customer()
	{
		$this->load->view('marketing/list_customer');
	}

	//get name customer for input sprr or include new no order
	public function get_customer()
	{
		$sql="SELECT * FROM customer_master m right join customer_name n on n.id_customer=m.customer_id ";
		$list=$this->general_model->select($sql);

		//table on view dataType
		$table=array(); // array table list customer

		foreach ($list as $key) {
			array_push($table, array(
				$key['id_customer'],
				$key['name_customer'],
				$key['order_id'],
				$key['no_po'],
				$key['date_po']
			));
		}

		echo json_encode(array('data'=>$table));
	}

	//save sppr using ajax
	public function save_sppr()
	{
		$colom=array('customer', 'customer_id', 'order_date', 'delivery_date', 'pic', 'telp', 'ship_to_address', 'ref_no', 'po_no', 'contact_no', 'email', 'fax',  'mhours', 'stainless_steel', 'carbon_steel', 'weight', 'me', 'reserved', 'create_by', 'date_create', 'status');
		$data=array('no_sppr'=>$this->input->post('no_sppr'));
		//validate
		$this->_validate();
		//get data from form
		for ($i=0; $i <count($colom) ; $i++) {
			$aa=array($colom[$i]=>$this->input->post($colom[$i]));
			$data=array_merge($data, $aa);
		}
		$ad_info=array('status'=>'open','date_create'=>date('Y-m-d'));
		$data=array_merge($data, $ad_info);
		$checkbox=array('attachement_id', 'nonhygienic_id', 'finishing_id', 'certification_id','other_id' );
		$value='';
		for ($h=0; $h < count($checkbox) ; $h++) {
			$val=$this->input->post($checkbox[$h]);
			for ($i=0; $i < count($val) ; $i++)
			{
			$value.=$val[$i].',';
			}

			$nilai=array($checkbox[$h]=>$value);
			$data=array_merge($data, $nilai);
			$value='';
		}
		// var_dump($data);
		$insert=$this->general_model->insert('sppr_master', $data);

		//get spec
		$spec_col=array('name_project', 'quantity', 'satuan', 'description');
		$data_spec=array('sppr_id'=>$insert);

		for ($i=0; $i <count($spec_col) ; $i++) {
			$ii=array($spec_col[$i]=>$this->input->post($spec_col[$i]));
			$data_spec=array_merge($data_spec, $ii);
		}
		//table , data
		$id_spec=$this->general_model->insert('sppr_spesification', $data_spec);

		//upload attachment
		$dataa['error_string'] = array();
		$dataa['inputerror'][] = array();
		$dataa['status'] = TRUE;

		$attach_file=$this->marketing_model->get_attach();
		foreach ($attach_file as $key ) {
			$up_mes=$this->upload_file($this->input->post('no_sppr'), $key['id_attachement'].'_attachement', $key['id_attachement'], 'sppr_attachement');
			// var_dump($up_mes);
			if(($up_mes!=1) && ($up_mes!=null)){
				$dataa['error_string'][] = $up_mes;
				$dataa['inputerror'][] =  $key['id_attachement'].'_attachement[]';
				$dataa['status'] = FALSE;
			}
		}

		// //upload nonhi
		// $nonhyg_file=$this->marketing_model->get_nonhyg();
		// foreach ($nonhyg_file as $key ) {
		// 	$this->upload_file($this->input->post('no_sppr'), $key['id_nonhygienic'].'_nonhygienic', $key['id_nonhygienic'], 'sppr_nonhygienic');
		// }
    //
		// //upload finishing
		// $finishing_file=$this->marketing_model->get_fin();
		// foreach ($finishing_file as $key) {
		// 	$this->upload_file($this->input->post('no_sppr'), $key['id_finishing'].'_finishing', $key['id_finishing'], 'sppr_finishing');
		// }
    //
		// // upload certif
		// $certif_file=$this->general_model->select('SELECT * FROM `sppr_certification`');
		// foreach ($certif_file as $key) {
		// 	$this->upload_file($this->input->post('no_sppr'), $key['id_certif'].'_certif', $key['id_certif'], 'sppr_certification');
		// }
    //
		// //upload Other
		// $other_file=$this->general_model->select('SELECT * FROM `sppr_other`');
		// foreach ($other_file as $key ) {
		// 	$this->upload_file($this->input->post('no_sppr'), $key['id_other'].'_other', $key['id_other'], 'sppr_other');
		// }

		if($dataa['status'] === FALSE)
		{
				echo json_encode($dataa);
		}
		else {
			echo json_encode(array('status'=>true, 'id_sppr'=>$insert, 'id_spec'=>$id_spec));
		}

	}

	//upload file on sppr
	public function upload_file($no_sppr, $name, $folder, $table)
	{
		$filesCount = count($_FILES[$name]['name']);
		// echo $_FILES[$name]['name'][0].'</br>';
		if($_FILES[$name]['name'][0]!=''){
			for($i = 0; $i < $filesCount; $i++){
					$_FILES['userFile']['name'] = $_FILES[$name]['name'][$i];
					$_FILES['userFile']['type'] = $_FILES[$name]['type'][$i];
					$_FILES['userFile']['tmp_name'] = $_FILES[$name]['tmp_name'][$i];
					$_FILES['userFile']['error'] = $_FILES[$name]['error'][$i];
					$_FILES['userFile']['size'] = $_FILES[$name]['size'][$i];

					$uploadPath = 'uploads/sppr/'.$no_sppr.'/'.$table.'/'.$folder;
					if (!is_dir($uploadPath)) {
							 mkdir($uploadPath, 0775, TRUE);
					 }
					 $config['upload_path'] = $uploadPath;
					 // $config['allowed_types'] = '*';
					 $config['allowed_types'] = 'pdf';
 				 	 $config['max_size']	= '4800';
					 $this->load->library('upload', $config);
					 $this->upload->initialize($config);
					 if ( ! $this->upload->do_upload('userFile'))
					 {
						 return $_FILES['userFile']['name'].' '.$this->upload->display_errors();
						 // echo json_encode('upload failed');
					 }else{
						 return 1;
						 // echo json_encode('upload succes');
					 }
			}
		}
	}

	//save edit sppr
	public function save_edit()
	{
		$colom=array('customer', 'customer_id', 'order_date', 'delivery_date', 'pic', 'telp', 'ship_to_address', 'ref_no', 'po_no', 'contact_no', 'email', 'fax',  'mhours', 'stainless_steel', 'carbon_steel', 'weight', 'me', 'reserved', 'create_by', 'date_create', 'status');
		$data=array('no_sppr'=>$this->input->post('no_sppr'));
		$id_sppr=$this->input->post('id_sppr');
		//validate
		// $this->_validate();
		//get data from form
		for ($i=0; $i <count($colom) ; $i++) {
			$aa=array($colom[$i]=>$this->input->post($colom[$i]));
			$data=array_merge($data, $aa);
		}
		$ad_info=array('status'=>'open','date_create'=>date('Y-m-d'));
		$data=array_merge($data, $ad_info);
		$checkbox=array('attachement_id', 'nonhygienic_id', 'finishing_id', 'certification_id','other_id');
		$value='';
		for ($h=0; $h < count($checkbox) ; $h++) {
			$val=$this->input->post($checkbox[$h]);
			for ($i=0; $i < count($val) ; $i++)
			{
			$value.=$val[$i].',';
			}

			$nilai=array($checkbox[$h]=>$value);
			$data=array_merge($data, $nilai);
			$value='';
		}
		// var_dump($data);
		$update=$this->general_model->update('sppr_master', $data, array('id_sppr'=>$id_sppr));

		//get spec
		$spec_col=array('name_project', 'quantity', 'satuan', 'description');
		$data_spec=array('sppr_id'=>$id_sppr);

		for ($i=0; $i <count($spec_col) ; $i++) {
			$ii=array($spec_col[$i]=>$this->input->post($spec_col[$i]));
			$data_spec=array_merge($data_spec, $ii);
		}
		//table , data
		$id_spec=$this->general_model->update('sppr_spesification', $data_spec, array('sppr_id'=>$id_sppr));

		//upload attachment
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
		$attach_file=$this->marketing_model->get_attach();
		foreach ($attach_file as $key ) {
			$up_mes=$this->upload_file($this->input->post('no_sppr'), $key['id_attachement'].'_attachement', $key['id_attachement'], 'sppr_attachement');
			if(($up_mes!=1) && ($up_mes!=null)){
				$data['error_string'] = $up_mes;
				$data['inputerror'][] = $key['id_attachement'].'_attachement';
				$data['status'] = FALSE;
			}
		}

		if($data['status'] === FALSE)
		{
				echo json_encode($data);
		}
		else {
			echo json_encode(array('status'=>true, 'id_sppr'=>$update, 'id_spec'=>$id_spec));
		}
	}

	//validate input sppr
	private function _validate()
		{
				$colom=array('no_sppr', 'customer', 'order_date', 'delivery_date', 'pic', 'telp', 'ship_to_address', 'ref_no', 'po_no',  'name_project', 'quantity', 'satuan');
				$data = array();
				$data['error_string'] = array();
				$data['inputerror'] = array();
				$data['status'] = TRUE;

				for ($i=0; $i < count($colom) ; $i++) {
					if($this->input->post($colom[$i]) == '')
					{
							$data['inputerror'][] = $colom[$i];
							$data['error_string'][] ='Field '.$colom[$i].' is required !!!';
							$data['status'] = FALSE;
					}
				}
				$sql="select * from sppr_master where no_sppr='".$this->input->post('no_sppr')."'";
				$result=$this->general_model->select_row($sql);

				if( count($result)!= 0)
				{
						$data['inputerror'][] = 'no_sppr';
						$data['error_string'][] ='No. Sppr already exists !!!';
						$data['status'] = FALSE;
				}

				if($data['status'] === FALSE)
				{
						echo json_encode($data);
						exit();
				}
		}

	//not use
	public function upload_sppr(){
		$no_sppr=$this->input->post('no_sppr_file');
		$filesCount = count($_FILES['userfile']['name']);
		for($i = 0; $i < $filesCount; $i++){
				$_FILES['userFile']['name'] = $_FILES['userfile']['name'][$i];
				$_FILES['userFile']['type'] = $_FILES['userfile']['type'][$i];
				$_FILES['userFile']['tmp_name'] = $_FILES['userfile']['tmp_name'][$i];
				$_FILES['userFile']['error'] = $_FILES['userfile']['error'][$i];
				$_FILES['userFile']['size'] = $_FILES['userfile']['size'][$i];

				$uploadPath = 'uploads/sppr/'.$no_sppr;
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

		// $no_sppr=$this->input->post('no_sppr_file');
		// $uploadPath = 'uploads/sppr/'.$no_sppr;
		// if (!is_dir($uploadPath)) {
		// 		 mkdir($uploadPath, 0777, TRUE);
		//  }
		//  $config['upload_path'] = $uploadPath;
		//  $config['allowed_types'] = '*';
		//  $this->load->library('upload', $config);
		//  $this->upload->initialize($config);
		//  if ( ! $this->upload->do_upload('userfile'))
		//  {
		// 	 echo json_encode('upload failed');
		//  }else{
		// 	 echo json_encode('upload succes');
		//  }
	}

	//get data sppr
	public function get_sppr()
	{
		$sql='SELECT m.id_sppr, m.no_sppr, m.customer, m.order_date, m.delivery_date , m.status, s.name_project, s.satuan, s.quantity FROM sppr_master m JOIN sppr_spesification s on s.sppr_id=m.id_sppr';
		$arr_sppr=$this->general_model->select($sql);
		$table=array(); // for dataTables
		foreach ($arr_sppr as $key) {
			if($key['status']=='open'){
				$stat='<span class="label label-sm label-success">Open</span>';
				$button='<a class="btn btn-sm btn-primary" title="Cancel" onclick="cancel('.$key['id_sppr'].')"><i class="glyphicon glyphicon-pencil"></i> Cancel</a>
				<a class="btn btn-sm btn-primary" title="Edit" onclick="edit('.$key['id_sppr'].')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				<a class="btn btn-sm btn-info" title="Edit" onclick="edit('.$key['id_sppr'].')"><i class="glyphicon glyphicon-pencil"></i> Hold</a>';
			}
			else{
				$stat='<span class="label label-sm label-danger">Cancel</span>';
				$button='';
			}
			array_push($table,array(
				'<a onclick="show_detail('.$key['id_sppr'].')">'.$key['no_sppr'].'</a>',
				$key['customer'],
				$key['order_date'],
				$key['delivery_date'],
				$stat,
				$key['name_project'].' - '.$key['quantity'].' '.$key['satuan'],
				$button,
			));
		}
		echo json_encode(array('data'=>$table));
	}

	//change status to cancel
	public function cancel($no_sppr){
		$data=array('status'=>'cancel');
		$id=$this->general_model->update('sppr_master', $data, array('id_sppr'=>"$no_sppr"));
		$id_dkp=$this->general_model->update('dkp_master', $data, array('sppr_id'=>"$no_sppr"));
		echo json_encode(array('status'=>true, 'id'=>$id, 'no_sppr'=>$no_sppr));
	}

	//change status to done'
	public function done($no_sppr)
	{
		$data=array('status'=>'done');
		$id=$this->general_model->update('sppr_master', $data, array('id_sppr'=>"$no_sppr"));
		// $id_dkp=$this->general_model->update('dkp_master', $data, array('sppr_id'=>"$no_sppr"));
		echo json_encode(array('status'=>true, 'id'=>$id, 'no_sppr'=>$no_sppr));
	}

	//change status to hold
	public function hold($no_sppr){
		$data=array('status'=>'hold');
		$id=$this->general_model->update('sppr_master', $data, array('id_sppr'=>"$no_sppr"));
		$id_dkp=$this->general_model->update('dkp_master', $data, array('sppr_id'=>"$no_sppr"));
		echo json_encode(array('status'=>true, 'id'=>$id, 'no_sppr'=>$no_sppr));
	}

	//change status to unhold
	public function unhold($no_sppr){
		$data=array('status'=>'open');
		$id=$this->general_model->update('sppr_master', $data, array('id_sppr'=>"$no_sppr"));
		$id_dkp=$this->general_model->update('dkp_master', $data, array('sppr_id'=>"$no_sppr"));
		echo json_encode(array('status'=>true, 'id'=>$id, 'no_sppr'=>$no_sppr));
	}


	//get data sppr by id selected
	public function get_sppr_get_id($no_sppr)
	{
		// echo $no_sppr;
		// exit;
		$sql='SELECT m.*, s.*, c.* FROM sppr_master m JOIN sppr_spesification s on s.sppr_id=m.id_sppr join customer_name c on c.id_customer=m.customer where m.id_sppr="'.$no_sppr.'"';
		$arr_sppr=$this->general_model->select_row($sql);
		//scandir of sppr to get files
		if(!isset($arr_sppr)){
			$sql='SELECT m.*, s.*, c.* FROM sppr_master m JOIN sppr_spesification s on s.sppr_id=m.id_sppr join customer_name c on c.id_customer=m.customer where m.no_sppr="'.$no_sppr.'"';
			$arr_sppr=$this->general_model->select_row($sql);
		}

		//get file
		$table=array();

		//upload attachment
		$attach_file=$this->marketing_model->get_attach();
		foreach ($attach_file as $key ) {
			$dump=$this->get_file('uploads/sppr/'.$arr_sppr['no_sppr'].'/'.'sppr_attachement/'.$key['id_attachement'], 'Attachement', $key['type_attachement']);
			if(count($dump>0)){
				for ($i=0; $i <count($dump) ; $i++) {
					array_push($table, $dump[$i]);
				}
			}
		}

		//upload nonhi
		$nonhyg_file=$this->marketing_model->get_nonhyg();
		foreach ($nonhyg_file as $key ) {
			$dump=$this->get_file('uploads/sppr/'.$arr_sppr['no_sppr'].'/'.'sppr_nonhygienic/'.$key['id_nonhygienic'], 'Nonhygienic', $key['type']);
			if(count($dump>0)){
				for ($i=0; $i <count($dump) ; $i++) {
					array_push($table, $dump[$i]);
				}
			}
		}

		//upload finishing
		$finishing_file=$this->marketing_model->get_fin();
		foreach ($finishing_file as $key) {
			$dump=$this->get_file('uploads/sppr/'.$arr_sppr['no_sppr'].'/'.'sppr_finishing/'.$key['id_finishing'], 'Finishing', $key['type'].'-'.$key['kind']);
			if(count($dump>0)){
				for ($i=0; $i <count($dump) ; $i++) {
					array_push($table, $dump[$i]);
				}
			}
		}

		// upload certif
		$certif_file=$this->general_model->select('SELECT * FROM `sppr_certification`');
		foreach ($certif_file as $key) {
			$dump=$this->get_file('uploads/sppr/'.$arr_sppr['no_sppr'].'/'.'sppr_certification/'.$key['id_certif'], 'Certification', $key['name']);
			if(count($dump>0)){
				for ($i=0; $i <count($dump) ; $i++) {
					array_push($table, $dump[$i]);
				}
			}
		}

		//upload Other
		$other_file=$this->general_model->select('SELECT * FROM `sppr_other`');
		foreach ($other_file as $key ) {
			$dump=$this->get_file('uploads/sppr/'.$arr_sppr['no_sppr'].'/'.'sppr_other/'.$key['id_other'], 'Other', $key['name']);
			if(count($dump>0)){
				for ($i=0; $i <count($dump) ; $i++) {
					array_push($table, $dump[$i]);
				}
			}
		}
		//________________________________________________________________________________________________________________________________________________________________________
		$new_arr=array();
		$colom=array('id_sppr', 'no_sppr', 'name_customer', 'customer', 'order_date', 'delivery_date', 'pic', 'telp', 'ship_to_address', 'ref_no', 'po_no', 'contact_no', 'email', 'fax',  'mhours', 'stainless_steel', 'carbon_steel', 'weight', 'me', 'reserved', 'create_by', 'date_create', 'status', 'name_project', 'quantity', 'satuan', 'description');
		// $attachment='';
		foreach ($arr_sppr as $key => $value) {
			for ($i=0; $i < count($colom); $i++) {
				if($key==$colom[$i]){
					array_push($new_arr, $value);
				}
			}
			if($key=='attachement_id'){
				$attachment=$value;
			}
			if($key=='nonhygienic_id'){
				$nonhyg=$value;
			}
			if($key=='finishing_id'){
				$finishing=$value;
			}
			if($key=='certification_id'){
				$certification=$value;
			}
			if($key=='other_id'){
				$other=$value;
			}
		}
		//$checkbox
		$ar_attach=explode(',', $attachment);
		$ar_nonhyg=explode(',', $nonhyg);
		$ar_finishing=explode(',', $finishing);
		$ar_certif=explode(',', $certification);
		$arr_other=explode(',', $other);

		//get selected attachmnet
		if($attachment!='')
		{
			$where_attach='where ';
			for ($i=0; $i < count($ar_attach)-1 ; $i++) {
				if($i==0){
					$where_attach.="id_attachement='$ar_attach[$i]'";
				}else{
					$where_attach.=" or id_attachement='$ar_attach[$i]'";
				}
			}

			$sql="SELECT * FROM sppr_attachement ".$where_attach;
			$input_attac=$this->general_model->select($sql);
		}
		else {
			$input_attac='';
		}

		//get nonhygienic
		if($nonhyg!='')
		{
			$where_nonhyg='where ';
			for ($i=0; $i < count($ar_nonhyg)-1 ; $i++) {
				if($i==0){
					$where_nonhyg.="id_nonhygienic='$ar_nonhyg[$i]'";
				}else{
					$where_nonhyg.=" or id_nonhygienic='$ar_nonhyg[$i]'";
				}
			}

			$sql1="SELECT * FROM `sppr_nonhygienic` ".$where_nonhyg;
			$input_nonhyg=$this->general_model->select($sql1);
		}
		else{
			$input_nonhyg="";
		}

		//finishing
		if($finishing!='')
		{
			$where_finishing='where ';
			for ($i=0; $i < count($ar_finishing)-1 ; $i++) {
				if($i==0){
					$where_finishing.="id_finishing='$ar_finishing[$i]'";
				}else{
					$where_finishing.=" or id_finishing='$ar_finishing[$i]'";
				}
			}

			$sql2="SELECT * FROM `sppr_finishing` ".$where_finishing;
			$input_finishing=$this->general_model->select($sql2);
		}else {
			$input_finishing='';
		}

		echo json_encode(array('table'=>$table, 'master'=>$new_arr, 'attachment'=>$input_attac, 'nonhygienic'=>$input_nonhyg, 'finishing'=>$input_finishing, 'certif'=>$ar_certif, 'other'=>$arr_other));
	}

	//get file was uploaded
	public function get_file($folder, $main, $jenis )
	{
		$data=array();
		if(is_dir($folder)){
			$files=scandir($folder);
		}else{
			return $data;
		}

		for ($i=2; $i < count($files) ; $i++) {
			$link="'".$folder."/".$files[$i]."'";
			array_push($data, array(
				$main,
				$jenis,
				'<a download href="'.base_url().$folder.'/'.$files[$i].'">'.$files[$i].'</a>',
				'<a class="btn btn-danger" onclick="delete_file('.$link.')"><i class"fa fa-trash"></i>Delete</a>'
			));
		}
		return $data;
	}

	//delete files
	public function delete_file()
	{
		$link=$this->input->post('file');
		if(unlink($link)) {
			echo json_encode("succes");
			}
			else {
			echo json_encode("error");
			}
	}

	//list sppr for show on table using ajax
	public function filter()
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
		// exit;
		$sql='SELECT m.id_sppr, m.no_sppr, c.name_customer, cm.order_id, cm.no_po, m.order_date, m.delivery_date , m.status, s.name_project, s.satuan, s.quantity FROM sppr_master m
		JOIN sppr_spesification s on s.sppr_id=m.id_sppr
		join customer_master cm on cm.id_order=m.po_no
		join customer_name c on c.id_customer=m.customer'.$where;
		$arr_sppr=$this->general_model->select($sql);
		$table=array(); // for dataTables
		foreach ($arr_sppr as $key) {
			if($key['status']=='open'){
				$stat='<span class="label label-sm label-success">Open</span>';
				$button='<a class="btn btn-sm btn-primary" title="Cancel" onclick="cancel('.$key['id_sppr'].')"><i class="fa fa-close"></i> Cancel</a>
				<a class="btn btn-sm btn-warning" title="Edit" onclick="edit('.$key['id_sppr'].')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				<a class="btn btn-sm btn-success" title="Edit" onclick="done('.$key['id_sppr'].')"><i class="fa fa-stop"></i> Done</a>
				<a class="btn btn-sm green-jungle" title="Edit" onclick="hold('.$key['id_sppr'].')"><i class="fa fa-hand-stop-o"></i> Hold</a>';

			}
			elseif ($key['status']=='hold') {
				$stat='<span class="label label-sm label-warning">Hold</span>';
				$button='<a class="btn btn-sm green-jungle" title="Edit" onclick="unhold('.$key['id_sppr'].')"><i class="fa fa-hand-peace-o"></i> Unhold</a>';
			}
			elseif ($key['status']=='done') {
				$stat='<span class="label label-sm label-success">'.$key['status'].'</span>';
				$button='';
			}
			else{
				$stat='<span class="label label-sm label-danger">Cancel</span>';
				$button='';
			}
			array_push($table,array(
				'<a onclick="show_detail('.$key['id_sppr'].')">'.$key['no_sppr'].'</a>',
				$key['name_customer'],
				$key['order_id'],
				$key['no_po'],
				$key['order_date'],
				$key['delivery_date'],
				$stat,
				$key['name_project'].' - '.$key['quantity'].' '.$key['satuan'],
				$button,
			));
		}
		echo json_encode(array('isi'=>$table));
	}

	//get name customer at page input new Customer
	public function get_name()
	{
		$option1=array('id'=>'0', 'text'=>'Add New');
		$sql="SELECT distinct * FROM `customer_master`";

		$main=$this->general_model->select($sql);
		$option2=$this->general_model->select("SELECT distinct id_customer as 'id', name_customer as 'text' FROM `customer_name`");
		array_push($option2, $option1);

		echo json_encode(array('result'=>$option2));
	}

	public function get_name_customer()
	{
		$option1=array('id'=>'0', 'text'=>'Add New');
		$sql="SELECT distinct * FROM `customer_master`";

		$main=$this->general_model->select($sql);
		$option2=$this->general_model->select("SELECT distinct m.customer_id as 'id', n.name_customer as 'text' FROM customer_master m join customer_name n on n.id_customer=m.customer_id ");
		array_push($option2, $option1);

		echo json_encode(array('result'=>$option2));
	}

	public function get_order($id)
	{
		$option1=array('id'=>'0', 'text'=>'Add New');
		//get order_id
		$sql2="SELECT order_id as 'id', order_id as 'text' from customer_master where customer_id='$id'";
		$order=$this->general_model->select($sql2);
		array_push($order, $option1);
		echo json_encode(array('order'=>$order));
	}

	//save customer_master
	public function save_customer()
	{
		$customer=$this->input->post('customer');
		$order_id=$this->input->post('order_id');
		$order_id_new=$this->input->post('new_order_id');
		$order='';
		if($order_id=='0'){
			$order=$order_id_new;
		}else {
			$order=$order_id;
		}
		$col=array('no_po', 'date_po');
		$data=array('customer_id'=>$customer);
		$data=array_merge($data, array('order_id'=>$order));
		for ($i=0; $i < count($col) ; $i++) {
			$dump=array($col[$i]=>$this->input->post($col[$i]));
			$data=array_merge($data, $dump);
		}

		$insert=$this->general_model->insert('customer_master', $data);

		echo json_encode(array('status'=>true, 'id'=>$insert, 'data'=>array('name1'=>$customer), 'isi'=>$data));
	}

	public function save_name()
	{
		$name=$this->input->post('name_cus');
		$data=array('name_customer'=>$name);
		$insert=$this->general_model->insert('customer_name', $data);

		echo json_encode(array('status'=>true, 'id'=>$insert,'isi'=>$data));
	}

	public function get_po_no($name)
	{
		// $id=$this->input->get('nama');
		$option=array();
		$sql="SELECT * FROM `customer_master` where customer_id='$name'";
		$main=$this->general_model->select($sql);
		foreach ($main as $key) {
			$id=$key['id_order'];
			array_push($option, array(
				'text'=>$key['order_id'],
				'children'=>$this->general_model->select("SELECT id_order as 'id', no_po as 'text' from customer_master where id_order='$id' ")
			));
		}
		$option1=array('text'=>'New', 'children'=>array(array('id'=>'0', 'text'=>'Add New')));
		array_push($option, $option1);
		$main=$this->general_model->select("SELECT id, name as 'text' FROM `dkp_main_group`");
		echo json_encode(array('order'=>$option));
	}

	public function get_order_data()
	{
		$id_order=$this->input->post('po_no'); //id order namun di form namanya po_no
		$sql2="SELECT id_order, date_po FROM `customer_master` WHERE id_order='$id_order'";
		$result=$this->general_model->select_row($sql2);
		$input=array();

		foreach ($result as $key => $value) {
			array_push($input, $value);
		}
		echo json_encode(array('result'=>$input));
	}

}
