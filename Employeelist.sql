CREATE OR REPLACE VIEW Employeelist AS SELECT employee.employee_id, employee.fname,employee.lname, addresses.street1, addresses.street2, addresses.city, addresses.state, addresses.zipcode 
         FROM employee JOIN addresses
   ON employee.employee_id = addresses.employee_id;