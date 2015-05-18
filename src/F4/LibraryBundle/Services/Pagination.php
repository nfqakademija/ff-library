<?php

namespace F4\LibraryBundle\Services;

class Pagination
{
    public function getPagination($count, $limit, $page)
    {
        $result = array();

        if ($limit % 3 == 0 && $limit < 100) {
            $result['limit'] = $limit;
        } else {
            $result['limit'] = 9;
        }

        $result['pages'] = ceil($count / $result['limit']);

        if ($page < 1 || $page > $result['pages']) {
            $result['page'] = 1;
        } else {
            $result['page'] = $page;
        }

        $result['to'] = $result['page'] * $result['limit'];
        $result['offset'] = $result['to'] - $result['limit'];

        if ($result['offset'] <= 0) {
            $result['from'] = 1;
        } else {
            $result['from'] = $result['offset'];
        }

        $result['total'] = $count;

        return $result;
    }
}
