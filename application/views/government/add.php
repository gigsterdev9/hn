<?php
//define viewing restrictions by user group
//$restricted_groups = array('partner'); 
?>

<div class="container">
<h2><i class="fas fa-address-book"></i>&nbsp; <?php echo $title; ?></h2>
<p><a href="javascript:history.go(-1)" ><span class="glyphicon glyphicon-remove-sign"></span> Cancel</a></p>
<div class="panel panel-default">
	<div class="panel-body">
		<p class="small"><span class="text-info">*</span> Indicates a required field</p>
		<?php 
		echo '<div class="text-warning">';
		echo validation_errors();
		echo '</div>'; 

		if (isset($alert_success)) { 
		?>
			<div class="alert alert-success">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Entry added. 
                <?php //if (!$this->ion_auth->in_group($restricted_groups)) { ?>
                    <a href="<?php echo base_url('government') ?>">Return to Index.</a>
                <?php //} ?>
			</div>
		<?php
		}
	
			//begin form
			$attributes = array('class' => 'form-horizontal', 'role' => 'form');
			echo form_open('government/add', $attributes); 
		?>
				<div class="form-group">
					<label class="control-label col-sm-2" for="entity_name">Official Name<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="entity_name" value="<?php echo ($this->input->get('entity_name') !== null) ? $this->input->get('entity_name') : set_value('entity_name'); ?>" required />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="entity_alias">Abbreviation/Alias</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="entity_alias" value="<?php echo ($this->input->get('entity_alias') !== null) ? $this->input->get('entity_alias') : set_value('entity_alias'); ?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="entity_type">Type<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<select class="form-control select2-single" name="entity_type">
							<option value="">Select</option>
                            <option value="0" <?php if (set_value('entity_type') == '0') echo 'selected' ?> >Agency</option>
							<option value="1" <?php if (set_value('entity_type') == '1') echo 'selected' ?> >Business</option>
                            <option value="2" <?php if (set_value('entity_type') == '1') echo 'selected' ?> >Individual</option>
						</select>
					</div>
				</div>
                <!--
                <div class="form-group">
					<label class="control-label col-sm-2" for="entity_slug">Slug</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="entity_slug" readonly value="<?php echo ($this->input->get('entity_slug') !== null) ? $this->input->get('entity_slug') : set_value('entity_slug'); ?>" />
					</div>
				</div>
                -->
                <div class="form-group">
					<label class="control-label col-sm-2" for="entity_desc">Description</label>
					<div class="col-sm-10">
						<textarea name="entity_desc" class="form-control" rows="5"><?php echo set_value('entity_desc'); ?></textarea>
					</div>
				</div>
                <div class="form-group">
					<label class="control-label col-sm-2" for="entity_logo_filename">Logo</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="entity_logo_filename" value="<?php echo ($this->input->get('entity_logo_filename') !== null) ? $this->input->get('entity_logo_filename') : set_value('entity_logo_filename'); ?>"  />
					</div>
				</div>
                <div class="form-group">
					<label class="control-label col-sm-2" for="entity_parent">Parent Agency</label>
					<div class="col-sm-10">
						<select class="form-control select2-single" name="entity_parent">
							<option value="">Select</option>
							<option value="S" <?php if (set_value('entity_parent') == '0') echo 'selected' ?> >Not applicable</option>
							<option value="M" <?php if (set_value('entity_parent') == '1') echo 'selected' ?> >--</option>
						</select>
					</div>
				</div>
                <div class="form-group">
					<label class="control-label col-sm-2" for="entity_user">Designated User</label>
					<div class="col-sm-10">
						<select class="form-control select2-single" name="entity_user">
							<option value="">Select</option>
							<option value="S" <?php if (set_value('entity_user') == '0') echo 'selected' ?> >None</option>
							<option value="M" <?php if (set_value('entity_user') == '1') echo 'selected' ?> >--</option>
						</select>
					</div>
				</div>
                <div class="form-group">
                    <div class="col-sm-12"><hr /></div>
                </div>
                <div class="form-group">
					<label class="control-label col-sm-2" for="entity_exec">Executive Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="entity_exec" value="<?php echo ($this->input->get('entity_exec') !== null) ? $this->input->get('entity_exec') : set_value('entity_exec'); ?>" />
					</div>
				</div>
                <div class="form-group">
					<label class="control-label col-sm-2" for="entity_hq">Address</label>
					<div class="col-sm-10">	
						<input type="text" class="form-control" name="entity_hq" value="<?php echo set_value('entity_hq'); ?>" />
					</div>
				</div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="entity_website">Web Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="entity_website" value="<?php echo set_value('entity_website'); ?>" />
                    </div>
				</div>
                <div class="form-group">
                    <div class="col-sm-12"><hr /></div>
                </div>
                <div class="form-group">
					<label class="control-label col-sm-2" for="entity_remarks">Remarks</label>
					<div class="col-sm-10">
						<textarea name="entity_remarks" class="form-control" rows="5"><?php echo set_value('entity_remarks'); ?></textarea>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">Submit</button>
					</div>
				</div>
			</form>
	</div>
</div>
</div>