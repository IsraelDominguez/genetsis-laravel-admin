<?php namespace Genetsis\Admin\Utils\GTM;

class EventFactory
{

    public static function viewPage(string $page) {
        return (new GtmEvent)
                    ->setCategory('Page')
                    ->setAction('Viewed')
                    ->setLabel($page);
    }

    public static function participation(string $promotion) {
        return (new GtmEvent)
            ->setCategory('Promotion')
            ->setAction('Participated')
            ->setLabel($promotion);
    }

    public static function referred(string $sponsor) {
        return (new GtmEvent)
            ->setCategory('Person')
            ->setAction('Referred')
            ->setLabel($sponsor);
    }

    public static function redeem(string $promotion) {
        return (new GtmEvent)
            ->setCategory('Coupon')
            ->setAction('Redeemed')
            ->setLabel($promotion);
    }

    public static function getQr(string $promotion) {
        return (new GtmEvent)
            ->setCategory('Coupon')
            ->setAction('Downloaded')
            ->setLabel($promotion);
    }

    public static function winner(string $promotion) {
        return (new GtmEvent)
            ->setCategory('Prize')
            ->setAction('Won')
            ->setLabel($promotion);
    }

}
