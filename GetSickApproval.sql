CREATE PROCEDURE GetSickApproval(
    in  p_employee_id int(5),
    in  sick_needed int(3), 
    out sstatus varchar(15),
    out newdays int(3))
BEGIN
    DECLARE sick_left int(3);
        
    SELECT sick_taken, sick-sick_taken INTO sick_left, sick_taken INTO newdays
    FROM timeoff  WHERE employee_id = p_employee_id;

    IF (sick_needed > sick_left) THEN
    {
        SET sstatus = 'NOTAPPROVED';
        SET newdays = newdays;
	}
    ELSE {
        SET sstatus = 'SICK APPROVED';
        SET newdays = sick_taken + sick_needed;
        UPDATE timeoff set sick_taken =  newdays WHERE employee_id = p_employee_id;
	}
    ENDIF
END 