<?php 
function hospital_admin_menu_icon()
{
?>
<style type="text/css">
#adminmenu #toplevel_page_hospital div.wp-menu-image:before {
  content: "\f512";
}
</style>
 <?php 
}
add_action( 'admin_menu', 'hospital_menu' );
function hospital_menu()
{
	if (function_exists('MJ_hmgt_setup'))  
	{
		add_menu_page('Hospital Management', esc_html__('Hospital Management','hospital_mgt'),'manage_options','hmgt_hospital','hospital_dashboard',plugins_url( 'hospital-management/assets/images/hospital-2.png' )); 

		// if(isset($_SESSION['hmgt_verify'])  &&  $_SESSION['hmgt_verify'] == '')
		// {
		// 	add_submenu_page('hmgt_hospital','Licence Settings', esc_html__( 'Licence Settings', 'hospital_mgt'),'manage_options','hmgt_setup','hmgt_options_page');
		// }
		
		add_submenu_page('hmgt_hospital', 'Dashboard', esc_html__( 'Dashboard', 'hospital_mgt' ), 'administrator', 'hmgt_hospital', 'hospital_dashboard');
		add_submenu_page('hmgt_hospital', 'Doctor', esc_html__( 'Doctor', 'hospital_mgt' ), 'administrator', 'hmgt_doctor', 'doctor_function');
		add_submenu_page('hmgt_hospital', 'Outpatient', esc_html__( 'Outpatient', 'hospital_mgt' ), 'administrator', 'hmgt_outpatient', 'outpatient_function');
		 add_submenu_page('hmgt_hospital', 'Inpatient', esc_html__( 'Inpatient', 'hospital_mgt' ), 'administrator', 'hmgt_patient', 'patient_function');
		
		add_submenu_page('hmgt_hospital', 'Nurse', esc_html__( 'Nurse', 'hospital_mgt' ), 'administrator', 'hmgt_nurse', 'nurse_function');
		add_submenu_page('hmgt_hospital', 'Support Staff', esc_html__( 'Support Staff', 'hospital_mgt' ), 'administrator', 'hmgt_receptionist', 'receptionist_function');
		add_submenu_page('hmgt_hospital', 'Pharmacist', esc_html__( 'Pharmacist', 'hospital_mgt' ), 'administrator', 'hmgt_pharmacist', 'pharmacist_function');
		add_submenu_page('hmgt_hospital', 'Laboratorist', esc_html__( 'Laboratory Staff', 'hospital_mgt' ), 'administrator', 'hmgt_laboratorist', 'laboratorist_function');
		add_submenu_page('hmgt_hospital', 'Accountant', esc_html__( 'Accountant', 'hospital_mgt' ), 'administrator', 'hmgt_accountant', 'accountant_function');
				
		add_submenu_page('hmgt_hospital', 'Medicine', esc_html__( 'Medicine', 'hospital_mgt' ), 'administrator', 'hmgt_medicine', 'medicine_function');
		add_submenu_page('hmgt_hospital', 'Treatment', esc_html__( 'Treatment', 'hospital_mgt' ), 'administrator', 'hmgt_treatment', 'treatment_function');
		add_submenu_page('hmgt_hospital', 'Prescription', esc_html__( 'Prescription', 'hospital_mgt' ), 'administrator', 'hmgt_prescription', 'prescription_function');
		add_submenu_page('hmgt_hospital', 'Add Bed', esc_html__( 'Add Bed', 'hospital_mgt' ), 'administrator', 'hmgt_bedmanage', 'bedmanage_function');
		add_submenu_page('hmgt_hospital', 'Bed Assign', esc_html__( 'Assign Bed-Nurse', 'hospital_mgt' ), 'administrator', 'hmgt_bedallotment', 'bedallotment_function');
		
		add_submenu_page('hmgt_hospital', 'Instrument Mgt', esc_html__( 'Instrument Mgt', 'hospital_mgt' ), 'administrator', 'hmgt_instrument_mgt', 'instrument_mgt_function');
		
		
		add_submenu_page('hmgt_hospital', 'Operation List', esc_html__( 'Operation', 'hospital_mgt' ), 'administrator', 'hmgt_operation', 'operation_function');
		add_submenu_page('hmgt_hospital', 'Diagnosis Report', esc_html__( 'Diagnosis Report', 'hospital_mgt' ), 'administrator', 'hmgt_diagnosis', 'diagnosis_function');
		add_submenu_page('hmgt_hospital', 'Blood Bank', esc_html__( 'Blood Bank', 'hospital_mgt' ), 'administrator', 'hmgt_bloodbank', 'bloodbank_function');

		if (get_option('hmgt_enable_virtual_appointment') == 'yes')
		{
			add_submenu_page('hmgt_hospital',  __( 'Virtual Appointment', 'hospital_mgt' ), __( 'Virtual Appointment', 'hospital_mgt' ), 'administrator', 'hmgt_virtual_appointment', 'hmgt_virtual_appointment');
		}
				
		add_submenu_page('hmgt_hospital', 'Appointment', esc_html__( 'Appointment', 'hospital_mgt' ), 'administrator', 'hmgt_appointment', 'appointment_function');	
		add_submenu_page('hmgt_hospital', 'Invoice', esc_html__( 'Invoice', 'hospital_mgt' ), 'administrator', 'hmgt_invoice', 'invoice_function');
		add_submenu_page('hmgt_hospital', 'Event', esc_html__( 'Events', 'hospital_mgt' ), 'administrator', 'hmgt_event', 'event_function');
		add_submenu_page('hmgt_hospital', 'Message', esc_html__( 'Message', 'hospital_mgt' ), 'administrator', 'hmgt_message', 'message_function');
		add_submenu_page('hmgt_hospital', 'Ambulance', esc_html__( 'Ambulance', 'hospital_mgt' ), 'administrator', 'hmgt_ambulance', 'ambulance_function');		
		add_submenu_page('hmgt_hospital', 'Report', esc_html__( 'Report', 'hospital_mgt' ), 'administrator', 'hmgt_report', 'hmgt_report');
		add_submenu_page('hmgt_hospital', 'SMS', esc_html__( 'SMS Setting', 'hospital_mgt' ), 'administrator', 'hmgt_sms_setting', 'hmgt_sms_setting');
		add_submenu_page('hmgt_hospital', 'Audit Log', esc_html__( 'Audit Log', 'hospital_mgt' ), 'administrator', 'hmgt_audit_log', 'hmgt_audit_log');
		add_submenu_page('hmgt_hospital', 'Mail Template', esc_html__( 'Mail Template', 'hospital_mgt' ), 'administrator', 'hmgt_mail_template', 'hmgt_mail_template');
		add_submenu_page('hmgt_hospital', 'Gnrl_setting', esc_html__( 'General Settings', 'hospital_mgt' ), 'administrator', 'hmgt_gnrl_settings', 'hmgt_gnrl_settings');
		add_submenu_page('hmgt_hospital','Access Right',esc_html__('Access Right','hospital_mgt'),'administrator','hmgt_access_right','hmgt_access_right');
	}  
	else
	{ 		      
		die;
	}
}

