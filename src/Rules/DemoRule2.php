<?php

namespace Fly\RuleEngine\Rules;

use Fly\RuleEngine\Interfaces\RuleContextInterface;
use Fly\RuleEngine\Interfaces\RuleInterface;

class DemoRule2 implements RuleInterface
{

    /**
     * @inheritDoc
     */
    public function matches(RuleContextInterface $context): bool
    {
        return $context->containsKey("num1")
            &&
            $context->containsKey("num2")
            &&
            ((int)$context->get("num1") + (int)$context->get("num2")) === 10;
    }

    /**
     * @inheritDoc
     */
    public function execute(RuleContextInterface $context): void
    {
        echo "num1 + num2 = 10\n";
        $context->set("result", "10");
    }

    /**
     * @inheritDoc
     */
    public function notMatches(RuleContextInterface $context): void
    {
        echo "num1 + num2 != 10\n";
        $context->set("result", "not 10");
    }
}