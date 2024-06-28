<?php

namespace Fly\RuleEngine\Engine;

use Fly\RuleEngine\Exception\RuleException;
use Fly\RuleEngine\Interfaces\RuleContextInterface;
use Fly\RuleEngine\Interfaces\RuleInterface;

class RuleEngine
{
    /**
     * @var RuleInterface[] $_rules 规则
     */
    private $_rules;

    /**
     * RuleEngine constructor.
     * @param RuleInterface[] $rules
     */

    public function __construct(array $rules)
    {
        $this->_rules = $rules;
    }


    /**
     * 执行规则 - 通用
     * @param RuleContextInterface $context
     * @return void
     */
    public function run(RuleContextInterface $context): void
    {
        foreach ($this->_rules as $rule) {
            if ($rule->matches($context)) {
                $rule->execute($context);
            } else {
                $rule->notMatches($context);
            }
        }
    }


    /**
     * 执行规则 - 全部
     * @param RuleContextInterface $context
     * @return void
     * @throws RuleException
     */
    public function runAll(RuleContextInterface $context): void
    {
        foreach ($this->_rules as $rule) {
            if ($rule->matches($context)) {
                $rule->execute($context);
            } else {
                $rule->notMatches($context);
                // 如果一条都不满足，则抛出异常
                throw new RuleException(
                    get_class($rule).': Rule not match',
                    RuleException::RULE_MATCH_EXCEPTION
                );
            }
        }
    }

    /**
     * 执行规则 - 一条满足即可
     * @param RuleContextInterface $context
     * @return void
     */
    public function runOne(RuleContextInterface $context): void
    {
        foreach ($this->_rules as $rule) {
            if ($rule->matches($context)) {
                $rule->execute($context);
                break;
            }
            $rule->notMatches($context);
        }
    }

}