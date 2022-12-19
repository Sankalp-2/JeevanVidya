    <div class="mo-transaction-report-container mo_report_layout">
			<form class="w-full flex flex-col items-center" method="post">
				<input type="hidden" name="action" value="mo_generate_report">
				<div class="w-[75%] bg-white mt-mo-6 rounded-md">	
					<div class="mo-section-header rounded-tr-md rounded-tl-md">
	    	   			<p class="grow"><strong>Detailed Transaction Report</strong></p>
						<button id="mo_transaction_report" class="mo-button primary inverted" <?=mo_esc_string($disabled,"attr")?>>Generate Report</button>
	    			</div>
					<?php if(mo_esc_string($showNotice,"attr")){ ?>
					<div class="p-mo-6 flex items-center bg-amber-50 gap-mo-4 border-b">
						<svg width="32" height="32" viewBox="0 0 24 24" fill="none">
						<g id="ed4dbae0a5a140e962355cd15d67b61d">
							<path id="2b98dc7ba76d93c3d47096d209bece84" d="M18.5408 3.72267L17.9772 4.21745L17.9772 4.21745L18.5408 3.72267ZM21.4629 7.05149L22.0266 6.55672L22.0266 6.55672L21.4629 7.05149ZM21.559 9.79476L22.1563 10.2484L22.1563 10.2484L21.559 9.79476ZM13.6854 20.1597L13.0882 19.706L13.0882 19.706L13.6854 20.1597ZM10.3146 20.1597L10.9119 19.706L10.9119 19.706L10.3146 20.1597ZM2.44095 9.79476L1.84373 10.2484L1.84373 10.2484L2.44095 9.79476ZM2.53709 7.05149L3.10074 7.54627L3.10074 7.54627L2.53709 7.05149ZM5.45918 3.72267L4.89554 3.2279L4.89554 3.2279L5.45918 3.72267ZM21.5684 9.13285C21.9827 9.13285 22.3184 8.79707 22.3184 8.38285C22.3184 7.96864 21.9827 7.63285 21.5684 7.63285V9.13285ZM12 20.7634L11.2907 21.0071C11.3947 21.31 11.6797 21.5134 12 21.5134C12.3203 21.5134 12.6053 21.31 12.7093 21.0071L12 20.7634ZM2.43156 7.63285C2.01735 7.63285 1.68156 7.96864 1.68156 8.38285C1.68156 8.79707 2.01735 9.13285 2.43156 9.13285V7.63285ZM17.9772 4.21745L20.8993 7.54627L22.0266 6.55672L19.1045 3.2279L17.9772 4.21745ZM20.9618 9.34108L13.0882 19.706L14.2826 20.6133L22.1563 10.2484L20.9618 9.34108ZM10.9119 19.706L3.03818 9.34108L1.84373 10.2484L9.71741 20.6133L10.9119 19.706ZM3.10074 7.54627L6.02283 4.21745L4.89554 3.2279L1.97345 6.55672L3.10074 7.54627ZM14.1263 3.75H16.9516V2.25H14.1263V3.75ZM16.2526 9.13285H21.5684V7.63285H16.2526V9.13285ZM13.4288 3.27554L15.5551 8.6584L16.9502 8.10731L14.8239 2.72446L13.4288 3.27554ZM12.7093 21.0071L16.962 8.6265L15.5433 8.13921L11.2907 20.5198L12.7093 21.0071ZM7.04842 3.75H10.1099V2.25H7.04842V3.75ZM10.1099 3.75H14.1263V2.25H10.1099V3.75ZM2.43156 9.13285H7.74736V7.63285H2.43156V9.13285ZM7.74736 9.13285H16.2526V7.63285H7.74736V9.13285ZM9.42318 2.69857L7.0606 8.08143L8.43412 8.68428L10.7967 3.30143L9.42318 2.69857ZM12.7093 20.5198L8.45668 8.13921L7.03804 8.6265L11.2907 21.0071L12.7093 20.5198ZM3.03818 9.34108C2.63124 8.80539 2.65814 8.05047 3.10074 7.54627L1.97345 6.55672C1.05978 7.59756 1.00597 9.14561 1.84373 10.2484L3.03818 9.34108ZM13.0882 19.706C12.5371 20.4313 11.4629 20.4313 10.9119 19.706L9.71741 20.6133C10.8687 22.1289 13.1313 22.1289 14.2826 20.6133L13.0882 19.706ZM20.8993 7.54627C21.3419 8.05047 21.3688 8.80539 20.9618 9.34108L22.1563 10.2484C22.994 9.14561 22.9402 7.59756 22.0266 6.55672L20.8993 7.54627ZM19.1045 3.2279C18.5597 2.60732 17.7765 2.25 16.9516 2.25V3.75C17.3413 3.75 17.7149 3.91868 17.9772 4.21745L19.1045 3.2279ZM6.02283 4.21745C6.28509 3.91868 6.65866 3.75 7.04842 3.75V2.25C6.22346 2.25 5.44029 2.60732 4.89554 3.2279L6.02283 4.21745Z" fill="rgb(217 119 6)"></path>
						</g>
						</svg>
						<div class="grow">
							<p class="font-bold text-amber-600 m-mo-0">Premium Feature</p>
							<p class="text-amber-600 m-mo-0">Please reach out to us for enabling OTP Audit Reporting on your wordpress site.</p>
							
						</div>
						<a id="mo_transaction_report_contact" class="mo-button primary inverted" style="cursor:pointer;float:right;" onClick="otpSupportOnClick('Hi! I am interested in using Transaction Report Feature for my website, can you please help me with more information?');">Contact Us</a>
					</div>
					<hr class='m-mo-0'>
					<?php } ?>
				  	<div class="mo-report-model">
				 		<div class="mo-reporting-cotainer">
							<div class="mo-input-wrapper">
							   <label class="mo-input-label">Phone/Email</label>
							   <input class="w-full mo-input" placeholder="+1xxxxxxx or user@gmail.com" type="text" name="mo_user_key" <?=mo_esc_string($disabled,"attr")?>>
							</div>
							<div class="mo-input-wrapper">
							   <label class="mo-input-label">From</label>
							   <input class="w-full mo-input" type="datetime-local" name="mo_from_date" value="<?= mo_esc_string($fromDate,"attr")?>" <?=mo_esc_string($disabled,"attr")?>>
							</div>
						</div>
					
						<div class="mo-reporting-cotainer">
							<div class="flex items-center mo-select-container px-mo-4 h-[56px] pr-mo-1">
								<div class="grow">
									<h6 class="m-mo-0">Authetication Type</h6>
								</div>
							   	<select name="mo_request_type" class="!bg-slate-100 focus:!shadow-none !pl-mo-4 !pr-mo-8 !py-mo-2 !border-1 !border-slate-300 !rounded-md focus:!border-1 focus:!border-indigo-500" <?=mo_esc_string($disabled,"attr")?>>
							    	<option value="req_all">All Transactions</option>
							    	<option value="phone">SMS</option>
							    	<option value="email">Email</option>
							    	<option value="notification">Notification</option>
							  	</select>
					       </div>
							<div class="mo-input-wrapper">
							   <label class="mo-input-label">To</label>
							   <input class="w-full mo-input" type="datetime-local" name="mo_to_date" value="<?= mo_esc_string($currentDate,"attr")?>" <?=mo_esc_string($disabled,"attr")?>>
							</div>
						</div>
			      	</div>
				</div>
			</form>

		<?php
		 $html = [];
		 $entries = apply_filters('mo_report_table', $html);
		 $entries=!is_null($entries)?$entries:[];
		 $hidden = empty($entries)?'hidden':'';
		?>
        <div class="mo_transaction_report flex justify-center" <?=mo_esc_string($hidden,"attr")?>>
            <div class="w-[75%] bg-white mt-mo-6 rounded-md items-center">
				<table id="mo_report_table" class="mo-table mo-reporting-table">
					  <tr>
	                     <th>Email/Phone</th>
					     <th>Authentication Type</th>
	                     <th>Message</th>
	                     <th>Status</th>
	                     <th>Time</th>
					  </tr>
					  <?php
			 		  foreach ($entries as $value) {
			 		        ?>
			 		  <tr>
			 		    <td><?=isset($value['phone'])? mo_esc_string($value['phone'],"attr"):""?></td>
			 		    <td><?=isset($value['otp_type'])? mo_esc_string($value['otp_type'],"attr"):""?></td>
			 		    <td><?=isset($value['message'])? mo_esc_string($value['message'],"attr"):""?></td>
			 		    <td><?=isset($value['status'])? mo_esc_string($value['status'],"attr"):""?></td>
			 		    <td><?=isset($value['time'])? mo_esc_string($value['time'],"attr"):""?></td>
			 		  </tr>
			 		<?php } ?>
	            </table>
            </div>
		</div>      
		</div>