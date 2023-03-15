<?php

namespace App\Application\Demo;

use Composer\Http\Controller;
use App\Application\Demo\Models\Demo;

class Client extends Controller
{
    public function __construct(Demo $demo)
    {
        $this->model = $demo;
        $this->allowedFilters = [];
    }
}
