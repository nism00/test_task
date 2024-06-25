<?php

namespace task2;

/**
 * Дто с результатом для вывода
 */
class QueryResultDto implements IDto
{
    /** @var int */
    public $qId;
    /** @var string */
    public $qFiled1;
    /** @var string */
    public $qFiledN;
    /** @var string */
    public $gender;
    /** @var string */
    public $name;
}
