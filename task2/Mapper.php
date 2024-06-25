<?php

namespace task2;

use ArrayIterator;

/**
 * Общий маппер
 */
final class Mapper
{
    /**
     * Преобразование ассоциативного массива в дто
     * @param IDto $dto
     * @param array $data
     * @return IDto
     */
    public static function arrayToDtoWithFormat(IDto $dto, array $data): IDto
    {
        foreach ($data as $attributeName => $value) {
            if (!is_string($attributeName)) {
                continue;
            }

            $resultAttributeName = '';
            $testObj = new ArrayIterator(str_split(mb_strtolower($attributeName)));
            $attributeNameLength = $testObj->count();

            while ($testObj->valid()) {
                $char = $testObj->current();
                $testObj->next();

                if ($char == '_' && !in_array($testObj->key(), [0, $attributeNameLength - 1])) {
                    $nextChar = $testObj->current();
                    if (is_string($nextChar)) {
                        $resultAttributeName .= mb_strtoupper($nextChar);
                        $testObj->next();
                    } else {
                        $resultAttributeName .= $char;
                    }
                } else {
                    $resultAttributeName .= $char;
                }
            }

            if (property_exists($dto, $resultAttributeName)) {
                $dto->$resultAttributeName = $value;
            }
        }

        return $dto;
    }
}
