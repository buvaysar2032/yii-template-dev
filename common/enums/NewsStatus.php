<?php

namespace common\enums;

/**
 * Class NewsStatus
 *
 * @package common\enums
 * @author m.kropukhinsky <m.kropukhinsky@peppers-studio.ru>
 */
enum NewsStatus: int implements DictionaryInterface
{
    use DictionaryTrait;

    case PUBLISHED_YES = 1;
    case PUBLISHED_NO = 0;

    /**
     * {@inheritdoc}
     */
    public function description(): string
    {
        return match ($this) {
            self::PUBLISHED_YES => 'Опубликовано',
            self::PUBLISHED_NO  => 'Скрыто',
        };
    }

    /**
     * {@inheritdoc}
     */
    public function color(): string
    {
        return match ($this) {
            self::PUBLISHED_YES => 'var(--bs-success)',
            self::PUBLISHED_NO => 'var(--bs-danger)'
        };
    }
}
