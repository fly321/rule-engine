<?php

namespace Fly\RuleEngine\Exception;

use Throwable;

/**
 * Class RuleException
 * @package Fly\RuleEngine\Exception
 * 规则异常
 */
class RuleException extends \Exception
{
    # 匹配规则异常
    public const RULE_MATCH_EXCEPTION = 1000;

    # 规则引擎异常
    public const RULE_ENGINE_EXCEPTION = 1001;
    public function __construct($message = "", $code = self::RULE_ENGINE_EXCEPTION, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}