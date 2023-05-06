CREATE DEFINER=`root`@`localhost` FUNCTION `Updatesickdays`($employee_id int, $req_days int) RETURNS int(11)
BEGIN
	 DECLARE newsick_taken int(3);
     SELECT sick_taken INTO newsick_taken FROM timeoff WHERE empolyee_id = $employee_id;
     SET newsick_taken = newsick_taken + $req_days;
     
     UPDATE timeoff SET sick_taken = $newsick_taken, req_days=$req_days, req_type="sick"  WHERE employee_id = $employee_id;
    
     RETURN newsick_taken
END