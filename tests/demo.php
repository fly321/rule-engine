<?php

use Fly\RuleEngine\Engine\RuleContext;
use Fly\RuleEngine\Engine\RuleEngine;
use Fly\RuleEngine\Rules\DemoRule;
use Fly\RuleEngine\Rules\DemoRule2;

include_once __DIR__ . '/../vendor/autoload.php';

$rules = [
    new DemoRule(),
    new DemoRule2()
];
$engine = new RuleEngine($rules);

$list = [
    ["num1" => 1, "num2" => 9],
    ["num1" => 2, "num2" => 8],
    ["num1" => 3, "num2" => 5],
];
$context = new RuleContext();
foreach ($list as $item) {
    echo "---- 通用规则 ----\n";
    $context->set("num1", $item["num1"]);
    $context->set("num2", $item["num2"]);
    $engine->run($context);

    echo "---- 特定规则 ----\n";
    try {
        $engine->runAll($context);
    } catch (\Fly\RuleEngine\Exception\RuleException $e) {
        var_dump($e->getMessage());
    }

    echo "---- 单条规则 ----\n";
    $engine->runOne($context);
}