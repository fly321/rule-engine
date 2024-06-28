<?php

namespace Fly\RuleEngine\Interfaces;

/**
 * Interfaces RuleContextInterface
 */
interface RuleContextInterface
{
    /**
     * 设置规则上下文数据
     * @param string $key
     * @param $value
     * @return void
     */
    public function set(string $key, $value): void;

    /**
     * 获取规则上下文数据
     * @param string $key
     * @return mixed
     */
    public function get(string $key);


    /**
     * 判断规则上下文数据是否存在
     * @param string $key
     * @return bool
     */
    public function containsKey(string $key): bool;


    /**
     * 获取所有规则上下文数据
     * @return array
     */
    public function getData(): array;
}