<?php

namespace Alahaxe\HealthCheckBundle\Checks\Redis;

use _PHPStan_71572f9a1\Psr\Log\LoggerAwareTrait;
use Alahaxe\HealthCheck\Contracts\CheckInterface;
use Alahaxe\HealthCheck\Contracts\CheckStatus;
use Alahaxe\HealthCheck\Contracts\CheckStatusInterface;
use Psr\Cache\CacheException;
use Psr\Log\LoggerAwareInterface;
use Symfony\Component\Cache\Adapter\RedisAdapter;

class RedisCheck implements CheckInterface, LoggerAwareInterface
{
    use LoggerAwareTrait;
    
    public function __construct(
        protected string $dsn,
        protected string $name = 'redis'
    ) {
    }

    public function check(): CheckStatusInterface
    {
        $status = CheckStatus::STATUS_OK;
        try {
            RedisAdapter::createConnection($this->dsn);
        } catch (\Throwable $exception) {
            $status = CheckStatus::STATUS_INCIDENT;
        }
        
        return new CheckStatus(
            $this->name,
            __CLASS__,
            $status
        );
    }
}
