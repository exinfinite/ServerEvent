# Server Send Event

[Server Send Event MDN參考](https://developer.mozilla.org/zh-TW/docs/Web/API/Server-sent_events/Using_server-sent_events)

### 安裝

```php
composer require Exinfinite\ServerEvent
```

### 使用

```php
use Exinfinite\ServerEvent;

ServerEvent::shot("data string");
```

 [範例](https://github.com/exinfinite/ServerEvent/tree/master/example)