<p style="font-size:14px;">Thank you for you choise! <strong>Enjoy Instagram - Responsive gallery</strong> is a plugin lovingly developed for you by <a href="http://www.mediabeta.com" target="_blank"> Mediabeta</a>.</p>

<p style="font-size:14px;">By using this plugin, you are agreeing to the <a href="http://instagram.com/about/legal/terms/api/" target="_blank">Instagram API Terms of Use</a>.</p>


<dl class="enjoy_accordion">
<h3>Follow these 2 simple steps to configure the plugin and CONNECT YOUR FIRST USER.. enjoy it!</h3>
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
         

         
         
         </dl>
         
        
 
  