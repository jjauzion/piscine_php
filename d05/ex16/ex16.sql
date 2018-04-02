SELECT count(*) AS 'movies'FROM member_history WHERE 
	(date >= STR_TO_DATE('30/10/2006', '%d/%m/%Y') AND
	date <= STR_TO_DATE('27/07/2007', '%d/%m/%Y'))
	OR DATE_FORMAT(date, '%d-%m') = "24-12";
