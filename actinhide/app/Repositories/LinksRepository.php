<?php

namespace App\Repositories;

use App\Link;
use Illuminate\Support\Facades\Schema;

class LinksRepository
{
    /**
     * @param $value
     * @return mixed
     */
    public function search($value)
    {
        $columns = Schema::getColumnListing('links');
        $query   = Link::query();
        $search  = '%' . $value . '%';

        foreach ($columns as $column) {
            $query->orWhere($column, 'LIKE', $search);
        }

        return $query->get();
    }
}
