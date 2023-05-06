FUNCTION Updateperdays($employee_id int, $req_days int) RETURNS int(11)
BEGIN
	 DECLARE newper_taken int;
     SELECT per_taken INTO newper_taken FROM timeoff WHERE empolyee_id = $employee_id;
     SET newper_taken = newper_taken + $req_days;
     
     UPDATE timeoff SET per_taken = $newper_taken, req_days=$req_days, req_type="sick"  WHERE employee_id = $employee_id;
    
     RETURN 1;

END
