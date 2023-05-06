CREATE OR REPLACE VIEW timeleft AS SELECT timeoff.employee_id, employee.fname as first_name, employee.lname as last_name,
	(timeoff.sick - timeoff.sick_taken) as Sickleft, (timeoff.vac - timeoff.vac_taken) as Vacleft, 
    (timeoff.per - timeoff.per_taken ) as Perleft
FROM timeoff JOIN employee WHERE timeoff.employee_id = employee.employee_id;