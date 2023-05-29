<?php
$obj_message = new MJ_hmgt_message();
$active_tab = isset($_GET['tab'])?$_GET['tab']:'inbox';
?>
<div class="page-inner min_height_1631"><!--PAGE INNER DIV START-->
	<div class="page-title"><!--PAGE TITLE DIV START-->
		<h3><img src="<?php echo esc_url(get_option( 'hmgt_hospital_logo', 'hospital_mgt' )) ?>" class="img-circle head_logo" width="40" height="40" /><?php echo esc_html(get_option('hmgt_hospital_name','hospital_mgt'));?></h3>
	</div><!--PAGE TITLE DIV END-->
		<?php 
		if(isset($_POST['save_message']))
		{
			$nonce = $_POST['_wpnonce'];
			if (wp_verify_nonce( $nonce, 'save_message_nonce' ) )
			{
				$result = $obj_message->MJ_hmgt_add_message($_POST);
			}
		}
		if(isset($result))
		{
			wp_redirect ( admin_url() . 'admin.php?page=hmgt_message&tab=inbox&message=1');
		}
		if(isset($_REQUEST['message']))
		{
			$message =$_REQUEST['message'];
			if($message == 1)
			{?>
					<div id="message" class="updated below-h2 notice is-dismissible">
					<p>
					<?php 
						esc_html_e('Message send successfully','hospital_mgt');
					?></p></div>
					<?php 
			}
			elseif($message == 2)
			{?><div id="message" class="updated below-h2 notice is-dismissible"><p><?php
				esc_html_e("Message deleted successfully",'hospital_mgt');
				?></p>
				</div>
			<?php 
			}
		}	
		?>
	<div id="main-wrapper"><!--MAIN WRAPPER DIV START-->
		<div class="row mailbox-header"><!--MAILBOX HEADER DIV START-->
			<div class="col-md-2 float_left">
				<a class="btn btn-success btn-block" href="?page=hmgt_message&tab=compose"><?php esc_html_e('Compose','hospital_mgt');?></a>
			</div>
			<div class="col-md-6 float_left float_left_responsive">
				<h2>
				<?php
				if(!isset($_REQUEST['tab']) || ($_REQUEST['tab'] == 'inbox'))
				echo esc_html( esc_html__( 'Inbox', 'hospital_mgt' ) );
				else if(isset($_REQUEST['page']) && $_REQUEST['tab'] == 'sentbox')
				echo esc_html( esc_html__( 'Sent Item', 'hospital_mgt' ) );
				else if(isset($_REQUEST['page']) && $_REQUEST['tab'] == 'compose')
					echo esc_html( esc_html__( 'Compose', 'hospital_mgt' ) );
				?>
			</h2>
			</div>									   
		</div><!--MAILBOX HEADER DIV END-->
		<div class="col-md-2 float_left">
			<ul class="list-unstyled mailbox-nav">
				<li <?php if(!isset($_REQUEST['tab']) || ($_REQUEST['tab'] == 'inbox')){?>class="active"<?php }?>>
				<a href="?page=hmgt_message&tab=inbox"><i class="fa fa-inbox"></i> <?php esc_html_e('Inbox','hospital_mgt');?><span class="badge badge-success pull-right margin_left_10_res"><?php
				echo MJ_hmgt_count_unread_message_admin(get_current_user_id());
				?></span></a></li>
				<li <?php if(isset($_REQUEST['tab']) && $_REQUEST['tab'] == 'sentbox'){?>class="active"<?php }?>><a href="?page=hmgt_message&tab=sentbox"><i class="fa fa-sign-out"></i><?php esc_html_e('Sent','hospital_mgt');?></a></li>                                
			</ul>
		</div>
		<div class="col-md-10 float_left">
		<?php  
			if(isset($_REQUEST['tab']) && $_REQUEST['tab'] == 'sentbox')
				require_once HMS_PLUGIN_DIR. '/admin/includes/message/sendbox.php';
			if(!isset($_REQUEST['tab']) || ($_REQUEST['tab'] == 'inbox'))
				require_once HMS_PLUGIN_DIR. '/admin/includes/message/inbox.php';
			if(isset($_REQUEST['tab']) && ($_REQUEST['tab'] == 'compose'))
				require_once HMS_PLUGIN_DIR. '/admin/includes/message/composemail.php';
			if(isset($_REQUEST['tab']) && ($_REQUEST['tab'] == 'view_message'))
				require_once HMS_PLUGIN_DIR. '/admin/includes/message/view_message.php';
		?>
		</div>
	</div><!-- Main-wrapper DIV END -->
</div><!-- Page-inner DIV END-->