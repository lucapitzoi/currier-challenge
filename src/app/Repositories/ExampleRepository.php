<?php

namespace App\Repositories;

use App\Models\Example;
use App\Traits\Purge;
use Illuminate\Support\Facades\DB;

class ExampleRepository extends BaseRepository {

    use Purge;

    /**
     * ExampleRepository constructor.
     */
    public function __construct(Example $model) {
        parent::__construct($model);
    }

}
