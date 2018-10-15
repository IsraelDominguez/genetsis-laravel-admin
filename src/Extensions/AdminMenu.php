<?php namespace Genetsis\Admin\Extensions;

use \View;

class AdminMenu {

    protected $menu = array();

    public function __construct() {

    }

    public function add($new_item, array $data = []) {
        $element['view'] = $new_item;
        $element['data'] = $data;
        $this->menu[] = $element;
    }

    public function show() {
        $contents = '';
        foreach ($this->menu as $item) {
            $view = View::make($item['view'], $item['data']);

            $contents .= $view->render();
        }

        return $contents;
    }
}