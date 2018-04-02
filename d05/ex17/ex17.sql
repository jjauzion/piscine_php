select count(*) AS 'nb_susc', floor(avg(price)) AS 'av_susc', MOD(sum(duration_sub), 42) AS 'ft' from subscription;
