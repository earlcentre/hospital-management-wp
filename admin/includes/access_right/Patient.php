<?php
$result=get_option('hmgt_access_right_patient');
if(isset($_POST['save_access_right_patient']))
{
	$role_access_right = array();
	$result=get_option('hmgt_access_right_patient');
	$role_access_right['patient'] = [
								"doctor"=>["menu_icone"=>plugins_url('hospital-management/assets/images/icon/doctor.png'),
										   "menu_title"=>'Doctor',
										   "page_link"=>'doctor',
											"own_data" =>isset($_REQUEST['doctor_own_data'])?$_REQUEST['doctor_own_data']:0,
										   "add" =>isset($_REQUEST['doctor_add'])?$_REQUEST['doctor_add']:0,
											"edit"=>isset($_REQUEST['doctor_edit'])?$_REQUEST['doctor_edit']:0,
											"view"=>isset($_REQUEST['doctor_view'])?$_REQUEST['doctor_view']:0,
											"delete"=>isset($_REQUEST['doctor_delete'])?$_REQUEST['doctor_delete']:0
											],
													
								"outpatient"=>['menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/outpatient.png'),
										  "menu_title"=>'Outpatient',
										  "page_link"=>'outpatient',
										   "own_data" => isset($_REQUEST['outpatient_own_data'])?$_REQUEST['outpatient_own_data']:0,
										 "add" => isset($_REQUEST['outpatient_add'])?$_REQUEST['outpatient_add']:0,
										"edit"=>isset($_REQUEST['outpatient_edit'])?$_REQUEST['outpatient_edit']:0,
										"view"=>isset($_REQUEST['outpatient_view'])?$_REQUEST['outpatient_view']:0,
										"delete"=>isset($_REQUEST['outpatient_delete'])?$_REQUEST['outpatient_delete']:0
								],
										  
								 "patient"=>['menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/Patient.png'),
										"menu_title"=>'Inpatient',
										"page_link"=>'patient',
										"own_data" => isset($_REQUEST['patient_own_data'])?$_REQUEST['patient_own_data']:0,
										 "add" => isset($_REQUEST['patient_add'])?$_REQUEST['patient_add']:0,
										"edit"=>isset($_REQUEST['patient_edit'])?$_REQUEST['patient_edit']:0,
										"view"=>isset($_REQUEST['patient_view'])?$_REQUEST['patient_view']:0,
										"delete"=>isset($_REQUEST['patient_delete'])?$_REQUEST['patient_delete']:0
											 ],
										  
								  "nurse"=>['menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/Nurse.png'),
											"menu_title"=>'Nurse',
											"page_link"=>'nurse',
											"own_data" => isset($_REQUEST['nurse_own_data'])?$_REQUEST['nurse_own_data']:0,
											 "add" => isset($_REQUEST['nurse_add'])?$_REQUEST['nurse_add']:0,
											"edit"=>isset($_REQUEST['nurse_edit'])?$_REQUEST['nurse_edit']:0,
											"view"=>isset($_REQUEST['nurse_view'])?$_REQUEST['nurse_view']:0,
											"delete"=>isset($_REQUEST['nurse_delete'])?$_REQUEST['nurse_delete']:0
											 ],
								  
								  "supportstaff"=>['menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/support.png'),
											 "menu_title"=>'Support Staff',
											 "page_link"=>'supportstaff',
											  "own_data" => isset($_REQUEST['supportstaff_own_data'])?$_REQUEST['supportstaff_own_data']:0,
											 "add" => isset($_REQUEST['supportstaff_add'])?$_REQUEST['supportstaff_add']:0,
											"edit"=>isset($_REQUEST['supportstaff_edit'])?$_REQUEST['supportstaff_edit']:0,
											"view"=>isset($_REQUEST['supportstaff_view'])?$_REQUEST['supportstaff_view']:0,
											"delete"=>isset($_REQUEST['supportstaff_delete'])?$_REQUEST['supportstaff_delete']:0
											   ],
								  "pharmacist"=>['menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/Pharmacist.png'),
											   "menu_title"=>'Pharmacist',
											   "page_link"=>'pharmacist',
											  "own_data" => isset($_REQUEST['pharmacist_own_data'])?$_REQUEST['pharmacist_own_data']:0,
											 "add" => isset($_REQUEST['pharmacist_add'])?$_REQUEST['pharmacist_add']:0,
											"edit"=>isset($_REQUEST['pharmacist_edit'])?$_REQUEST['pharmacist_edit']:0,
											"view"=>isset($_REQUEST['pharmacist_view'])?$_REQUEST['pharmacist_view']:0,
											"delete"=>isset($_REQUEST['pharmacist_delete'])?$_REQUEST['pharmacist_delete']:0
												],
								  
									"laboratorystaff"=>['menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/Laboratorist.png'),
											 "menu_title"=>'Laboratory Staff',
											 "page_link"=>'laboratorystaff',
											 "own_data" => isset($_REQUEST['laboratorystaff_own_data'])?$_REQUEST['laboratorystaff_own_data']:0,
											 "add" => isset($_REQUEST['laboratorystaff_add'])?$_REQUEST['laboratorystaff_add']:0,
											"edit"=>isset($_REQUEST['laboratorystaff_edit'])?$_REQUEST['laboratorystaff_edit']:0,
											"view"=>isset($_REQUEST['laboratorystaff_view'])?$_REQUEST['laboratorystaff_view']:0,
											"delete"=>isset($_REQUEST['laboratorystaff_delete'])?$_REQUEST['laboratorystaff_delete']:0
								  ],
								  
								  
									"accountant"=>['menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/Accountant.png'),
											 "menu_title"=>'Accountant',
											 "page_link"=>'accountant',
											 "own_data" => isset($_REQUEST['accountant_own_data'])?$_REQUEST['accountant_own_data']:0,
											 "add" => isset($_REQUEST['accountant_add'])?$_REQUEST['accountant_add']:0,
											"edit"=>isset($_REQUEST['accountant_edit'])?$_REQUEST['accountant_edit']:0,
											"view"=>isset($_REQUEST['accountant_view'])?$_REQUEST['accountant_view']:0,
											"delete"=>isset($_REQUEST['accountant_delete'])?$_REQUEST['accountant_delete']:0
								  ],
									"medicine"=>['menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/Medicine.png'),
											 "menu_title"=>'Medicine',
											 "page_link"=>'medicine',
											 "own_data" => isset($_REQUEST['medicine_own_data'])?$_REQUEST['medicine_own_data']:0,
											 "add" => isset($_REQUEST['medicine_add'])?$_REQUEST['medicine_add']:0,
											"edit"=>isset($_REQUEST['medicine_edit'])?$_REQUEST['medicine_edit']:0,
											"view"=>isset($_REQUEST['medicine_view'])?$_REQUEST['medicine_view']:0,
											"delete"=>isset($_REQUEST['medicine_delete'])?$_REQUEST['medicine_delete']:0
								  ],
									"treatment"=>['menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/Treatment.png'),
											  "menu_title"=>'Treatment',
											  "page_link"=>'treatment',
											 "own_data" => isset($_REQUEST['treatment_own_data'])?$_REQUEST['treatment_own_data']:0, 
											 "add" => isset($_REQUEST['treatment_add'])?$_REQUEST['treatment_add']:0,
											"edit"=>isset($_REQUEST['treatment_edit'])?$_REQUEST['treatment_edit']:0,
											"view"=>isset($_REQUEST['treatment_view'])?$_REQUEST['treatment_view']:0,
											"delete"=>isset($_REQUEST['treatment_delete'])?$_REQUEST['treatment_delete']:0
								  ],
								  
								  "prescription"=>['menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/Prescription.png'),
											 "menu_title"=>'Prescription',
											 "page_link"=>'prescription',
											  "own_data" => isset($_REQUEST['prescription_own_data'])?$_REQUEST['prescription_own_data']:0,
											 "add" => isset($_REQUEST['prescription_add'])?$_REQUEST['prescription_add']:0,
											"edit"=>isset($_REQUEST['prescription_edit'])?$_REQUEST['prescription_edit']:0,
											"view"=>isset($_REQUEST['prescription_view'])?$_REQUEST['prescription_view']:0,
											"delete"=>isset($_REQUEST['prescription_delete'])?$_REQUEST['prescription_delete']:0
								  ],
								  
								  "bedallotment"=>['menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/Assign--Bed-nurse.png'),
											 "menu_title"=>'Assign Bed-Nurse',
											 "page_link"=>'bedallotment',
											 "own_data" => isset($_REQUEST['bedallotment_own_data'])?$_REQUEST['bedallotment_own_data']:0,
											 "add" => isset($_REQUEST['bedallotment_add'])?$_REQUEST['bedallotment_add']:0,
											"edit"=>isset($_REQUEST['bedallotment_edit'])?$_REQUEST['bedallotment_edit']:0,
											"view"=>isset($_REQUEST['bedallotment_view'])?$_REQUEST['bedallotment_view']:0,
											"delete"=>isset($_REQUEST['bedallotment_delete'])?$_REQUEST['bedallotment_delete']:0
								  ],
								  "operation"=>['menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/Operation-List.png'),
										   "menu_title"=>'Operation List',
										   "page_link"=>'operation',
										   "own_data" => isset($_REQUEST['operation_own_data'])?$_REQUEST['operation_own_data']:0,
											 "add" => isset($_REQUEST['operation_add'])?$_REQUEST['operation_add']:0,
											"edit"=>isset($_REQUEST['operation_edit'])?$_REQUEST['operation_edit']:0,
											"view"=>isset($_REQUEST['operation_view'])?$_REQUEST['operation_view']:0,
											"delete"=>isset($_REQUEST['operation_delete'])?$_REQUEST['operation_delete']:0
								  ],
								  "diagnosis"=>['menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/Diagnosis-Report.png'),
											  "menu_title"=>'Diagnosis',
											  "page_link"=>'diagnosis',
											  "own_data" => isset($_REQUEST['diagnosis_own_data'])?$_REQUEST['diagnosis_own_data']:0,
											 "add" => isset($_REQUEST['diagnosis_add'])?$_REQUEST['diagnosis_add']:0,
											"edit"=>isset($_REQUEST['diagnosis_edit'])?$_REQUEST['diagnosis_edit']:0,
											"view"=>isset($_REQUEST['diagnosis_view'])?$_REQUEST['diagnosis_view']:0,
											"delete"=>isset($_REQUEST['diagnosis_delete'])?$_REQUEST['diagnosis_delete']:0
								  ],
								  "bloodbank"=>['menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/Blood-Bank.png'),
											"menu_title"=>'Blood Bank',
											"page_link"=>'bloodbank',
											 "own_data" => isset($_REQUEST['bloodbank_own_data'])?$_REQUEST['bloodbank_own_data']:0,
											 "add" => isset($_REQUEST['bloodbank_add'])?$_REQUEST['bloodbank_add']:0,
											"edit"=>isset($_REQUEST['bloodbank_edit'])?$_REQUEST['bloodbank_edit']:0,
											"view"=>isset($_REQUEST['bloodbank_view'])?$_REQUEST['bloodbank_view']:0,
											"delete"=>isset($_REQUEST['bloodbank_delete'])?$_REQUEST['bloodbank_delete']:0
								  ],

								   "virtual_appointment"=>['menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/Appointment.png'),
												 "menu_title"=>'Virtual Appointment',
												 "page_link"=>'virtual_appointment',
												 "own_data" => isset($_REQUEST['virtual_appointment_own_data'])?$_REQUEST['virtual_appointment_own_data']:0,
												 "add" => isset($_REQUEST['virtual_appointment_add'])?$_REQUEST['virtual_appointment_add']:0,
												"edit"=>isset($_REQUEST['virtual_appointment_edit'])?$_REQUEST['virtual_appointment_edit']:0,
												"view"=>isset($_REQUEST['virtual_appointment_view'])?$_REQUEST['virtual_appointment_view']:0,
												"delete"=>isset($_REQUEST['virtual_appointment_delete'])?$_REQUEST['virtual_appointment_delete']:0
									  ],

								  "appointment"=>['menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/Appointment.png'),
											 "menu_title"=>'Appointment',
											 "page_link"=>'appointment',
											  "own_data" => isset($_REQUEST['appointment_own_data'])?$_REQUEST['appointment_own_data']:0,
											 "add" => isset($_REQUEST['appointment_add'])?$_REQUEST['appointment_add']:0,
											"edit"=>isset($_REQUEST['appointment_edit'])?$_REQUEST['appointment_edit']:0,
											"view"=>isset($_REQUEST['appointment_view'])?$_REQUEST['appointment_view']:0,
											"delete"=>isset($_REQUEST['appointment_delete'])?$_REQUEST['appointment_delete']:0
								  ],
								  
								   "invoice"=>['menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/payment.png'),
										   "menu_title"=>'Invoice',
										   "page_link"=>'invoice',
										   "own_data" => isset($_REQUEST['invoice_own_data'])?$_REQUEST['invoice_own_data']:0,
											 "add" => isset($_REQUEST['invoice_add'])?$_REQUEST['invoice_add']:0,
											"edit"=>isset($_REQUEST['invoice_edit'])?$_REQUEST['invoice_edit']:0,
											"view"=>isset($_REQUEST['invoice_view'])?$_REQUEST['invoice_view']:0,
											"delete"=>isset($_REQUEST['invoice_delete'])?$_REQUEST['invoice_delete']:0
								  ],
								  
								   "event"=>['menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/notice.png'),
											"menu_title"=>'Event',
											"page_link"=>'event',
											"own_data" => isset($_REQUEST['event_own_data'])?$_REQUEST['event_own_data']:0,
											 "add" => isset($_REQUEST['event_add'])?$_REQUEST['event_add']:0,
											"edit"=>isset($_REQUEST['event_edit'])?$_REQUEST['event_edit']:0,
											"view"=>isset($_REQUEST['event_view'])?$_REQUEST['event_view']:0,
											"delete"=>isset($_REQUEST['event_delete'])?$_REQUEST['event_delete']:0
								  ],
								  
								   "message"=>['menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/message.png'),							       
											 "menu_title"=>'Message',
											 "page_link"=>'message',
											 "own_data" => isset($_REQUEST['message_own_data'])?$_REQUEST['message_own_data']:0,
											 "add" => isset($_REQUEST['message_add'])?$_REQUEST['message_add']:0,
											"edit"=>isset($_REQUEST['message_edit'])?$_REQUEST['message_edit']:0,
											"view"=>isset($_REQUEST['message_view'])?$_REQUEST['message_view']:0,
											"delete"=>isset($_REQUEST['message_delete'])?$_REQUEST['message_delete']:0
								  ],
								  
								   "ambulance"=>['menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/Ambulance.png'),
											  "menu_title"=>'Ambulance',
											  "page_link"=>'ambulance',
											  "own_data" => isset($_REQUEST['ambulance_own_data'])?$_REQUEST['ambulance_own_data']:0,
											 "add" => isset($_REQUEST['ambulance_add'])?$_REQUEST['ambulance_add']:0,
											"edit"=>isset($_REQUEST['ambulance_edit'])?$_REQUEST['ambulance_edit']:0,
											"view"=>isset($_REQUEST['ambulance_view'])?$_REQUEST['ambulance_view']:0,
											"delete"=>isset($_REQUEST['ambulance_delete'])?$_REQUEST['ambulance_delete']:0
								  ],
								   "instrument"=>['menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/Instrument.png'),
											 "menu_title"=>'instrument',
											 "page_link"=>'instrument',
											 "own_data" => isset($_REQUEST['instrument_own_data'])?$_REQUEST['instrument_own_data']:0,
											 "add" => isset($_REQUEST['instrument_add'])?$_REQUEST['instrument_add']:0,
											"edit"=>isset($_REQUEST['instrument_edit'])?$_REQUEST['instrument_edit']:0,
											"view"=>isset($_REQUEST['instrument_view'])?$_REQUEST['instrument_view']:0,
											"delete"=>isset($_REQUEST['instrument_delete'])?$_REQUEST['instrument_delete']:0
								  ],
								  
								  "report"=>['menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/Report.png'),
										   "menu_title"=>'Report',
										   "page_link"=>'report',
											"own_data" => isset($_REQUEST['report_own_data'])?$_REQUEST['report_own_data']:0,
											 "add" => isset($_REQUEST['report_add'])?$_REQUEST['report_add']:0,
											"edit"=>isset($_REQUEST['report_edit'])?$_REQUEST['report_edit']:0,
											"view"=>isset($_REQUEST['report_view'])?$_REQUEST['report_view']:0,
											"delete"=>isset($_REQUEST['report_delete'])?$_REQUEST['report_delete']:0
								  ],
								  
								  "account"=>['menu_icone'=>plugins_url( 'hospital-management/assets/images/icon/account.png'),
											"menu_title"=>'Account',
											"page_link"=>'account',
											"own_data" => isset($_REQUEST['account_own_data'])?$_REQUEST['account_own_data']:0,
											 "add" => isset($_REQUEST['account_add'])?$_REQUEST['account_add']:0,
											"edit"=>isset($_REQUEST['account_edit'])?$_REQUEST['account_edit']:0,
											"view"=>isset($_REQUEST['account_view'])?$_REQUEST['account_view']:0,
											"delete"=>isset($_REQUEST['account_delete'])?$_REQUEST['account_delete']:0
								  ]
									];

	$result=update_option( 'hmgt_access_right_patient',$role_access_right);
	wp_redirect ( admin_url() . 'admin.php?page=hmgt_access_right&tab=Patient&message=1');
}
$access_right=get_option('hmgt_access_right_patient');

