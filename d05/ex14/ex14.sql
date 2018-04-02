select floor_number AS floor, sum(nb_seats) AS seats from cinema GROUP BY floor_number ORDER BY seats DESC;
