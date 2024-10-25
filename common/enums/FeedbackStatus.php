<?php

namespace common\enums;

/**
 * Class FeedbackStatus
 *
 * @package common\enums
 * @author m.kropukhinsky <m.kropukhinsky@peppers-studio.ru>
 */
enum FeedbackStatus: int implements DictionaryInterface
{
    use DictionaryTrait;

    case MODERATION_NEW = 0;
    case MODERATION_ACCEPTED  = 10;
    case MODERATION_REJECTED   = 20;

    /**
     * {@inheritdoc}s
     */
    public function description(): string
    {
        return match ($this) {
            self::MODERATION_NEW => 'Новый',
            self::MODERATION_ACCEPTED  => 'Принятый',
            self::MODERATION_REJECTED  => 'Отклоненный',
        };
    }

    /**
     * {@inheritdoc}
     */
    public function color(): string
    {
        return match ($this) {
            self::MODERATION_NEW => 'var(--bs-body-color)',
            self::MODERATION_ACCEPTED => 'var(--bs-success)',
            self::MODERATION_REJECTED => 'var(--bs-danger)'
        };
    }
}
