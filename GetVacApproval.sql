CREATE PROCEDURE GetVacApproval(
    in  p_employee_id int(5),
    in  vac_needed int(3), 
    out vstatus varchar(11))
BEGIN
    DECLARE vac_left int(3);

    SELECT vac-vac_taken INTO vac_left
    FROM timeoff
    WHERE employee_id = p_employee_id;

    IF vac_needed > vac_left THEN
        SET vstatus = 'NOTAPPROVED';
    ELSE  
        SET vstatus = 'APPROVED';
    END IF;

END
