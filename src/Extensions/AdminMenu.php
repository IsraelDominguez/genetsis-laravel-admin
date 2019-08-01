<?php namespace Genetsis\Admin\Extensions;

use \View;

class AdminMenu {

    /**
     * @var array $menu menu elements
     */
    protected $menu = [];

    public function __construct() {

    }

    public function add($new_item, array $data = [], $order = 1) {
        $element = [
            'view' => $new_item,
            'data' =>  $data,
            'order' => $order
        ];

        array_push($this->menu, $element);
    }

    public function show() {
        $contents = '';

        usort($this->menu, function($a, $b) {
            if ($a['order'] == $b['order']) {
                return 0;
            }
            return ($a['order'] < $b['order']) ? -1 : 1;
        });

        foreach ($this->menu as $item) {
            $view = View::make($item['view'], $item['data']);

            $contents .= $view->render();
        }

        return $contents;
    }

}