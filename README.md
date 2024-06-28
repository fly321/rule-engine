
---
# Rule Engine

这是一个简单的PHP规则引擎包。该项目使用PHP和Composer来构建和运行规则引擎。

## 需要

- PHP 7.4 or higher
- Composer

## 安装

1. require composer

    ```sh
    composer require fly321/rule-engine
    ```
   

2. 具体示例demo
   ```sh
   php test/demo.php
   ```

## use
### 规则引擎 - 实现RuleInterface接口
```php
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
```
