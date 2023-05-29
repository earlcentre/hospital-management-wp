<?php
MJ_hmgt_browser_javascript_check();
$user_object=new MJ_hmgt_user();	
$active_tab=isset($_REQUEST['tab'])?$_REQUEST['tab']:'doctorlist'; 
//access right
$user_access=MJ_hmgt_get_userrole_wise_access_right_array();

if (isset ( $_REQUEST ['page'] ))
{	
	if($user_access['view']=='0')
	{	
		MJ_hmgt_access_right_page_not_access_message();
		die;
	}
	if(!empty($_REQUEST['action']))
	{
		if (isset ( $_REQUEST ['page'] ) && $_REQUEST ['page'] == $user_access['page_link'] && ($_REQUEST['action']=='edit'))
		{
			if($user_access['edit']=='0')
			{	
				MJ_hmgt_access_right_page_not_access_message();
				die;
			}			
		}
		if (isset ( $_REQUEST ['page'] ) && $_REQUEST ['page'] == $user_access['page_link'] && ($_REQUEST['action']=='delete'))
		{
			if($user_access['delete']=='0')
			{	
				MJ_hmgt_access_right_page_not_access_message();
				die;
			}	
		}
		if (isset ( $_REQUEST ['page'] ) && $_REQUEST ['page'] == $user_access['page_link'] && ($_REQUEST['action']=='insert'))
		{
			if($user_access['add']=='0')
			{	
				MJ_hmgt_access_right_page_not_access_message();
				die;
			}	
		} 
	}
}
//SAVE DOCTOR DATA
if(isset($_POST['save_doctor']))
{
	$nonce = $_POST['_wpnonce'];
	if (wp_verify_nonce( $nonce, 'save_doctor_nonce' ) )
	{
		if(isset($_FILES['doctor_cv']) && !empty($_FILES['doctor_cv']) && $_FILES['doctor_cv']['size'] !=0)
		{
			if($_FILES['doctor_cv']['size'] > 0)
				$cv=MJ_hmgt_load_documets($_FILES['doctor_cv'],'doctor_cv','CV');
		}
		else
		{
			if(isset($_REQUEST['hidden_cv']))
				$cv=$_REQUEST['hidden_cv'];
		}
			
		if(isset($_FILES['education_certificate']) && !empty($_FILES['education_certificate']) && $_FILES['education_certificate']['size'] !=0)
		{
			if($_FILES['education_certificate']['size'] > 0)
				$education_cert=MJ_hmgt_load_documets($_FILES['education_certificate'],'education_certificate','Edu');
		}
		else{
			if(isset($_REQUEST['hidden_education_certificate']))
				$education_cert=$_REQUEST['hidden_education_certificate'];
		}
			
		if(isset($_FILES['experience_cert']) && !empty($_FILES['experience_cert']) && $_FILES['experience_cert']['size'] !=0)
		{
			if($_FILES['experience_cert']['size'] > 0)
				$experience_cert=MJ_hmgt_load_documets($_FILES['experience_cert'],'experience_cert','Exp');
		}
		else
		{
			if(isset($_REQUEST['hidden_exp_certificate']))
				$experience_cert=$_REQUEST['hidden_exp_certificate'];
		}
			
		if(isset($_FILES['upload_user_avatar_image']) && !empty($_FILES['upload_user_avatar_image']) && $_FILES['upload_user_avatar_image']['size'] !=0)
		{
			if($_FILES['upload_user_avatar_image']['size'] > 0)
			{
			 $docter_image=MJ_hmgt_load_documets($_FILES['upload_user_avatar_image'],'upload_user_avatar_image','pimg');
			$docter_image_url=content_url().'/uploads/hospital_assets/'.$docter_image;
			}
			else 
			{
				$docter_image=$_REQUEST['hidden_upload_user_avatar_image'];
			$docter_image_url=$docter_image;
			}
				
		}
		else
		{
			if(isset($_REQUEST['hidden_upload_user_avatar_image']))
				$docter_image=$_REQUEST['hidden_upload_user_avatar_image'];
			$docter_image_url=$docter_image;
		}
		
		if(isset($_REQUEST['action'])&& $_REQUEST['action']=='insert')
		{

			if( !email_exists( $_POST['email'] ) && !username_exists( $_POST['username'] ))
			{	
			   $ext=MJ_hmgt_check_valid_extension($docter_image_url);
			   if(!$ext == 0)
				{
					 $cv_url=$cv;
					  $education_cert_url=$education_cert;
					  $experience_cert_url=$experience_cert;
					  $ext1=MJ_hmgt_check_valid_file_extension($cv_url);
					  $ext2=MJ_hmgt_check_valid_file_extension($education_cert_url);
					  $ext3=MJ_hmgt_check_valid_file_extension($experience_cert_url);
					if(!$ext1 == 0 && !$ext2 == 0 && !$ext3 == 0  )
					{
						$result=$user_object->MJ_hmgt_add_user($_POST);
						$returnans=update_user_meta( $result,'hmgt_user_avatar',$docter_image_url);
						$user_object->MJ_hmgt_upload_documents($cv,$education_cert,$experience_cert,$result);
						if($result)
						{
							wp_redirect ( home_url() . '?dashboard=user&page=doctor&tab=doctorlist&message=1');
						}
					}
					else
					{ ?>
						<div id="messages" class="alert_msg alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
						</button>
									<p><p><?php esc_html_e('Sorry, only PDF files are allowed.','hospital_mgt');?></p></p>
						</div><?php 
					}
				}
				else
				{ ?>
					<div id="messages" class="alert_msg alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
					</button>
						<p><p><?php esc_html_e('Sorry, only JPG, JPEG, PNG & GIF files are allowed.','hospital_mgt');?></p></p>
					</div>
					<?php 
				}
			}
			else
			{
			?>
				<div id="messages" class="alert_msg alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
					<p><?php esc_html_e('Username Or Emailid Already Exist.','hospital_mgt');?></p>
				</div>
			 <?php  
			} 
		}
		else
		{
			$ext=MJ_hmgt_check_valid_extension($docter_image_url);
			if(!$ext == 0)
			{
				  $cv_url=$cv;
				  $education_cert_url=$education_cert;
				  $experience_cert_url=$experience_cert;
				  $ext1=MJ_hmgt_check_valid_file_extension($cv_url);
				  $ext2=MJ_hmgt_check_valid_file_extension($education_cert_url);
				  $ext3=MJ_hmgt_check_valid_file_extension($experience_cert_url);
				  
				if(!$ext1 == 0 && !$ext2 == 0 && !$ext3 == 0  )
				{
					$result=$user_object->MJ_hmgt_add_user($_POST);
					$returnans=update_user_meta( $result,'hmgt_user_avatar',$docter_image_url);
					$user_object->MJ_hmgt_update_upload_documents($cv,$education_cert,$experience_cert,$result);
					if($result)
					{
						wp_redirect ( home_url().'?dashboard=user&page=doctor&tab=doctorlist&message=2');
					}
				} 
				else
				{ ?>
					<div id="messages" class="alert_msg alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
					</button>
						<p><?php esc_html_e('Sorry, only PDF files are allowed.','hospital_mgt');?></p>
					</div><?php 	
				}
			}
			else
			{ ?>
				<div id="messages" class="alert_msg alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
					<p><?php esc_html_e('Sorry, only JPG, JPEG, PNG & GIF files are allowed.','hospital_mgt');?></p>
				</div>
			<?php 
			}
		}
	}
}
if(isset($_REQUEST['action'])&& $_REQUEST['action']=='delete')
{
	
	$result=$user_object->MJ_hmgt_delete_usedata(MJ_hmgt_id_decrypt($_REQUEST['doctor_id']));
	if($result)
	{
		wp_redirect ( home_url() . '?dashboard=user&page=doctor&tab=doctorlist&message=3');
	}
}
if(isset($_REQUEST['message']))
{
	$message =$_REQUEST['message'];
	if($message == 1)
	{?>
		<div id="messages" class="alert_msg alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
			<p>
			<?php 
				esc_html_e('Record inserted successfully','hospital_mgt');
			?></p>
		</div>
		<?php 
	}
	elseif($message == 2)
	{?>
		<div id="messages" class="alert_msg alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button><p><?php
			esc_html_e("Record updated successfully",'hospital_mgt');
			?></p>
			
		</div>
		<?php 
	}
	elseif($message == 3) 
	{?>
		<div id="messages" class="alert_msg alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button><p>
		<?php 
			esc_html_e('Record deleted successfully','hospital_mgt');
		?></div></p><?php			
	}
}
?>
<!--START POPUP CODE-->
<div class="popup-bg" >
    <div class="overlay-content">
    <div class="modal-content">
    <div class="category_list">
     </div>
    </div>
    </div> 
