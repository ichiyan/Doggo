<?php

namespace App\Utilities\PostFilters;

use App\Utilities\FilterContract;

class Title extends QueryFilter implements FilterContract
{
    protected $query;

    public function handle($value): void
    {
        $this->query->where('breed', $value);
    }
}

?>