if(isset($_REQUEST['message']))
{
	$message =$_REQUEST['message'];
	if($message == 1)
	{?>
		<div id="message" class="updated below-h2 notice is-dismissible">
		<p>
		<?php 
			esc_html_e('Record Updated Successfully','hospital_mgt');
		?></p></div>
		<?php 		
	}
}
?>
<div class="page-inner min_height_1631 access_right"><!--- MAIN INNER DIV START -->
	<div id="main-wrapper"><!--- MAIN WRAPPER DIV START -->
	    <div class="panel panel-white"><!--- PANEL WHITE DIV START -->
			<div class="panel-body"><!--- PANEL BODY DIV START -->
				<h2>
					<?php esc_html_e('Patient Access Right', 'hospital_mgt'); ?>
				</h2>
				<div class="panel-body padding_0_res"><!--- PANEL BODY DIV START -->
					<form name="student_form" action="" method="post" class="form-horizontal" id="access_right_form">
						<div class="row access_right_hed">
							<div class="col-md-2 col-sm-2"><?php esc_html_e('Menu','hospital_mgt');?></div>
							<div class="col-md-2 col-sm-2 padding_left_heading access_right_marging"><?php esc_html_e('OwnData','hospital_mgt');?></div>
							<div class="col-md-2 col-sm-2 padding_left_22"><?php esc_html_e('View','hospital_mgt');?></div>
							<div class="col-md-2 col-sm-2 padding_left_18"><?php esc_html_e('Add','hospital_mgt');?></div>
							<div class="col-md-2 col-sm-2 padding_left_18"><?php esc_html_e('Edit','hospital_mgt');?></div>
							<div class="col-md-2 col-sm-2 padding_left_12"><?php esc_html_e('Delete ','hospital_mgt');?></div>
						</div>				
						<div class="access_right_menucroll row access_right_padding">
							<!-- Doctor module code  -->						
							<div class="row">
								<div class="col-sm-2 col-md-2">
									<span class="menu-label">
										<?php esc_html_e('Doctor','hospital_mgt');?>
									</span>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['doctor']['own_data'],1);?> value="1"  name="doctor_own_data">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['doctor']['view'],1);?> value="1" name="doctor_view">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['doctor']['add'],1);?> value="1" disabled name="doctor_add" >	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['doctor']['edit'],1);?> value="1" disabled name="doctor_edit" >	              
										</label>
									</div>
								</div>
								
								<div class="col-sm-2 col-md-1">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['doctor']['delete'],1);?> value="1" disabled name="doctor_delete" >	              
										</label>
									</div>
								</div>
								
							</div>
							
							<!-- Doctor module code end -->
							
							<!-- outpatient module code  -->
							
							<div class="row">
								<div class="col-sm-2 col-md-2">
									<span class="menu-label">
										<?php esc_html_e('Outpatient','hospital_mgt');?>
									</span>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['outpatient']['own_data'],1);?> value="1" name="outpatient_own_data">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['outpatient']['view'],1);?> value="1" name="outpatient_view">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['outpatient']['add'],1);?> value="1" disabled name="outpatient_add" >	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['outpatient']['edit'],1);?> value="1" disabled name="outpatient_edit" >	              
										</label>
									</div>
								</div>
								
								<div class="col-sm-2 col-md-1">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['outpatient']['delete'],1);?> value="1" disabled name="outpatient_delete" >	              
										</label>
									</div>
								</div>
								
							</div>
							
							<!-- patient module code  -->
							
							<div class="row">
								<div class="col-sm-2 col-md-2">
									<span class="menu-label">
										<?php esc_html_e('Inpatient','hospital_mgt');?>
									</span>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['patient']['own_data'],1);?> value="1" name="patient_own_data" >	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['patient']['view'],1);?> value="1" name="patient_view">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['patient']['add'],1);?> value="1" disabled name="patient_add" >	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['patient']['edit'],1);?> value="1" disabled name="patient_edit" >	              
										</label>
									</div>
								</div>
								
								<div class="col-sm-2 col-md-1">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['patient']['delete'],1);?> value="1" disabled name="patient_delete" >	              
										</label>
									</div>
								</div>
								
							</div>
							
							
							<!-- nurse module code  -->
							
							<div class="row">
								<div class="col-sm-2 col-md-2">
									<span class="menu-label">
										<?php esc_html_e('Nurse','hospital_mgt');?>
									</span>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['nurse']['own_data'],1);?> value="1" name="nurse_own_data" disabled>	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['nurse']['view'],1);?> value="1" name="nurse_view">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['nurse']['add'],1);?> value="1" disabled name="nurse_add" >	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['nurse']['edit'],1);?> value="1" disabled name="nurse_edit" >	              
										</label>
									</div>
								</div>
								
								<div class="col-sm-2 col-md-1">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['nurse']['delete'],1);?> value="1" disabled name="nurse_delete" >	              
										</label>
									</div>
								</div>
								
							</div>
							
							
							<!-- supportstaff module code  -->
							
							<div class="row">
								<div class="col-sm-2 col-md-2">
									<span class="menu-label">
										<?php esc_html_e('Supportstaff','hospital_mgt');?>
									</span>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['supportstaff']['own_data'],1);?> value="1" name="supportstaff_own_data" disabled>	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['supportstaff']['view'],1);?> value="1" name="supportstaff_view">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['supportstaff']['add'],1);?> value="1" disabled name="supportstaff_add" >	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['supportstaff']['edit'],1);?> value="1" disabled name="supportstaff_edit" >	              
										</label>
									</div>
								</div>
								
								<div class="col-sm-2 col-md-1">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['supportstaff']['delete'],1);?> value="1" disabled name="supportstaff_delete" >	              
										</label>
									</div>
								</div>								
							</div>						
							
							<!-- pharmacist module code  -->
							
							<div class="row">
								<div class="col-sm-2 col-md-2">
									<span class="menu-label">
										<?php esc_html_e('Pharmacist','hospital_mgt');?>
									</span>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['pharmacist']['own_data'],1);?> value="1" name="pharmacist_own_data" disabled>	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['pharmacist']['view'],1);?> value="1" name="pharmacist_view">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['pharmacist']['add'],1);?> value="1" disabled name="pharmacist_add" >	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['pharmacist']['edit'],1);?> value="1" disabled name="pharmacist_edit" >	              
										</label>
									</div>
								</div>
								
								<div class="col-sm-2 col-md-1">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['pharmacist']['delete'],1);?> value="1" disabled name="pharmacist_delete" >	              
										</label>
									</div>
								</div>
								
							</div>
							
							
							<!-- laboratorystaff module code  -->
							
							<div class="row">
								<div class="col-sm-2 col-md-2">
									<span class="menu-label">
										<?php esc_html_e('Laboratory Staff','hospital_mgt');?>
									</span>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['laboratorystaff']['own_data'],1);?> value="1" name="laboratorystaff_own_data" disabled>	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['laboratorystaff']['view'],1);?> value="1" name="laboratorystaff_view">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['laboratorystaff']['add'],1);?> value="1" name="laboratorystaff_add" disabled >	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['laboratorystaff']['edit'],1);?> value="1" name="laboratorystaff_edit" disabled >	              
										</label>
									</div>
								</div>
								
								<div class="col-sm-2 col-md-1">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['laboratorystaff']['delete'],1);?> value="1" name="laboratorystaff_delete" disabled >	              
										</label>
									</div>
								</div>
								
							</div>
							
							
							<!-- accountant module code  -->
							
							<div class="row">		  
								<div class="col-sm-2 col-md-2">
									<span class="menu-label">
										<?php esc_html_e('Accountant','hospital_mgt');?>
									</span>
								</div>
								 <div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['accountant']['own_data'],1);?> value="1" name="accountant_own_data" disabled>	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['accountant']['view'],1);?> value="1" name="accountant_view">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['accountant']['add'],1);?> value="1" name="accountant_add" disabled >	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['accountant']['edit'],1);?> value="1" name="accountant_edit" disabled >	              
										</label>
									</div>
								</div>
								
								<div class="col-sm-2 col-md-1">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['accountant']['delete'],1);?> value="1" name="accountant_delete" disabled >	              
										</label>
									</div>
								</div>
								
							</div>
							
							
							<!-- medicine module code  -->
							
							<div class="row">
								<div class="col-sm-2 col-md-2">
									<span class="menu-label">
										<?php esc_html_e('Medicine','hospital_mgt');?>
									</span>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['medicine']['own_data'],1);?> value="1" name="medicine_own_data">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['medicine']['view'],1);?> value="1" name="medicine_view">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['medicine']['add'],1);?> value="1" name="medicine_add" disabled >	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['medicine']['edit'],1);?> value="1" name="medicine_edit" disabled >	              
										</label>
									</div>
								</div>
								
								<div class="col-sm-2 col-md-1">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['medicine']['delete'],1);?> value="1" name="medicine_delete" disabled >	              
										</label>
									</div>
								</div>
								
							</div>
							
							<!-- treatment module code  -->
							
							<div class="row">		  
								<div class="col-sm-2 col-md-2">
									<span class="menu-label">
										<?php esc_html_e('Treatment','hospital_mgt');?>
									</span>
								</div>
								 <div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['treatment']['own_data'],1);?> value="1" name="treatment_own_data" disabled>	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['treatment']['view'],1);?> value="1" name="treatment_view">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['treatment']['add'],1);?> value="1" name="treatment_add" disabled >	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['treatment']['edit'],1);?> value="1" name="treatment_edit" disabled >	              
										</label>
									</div>
								</div>
								
								<div class="col-sm-2 col-md-1">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['treatment']['delete'],1);?> value="1" name="treatment_delete" disabled >	              
										</label>
									</div>
								</div>
								
							</div>
							
							<!-- prescription module code  -->
							
							<div class="row">		  
								<div class="col-sm-2 col-md-2">
									<span class="menu-label">
										<?php esc_html_e('Prescription','hospital_mgt');?>
									</span>
								</div>
								 <div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['prescription']['own_data'],1);?> value="1" name="prescription_own_data">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['prescription']['view'],1);?> value="1" name="prescription_view">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['prescription']['add'],1);?> value="1" name="prescription_add" disabled >	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['prescription']['edit'],1);?> value="1" name="prescription_edit" disabled >	              
										</label>
									</div>
								</div>
								
								<div class="col-sm-2 col-md-1">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['prescription']['delete'],1);?> value="1" name="prescription_delete" disabled >	              
										</label>
									</div>
								</div>
								
							</div>
							
							
							<!-- bedallotment module code  -->
							
							<div class="row">
								<div class="col-sm-2 col-md-2">
									<span class="menu-label">
										<?php esc_html_e('Assign Bed-Nurse','hospital_mgt');?>
									</span>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['bedallotment']['own_data'],1);?> value="1" name="bedallotment_own_data">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['bedallotment']['view'],1);?> value="1" name="bedallotment_view">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['bedallotment']['add'],1);?> value="1" name="bedallotment_add" disabled >	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['bedallotment']['edit'],1);?> value="1" name="bedallotment_edit" disabled >	              
										</label>
									</div>
								</div>
								
								<div class="col-sm-2 col-md-1">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['bedallotment']['delete'],1);?> value="1" name="bedallotment_delete" disabled >	              
										</label>
									</div>
								</div>
								
							</div>
							
							
							<!-- operation module code  -->
							
							<div class="row">
								<div class="col-sm-2 col-md-2">
									<span class="menu-label">
										<?php esc_html_e('Operation','hospital_mgt');?>
									</span>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['operation']['own_data'],1);?> value="1" name="operation_own_data">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['operation']['view'],1);?> value="1" name="operation_view">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['operation']['add'],1);?> value="1" name="operation_add" disabled >	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['operation']['edit'],1);?> value="1" name="operation_edit" disabled >	              
										</label>
									</div>
								</div>
								
								<div class="col-sm-2 col-md-1">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['operation']['delete'],1);?> value="1" name="operation_delete" disabled >	              
										</label>
									</div>
								</div>
								
							</div>
							
							
							<!-- diagnosis module code  -->
							
							<div class="row">		   
								<div class="col-sm-2 col-md-2">
									<span class="menu-label">
										<?php esc_html_e('Diagnosis','hospital_mgt');?>
									</span>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['diagnosis']['own_data'],1);?> value="1" name="diagnosis_own_data">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['diagnosis']['view'],1);?> value="1" name="diagnosis_view">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['diagnosis']['add'],1);?> value="1" name="diagnosis_add" disabled >	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['diagnosis']['edit'],1);?> value="1" name="diagnosis_edit" disabled >	              
										</label>
									</div>
								</div>
								
								<div class="col-sm-2 col-md-1">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['diagnosis']['delete'],1);?> value="1" name="diagnosis_delete" disabled >	              
										</label>
									</div>
								</div>
								
							</div>
							
							<!-- bloodbank module code  -->
							
							<div class="row">		 
								<div class="col-sm-2 col-md-2">
									<span class="menu-label">
										<?php esc_html_e('Bloodbank','hospital_mgt');?>
									</span>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['bloodbank']['own_data'],1);?> value="1" name="bloodbank_own_data">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['bloodbank']['view'],1);?> value="1" name="bloodbank_view">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['bloodbank']['add'],1);?> value="1" name="bloodbank_add" disabled >	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['bloodbank']['edit'],1);?> value="1" name="bloodbank_edit" disabled >	              
										</label>
									</div>
								</div>
								
								<div class="col-sm-2 col-md-1">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['bloodbank']['delete'],1);?> value="1" name="bloodbank_delete" disabled >	              
										</label>
									</div>
								</div>
								
							</div>
							
							<!-- virtual appointment module code  -->							
							<div class="row">
								<div class="col-sm-2 col-md-2">
									<span class="menu-label">
										<?php esc_html_e('Virtual Appointment','hospital_mgt');?>
									</span>
								</div>								
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['virtual_appointment']['own_data'],1);?> value="1" name="virtual_appointment_own_data">
										</label>
									</div>
								</div>								
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['virtual_appointment']['view'],1);?> value="1" name="virtual_appointment_view">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['virtual_appointment']['add'],1);?> value="1" name="virtual_appointment_add" >	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['virtual_appointment']['edit'],1);?> value="1" name="virtual_appointment_edit" >	              
										</label>
									</div>
								</div>								
								<div class="col-sm-2 col-md-1">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['virtual_appointment']['delete'],1);?> value="1" name="virtual_appointment_delete" >	              
										</label>
									</div>
								</div>
							</div>				
							
							<!-- appointment module code  -->
							
							<div class="row">		   
								<div class="col-sm-2 col-md-2">
									<span class="menu-label">
										<?php esc_html_e('Appointment','hospital_mgt');?>
									</span>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['appointment']['own_data'],1);?> value="1" name="appointment_own_data">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['appointment']['view'],1);?> value="1" name="appointment_view">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['appointment']['add'],1);?> value="1" name="appointment_add" >	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['appointment']['edit'],1);?> value="1" name="appointment_edit" >	              
										</label>
									</div>
								</div>
								
								<div class="col-sm-2 col-md-1">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['appointment']['delete'],1);?> value="1" name="appointment_delete" >	              
										</label>
									</div>
								</div>
								
							</div>
							
							<!-- invoice module code  -->
							
							<div class="row">		  
								<div class="col-sm-2 col-md-2">
									<span class="menu-label">
										<?php esc_html_e('Invoice','hospital_mgt');?>
									</span>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['invoice']['own_data'],1);?> value="1" name="invoice_own_data">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['invoice']['view'],1);?> value="1" name="invoice_view">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['invoice']['add'],1);?> value="1" name="invoice_add" disabled >	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['invoice']['edit'],1);?> value="1" name="invoice_edit" disabled >	              
										</label>
									</div>
								</div>
								
								<div class="col-sm-2 col-md-1">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['invoice']['delete'],1);?> value="1" name="invoice_delete" disabled >	              
										</label>
									</div>
								</div>
								
							</div>
							
							<!-- event module code  -->
							
							<div class="row">		   
								<div class="col-sm-2 col-md-2">
									<span class="menu-label">
										<?php esc_html_e('Event','hospital_mgt');?>
									</span>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['event']['own_data'],1);?> value="1" name="event_own_data">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['event']['view'],1);?> value="1" name="event_view">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['event']['add'],1);?> value="1" name="event_add" >	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['event']['edit'],1);?> value="1" name="event_edit" >	              
										</label>
									</div>
								</div>
								
								<div class="col-sm-2 col-md-1">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['event']['delete'],1);?> value="1" name="event_delete" >	              
										</label>
									</div>
								</div>
								
							</div>
							
							<!-- message module code  -->
							
							<div class="row">		   
								<div class="col-sm-2 col-md-2">
									<span class="menu-label">
										<?php esc_html_e('Message','hospital_mgt');?>
									</span>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['message']['own_data'],1);?> value="1" name="message_own_data">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['message']['view'],1);?> value="1" name="message_view">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['message']['add'],1);?> value="1" name="message_add" >	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['message']['edit'],1);?> value="1" name="message_edit" disabled>	              
										</label>
									</div>
								</div>
								
								<div class="col-sm-2 col-md-1">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['message']['delete'],1);?> value="1" name="message_delete" >	              
										</label>
									</div>
								</div>
								
							</div>
							
							
							<!-- ambulance module code  -->
							
							<div class="row">		   
								<div class="col-sm-2 col-md-2">
									<span class="menu-label">
										<?php esc_html_e('Ambulance','hospital_mgt');?>
									</span>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['ambulance']['own_data'],1);?> value="1" name="ambulance_own_data">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['ambulance']['view'],1);?> value="1" name="ambulance_view">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['ambulance']['add'],1);?> value="1" name="ambulance_add" >	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['ambulance']['edit'],1);?> value="1" name="ambulance_edit" >	              
										</label>
									</div>
								</div>
								
								<div class="col-sm-2 col-md-1">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['ambulance']['delete'],1);?> value="1" name="ambulance_delete" >	              
										</label>
									</div>
								</div>
								
							</div>
							
							
							<!-- instrument module code  -->
							
							<div class="row">		  
								<div class="col-sm-2 col-md-2">
									<span class="menu-label">
										<?php esc_html_e('Instrument','hospital_mgt');?>
									</span>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['instrument']['own_data'],1);?> value="1" name="instrument_own_data">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['instrument']['view'],1);?> value="1" name="instrument_view">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['instrument']['add'],1);?> value="1" name="instrument_add" disabled >	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['instrument']['edit'],1);?> value="1" name="instrument_edit" disabled >	              
										</label>
									</div>
								</div>
								
								<div class="col-sm-2 col-md-1">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['instrument']['delete'],1);?> value="1" name="instrument_delete" disabled >	              
										</label>
									</div>
								</div>
								
							</div>
							
							
							<!-- report module code  -->
							
							<div class="row">		   
								<div class="col-sm-2 col-md-2">
									<span class="menu-label">
										<?php esc_html_e('Report','hospital_mgt');?>
									</span>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['report']['own_data'],1);?> value="1" name="report_own_data" disabled>	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['report']['view'],1);?> value="1" name="report_view" disabled>	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['report']['add'],1);?> value="1" name="report_add" disabled>	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['report']['edit'],1);?> value="1" name="report_edit" disabled>	              
										</label>
									</div>
								</div>
								
								<div class="col-sm-2 col-md-1">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['report']['delete'],1);?> value="1" name="report_delete" disabled>	              
										</label>
									</div>
								</div>
								
							</div>
							
							<!-- account module code  -->
							<div class="row">		  
								<div class="col-sm-2 col-md-2">
									<span class="menu-label">
										<?php esc_html_e('Account','hospital_mgt');?>
									</span>
								</div>
								 <div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['account']['own_data'],1);?> value="1" name="account_own_data">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['account']['view'],1);?> value="1" name="account_view">	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['account']['add'],1);?> value="1" name="account_add" disabled>	              
										</label>
									</div>
								</div>
								<div class="col-sm-2 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['account']['edit'],1);?> value="1" name="account_edit" disabled>	              
										</label>
									</div>
								</div>
								
								<div class="col-sm-2 col-md-1">
									<div class="checkbox">
										<label>
											<input type="checkbox" <?php echo checked($access_right['patient']['account']['delete'],1);?> value="1" name="account_delete" disabled>	              
										</label>
									</div>
								</div>
							</div>
						</div><!---END PANEL BODY DIV -->
						<div class="col-sm-offset-2 col-sm-8 row_bottom">							
							<input type="submit" value="<?php esc_html_e('Save', 'hospital_mgt' ); ?>" name="save_access_right_patient" class="btn btn-success"/>
						</div>
					</form>
		        </div><!---END PANEL BODY DIV -->
            </div><!--- END PANEL BODY DIV-->
        </div> <!--- END PANEL WHITE DIV -->   
	</div><!--- END MAIN WRAPPER DIV    -->
</div><!--- END MAIN INNER DIV    -->