</div>
<!-- End POP-UP Code -->
<script type="text/javascript">
jQuery(document).ready(function() {
	"use strict";
	jQuery('#doctor_list').DataTable({
		"responsive": true,
		 "order": [[ 1, "asc" ]],
		 "aoColumns":[
	                  {"bSortable": false},
	                  {"bSortable": true},
	                  {"bSortable": true},
	                  {"bSortable": true}, 
	                  {"bSortable": true},      
	                  {"bSortable": true}, 
	                                        
	                  {"bSortable": false}
	               ],
			language:<?php echo MJ_hmgt_datatable_multi_language();?>	   
		});
} );
</script>
<div class="panel-body panel-white"><!--START PANEL BODY DIV-->
	 <ul class="nav nav-tabs panel_tabs" role="tablist">
		<li class="<?php if($active_tab=='doctorlist'){?>active<?php }?>">
			<a href="?dashboard=user&page=doctor&tab=doctorlist" class="tab <?php echo $active_tab == 'doctorlist' ? 'active' : ''; ?>">
				<i class="fa fa-align-justify"></i> <?php esc_html_e('Doctor List', 'hospital_mgt'); ?></a>
			</a>
		</li>
		
		<li class="<?php if($active_tab=='adddoctor'){?>active<?php }?>">
		  <?php  if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit')
			{
			?>
				<a href="?dashboard=user&page=doctor&tab=adddoctor&&action=edit&doctor_id=<?php echo $_REQUEST['doctor_id'];?>" class="tab <?php echo $active_tab == 'adddoctor' ? 'active' : ''; ?>">
				<i class="fa fa"></i> <?php esc_html_e('Edit Doctor', 'hospital_mgt'); ?></a>
			 <?php 
			}
			else
			{
				if($user_access['add']=='1')
				{			
				?>				
					<a href="?dashboard=user&page=doctor&tab=adddoctor&&action=insert" class="tab <?php echo $active_tab == 'adddoctor' ? 'active' : ''; ?>">
					<i class="fa fa-plus-circle"></i> <?php esc_html_e('Add New Doctor', 'hospital_mgt'); ?></a>
				<?php
				}
			}
			?>	  
		</li>
	</ul>
