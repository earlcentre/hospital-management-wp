<?php
//Manage bed
$obj_bed = new MJ_hmgt_bedmanage();
$active_tab = isset($_GET['tab'])?$_GET['tab']:'managebedlist';
?>
<!-- POP up code -->
<div class="popup-bg">
    <div class="overlay-content">
		<div class="modal-content">
		  <div class="category_list"></div>
		</div>
    </div> 
</div>
<!-- End POP-UP Code -->	
<div class="page-inner min_height_1631"> <!--PANEL INNER DIV START-->
    <div class="page-title"> <!--PAGE TITLE DIV START-->
		<h3><img src="<?php echo esc_url(get_option( 'hmgt_hospital_logo', 'hospital_mgt')); ?>" class="img-circle head_logo" width="40" height="40" /><?php echo esc_html(get_option('hmgt_hospital_name','hospital_mgt'));?></h3>
	</div> <!--PAGE TITLE DIV END-->
	<?php 
	if(isset($_REQUEST['save_bed']))
	{	
		$nonce = $_POST['_wpnonce'];
		if (wp_verify_nonce( $nonce, 'save_bed_nonce' ) )
		{
			if(isset($_REQUEST['action']) && ($_REQUEST['action'] == 'insert' || $_REQUEST['action'] == 'edit'))
			{	
		        $bed_type_id=$_POST['bed_type_id'];
		        $bed_number=$_POST['bed_number'];
                $bed_data=$obj_bed->MJ_hmgt_get_all_bed_by_id($bed_type_id,$bed_number);
				if($_REQUEST['action'] == 'edit')
				{
					$result = $obj_bed->MJ_hmgt_add_bed($_POST);
					if($result)
				    {
 				      wp_redirect ( admin_url() . 'admin.php?page=hmgt_bedmanage&tab=managebedlist&message=2');
				    }
				 } 
				else
				{
					if(empty($bed_data))
					{
						$result = $obj_bed->MJ_hmgt_add_bed($_POST);
						if($result)
						{
						   wp_redirect ( admin_url() . 'admin.php?page=hmgt_bedmanage&tab=managebedlist&message=1');
						}
				    }
					else
					{
					?>
						<div id="message" class="updated below-h2 notice is-dismissible">
								<p><p><?php esc_html_e('Already added This Bed Category and Bed Number.','hospital_mgt');?></p></p>
						</div>
					<?php
					}
                   				  
				}
				}
				
			}
	}
	if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'delete')
	{
		$result = $obj_bed->MJ_hmgt_delete_bed($_REQUEST['bed_id']);
		if($result)
		{
			wp_redirect ( admin_url() . 'admin.php?page=hmgt_bedmanage&tab=managebedlist&message=3');
		}
	}
	if(isset($_REQUEST['delete_selected']))
	{		
		if(!empty($_REQUEST['selected_id']))
		{
			
			foreach($_REQUEST['selected_id'] as $id)
			{
				$result=$obj_bed->MJ_hmgt_delete_bed($id);
			}
			if($result)
			{
				wp_redirect ( admin_url() . 'admin.php?page=hmgt_bedmanage&tab=managebedlist&message=3');
			}
		}
		else
		{
			echo '<script language="javascript">';
			echo 'alert("'.esc_html__('Please select at least one record.','hospital_mgt').'")';
			echo '</script>';
		}
	}	
	if(isset($_REQUEST['message']))
	{
		$message =$_REQUEST['message'];
		if($message == 1)
		{?>
			<div id="message" class="updated below-h2 notice is-dismissible">
			<p>
			<?php 
				esc_html_e('Record inserted successfully','hospital_mgt');
			?></p></div>
				<?php 			
		}
		elseif($message == 2)
		{?>
			<div id="message" class="updated below-h2 notice is-dismissible"><p><?php
				esc_html_e("Record updated successfully",'hospital_mgt');
				?></p>
			</div>
			<?php 		
		}
		elseif($message == 3) 
		{?>
			<div id="message" class="updated below-h2 notice is-dismissible"><p>
			<?php 
				esc_html_e('Record deleted successfully','hospital_mgt');
			?></div></p><?php
		}
	}
	?>
	
	<div id="main-wrapper"><!-- MAIN WRAPPER DIV START-->
		<div class="row"> <!--ROW DIV START-->
			<div class="col-md-12">			
				<div class="panel panel-white"><!-- PANEL WHITE DIV START-->
					<div class="panel-body">
					<!-- PANEL BODY DIV START-->
						<h2 class="nav-tab-wrapper">
							<a href="?page=hmgt_bedmanage&tab=managebedlist" class="nav-tab <?php echo $active_tab == 'managebedlist' ? 'nav-tab-active' : ''; ?>">
							<?php echo '<span class="dashicons dashicons-menu"></span>'.esc_html__('Bed List', 'hospital_mgt'); ?></a>
							<?php  if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit')
							{?>
							<a href="?page=hmgt_bedmanage&tab=addbed&&action=edit&bed_id=<?php echo $_REQUEST['bed_id'];?>" class="nav-tab <?php echo $active_tab == 'addbed' ? 'nav-tab-active' : ''; ?>">
							<?php esc_html_e('Edit Bed', 'hospital_mgt'); ?></a>  
							<?php 
							}
							else
							{?>
							<a href="?page=hmgt_bedmanage&tab=addbed" class="nav-tab <?php echo $active_tab == 'addbed' ? 'nav-tab-active' : ''; ?>">
							<?php echo '<span class="dashicons dashicons-plus-alt"></span>'.esc_html__('Add New Bed', 'hospital_mgt'); ?></a>  
							<?php  }?>
						</h2>
						 <?php 
						if($active_tab == 'managebedlist')
						{ 
						?>	
						<script type="text/javascript">
						jQuery(document).ready(function($) {
							"use strict";
							jQuery('#bed_list').DataTable({
								"responsive": true,		
								"order": [[ 1, "asc" ]],					
								"aoColumns":[
											  {"bSortable": false},
											  {"bSortable": true},
											  {"bSortable": true},
											  {"bSortable": true},
											  {"bSortable": true},              	                 
											  {"bSortable": true},              	                 
											  {"bSortable": false}],
											  language:<?php echo MJ_hmgt_datatable_multi_language();?>
											  });
							$('.select_all').on('click', function(e)
							{
								 if($(this).is(':checked',true))  
								 {
									$(".sub_chk").prop('checked', true);  
								 }  
								 else  
								 {  
									$(".sub_chk").prop('checked',false);  
								 } 
							});
						
							$('.sub_chk').on('change',function()
							{ 
								if(false == $(this).prop("checked"))
								{ 
									$(".select_all").prop('checked', false); 
								}
								if ($('.sub_chk:checked').length == $('.sub_chk').length )
								{
									$(".select_all").prop('checked', true);
								}
						  	});
						} );
						</script>
						<form name="wcwm_report" action="" method="post">
							<div class="panel-body"> <!--PANEL BODY DIV START-->
								<div class="table-responsive"> <!--TABEL RESPONSIVE DIV START-->
									<table id="bed_list" class="display" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th><input type="checkbox" class="select_all"></th>
												<th><?php esc_html_e( 'Bed Number', 'hospital_mgt' ) ;?></th>
												<th><?php esc_html_e( 'Bed Type', 'hospital_mgt' ) ;?></th>
												<th><?php esc_html_e( 'Charges', 'hospital_mgt' );?> (<?php echo "<span>".MJ_hmgt_get_currency_symbol()."</span>";?>)</th>
												<th><?php esc_html_e( 'Tax', 'hospital_mgt' ) ;?></th>
												<th><?php esc_html_e( 'Description', 'hospital_mgt' ) ;?></th>
												<th><?php  esc_html_e( 'Action', 'hospital_mgt' ) ;?></th>
											</tr>
									    </thead>
										<tfoot>
											<tr>
												<th></th>
												<th><?php esc_html_e( 'Bed Number', 'hospital_mgt' ) ;?></th>
												<th><?php esc_html_e( 'Bed Type', 'hospital_mgt' ) ;?></th>
												<th><?php esc_html_e( 'Charges', 'hospital_mgt' ) ;?> (<?php echo "<span>".MJ_hmgt_get_currency_symbol()."</span>";?>)</th>
												<th><?php esc_html_e( 'Tax', 'hospital_mgt' ) ;?></th>
												<th><?php esc_html_e( 'Description', 'hospital_mgt' ) ;?></th>
												<th><?php  esc_html_e( 'Action', 'hospital_mgt' ) ;?></th>
											</tr>
										</tfoot>
										<tbody>
										 <?php 
										$bed_data=$obj_bed->MJ_hmgt_get_all_bed();
										if(!empty($bed_data))
										{
											foreach ($bed_data as $retrieved_data){ 
										 ?>
											<tr>
												<td class="title"><input type="checkbox" name="selected_id[]" class="sub_chk" value="<?php echo esc_attr($retrieved_data->bed_id); ?>"></td>
												<td class="bed_number"><?php echo esc_html($retrieved_data->bed_number);?></td>
												<td class="bed_type"><?php echo esc_html($obj_bed->MJ_hmgt_get_bedtype_name($retrieved_data->bed_type_id));?></td>
												<td class="charge"><?php echo esc_html($retrieved_data->bed_charges); ?></td>
												<td class="charge"><?php
												if(!empty($retrieved_data->tax))
												{ 
													echo MJ_hmgt_tax_name_array_by_tax_id_array($retrieved_data->tax);
												}
												else
												{ 
													echo '-'; 
												}
												?></td>
												<td class="descrition"><?php 
												if(!empty($retrieved_data->bed_description))
												{ 
													echo esc_html($retrieved_data->bed_description);
												}
												else
												{ 
													echo '-'; 
												}
												?></td>
												<td class="action"> <a href="?page=hmgt_bedmanage&tab=addbed&action=edit&bed_id=<?php echo esc_attr($retrieved_data->bed_id);?>" class="btn btn-info"> <?php esc_html_e('Edit', 'hospital_mgt' ) ;?></a>
												<a href="?page=hmgt_bedmanage&tab=managebedlist&action=delete&bed_id=<?php echo esc_attr($retrieved_data->bed_id);?>" class="btn btn-danger" 
												onclick="return confirm('<?php esc_html_e('Are you sure you want to delete this record?','hospital_mgt');?>');">
												<?php esc_html_e( 'Delete', 'hospital_mgt' ) ;?> </a>               
												</td>
											   
											</tr>
											<?php } 
										}?>
										</tbody>
									</table>
									<div class="print-button pull-left">
										<input  type="submit" value="<?php esc_html_e('Delete Selected','hospital_mgt');?>" name="delete_selected" class="btn btn-danger delete_selected "/>
									</div>
							    </div> <!--TABEL RESPONSIVE DIV END-->
							</div> <!--PANEL BODY DIV END-->
					    </form>
						<?php 
						}
						if($active_tab == 'addbed')
						{
							require_once HMS_PLUGIN_DIR. '/admin/includes/bed/add-bed.php';
					    }?>
                    </div> <!--PANEL BODY DIV END-->
		        </div><!-- PANEL WHITE DIV START-->
	        </div>
        </div><!--ROW DIV START-->
    </div><!-- END WRAPPER DIV-->