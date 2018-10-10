      /* app_bliding_list */ added reason  
		
		ALTER TABLE `hospital`.`appointment_bidding_list`   
  DROP COLUMN `reason`, 
  ADD COLUMN `reason` VARCHAR(250) NULL AFTER `event_status`;
