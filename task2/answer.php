<?php

use task2\Mapper;
use task2\QueryResultDto;

//.................................................................................................
$queryResult = $mysqli->execute_query('
    SELECT q.id as q_id,
           q.field_1 as q_field_1,
           q.field_n as q_field_n,
           u.gender,
           u.name
    FROM questions q
    LEFT JOIN users u on u.id = q.user_id
    WHERE q.catalog_id = ?
', [$catId]);

if (!$queryResult) {
    // тут мб вывод пустого массива наружу или что-то ещё
    return;
}

$result = [];
while ($row = $queryResult->fetch_assoc()) {
    $result[] = Mapper::arrayToDtoWithFormat(new QueryResultDto(), $row);
}

$queryResult->free();
//.................................................................................................
