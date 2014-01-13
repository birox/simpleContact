<div class="clearfix">
    <div class="col-md-1"></div>
    <div class="col-md-10">
    	<h1><?php echo _t('Contact us'); ?></h1>
        <form class="clearfix" id="submit-contact">
        	<div class="alert alert-contact">
            	<div class="msg"></div>
                <input type="hidden" id="fields-missing" value="<?php echo _t('ERROR There are required fields empty'); ?>" />
            </div>
        	<?php
				$fields = unserialize (CONTACT_FIELDS);
				
				foreach ($fields as $field) {
					
					$required = '';
					if($field['required'] == true)
						$required = 'required';
					
					switch ($field['type']) {
						case 'text':
							
							$output = sprintf(
								'<input type="text" class="form-control %3$s" id="%1$s" name="%1$s" placeholder="%2$s">',
								$field['name'],
								$field['label'],
								$required
							);
							
							break;
						case 'select':
						
							foreach($field['options'] as $key => $option) {
								
								$options .= sprintf(
									'<option value="%1$s">%2$s</option>',
									$key,
									$option
								);
								
							}
						
							$output = sprintf(
								'<select type="text" class="form-control %3$s" id="%1$s" name="%1$s" placeholder="%2$s">
									%4$s
								</select>',
								$field['name'],
								$field['label'],
								$required,
								$options
							);
						
							break;
						case 'textarea':
						
							$output = sprintf(
								'<textarea class="form-control %3$s" id="%1$s" name="%1$s" placeholder="%2$s"></textarea>',
								$field['name'],
								$field['label'],
								$required
							);
						
							break;
						case 'checkbox':
						
							$output = sprintf(
								'<div class="checkbox">
								  <label>
									<input type="checkbox" id="%1$s" name="%1$s" value="%3$s">
									%2$s
								  </label>
								</div>',
								$field['name'],
								$field['label'],
								$field['value']
							);
						
							break;
						case 'radio':
						
							foreach($field['options'] as $key => $option) {
								
								$options .= sprintf(
									'<div class="radio">
									  <label>
										<input type="radio" name="%3$s" id="%3$s" value="%1$s" checked>
										%2$s
									  </label>
									</div>',
									$key,
									$option,
									$field['name']
								);
								
								$output = $options;
								
							}
						
							break;
							
					}
					
					printf(
						'<div class="col-md-6">
							<div class="form-group">
								<label for="%1$s">%2$s</label>
								%3$s
							</div>
						</div>',
					$field['name'],
					$field['label'],
					$output
					);
					
				}
				
			?>
        </form>
        <div class="form-button">
        	<a href="javascript:void(0)" class="btn btn-lg btn-primary" id="submit-contact-form"><?php echo _t('Submit'); ?></a>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>