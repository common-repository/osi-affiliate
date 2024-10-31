<?php
// Exit if accessed directly
!defined('ABSPATH') && exit;
!current_user_can('manage_options') && wp_die(__("You don't have permissions to view this page"));

global $wpdb;

$_POST = stripslashes_deep($_POST);
$_POST = osi_trim_deep($_POST);

if( isset($_POST) && isset($_POST['addSubmit']) ){

	$temp_osi_hss_title = str_replace(' ', '', $_POST['snippetTitle']);
	$temp_osi_hss_title = str_replace('-', '', $temp_osi_hss_title);
	
	$osi_hss_title = esc_sql( str_replace(' ', '-', $_POST['snippetTitle']) );
	$osi_hss_content = $_POST['snippetContent'];

	if($osi_hss_title != "" && $osi_hss_content != ""){
		if(ctype_alnum($temp_osi_hss_title))
		{
		
		$snippet_count = $wpdb->query( 'SELECT * FROM '.$wpdb->prefix.'osi_hss_short_code WHERE title="'.$osi_hss_title.'"' ) ;
		if($snippet_count == 0){
			$osi_shortCode = '[osi-ihs snippet="'.$osi_hss_title.'"]';
			$wpdb->insert($wpdb->prefix.'osi_hss_short_code', array('title' =>$osi_hss_title,'content'=>$osi_hss_content,'short_code'=>$osi_shortCode,'status'=>'1'),array('%s','%s','%s','%d'));
			
                        osi_js_redirect('page=html-snippet-shortcode-manage&osi_hss_msg=1');
		}else{
			?>
			<div class="system_notice_area_style0" id="system_notice_area">
			HTML Snippet already exists. &nbsp;&nbsp;&nbsp;<span id="system_notice_area_dismiss">Dismiss</span>
			</div>
			<?php	
	
		}
		}
		else
		{
			?>
		<div class="system_notice_area_style0" id="system_notice_area">
		HTML Snippet title can have only alphabets,numbers or hyphen. &nbsp;&nbsp;&nbsp;<span id="system_notice_area_dismiss">Dismiss</span>
		</div>
		<?php
		
		}
		
		
	}else{
?>		
		<div class="system_notice_area_style0" id="system_notice_area">
			Fill all mandatory fields. &nbsp;&nbsp;&nbsp;<span id="system_notice_area_dismiss">Dismiss</span>
		</div>
<?php 
	}

}

?>

<div >
	<fieldset
		style="width: 99%; border: 1px solid #F7F7F7; padding: 10px 0px;">
		<legend>
			<b>Add HTML Snippet</b>
		</legend>
		<form name="frmmainForm" id="frmmainForm" method="post">
			
			<div>
				<table
					style="width: 99%; background-color: #F9F9F9; border: 1px solid #E4E4E4; border-width: 1px;margin: 0 auto">
					<tr><td><br/>
					<div id="shortCode"></div>
					<br/></td></tr>
					<tr valign="top">
						<td style="border-bottom: none;width:20%;">&nbsp;&nbsp;&nbsp;Tracking Name&nbsp;<font color="red">*</font></td>
						<td style="border-bottom: none;width:1px;">&nbsp;:&nbsp;</td>
						<td><input style="width:80%;"
							type="text" name="snippetTitle" id="snippetTitle"
							value="<?php if(isset($_POST['snippetTitle'])){ echo esc_attr($_POST['snippetTitle']);}?>"></td>
					</tr>
					<tr>
						<td style="border-bottom: none;width:20%; ">&nbsp;&nbsp;&nbsp;HTML code &nbsp;<font color="red">*</font></td>
						<td style="border-bottom: none;width:1px;">&nbsp;:&nbsp;</td>
						<td >
							<textarea name="snippetContent" style="width:80%;height:150px;"><?php if(isset($_POST['snippetContent'])){ echo esc_textarea($_POST['snippetContent']);}?></textarea>
						</td>
					</tr>				

				<tr>
				<td></td><td></td>
					<td><input class="button-primary" style="cursor: pointer;"
							type="submit" name="addSubmit" value="Create"></td>
				</tr>
				<tr><td><br/></td></tr>
				</table>
			</div>

		</form>
	</fieldset>

</div>
