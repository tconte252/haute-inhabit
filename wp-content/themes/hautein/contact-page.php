<?php
/*
 * 
 * Template Name: Contact Page
 * 
 */

get_header();?>

<div class="container subpage_intro" id="text_intro">
		  <h1 class="text_contact">Contact Us: We’re here to listen to you</h1>
		</div><!-- text_intro -->
		<div class="container" id="content">
			<h1>&nbsp;</h1>
		 <?php get_sidebar();?>
			<div class="right_column">
				<h2>Contacting <strong>Serveroid</strong></h2>
				<div class="gradient_box contact_department">
					<ul>
						<li>
							<h2>Sales Department</h2>
							<p><strong>Monday - Friday</strong><br />
							  24/7 Sales<br /><strong>Saturday - Sunday</strong><br />
							  24/7 Sales</p>
						</li>
						<li>
							<h2>Peak Support Time</h2>
							<p><strong>Monday - Friday</strong><br />
						  Available on instant response 6PM-11PM<br /><strong>Saturday - Sunday</strong><br />
						  Available on instant response 2PM-11PM</p>
						</li>
					</ul>
				</div>
				<div class="gradient_box one_line_text">
					<p>Do you require technical support? Please <strong><a href="#">Open a Support Ticket</a></strong> and we can help you.</p>
				</div>
				<h2>Methods of Contact</h2>
				<div class="contact_method">
					<div class="col">
						<img src="<?php bloginfo('template_url');?>/images/icon_mobile.png" alt="" class="left icon_mobile" />
						<p><strong>Get Us To Call You, Text Call followed by your name to</strong><br />
					  <big>089 49 45 185</big></p>
						<p>&nbsp;</p>
						<img src="<?php bloginfo('template_url');?>/images/icon_snailmail.png" alt="" class="left icon_snailmail" />
						<p><strong>Postal Mail</strong><br />
						Serveroid,<br />
						Dunkellin Lodge,<br />
						Creggaun,<br />
						Co. Galway<br />
						Ireland</p>
					</div>
					<div class="col">
						<img src="<?php bloginfo('template_url');?>/images/icon_email.png" alt="" class="left icon_email" />
						<p>
							<strong>Sales Inquires and Questions</strong><br />
						<a href="#">sales@Serveroid.com</a></p>
						<p>
							<strong>Customer Support</strong><br />
							<a href="#">support@Serveroid.com</a>
						</p>
						<p>
							<strong>Payment Support</strong><br />
							<a href="#">payment@Serveroid.com</a>
						</p>
					</div>
				</div>
				<div class="clear"></div>
			</div><!-- right_column -->
			<div class="clear"></div>
			<div class="clear"></div>
		</div>


<?php get_footer();?>