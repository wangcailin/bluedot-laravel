<?php

namespace App\Application\DemoDragger;

use App\Application\DemoDragger\Models\DemoDragger;
use Composer\Http\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Validation\Rule;
use Spatie\QueryBuilder\AllowedFilter;

class Client extends Controller
{
    public function __construct(DemoDragger $demo)
    {
        $this->model = $demo;
        $this->allowedFilters = [
            'sort',
        ];
        $this->defaultSorts = "-sort";
        $this->allowedSorts = ['sort'];
        $this->validateRules = [
        ];
    }

    public function updateRules()
    {
        $this->data = request()->all();
        $total = count($this->data);
        foreach ($this->data as $key => $arr) {
            $arr['sort'] = $total - $key;
            $filteredArr = array_diff_key($arr, array_flip(['created_at', 'updated_at']));
            $this->model::where('id', $arr['id'] ?? '')->update($filteredArr);
        }
        return $this->success([]); 
    }
}
