<div class="grid grid-pad">
	<div class="col-1-1 mobile-col-1-1">
		<h2>Linked Instagram Profiles</h2>
 		<hr />
	</div>
</div>
<div class="grid grid-pad">
            
            <div class="col-2-12 mobile-col-1-1">
				<div class="enin-content-title" style="text-align:center;">
                	 
                      <img src="<?php echo plugins_url('images/users.png',__FILE__); ?>">  
                      <!--div id="id_add_new_user"-->
          <input type="button" id="button_add_new_user" value="Add New User" class="button-primary ei_top"  />

            <!--/div-->               
                  </div>
                 
             </div>
             <div class="col-10-12 mobile-col-1-1" style="border-left:1px dashed #C9C9C9; padding:0.5em; padding-top:0; margin-top:0;">
              
                  <?php $utenti = get_option('enjoy_instagram_options');
         if(is_array($utenti) && count(($utenti))>0){         
              foreach($utenti as $singolo_utente){
                  if($singolo_utente['username']){ 
                ?>
    <table class="form-table">
        <tbody>
            <tr>
                <th scope="row" style="align:left;">
   <div id="enjoy_user_profile">
                    	 <img class="enjoy_user_profile" src="<?php echo $singolo_utente['profile_picture']; ?>"> 
                           <input type="button" id="button_logout_<?php echo $singolo_utente['id']; ?>" value="Unlink User" class="button-primary ei_top button_logout" />
                         </div>
    </th>
    <td>
            
        
            <div id="enjoy_user_block" >
                
            <h3><?php echo $singolo_utente['username']; ?></h3>
            <p><i><?php echo $singolo_utente['bio']; ?></i></p>
            <hr/>
            Customize the plugin with our <a href="<?php echo get_admin_url(); ?>options-general.php?page=enjoyinstagram_plugin_options&tab=enjoyinstagram_advanced_settings">settings</a> tab.
            
            <hr />   
            </div>
            </p> 
    </td>
    </tr>
    </tbody>
</table>
        
                <?php } } 
        }
        ?>
        <table class="form-table">
            <tbody>
                <tr>
         <td>
            <dl class="enjoy_accordion" id="enjoy_accordion_new_user" style="display:none;">
<dt><a href=""><span class="step_number">01</span> Create an Instagram Application </a></dt>
<dd><ol>
        <li>Once you're logged in with your Instagram account go to  <a href="http://instagram.com/developer/" target="_blank" rel="nofollow">http://instagram.com/developer/</a></li>
        <li>Enter the data related to your site and the information required by Instagram. Accept API Terms of Use and Brand Guidelines</li>
        <li>Click "Register Your Application" button.</li>
        <li>Click "Register a New Client".</li>
        <li>
          Once you've verified your account fill the form with:
          
          <ul>
            <li><br /><strong>Application Name</strong>: Your App Name (Your WebSite for example)</li>
            <li><strong>Description</strong>: Your App Description</li>
            <li><span><strong>Website URL</strong> (copy it exactly as shown below) :</span>
<br /><font style="font-size:12px; color:#0074A2; font-weight:bold;"><?php echo get_home_url(); ?></font></li>

            <li><strong>OAuth redirect_uri</strong> (copy it exactly as shown below) : <br /><font style="font-size:12px; color:#0074A2; font-weight:bold;"><?php echo admin_url('options-general.php?page=enjoyinstagram_plugin_options&tab=enjoyinstagram_general_settings'); ?></font><br /></li>
          </ul>
        </li>
        <li><b>Click the "Register" button. Copy Client ID and Client Secret values for the next step.</b></li>
      </ol></dd>




<dt><a href=""> <span class="step_number">02</span> Enter Your Client ID and Client Secret</a></dt>
<dd>  	 




<form method="post" action="options.php">
<?php settings_fields('enjoyinstagram_options_group_auth'); ?>



<div style="margin-top: 20px;
padding: 20px;
border: 1px solid #DDDDDD;"
>
Insert your <u>Client ID</u> and your <u>Client Secret</u>
<p>

  <label class="enjoy_label" for="enjoyinstagram_client_id"><strong>Client ID:</strong></label>
                   <input type="text" id="enjoyinstagram_client_id" value="<?php echo get_option('enjoyinstagram_client_id'); ?>" name="enjoyinstagram_client_id" />
                            <span class="description">
                            Your Client ID  </span></p>
                  <p>     
                       <label class="enjoy_label" for="enjoyinstagram_client_secret"><strong>Client Secret:</strong></label>
                   <input type="text" id="enjoyinstagram_client_secret" value="<?php echo get_option('enjoyinstagram_client_secret'); ?>" name="enjoyinstagram_client_secret" />
                            <span class="description">
                            Your Client Secret  </span>
                     </p>
                     </div>
                                <p>
                                By clicking this button this plugin will be activated!</p><p>
                                    <input type="button" class="button-primary" id="button_autorizza_instagram" name="button_autorizza_instagram" value="Authorize Application" />
                                </p>
                          
        </form>
        
        
        
         </dd>
         <dt id="dt_cance_add_new_user">          <input type="button" id="button_cancel_add_new_user" value="Cancel" class="button-primary ei_top" />
</dt>

         

         
         
         </dl>
        </td>
                </tr>
        </tbody>
         </table>
           </div>     
          
  
    
         
           
              	</div>

 
	
    
 