CREATE PROCEDURE GetPerApproval(
    in  p_employee_id int(5),
    in  per_req int(3), 
    out pstatus varchar(11))
BEGIN
    DECLARE per_left int(3);

    SELECT per-per_taken INTO per_left
    FROM timeoff
    WHERE employee_id = p_employee_id;

    IF per_req > per_left THEN
        SET pstatus = 'NOTAPPROVED';
    ELSE 
        SET pstatus = 'APPROVED';
    END IF;
END