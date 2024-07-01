<?php
/**
 * Template Name: Register Page Template
*/
global $post;
	get_header();
	if(!isset($_REQUEST['role'])){
?>
<div class="fre-page-wrapper">
	<div class="fre-page-section">
		<div class="container">
			<div class="fre-authen-wrapper">
				<div class="fre-register-default">
					<h2><?php _e('Sign Up Free Account', ET_DOMAIN)?></h2>
					<div class="fre-register-wrap">
						<div class="row">
							<div class="col-sm-6">
								<div class="register-employer">
									<h3><?php _e('Employer', ET_DOMAIN);?></h3>
									<p><?php _e('Post project, find freelancers and hire favorite to work.', ET_DOMAIN);?></p>
									<a class="fre-small-btn primary-bg-color" href="<?php echo  et_get_page_link( 'register',array('role' => EMPLOYER) );?>"><?php _e('Sign Up', ET_DOMAIN);?></a>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="register-freelancer">
									<h3><?php _e('Freelancer', ET_DOMAIN);?></h3>
									<p><?php _e('Create professional profile and find freelance jobs to work.', ET_DOMAIN);?></p>
									<a class="fre-small-btn primary-bg-color" href="<?php echo  et_get_page_link( 'register',array('role' => FREELANCER) );?>"><?php _e('Sign Up', ET_DOMAIN);?></a>
								</div>
							</div>
						</div>
					</div>
					<div class="fre-authen-footer">
						<?php
			                if(fre_check_register() && function_exists('ae_render_social_button')){
			                    $before_string = __("You can use social account to login", ET_DOMAIN);
			                    ae_render_social_button( array(), array(), $before_string );
			                }
			            ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	}else{
		$role = $_REQUEST['role'];
		$re_url = '';
		if( isset($_GET['ae_redirect_url']) ){
			$re_url = $_GET['ae_redirect_url'];
		}
		global $count_tool;
?>
	<div class="fre-page-wrapper">
		<div class="fre-page-section">
			<div class="container">
				<div class="fre-authen-wrapper">
					<div class="fre-authen-register">
						<?php if($role == 'employer'){ ?>
								<h2><?php _e('Sign Up Employer Account', ET_DOMAIN);?></h2>
						<?php }else{ ?>
								<h2><?php _e('Sign Up Freelancer Account', ET_DOMAIN);?></h2>
						<?php } ?>
						<form role="form" id="signup_form">
							<input type="hidden" name="ae_redirect_url"  value="<?php echo $re_url ?>" />
							<input type="hidden" name="role" id="role" value="<?php echo $role;?>" />
							
							<div class="fre-custom-fields fre-two-fields">
								<div class="col">
									<input type="text" name="first_name" id="first_name" placeholder="<?php _e('First Name', ET_DOMAIN);?>">
								</div>
								<div class="col">

									<input type="text" name="last_name" id="last_name" placeholder="<?php _e('Last Name', ET_DOMAIN);?>">
								</div>
							</div>

								<div class="fre-custom-fields  ">
									<div class="col">
										<input type="text" name="company_address" required id="company_address" placeholder="<?php _e('Address', ET_DOMAIN);?>">
									</div>
								</div>
								<div class="fre-custom-fields fre-two-fields">
									<div class="col">
										<input type="text" name="company_city" required id="company_city" placeholder="<?php _e('City', ET_DOMAIN);?>">
									</div>
									<div class="col">
										<input type="text" name="company_state"  id="company_state" placeholder="<?php _e('State', ET_DOMAIN);?>">
									</div>
								</div>
								<div class="fre-custom-fields fre-two-fields ">
									<div class="col">
										<input type="text" name="zipcode" id="zipcode" required placeholder="<?php _e('ZIP code', ET_DOMAIN);?>">
									</div>

									<div class="col fre-chosen-field">
										<?php
										 ae_tax_dropdown(
			                                'country',
			                                array(
			                                    'attr'            => '  autocomplete="off"  data-chosen-width="100%" data-validate_filed = "1" required data-chosen-disable-search="" data-placeholder="' . __("Choose country", ET_DOMAIN) . '"',
			                                    'class'           => 'fre-chosen-single',
			                                    'hide_empty'      => 0,
			                                    'hierarchical'    => false,
			                                    'id'              => 'country',
			                                    'show_option_all' => __("Select country", ET_DOMAIN),
			                                )
			                            );
			                            ?>
									</div>
								</div>

								<?php if($role !== 'employer'){ ?> <!-- Freelancer fields !-->
									<div class="fre-custom-fields fre-brn-field  fre-field-has-tooltip">
										<div class="col">
											
											<input type="text" name="bus_reg_number" required id="bus_reg_number" placeholder="<?php _e('Business Registration Number', ET_DOMAIN);?>">
											<?php box_tooltips(__('Business Registration Number', ET_DOMAIN) ) ;?>
										</div>
									</div>
									<div class="fre-custom-fields fre-two-fields fre-field-has-tooltip">
										<div class="col">
											
											<input type="text" name="vat_number" id="vat_number" placeholder="<?php _e('VAT number', ET_DOMAIN);?>">
											<?php box_tooltips(__('VAT number', ET_DOMAIN)) ;?>
										</div>
										<div class="col">
											
											<input type="text" name="eu_vat_number"  id="eu_vat_number" placeholder="<?php _e('EU VAT Number', ET_DOMAIN);?>">
											<?php box_tooltips(__('EU VAT Number', ET_DOMAIN)) ; ?>
										</div>
									</div>
								<?php } else { ?> <!-- Employer fields !-->
									<div class="fre-custom-fields fre-two-fields fre-field-has-tooltip">
										<div class="col">
											
											<input type="text" name="bus_reg_number"required id="bus_reg_number" placeholder="<?php _e('Business Registration Number', ET_DOMAIN);?>">
											<?php box_tooltips(__('Business Registration Number', ET_DOMAIN)) ;?>
										</div>
										<div class="col">
											
											<input type="text" name="vat_number"  id="vat_number" placeholder="<?php _e('VAT number', ET_DOMAIN);?>">
											<?php box_tooltips(__('VAT number', ET_DOMAIN)) ;?>
										</div>
									</div>
							<?php } ?>
							

							<div class="fre-input-field">
								<input type="text" name="user_email" id="user_email" placeholder="<?php _e('Email', ET_DOMAIN);?>">
							</div>
							<div class="fre-input-field">
								<input type="text" name="phone" required  id="phone" placeholder="<?php _e('Mobile number', ET_DOMAIN);?>">
							</div>
							<div class="fre-input-field">
								<input type="text" name="user_login" id="user_login" placeholder="<?php _e('Username', ET_DOMAIN);?>">
							</div>
							<div class="fre-input-field">
								<input type="password" name="user_pass" id="user_pass" placeholder="<?php _e('Password', ET_DOMAIN);?>">
							</div>
							<div class="fre-input-field">
								<input type="password" name="repeat_pass" id="repeat_pass" placeholder="<?php _e('Confirm Your Password', ET_DOMAIN);?>">
							</div>
							<?php do_action('after_register_form', $role);?>
							<?php ae_gg_recaptcha( $container = 'fre-input-field' );?>
							<div class="fre-input-field">
								<?php
									$tos = et_get_page_link('tos', array() ,false);
					                $url_tos = '<a href="'.et_get_page_link('tos').'" class="secondary-color" rel="noopener noreferrer" target="_Blank">'.__('Term of Use and Privacy policy', ET_DOMAIN).'</a>';
					                if($tos) {
					                	echo "<p>";
					                	echo '<label><input type ="checkbox" name="term" id="term" /> ';
					                	printf(__('I agree to the  %s', ET_DOMAIN), $url_tos );
					                	echo "</label></p>";
					                }
								?>

							</div>
							<div class="fre-input-field">
								<button class="fre-btn btn-submit primary-bg-color"><?php _e('Sign Up', ET_DOMAIN);?></button>
							</div>
						</form>

						<div class="fre-authen-footer">
							<p><?php _e('Already have an account?', ET_DOMAIN);?> <a href="<?php echo et_get_page_link("login") ?>" class="secondary-color"><?php _e('Log In', ET_DOMAIN);?></a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
	}
	get_footer();

?>
<script type="text/javascript">
	jQuery( document ).ready(function() {
	   	
	   	//$('[data-toggle="tooltip"]').tooltip();
	   	$('.fe-tooltip-1').tooltip(options{
	   		// overflow: "auto",
		  	// boundary: "viewport" // or document.querySelector('#boundary')
		});
		$('.fe-tooltip-2').tooltip(options{
	   		// overflow: "auto",
		  	// boundary: "viewport" // or document.querySelector('#boundary')
		});
		$('.fe-tooltip-3').tooltip(options{
	   		// overflow: "auto",
		  	// boundary: "viewport" // or document.querySelector('#boundary')
		});



	});
	
</script>