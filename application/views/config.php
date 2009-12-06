<?php $this->load->view("partial/header"); ?>
<div id="page_title"><?php echo $this->lang->line('module_config'); ?></div>
<?php
echo form_open('config/save/',array('id'=>'config_form'));
?>
<div id="config_wrapper">
<fieldset id="config_info">
<div id="required_fields_message"><?php echo $this->lang->line('common_fields_required_message'); ?></div>
<ul id="error_message_box"></ul>
<legend><?php echo $this->lang->line("config_info"); ?></legend>

<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('config_company').':', 'company',array('class'=>'wide required')); ?>
	<div class='form_field'>
	<?php echo form_input(array(
		'name'=>'company',
		'id'=>'company',
		'value'=>$this->config->item('company')));?>
	</div>
</div>

<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('config_address').':', 'address',array('class'=>'wide required')); ?>
	<div class='form_field'>
	<?php echo form_textarea(array(
		'name'=>'address',
		'id'=>'address',
		'rows'=>4,
		'cols'=>17,
		'value'=>$this->config->item('address')));?>
	</div>
</div>

<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('config_phone').':', 'phone',array('class'=>'wide required')); ?>
	<div class='form_field'>
	<?php echo form_input(array(
		'name'=>'phone',
		'id'=>'phone',
		'value'=>$this->config->item('phone')));?>
	</div>
</div>

<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('config_default_tax_rate').':', 'default_tax_rate',array('class'=>'wide required')); ?>
	<div class='form_field'>
	<?php echo form_input(array(
		'name'=>'default_tax_rate',
		'id'=>'default_tax_rate',
		'size'=>'4',
		'value'=>$this->config->item('default_tax_rate')));?>
	</div>
</div>

<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('config_currency_locale').':', 'currency_locale',array('class'=>'wide required')); ?>
	<div class='form_field'>
	<?php echo form_input(array(
		'name'=>'currency_locale',
		'id'=>'currency_locale',
		'size'=>'4',
		'value'=>$this->config->item('currency_locale')));?>
	</div>
</div>


<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('common_email').':', 'email',array('class'=>'wide')); ?>
	<div class='form_field'>
	<?php echo form_input(array(
		'name'=>'email',
		'id'=>'email',
		'value'=>$this->config->item('email')));?>
	</div>
</div>


<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('config_fax').':', 'fax',array('class'=>'wide')); ?>
	<div class='form_field'>
	<?php echo form_input(array(
		'name'=>'fax',
		'id'=>'fax',
		'value'=>$this->config->item('fax')));?>
	</div>
</div>

<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('config_website').':', 'website',array('class'=>'wide')); ?>
	<div class='form_field'>
	<?php echo form_input(array(
		'name'=>'website',
		'id'=>'website',
		'value'=>$this->config->item('website')));?>
	</div>
</div>

<div class="field_row clearfix">	
<?php echo form_label($this->lang->line('common_return_policy').':', 'return_policy',array('class'=>'wide required')); ?>
	<div class='form_field'>
	<?php echo form_textarea(array(
		'name'=>'return_policy',
		'id'=>'return_policy',
		'rows'=>'4',
		'cols'=>'17',
		'value'=>$this->config->item('return_policy')));?>
	</div>
</div>


<?php 
echo form_submit(array(
	'name'=>'submit',
	'id'=>'submit',
	'value'=>$this->lang->line('common_submit'),
	'class'=>'submit_button float_right')
);
?>
</fieldset>
</div>
<?php
echo form_close();
?>
<div id="feedback_bar"></div>
<script type='text/javascript'>

//validation and submit handling
$(document).ready(function()
{
	$('#config_form').validate({
		submitHandler:function(form)
		{
			$(form).ajaxSubmit({
			success:function(response)
			{
				if(response.success)
				{
					set_feedback(response.message,'success_message',false);		
				}
				else
				{
					set_feedback(response.message,'error_message',true);		
				}
			},
			dataType:'json'
		});

		},
		errorLabelContainer: "#error_message_box",
 		wrapper: "li",
		rules: 
		{
			company: "required",
			address: "required",
    		phone: "required",
    		default_tax_rate:
    		{
    			required:true,
    			number:true
    		},
				currency_symbol: "required",
    		email:"email",
    		website:"url",
    		return_policy: "required"    		
   		},
		messages: 
		{
     		company: "<?php echo $this->lang->line('config_company_required'); ?>",
     		address: "<?php echo $this->lang->line('config_address_required'); ?>",
     		phone: "<?php echo $this->lang->line('config_phone_required'); ?>",
     		default_tax_rate:
    		{
    			required:"<?php echo $this->lang->line('config_default_tax_rate_required'); ?>",
    			number:"<?php echo $this->lang->line('config_default_tax_rate_number'); ?>"
    		},
				currency_symbol: "<?php echo $this->lang->line('config_currency_symbol_required'); ?>",
     		email: "<?php echo $this->lang->line('common_email_invalid_format'); ?>",
     		website:"<?php echo $this->lang->line('config_company_website_url'); ?>",
     		return_policy:"<?php echo $this->lang->line('config_return_policy_required'); ?>"
	
		}
	});
});
</script>
<?php $this->load->view("partial/footer"); ?>
