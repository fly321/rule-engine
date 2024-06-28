<?php

namespace Fly\RuleEngine\Interfaces;

/**
 * Interfaces RuleInterface
 */
interface RuleInterface
{
    /**
     * 规则是否通过
     * @param RuleContextInterface $context
     * @return bool
     */
    public function matches(RuleContextInterface $context): bool;

    /**
     * 通过之后执行
     * @param RuleContextInterface $context
     * @return void
     */
    public function execute(RuleContextInterface $context): void;


    /**
     * 不匹配时执行
     * @param RuleContextInterface $context
     * @return void
     */
    public function notMatches(RuleContextInterface $context): void;
}