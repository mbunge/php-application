# Event Dispatcher Controller

A listener subscribes to an event via [SubscribeTo attribute](./Attribute/SubscribeTo.php).

## Attributes

[EventAttributePresenter](./EventAttributePresenter.php) resolves SubscribeTo attribute and realize subscription of
autoloaded listeners.

## Listener and Events

Use a listener and automatically subscribe to a lifecycle [Event](./Event) after initiation.

- [ControllerInitiated](Event/ControllerInitiated.php)
- [InputHandled](Event/InputHandled.php)
- [OutputHandled](Event/OutputHandled.php)

Example listener:

```php
<?php

use Mbunge\PhpApplication\Event\Attribute\SubscribeTo;
use Mbunge\PhpApplication\Event\Event\InputHandled;
use Mbunge\PhpApplication\Event\Event\OutputHandled;
use Mbunge\PhpApplication\Event\Event\ControllerInitiated;

class CustomEventListener {
    
    #[SubscribeTo(ControllerInitiated::class)]
    public function onInit(ControllerInitiated $event) {
        // do something
    }
    
    #[SubscribeTo(InputHandled::class)]
    public function onHandleInput(InputHandled $event) {
        // do something
    }
     
    #[SubscribeTo(OutputHandled::class)]
    public function onHandleOutput(OutputHandled $event) {
        // do something
    }
    
}
```

## Event dispatcher and controller decorator

[League\Event](https://event.thephpleague.com/) framework manages subscriptions and event dispatching.

[EventDispatcherControllerDecorator](./EventDispatcherControllerDecorator.php)
uses [League\Event](https://event.thephpleague.com/)
framework to dispatch events and decorates a context controller.


