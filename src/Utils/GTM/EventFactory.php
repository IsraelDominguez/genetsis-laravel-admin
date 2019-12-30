<?php namespace Genetsis\Admin\Utils\GTM;

class EventFactory
{

    public static function viewPage(string $page) {
        return GtmEvent::i()->setCategory('Page')->setAction('Viewed')->setLabel($page);
    }

    public static function participation(string $promotion) {
        return GtmEvent::i()->setCategory('Promotion')->setAction('Participated')->setLabel($promotion);
    }

    public static function referred(string $sponsor) {
        return GtmEvent::i()->setCategory('Person')->setAction('Referred')->setLabel($sponsor);
    }

    public static function redeem(string $promotion) {
        return GtmEvent::i()->setCategory('Coupon')->setAction('Redeemed')->setLabel($promotion);
    }

    public static function getQr(string $promotion) {
        return GtmEvent::i()->setCategory('Coupon')->setAction('Downloaded')->setLabel($promotion);
    }

    public static function winner(string $promotion) {
        return GtmEvent::i()->setCategory('Prize')->setAction('Won')->setLabel($promotion);
    }

}