function hospital_dashboard()
{
	require_once HMS_PLUGIN_DIR. '/admin/includes/dasboard.php';
	
}	
 function doctor_function()
{
	require_once HMS_PLUGIN_DIR. '/admin/includes/doctor/index.php';
}	
function patient_function()
{
	require_once HMS_PLUGIN_DIR. '/admin/includes/patient/index.php';
}	
function outpatient_function()
{
	require_once HMS_PLUGIN_DIR. '/admin/includes/outpatient/index.php';
}			

function nurse_function()
{
	require_once HMS_PLUGIN_DIR. '/admin/includes/nurse/index.php';
}
function receptionist_function()
{
	require_once HMS_PLUGIN_DIR. '/admin/includes/receptionist/index.php';
}	
function pharmacist_function()
{
	require_once HMS_PLUGIN_DIR. '/admin/includes/pharmacist/index.php';
}	
function laboratorist_function()
{
	require_once HMS_PLUGIN_DIR. '/admin/includes/laboratorist/index.php';
}	
function accountant_function()
{
	require_once HMS_PLUGIN_DIR. '/admin/includes/accountant/index.php';
}	
function medicine_function()
{
	require_once HMS_PLUGIN_DIR. '/admin/includes/medicine/index.php';
}	
function prescription_function()
{
	require_once HMS_PLUGIN_DIR. '/admin/includes/prescription/index.php';
}	
function diagnosis_function()
{
	require_once HMS_PLUGIN_DIR. '/admin/includes/diagnosis/index.php';
}	
function bloodbank_function()
{
	require_once HMS_PLUGIN_DIR. '/admin/includes/blood-bank/index.php';
}
function bedmanage_function()
{
	require_once HMS_PLUGIN_DIR. '/admin/includes/bed/index.php';
}	
function hmgt_virtual_appointment()
{
	require_once HMS_PLUGIN_DIR. '/admin/includes/virtual_appointment/index.php';
}
function appointment_function()
{
	require_once HMS_PLUGIN_DIR. '/admin/includes/appointment/index.php';
}
function treatment_function	()
{
	require_once HMS_PLUGIN_DIR. '/admin/includes/treatment/index.php';
}	
function invoice_function()
{
	require_once HMS_PLUGIN_DIR. '/admin/includes/invoice/index.php';
}	
function event_function()	
{
	require_once HMS_PLUGIN_DIR. '/admin/includes/event/index.php';
}	
function hmgt_gnrl_settings()
 {
	require_once HMS_PLUGIN_DIR. '/admin/includes/general-settings.php';
}	
function message_function()
 {
	require_once HMS_PLUGIN_DIR. '/admin/includes/message/index.php';
}	
function ambulance_function()
{
	require_once HMS_PLUGIN_DIR. '/admin/includes/ambulance/index.php';
}	
function operation_function()
{
	require_once HMS_PLUGIN_DIR. '/admin/includes/OT/index.php';
}	
function bedallotment_function()
{
	require_once HMS_PLUGIN_DIR. '/admin/includes/bed-allotment/index.php';
}
function appointment_report_function()
{
	require_once HMS_PLUGIN_DIR. '/admin/includes/report/appointment_report.php';
}
function occupancy_report_function()
{	
	require_once HMS_PLUGIN_DIR. '/admin/includes/report/occupancy_report.php';
}
function opearion_report_function()
{	
	require_once HMS_PLUGIN_DIR. '/admin/includes/report/operation_report.php';
}
function fail_report_function()
{	
	require_once HMS_PLUGIN_DIR. '/admin/includes/report/fail_report.php';
}
function birth_report_function()
{
	require_once HMS_PLUGIN_DIR. '/admin/includes/report/birth_report.php';
}
function hmgt_report()
{ 
	require_once HMS_PLUGIN_DIR. '/admin/includes/report/index.php';
}
function hmgt_sms_setting()
{
	require_once HMS_PLUGIN_DIR. '/admin/includes/sms_setting/index.php';
}
function hmgt_audit_log()
{
	require_once HMS_PLUGIN_DIR. '/admin/includes/auditlog/index.php';
}
function hmgt_mail_template()
{
	require_once HMS_PLUGIN_DIR. '/admin/includes/mailtemplate/index.php';
}

function hmgt_access_right()
{
	require_once HMS_PLUGIN_DIR. '/admin/includes/access_right/index.php';
}
function instrument_mgt_function()
{
	require_once HMS_PLUGIN_DIR. '/admin/includes/instrument-mgt/index.php';
}
function hmgt_options_page()
{
	require_once HMS_PLUGIN_DIR. '/admin/includes/setupform/index.php';
}
?>