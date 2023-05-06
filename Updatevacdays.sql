CREATE FUNCTION Updatevacdays($employee_id int, $req_days int) RETURNS int(11)
BEGIN
	 DECLARE newvac_taken int;
     SELECT vac_taken INTO newvac_taken FROM timeoff WHERE empolyee_id = $employee_id;
     SET newvac_taken = newvac_taken + $req_days;
     
     UPDATE timeoff SET vac_taken = $newvac_taken, req_days=$req_days, req_type="sick"  WHERE employee_id = $employee_id;
    
     RETURN newvac_taken;
END