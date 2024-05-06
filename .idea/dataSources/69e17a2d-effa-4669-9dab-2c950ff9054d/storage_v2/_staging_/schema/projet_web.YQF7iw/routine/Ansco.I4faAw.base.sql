create
    definer = root@localhost procedure Ansco()
select concat((
  CASE 
    WHEN MONTH(CURRENT_DATE()) >= 9 THEN YEAR(CURRENT_DATE())
    ELSE (YEAR(CURRENT_DATE())-1)
  END), '-', (
       CASE
       WHEN MONTH(CURRENT_DATE()) >= 9 THEN (YEAR(CURRENT_DATE())+1)
       ELSE YEAR(CURRENT_DATE())
       END))
       as annee_scolaire;

