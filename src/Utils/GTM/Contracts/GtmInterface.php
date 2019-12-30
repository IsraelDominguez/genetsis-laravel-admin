<?php namespace Genetsis\Admin\Utils\GTM\Contracts;

use Genetsis\Admin\Utils\GTM\GtmEvent;

interface GtmInterface {

    public function send(GtmEvent $event);
}

