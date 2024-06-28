<?php

namespace Fly\RuleEngine\Rules;

use Fly\RuleEngine\Interfaces\RuleContextInterface;
use Fly\RuleEngine\Interfaces\RuleInterface;

class DemoRule implements RuleInterface
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
            $context->get("num1") < $context->get("num2");
    }

    /**
     * @inheritDoc
     */
    public function execute(RuleContextInterface $context): void
    {
        var_dump($context->get("num1"), $context->get("num2"));
        echo "num1 < num2\n";
        $context->set("num_bool", true);
    }

    /**
     * @inheritDoc
     */
    public function notMatches(RuleContextInterface $context): void
    {
        var_dump($context->get("num1"), $context->get("num2"));
        echo "num1 >= num2\n";
        $context->set("num_bool", false);
    }
}