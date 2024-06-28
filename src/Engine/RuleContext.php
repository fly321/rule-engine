<?php

namespace Fly\RuleEngine\Engine;

use Fly\RuleEngine\Interfaces\RuleContextInterface;

/**
 * Class RuleContext
 * @package Fly\RuleEngine\Engine
 */
class RuleContext implements RuleContextInterface
{
    /**
     * @var array $data 数据
     */
    private $data = [];

    /**
     * @inheritDoc
     */
    public function set(string $key, $value): void
    {
        $this->data[$key] = $value;
    }

    /**
     * @inheritDoc
     */
    public function get(string $key)
    {
        return $this->data[$key] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function containsKey(string $key): bool
    {
        return array_key_exists($key, $this->data);
    }

    /**
     * @inheritDoc
     */
    public function getData(): array
    {
        return $this->data;
    }
}