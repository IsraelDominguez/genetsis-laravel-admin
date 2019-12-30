<?php namespace Genetsis\Admin\Utils\GTM;

use Genetsis\Admin\Utils\GTM\Contracts\GtmInterface;
use Irazasyed\LaravelGAMP\Facades\GAMP;

class GtmServer implements GtmInterface
{

    public function __construct()
    {

    }

    /**
     *
     */
    public function send(GtmEvent $event) {
        $gamp = GAMP::setCustomDimension($event->getOid(), 1)
        ->setUserId($event->getOid())
        ->setCustomDimension('Genetsis', 2)
        ->setDocumentHostName(env('APP_URL'))
        ->setDocumentTitle($event->getDocumentTitle())
        ->setDocumentPath($event->getDocumentPath())
        ->setEventCategory($event->getCategory())
        ->setEventAction($event->getAction())
        ->setEventLabel($event->getLabel())
        ->sendEvent();
    }


}