<?php
if($active_tab=='doctorlist')
{
?>
	<div class="tab-content"><!--START TAB CONTENT DIV-->
		<div class="panel-body"><!--START PANEL BODY DIV-->
        <div class="table-responsive"><!--START TABLE RESPONSIVE DIV-->
       <table id="doctor_list" class="display dataTable " cellspacing="0" width="100%"><!--START DoctorLIST TABLE-->
        	<thead>
            <tr>
			<th><?php  esc_html_e( 'Photo', 'hospital_mgt' ) ;?></th>
              <th><?php esc_html_e( 'doctor Name', 'hospital_mgt' ) ;?></th>
			    <th><?php esc_html_e( 'Department', 'hospital_mgt' ) ;?></th>
			  <th> <?php esc_html_e( 'Specialization', 'hospital_mgt' ) ;?></th>
			  <th> <?php esc_html_e( 'Degree', 'hospital_mgt' ) ;?></th>
                <th> <?php esc_html_e( 'doctor Email', 'hospital_mgt' ) ;?></th>
                <th><?php  esc_html_e( 'Action', 'hospital_mgt' ) ;?></th>
            </tr>
        </thead>
		<tfoot>
            <tr>
			 <th><?php  esc_html_e( 'Photo', 'hospital_mgt' ) ;?></th>
              <th><?php esc_html_e( 'doctor Name', 'hospital_mgt' ) ;?></th>
			   <th><?php esc_html_e( 'Department', 'hospital_mgt' ) ;?></th>
			   <th><?php esc_html_e( 'Specialization', 'hospital_mgt' ) ;?></th>
			  <th><?php esc_html_e( 'Degree', 'hospital_mgt' ) ;?></th>
                <th><?php esc_html_e( 'doctor Email', 'hospital_mgt' ) ;?></th>
                <th><?php  esc_html_e( 'Action', 'hospital_mgt' ) ;?></th>
            </tr>
        </tfoot>
		<tbody>
         <?php 
		$user_id=get_current_user_id();
		$user_role=MJ_hmgt_get_current_user_role();
		if($obj_hospital->role == 'doctor') 
		{
			$own_data=$user_access['own_data'];
			if($own_data == '1')
			{
				$user_id=get_current_user_id();		
				
				$doctordata1=array();
				
				$doctordata[]=get_userdata($user_id);					
					
				// $doctordata_created_by= get_users(
				//  array(
				// 		'role' => 'doctor',
				// 		'meta_query' => array(
				// 		array(
				// 				'key' => 'created_by',
				// 				'value' => get_current_user_id(),
				// 				'compare' => '='
				// 			)
				// 		)
				// ));	

				// $doctordata=array_merge($doctordata1,$doctordata_created_by);	
			}
			else
			{
				$get_doctor = array('role' => 'doctor');
				$doctordata=get_users($get_doctor);
			}
		}
		elseif($obj_hospital->role =='patient')
		{
			$own_data=$user_access['own_data'];
			if($own_data == '1')
			{
				global $wpdb;
				$table_name = $wpdb->prefix .'hmgt_inpatient_guardian';
				$user_id=get_current_user_id();	
				$doctordata =$wpdb->get_row("SELECT doctor_id FROM $table_name WHERE  patient_id=".$user_id);
				$current_user_id=$doctordata->doctor_id;				
				$doctordata=array();
				$doctordata[]=get_userdata($current_user_id);	
					
			}
			else
			{
				$get_doctor = array('role' => 'doctor');
				$doctordata=get_users($get_doctor);
			}				
		}
	    else
		{
			$get_doctor = array('role' => 'doctor');
			$doctordata=get_users($get_doctor);
		}		
		
		if(!empty($doctordata))
		{
		 	foreach ($doctordata as $retrieved_data)
			{				
				$uid=$retrieved_data->ID;
				?>
				<tr>
					<td class="user_image"><?php 
						$uid=$retrieved_data->ID;
						$userimage=get_user_meta($uid, 'hmgt_user_avatar', true);
						if(empty($userimage))
						{
							echo '<img src='.get_option( 'hmgt_doctor_thumb' ).' height="50px" width="50px" class="img-circle" />';
						}
						else
						{
							echo '<img src='.$userimage.' height="50px" width="50px" class="img-circle"/>';
						}
						?></td>
						<td class="name"><?php echo esc_html($retrieved_data->display_name);?></td>
						<td class="department"><?php 
						$postdata=get_post($retrieved_data->department);
						if(!empty($postdata->post_title))
						{
							echo esc_html($postdata->post_title);
						}
						else
						{
							echo "-";
						}	
						?></td>
					  
						<td class="specialization"><?php 
						$postdata=get_post($retrieved_data->specialization);
						if(!empty($postdata->post_title))
						{
							echo esc_html($postdata->post_title);
						}
						else
						{
							echo "-";
						}
						?></td>
						
						<td class="subject_name"><?php 
						echo get_user_meta($uid, 'doctor_degree', true);?></td>
						<td class="email"><?php echo esc_html($retrieved_data->user_email);?></td>
						<td class="action">
						<a  href="#" class="view-profile btn btn-default" idtest="<?php echo esc_attr($retrieved_data->ID);?>"><i class="fa fa-eye"></i> <?php esc_html_e('View Profile', 'hospital_mgt');?></a>
						<?php $user_role=MJ_hmgt_get_current_user_role();
						if($obj_hospital->role == 'patient') 
						{
						$path=home_url()."?dashboard=user&page=appointment&tab=addappoint&&action=insert&doctor_id=".$uid;						 
						 ?>
						
							<a  href="<?php echo $path;?>" class="btn btn-success margin_bottom_5px"><i class="fa fa-calendar"></i> <?php esc_html_e('Book Appointment','hospital_mgt');?></a>							
						
						
						<?php }?>
					<?php
					if($user_access['edit']=='1')
					{
					?>
						<a href="?dashboard=user&page=doctor&tab=adddoctor&action=edit&doctor_id=<?php echo MJ_hmgt_id_encrypt(esc_attr($retrieved_data->ID));?>" class="btn btn-info"> <?php esc_html_e('Edit', 'hospital_mgt' ) ;?></a>
				   <?php
					}
					if($user_access['delete']=='1')
					{
					?>
					   <a href="?dashboard=user&page=doctor&tab=doctorlist&action=delete&doctor_id=<?php echo MJ_hmgt_id_encrypt(esc_attr($retrieved_data->ID));?>" class="btn btn-danger" 
						onclick="return confirm('<?php esc_html_e('Are you sure you want to delete this record?','hospital_mgt');?>');">
						<?php esc_html_e( 'Delete', 'hospital_mgt' ) ;?> </a>    
					<?php
					}
					?>
					   </td>
					   
					</tr>
				<?php							
		    }
	    }
		?>
		</tbody>
        </table><!--END Doctor LIST TABLE-->
 		</div><!--END TABLE RESPONSIVE DIV-->
		</div><!--END PANEL BODY DIV-->
	</div><!--END PANEL CONTENT DIV-->
<?php
}
if($active_tab=='adddoctor')
{ 
	
	$user_object=new MJ_hmgt_user();
	$doctor_id=0;
	if(isset($_REQUEST['doctor_id']))
		$doctor_id=MJ_hmgt_id_decrypt($_REQUEST['doctor_id']);
	$role='doctor';
	?>

	<script type="text/javascript">
	jQuery("document").ready(function($) {
		"use strict";
		<?php
	if (is_rtl())
		{
		?>	
			$('#doctor_form').validationEngine({promptPosition : "bottomLeft",maxErrorsPerField: 1});
		<?php
		}
		else{
			?>
			$('#doctor_form').validationEngine({promptPosition : "bottomRight",maxErrorsPerField: 1});
			<?php
		}
	?>
	$.fn.datepicker.defaults.format =" <?php  echo MJ_hmgt_dateformat_PHP_to_jQueryUI(MJ_hmgt_date_formate()); ?>";
      $('#birth_date').datepicker({
     endDate: '+0d',
        autoclose: true
   }); 
		//username not  allow space validation
	$('#username').keypress(function( e ) 
	{
       if(e.which === 32) 
         return false;
    });
	$('.tax_charge').multiselect(
	{
		nonSelectedText :'<?php esc_html_e('Select Tax','hospital_mgt');?>',
		includeSelectAllOption: true,
	    selectAllText : '<?php esc_html_e('Select all','hospital_mgt'); ?>',
		templates: {
	            button: '<button class="multiselect btn btn-default dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><span class="multiselect-selected-text"></span><b class="caret"></b></button>',
	        },
		buttonContainer: '<div class="dropdown" />'
	});
});	
</script>
     <?php
	
		$edit=0;
		if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit')
		{			
			$edit=1;
			$user_info = get_userdata($doctor_id);
			
		}?>
       <div class="panel-body"><!--START PANEL BODY DIV-->
         <form name="doctor_form" action="" method="post" class="form-horizontal" id="doctor_form" enctype="multipart/form-data">
         <?php $action = isset($_REQUEST['action'])?$_REQUEST['action']:'insert';?>
			<input type="hidden" name="action" value="<?php echo esc_attr($action);?>">
			<input type="hidden" name="role" value="<?php echo esc_attr($role);?>"  />
			<input type="hidden" name="user_id" value="<?php echo esc_attr($doctor_id);?>"/>
			<div class="header">	
				<h3 class="first_hed"><?php esc_html_e('Personal Information','hospital_mgt');?></h3>
				<hr>
			</div>
			<div class="form-group">
				<div class="mb-3 row">	
					<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label form-label" for="first_name"><?php esc_html_e('First Name','hospital_mgt');?><span class="require-field">*</span></label>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 has-feedback">
						<input id="first_name" class="form-control validate[required,custom[onlyLetter_specialcharacter]] text-input" maxlength="50" type="text" value="<?php if($edit){ echo esc_attr($user_info->first_name);}elseif(isset($_POST['first_name'])) echo esc_attr($_POST['first_name']);?>" name="first_name">
					</div>
					<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label form-label" for="middle_name"><?php esc_html_e('Middle Name','hospital_mgt');?></label>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 has-feedback">
						<input id="middle_name" class="form-control validate[custom[onlyLetter_specialcharacter]] text-input" maxlength="50" type="text"  value="<?php if($edit){ echo esc_attr($user_info->middle_name);}elseif(isset($_POST['middle_name'])) echo esc_attr($_POST['middle_name']);?>" name="middle_name">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="mb-3 row">
					<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12  control-label form-label" for="last_name"><?php esc_html_e('Last Name','hospital_mgt');?><span class="require-field">*</span></label>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 has-feedback">
						<input id="last_name" class="form-control validate[required,custom[onlyLetter_specialcharacter]] text-input" maxlength="50" type="text"  value="<?php if($edit){ echo esc_attr($user_info->last_name);}elseif(isset($_POST['last_name'])) echo esc_attr($_POST['last_name']);?>" name="last_name">
					</div>
					<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12  control-label form-label" for="birth_date"><?php esc_html_e('Date of birth','hospital_mgt');?><span class="require-field">*</span></label>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 has-feedback">
						<input id="birth_date" class="form-control validate[required]"  type="text" name="birth_date" 
						value="<?php if($edit){ echo date(MJ_hmgt_date_formate(),strtotime($user_info->birth_date));}elseif(isset($_POST['birth_date'])) echo esc_attr($_POST['birth_date']);?>" readonly>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="mb-3 row">
					<label class="col-sm-2 control-label form-label" for="gender"><?php esc_html_e('Gender','hospital_mgt');?><span class="require-field">*</span></label>
					<div class="col-sm-8">
					<?php $genderval = "male"; if($edit){ $genderval=$user_info->gender; }elseif(isset($_POST['gender'])) {$genderval=$_POST['gender'];}?>
						<label class="radio-inline">
						 <input type="radio" value="male" class="tog" name="gender"  <?php  checked( 'male', $genderval);  ?>/><?php esc_html_e('Male','hospital_mgt');?>
						</label>
						<label class="radio-inline">
						  <input type="radio" value="female" class="tog" name="gender"  <?php  checked( 'female', $genderval);  ?>/><?php esc_html_e('Female','hospital_mgt');?> 
						</label>
					</div>
				</div>
			</div>
			<div class="header">
				<h3><?php esc_html_e('Office Address Information','hospital_mgt');?></h3>
				<hr>
			</div>
			<div class="form-group">
				<div class="mb-3 row">
					<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label form-label" for="address"><?php esc_html_e('Office Address','hospital_mgt');?><span class="require-field">*</span></label>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 has-feedback">
						<input id="" class="form-control validate[required,custom[address_description_validation]]" type="text" maxlength="150" name="office_address" 
						value="<?php if($edit){ echo esc_attr($user_info->office_address);}elseif(isset($_POST['office_address'])) echo esc_attr($_POST['office_address']);?>">
					</div>
						<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label form-label" for="city_name"><?php esc_html_e('City','hospital_mgt');?><span class="require-field">*</span></label>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 has-feedback">
						<input id="" class="form-control validate[required,custom[city_state_country_validation]]" maxlength="50" type="text"  name="city_name" 
						value="<?php if($edit){ echo esc_attr($user_info->city_name);}elseif(isset($_POST['city_name'])) echo esc_attr($_POST['city_name']);?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="mb-3 row">
					<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label form-label" for="state_name"><?php esc_html_e('State','hospital_mgt');?></label>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 has-feedback">
						<input id="" class="form-control validate[custom[city_state_country_validation]]" maxlength="50" type="text"  name="state_name" 
						value="<?php if($edit){ echo esc_attr($user_info->state_name);}elseif(isset($_POST['state_name'])) echo esc_attr($_POST['state_name']);?>">
					</div>
					<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label form-label" for="country_name"><?php esc_html_e('Country','hospital_mgt');?></label>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 has-feedback">
						<input id="" class="form-control validate[custom[city_state_country_validation]]" maxlength="50" type="text"  name="country_name" 
						value="<?php if($edit){ echo esc_attr($user_info->country_name);}elseif(isset($_POST['country_name'])) echo esc_attr($_POST['country_name']);?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="mb-3 row">
					<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label form-label" for="zip_code"><?php esc_html_e('Zip Code','hospital_mgt');?><span class="require-field">*</span></label>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 has-feedback">
						<input id="" class="form-control  validate[required,custom[onlyLetterNumber]]" type="text" maxlength="15" name="zip_code" 
						value="<?php if($edit){ echo esc_attr($user_info->zip_code);}elseif(isset($_POST['zip_code'])) echo esc_attr($_POST['zip_code']);?>">
					</div>
				</div>
			</div>
			<div class="header">
				<h3><?php esc_html_e('HomeTown Address Information','hospital_mgt');?></h3>
				<hr>
			</div>
			<div class="form-group">
				<div class="mb-3 row">
					<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label form-label" for="address"><?php esc_html_e('Home Town Address','hospital_mgt');?><span class="require-field">*</span></label>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 has-feedback">
						<input id="address" class="form-control validate[required,custom[address_description_validation]]" type="text" maxlength="150"  name="address" value="<?php if($edit){ echo esc_attr($user_info->address);}elseif(isset($_POST['address'])) echo esc_attr($_POST['address']);?>">
					</div>
					<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label form-label" for="home_city_name"><?php esc_html_e('City','hospital_mgt');?><span class="require-field">*</span></label>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 has-feedback">
						<input id="city_name" class="form-control validate[required,custom[city_state_country_validation]]" maxlength="50" type="text"  name="home_city_name" 
						value="<?php if($edit){ echo esc_attr($user_info->home_city);}elseif(isset($_POST['home_city_name'])) echo esc_attr($_POST['home_city_name']);?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="mb-3 row">
					<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label form-label" for="home_state_name"><?php esc_html_e('State','hospital_mgt');?></label>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 has-feedback">
						<input id="home_state_name" class="form-control validate[custom[city_state_country_validation]]" maxlength="50" type="text"  name="home_state_name" 
						value="<?php if($edit){ echo esc_attr($user_info->home_state);}elseif(isset($_POST['home_state_name'])) echo esc_attr($_POST['home_state_name']);?>">
					</div>
					<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label form-label" for="home_country_name"><?php esc_html_e('Country','hospital_mgt');?></label>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 has-feedback">
						<input id="home_country_name" class="form-control validate[custom[city_state_country_validation]]" maxlength="50" type="text"  name="home_country_name" 
						value="<?php if($edit){ echo esc_attr($user_info->home_country);}elseif(isset($_POST['home_country_name'])) echo esc_attr($_POST['home_country_name']);?>">
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<div class="mb-3 row">
					<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label form-label" for="zip_code"><?php esc_html_e('Zip Code','hospital_mgt');?><span class="require-field">*</span></label>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 has-feedback">
						<input id="zip_code" class="form-control  validate[required,custom[onlyLetterNumber]]" type="text" maxlength="15"  name="home_zip_code" 
						value="<?php if($edit){ echo esc_attr($user_info->home_zip_code);}elseif(isset($_POST['home_zip_code'])) echo esc_attr($_POST['home_zip_code']);?>">
					</div>
				</div>
			</div>
			<div class="header">
				<h3><?php esc_html_e('Education Information','hospital_mgt');?></h3>
				<hr>
			</div>
			<div class="form-group">
				<div class="mb-3 row">
					<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label form-label" for="birth_date"><?php esc_html_e('Degree','hospital_mgt');?><span class="require-field">*</span></label>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 has-feedback">
						<input id="doc_degree" class="form-control validate[required,custom[popup_category_validation]]" maxlength="50" type="text"  name="doc_degree" 
						value="<?php if($edit){ echo esc_attr($user_info->doctor_degree);}elseif(isset($_POST['doc_degree'])) echo esc_attr($_POST['doc_degree']);?>">
					</div>
				</div>
			</div>	
			
			<div class="header">
				<h3><?php esc_html_e('Contact Information','hospital_mgt');?></h3>
				<hr>
			</div>
			<div class="form-group">
				<div class="mb-3 row">
					<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label form-label" for="mobile"><?php esc_html_e('Mobile Number','hospital_mgt');?><span class="require-field">*</span></label>
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12 margin_bottom_5px">			
					<input type="text" value="<?php if($edit) { if(!empty($user_info->phonecode)){ echo esc_attr($user_info->phonecode); }else{ ?>+<?php echo MJ_hmgt_get_countery_phonecode(get_option( 'hmgt_contry' )); }}elseif(isset($_POST['phonecode'])){ echo esc_attr($_POST['phonecode']); }else{ ?>+<?php echo MJ_hmgt_get_countery_phonecode(get_option( 'hmgt_contry' )); }?>"  class="form-control  validate[required] onlynumber_and_plussign" name="phonecode" maxlength="5">
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 has-feedback">
						<input id="mobile" class="form-control validate[required,custom[phone_number]] text-input" minlength="6" maxlength="15" type="text" value="<?php if($edit){ echo esc_attr($user_info->mobile);}elseif(isset($_POST['mobile'])) echo esc_attr($_POST['mobile']);?>" name="mobile">
					</div>
					<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label form-label" for="phone"><?php esc_html_e('Phone','hospital_mgt');?></label>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 has-feedback">
						<input id="phone" class="form-control validate[custom[phone_number]] text-input" minlength="6" maxlength="15" type="text" value="<?php if($edit){ echo esc_attr($user_info->phone);}elseif(isset($_POST['phone'])) echo esc_attr($_POST['phone']);?>" name="phone">
					</div>
				</div>
			</div>
			
			<div class="header">
				<h3><?php esc_html_e('Login Information','hospital_mgt');?></h3>
				<hr>
			</div>
			<div class="form-group">
				<div class="mb-3 row">
					<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label form-label" for="email"><?php esc_html_e('Email','hospital_mgt');?><span class="require-field">*</span></label>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 has-feedback">
						<input id="email" class="form-control validate[required,custom[email]] text-input" maxlength="100" type="text"  name="email" 
						value="<?php if($edit){ echo esc_attr($user_info->user_email);}elseif(isset($_POST['email'])) echo esc_attr($_POST['email']);?>">
					</div>
					<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label form-label" for="username"><?php esc_html_e('User Name','hospital_mgt');?><span class="require-field">*</span></label>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 has-feedback">
						<input id="username" class="form-control validate[required,custom[username_validation]]" type="text" maxlength="30"  name="username" 
						value="<?php if($edit){ echo esc_attr($user_info->user_login);}elseif(isset($_POST['username'])) echo esc_attr($_POST['username']);?>" <?php if($edit) echo "readonly";?>>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<div class="mb-3 row">
					<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label form-label" for="password"><?php esc_html_e('Password','hospital_mgt');?><?php if(!$edit) {?><span class="require-field">*</span><?php }?></label>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 has-feedback">
						<input id="password" class="form-control <?php if(!$edit){ echo 'validate[required,minSize[8]]'; }else{ echo 'validate[minSize[8]]'; }?>"  maxlength="12" type="password"  name="password" value="">
					</div>
				</div>
			</div>
			
			<div class="header">
				<h3><?php esc_html_e('Other Information','hospital_mgt');?></h3>
				<hr>
			</div>
			<div class="form-group">
				<div class="mb-3 row">
					<label class="col-sm-2 control-label form-label" for="department"><?php esc_html_e('Department','hospital_mgt');?></label>
					<div class="col-sm-3 margin_bottom_5px">
					<?php if($edit){ $departmentid=$user_info->department; }elseif(isset($_POST['department'])){$departmentid=$_POST['department'];}else{$departmentid='';}?>
						<select name="department" class="form-control max_width_100" id="department">
							<option value=""><?php esc_html_e('Select Department','hospital_mgt');?></option>
						<?php 
							$department_array = $user_object->MJ_hmgt_get_staff_department();
							if(!empty($department_array))
							{
								foreach ($department_array as $retrieved_data)
								{?>
									<option value="<?php echo esc_attr($retrieved_data->ID); ?>" <?php selected($departmentid,$retrieved_data->ID);?>><?php echo $retrieved_data->post_title;?></option>
								<?php 
								}
							}
						?>
						</select>
					</div>
					<div class="col-sm-2"><button id="addremove" model="department"><?php esc_html_e('Add Or Remove','hospital_mgt');?></button></div>
				</div>
			</div>	
			
			<div class="form-group">
				<div class="mb-3 row">
					<label class="col-sm-2 control-label form-label" for="birth_date"><?php esc_html_e('Specialization','hospital_mgt');?><span class="require-field">*</span></label>
					<div class="col-sm-3 margin_bottom_5px">
					
						<?php if($edit){ $specializeid= $user_info->specialization; }elseif(isset($_POST['specialization'])){$specializeid=$_POST['specialization'];}else{$specializeid='';}?>
						
						<select  class="form-control validate[required] max_width_100" 
						id="specialization"   name="specialization" >
							<option value=" "><?php esc_html_e('Select Specialization','hospital_mgt');?></option>
							<?php 
						
							$specialize_array = $user_object->MJ_hmgt_get_doctor_specilize();
							 if(!empty($specialize_array))
							 {
								foreach ($specialize_array as $retrieved_data){?>
									<option value="<?php echo esc_attr($retrieved_data->ID); ?>" <?php selected($specializeid,$retrieved_data->ID);?>><?php echo esc_html($retrieved_data->post_title);?></option>
								<?php }
							 }?>
							</select>
					</div>
					<div class="col-sm-2"><button id="addremove" model="specialization"><?php esc_html_e('Add Or Remove','hospital_mgt');?></button></div>
				</div>
			</div>	
			<div class="form-group">
				<div class="mb-3 row">
					<label class="col-sm-2 control-label form-label" for="visiting_fees"><?php esc_html_e('Visiting Charge','hospital_mgt');?> (<?php echo MJ_hmgt_get_currency_symbol(get_option( 'hmgt_currency_code' )); ?>)</label>
					<div class="col-sm-3">
						<input id="doc_degree" class="form-control" type="number" min="0" onKeyPress="if(this.value.length==8) return false;"  name="visiting_fees" step="0.01"
						value="<?php if($edit){ echo $user_info->visiting_fees;}elseif(isset($_POST['visiting_fees'])) echo $_POST['visiting_fees'];?>">
					</div>
					<div class="col-sm-2 padding_left_0 add_bed_1">
						<?php esc_html_e('/ Per Session','hospital_mgt'); ?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="mb-3 row">
					<label class="col-sm-2 control-label form-label" for="visiting_fees"><?php esc_html_e('Visiting Charge Tax','hospital_mgt');?></label>
					<div class="col-sm-3">
						<select  class="form-control tax_charge" name="visiting_fees_tax[]" multiple="multiple">				<?php					
							if($edit)
							{
								$tax_id=explode(',',$user_info->visiting_fees_tax);
							}
							else
							{	
								$tax_id[]='';
							}
							$obj_invoice= new MJ_hmgt_invoice();
							$hmgt_taxs=$obj_invoice->MJ_hmgt_get_all_tax_data();	
							
							if(!empty($hmgt_taxs))
							{
								foreach($hmgt_taxs as $entry)
								{
									$selected = "";
									if(in_array($entry->tax_id,$tax_id))
										$selected = "selected";
									?>
									<option value="<?php echo esc_attr($entry->tax_id); ?>" <?php echo esc_attr($selected); ?> ><?php echo esc_html($entry->tax_title);?>-<?php echo esc_html($entry->tax_value);?></option>
								<?php 
								}
							}
							?>
						</select>		
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="mb-3 row">
					<label class="col-sm-2 control-label form-label" for=""><?php esc_html_e('Consulting Charge','hospital_mgt');?> (<?php echo MJ_hmgt_get_currency_symbol(get_option( 'hmgt_currency_code' )); ?>)</label>
					<div class="col-sm-3">
						<input id="" class="form-control" type="number" min="0" onKeyPress="if(this.value.length==8) return false;"  name="consulting_fees" step="0.01"
						value="<?php if($edit){ echo esc_attr($user_info->consulting_fees);}elseif(isset($_POST['consulting_fees'])) echo esc_attr($_POST['consulting_fees']);?>">
					</div>
					<div class="col-sm-2 padding_left_0 add_bed_1">
						<?php esc_html_e('/ Per Session','hospital_mgt');?>
					</div>
				</div>
			</div>		
			<div class="form-group">
				<div class="mb-3 row">
					<label class="col-sm-2 control-label form-label" for="visiting_fees"><?php esc_html_e('Consulting Charge Tax','hospital_mgt');?></label>
					<div class="col-sm-3">
						<select  class="form-control tax_charge" name="consulting_fees_tax[]" multiple="multiple">					
							<?php					
							if($edit)
							{
								$tax_id=explode(',',$user_info->consulting_fees_tax);
							}
							else
							{	
								$tax_id[]='';
							}
							$obj_invoice= new MJ_hmgt_invoice();
							$hmgt_taxs=$obj_invoice->MJ_hmgt_get_all_tax_data();	
							
							if(!empty($hmgt_taxs))
							{
								foreach($hmgt_taxs as $entry)
								{
									$selected = "";
									if(in_array($entry->tax_id,$tax_id))
										$selected = "selected";
									?>
									<option value="<?php echo esc_attr($entry->tax_id); ?>" <?php echo esc_attr($selected); ?> ><?php echo esc_html($entry->tax_title);?>-<?php echo esc_html($entry->tax_value);?></option>
								<?php 
								}
							}
							?>
						</select>		
					</div>
				</div>
			</div>
			<?php wp_nonce_field( 'save_doctor_nonce' ); ?>
			<div class="form-group">
				<div class="mb-3 row">
					<label class="col-sm-2 control-label form-label" for="photo"><?php esc_html_e('Image','hospital_mgt');?></label>
						<div class="col-sm-3">
							<input type="hidden" id="hmgt_user_avatar_url" class="form-control" name="hmgt_user_avatar_url"  
							value="<?php if($edit)echo esc_url( $user_info->hmgt_user_avatar );elseif(isset($_POST['upload_user_avatar_image'])) echo $_POST['upload_user_avatar_image']; ?>" readonly />
							<input type="hidden" name="hidden_upload_user_avatar_image" 
							value="<?php if($edit){ echo $user_info->hmgt_user_avatar;}elseif(isset($_POST['upload_user_avatar_image'])) echo $_POST['upload_user_avatar_image'];
							else echo get_option('hmgt_patient_thumb');?>">
		       				 <input id="upload_user_avatar_image" name="upload_user_avatar_image" type="file" class="form-control file" value="<?php esc_html_e( 'Upload image', 'hospital_mgt' ); ?>" />
					</div>
					<div class="clearfix"></div>
					
					<div class="offset-sm-2 col-lg-8 col-md-8 col-sm-8 col-xs-12">
		                <div id="upload_user_avatar_preview" >
						<?php 
							if($edit) 
							{
								if($user_info->hmgt_user_avatar == "")
								{	?>
									<img class="image_preview_css" alt="" src="<?php echo get_option( 'hmgt_patient_thumb' ); ?>">
								<?php 
								}
								else 
								{
								?>
									<img class="image_preview_css" src="<?php if($edit) echo esc_url( $user_info->hmgt_user_avatar ); ?>" />
								<?php 
								}
							}
							else 
							{
								?>
								<img class="image_preview_css" alt="" src="<?php echo get_option( 'hmgt_patient_thumb' ); ?>">
								<?php 
							}?>
						</div>
					</div>
				</div>
			</div>		
			<div class="form-group">
				<div class="mb-3 row">
					<label class="col-sm-2 control-label form-label" for="document"><?php esc_html_e('Curriculum Vitae','hospital_mgt');?></label>
					<div class="col-sm-3">
						<input type="file" id="doctor_cv" class="form-control file" name="doctor_cv" >
						<input type="hidden" id="doctor_cv" name="hidden_cv" value="<?php if($edit){ echo esc_attr($user_info->doctor_cv);}elseif(isset($_POST['doctor_cv'])) echo esc_attr($_POST['doctor_cv']);?>">
						<p class="help-block"><?php esc_html_e('Upload document in PDF','hospital_mgt');?></p> 
					</div>
					<div class="col-sm-2">
						<?php if(isset($user_info->doctor_cv) && $user_info->doctor_cv!=""){?>
						<a href="<?php echo content_url().'/uploads/hospital_assets/'.$user_info->doctor_cv;?>" class="btn btn-default" target="_blank"><i class="fa fa-download"></i> <?php esc_html_e('Curriculum Vitae','hospital_mgt');?></a>
						<?php } ?>
						 
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="mb-3 row">
					<label class="col-sm-2 control-label form-label" for="document"><?php esc_html_e('Education Certificate','hospital_mgt');?></label>
					<div class="col-sm-3">
						<input type="file" id="hidden_education_certificate" class="form-control file" name="education_certificate">
						<input type="hidden" id="hidden_education_certificate" name="hidden_education_certificate" value="<?php if($edit){ echo esc_attr($user_info->edu_certificate);}elseif(isset($_POST['education_certificate'])) echo esc_attr($_POST['education_certificate']);?>">
						<p class="help-block"><?php esc_html_e('Upload document in PDF','hospital_mgt');?></p> 
					</div>
					<div class="col-sm-2">
						<?php if(isset($user_info->edu_certificate) && $user_info->edu_certificate!=""){?>
						<a href="<?php echo content_url().'/uploads/hospital_assets/'.$user_info->edu_certificate;?>" class="btn btn-default"target="_blank"><i class="fa fa-download"></i> <?php esc_html_e('Education Certificate','hospital_mgt');?></a>
						<?php } ?>
						 
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="mb-3 row">
					<label class="col-sm-2 control-label form-label" for="document"><?php esc_html_e('Experience Certificate','hospital_mgt');?></label>
					<div class="col-sm-3">
						<input type="file" class="form-control file" id="experience_cert" name="experience_cert" >
						<input type="hidden" id="experience_cert" name="hidden_exp_certificate" value="<?php if($edit){ echo esc_attr($user_info->exp_certificate);}elseif(isset($_POST['exp_certificate'])) echo esc_attr($_POST['exp_certificate']);?>">
						<p class="help-block"><?php esc_html_e('Upload document in PDF','hospital_mgt');?></p> 
					</div>
					<div class="col-sm-2">
						<?php if(isset($user_info->exp_certificate) && $user_info->exp_certificate!=""){?>
						<a href="<?php echo content_url().'/uploads/hospital_assets/'.$user_info->exp_certificate;?>" class="btn btn-default"target="_blank"><i class="fa fa-download"></i> <?php esc_html_e('Experience Certificate','hospital_mgt');?></a>
						<?php } ?>
						 
					</div>
				</div>
			</div>
			<div class="offset-sm-2 col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<input type="submit" value="<?php if($edit){ esc_html_e('Save Doctor','hospital_mgt'); }else{ esc_html_e('Save Doctor','hospital_mgt');}?>" name="save_doctor" class="btn btn-success"/>
			</div>
			
        </form>
</div>  <!--END PANEL BODY DIV-->
<?php 
}
?>		
</div><!--END PANEL BODY DIV-->