<?php namespace Genetsis\Admin\Utils\GTM;

use Genetsis\Admin\Utils\GTM\Contracts\GtmInterface;
use Illuminate\Support\Facades\App;

class GtmJs implements GtmInterface
{
    protected $events = array();

    public function __construct()
    {

    }

    /**
     * @param GtmEvent $event
     */
    public function send(GtmEvent $event) {
        $this->addEvent($event);
    }

    /**
     * Add Event to send
     * @param GtmEvent $event
     */
    public function addEvent(GtmEvent $event) {
        array_push($this->events, $event);
    }

    /**
     * @return array All gtm events to send by Js in page
     */
    public function getEvents() {
        return $this->events;
    }

}
