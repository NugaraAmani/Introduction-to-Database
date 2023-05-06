DELIMITER $$

CREATE PROCEDURE GetVacApproval(
    in  vac_needed int(3), 
    in  p_employee_id int(5),
    out vstatus varchar(11))
BEGIN
    DECLARE vac_left int(3);

    SELECT vac- vac_taken INTO vac_left
    FROM timeoff
    WHERE employee_id = p_employee_id;

    IF vac_needed > vac_left THEN
        SET vstatue = 'NOTAPPROVED';
    ELSEIF  
        SET vstatus = 'APPROVED';
    END IF;

END$$

CREATE PROCEDURE GetSickApproval(
    in  sick_needed int(3), 
    in  p_employeeid int(5),
    out sstatus varchar(11))
BEGIN
    DECLARE sick_left int(3);

    SELECT sick-sick_taken INTO sick_left
    FROM timeoff
    WHERE employee_id = p_employee_id;

    IF vac_needed > sick_left THEN
        SET sstatue = 'NOTAPPROVED';
    ELSEIF  
        SET sstatus = 'APPROVED';
    END IF;

END$$