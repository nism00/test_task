-- Написать запрос для вывода самой большой зарплаты в каждом департаменте
SELECT
    max(s.salary),
    s.department_id
from salary s
group by s.department_id

-- Написать запрос для вывода списка сотрудников из 3-го департамента у которых ЗП больше 90000
SELECT s.name
from salary s
where s.department_id = 3
  and s.salary > 90000

-- Написать запрос по созданию индексов для ускорения
/* если уникальность поля departmentId будет небольшая, то от индекса не будет смысла особо, только время вставки вырастет */
create index index_for_deparment on salary (department_id);
