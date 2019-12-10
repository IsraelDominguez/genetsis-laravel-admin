<?php namespace Genetsis\Admin\Utils;

use Illuminate\Support\MessageBag;

class GTM
{
    static protected $gtm_events = array();

    public static function sendEvent($category, $action, $label)
    {
        array_push(self::$gtm_events, compact('category', 'action', 'label'));
        \Log::debug(sprintf("GTM queue event: [%s | %s | %s]", $category, $action, $label));
    }

    public static function getEvents() {
        return self::$gtm_events;
    }

    /**
     * @param string $page Page View
     */
    public static function sendViewPage(string $page) {
        self::sendEvent('Page', 'Viewed', $page);
    }

    /**
     * @param string $promotion Participation
     */
    public static function sendParticipation(string $promotion) {
        self::sendEvent('Promotion', 'Participated', $promotion);
    }

    /**
     * @param string $sponsor User Referred by
     */
    public static function sendReferred(string $sponsor) {
        self::sendEvent('Person', 'Referred', $sponsor);
    }

    /**
     * @param string $promotion Participation
     */
    public static function sendRedeem(string $promotion) {
        self::sendEvent('Coupon', 'Redeemed', $promotion);
    }

    public static function sendGetQr(string $promotion) {
        self::sendEvent('Coupon', 'Downloaded', $promotion);
    }

    public static function sendWinnner(string $promotion) {
        self::sendEvent('Prize', 'Won', $promotion);
    }
}
