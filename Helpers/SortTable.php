<?php namespace Foostart\Category\Helpers;
use Request;
class SortTable {

    public $orders = [];
    public $sorting = [];

    public function __construct($orders = array()) {
        if (!empty($orders)) {
            $this->orders = $orders;
        }
    }

    public function setOrders($orders) {
        $this->orders = $orders;
    }

    public function getOrders($orders) {
        return $this->orders;
    }

    public function setSorting($sorting) {
        $this->sorting = $sorting;
    }
    public function linkOrders() {

        $sorting = [
            'label' => $this->orders,
            'items' => [],
            'url' => []
        ];
        
        if ($this->sorting) {
            $sorting = $this->sorting;
        }

        //Order by params
        $params = Request::all();

        $order_by = explode(',', @$params['order_by']);
        $ordering = explode(',', @$params['ordering']);
        foreach ($this->orders as $key => $value) {
            $_order_by = $order_by;
            $_ordering = $ordering;
            if (!empty($key)) {
                //existing key in order
                if (in_array($key, $order_by)) {
                    $index = array_search($key, $order_by);
                    switch ($_ordering[$index]) {
                        case 'asc':
                            $sorting['items'][$key] = 'asc';
                            $_ordering[$index] = 'desc';
                            break;
                        case 'desc':
                            $sorting['items'][$key] = 'desc';
                            $_ordering[$index] = 'asc';
                            break;
                        default:
                            break;
                    }
                    $order_by_str = implode(',', $_order_by);
                    $ordering_str = implode(',', $_ordering);
                } else {//new key in order
                    $sorting['items'][$key] = 'none'; //asc
                    if (empty($params['order_by'])) {
                        $order_by_str = $key;
                        $ordering_str = 'asc';
                    } else {
                        $_order_by[] = $key;
                        $_ordering[] = 'asc';
                        $order_by_str = implode(',', $_order_by);
                        $ordering_str = implode(',', $_ordering);
                    }
                }
                $sorting['url'][$key]['order_by'] = $order_by_str;
                $sorting['url'][$key]['ordering'] = $ordering_str;
            }
        }
        foreach ($sorting['url'] as $key => $item) {
            $params['order_by'] = $item['order_by'];
            $params['ordering'] = $item['ordering'];
            $sorting['url'][$key] = Request::url() . '?' . http_build_query($params);
        }

        return $sorting;
    }

}
