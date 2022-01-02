# HealthCheck system checker

## Installation

Install checker:

```bash
    composer require alahaxe/healthcheck-redis
```

Register service in your app:

```yaml
    Alahaxe\HealthCheckBundle\Checks\Redis\RedisCheck:
        arguments:
            # @see https://symfony.com/doc/current/components/cache/adapters/redis_adapter.html#configure-the-connection
            $dns: "redis://abcdef@localhost?timeout=5"
            # optional
            $name: "redis_01"
        tags: ['lahaxearnaud.healthcheck.check']
```
