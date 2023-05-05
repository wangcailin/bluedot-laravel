<?php

namespace App\Application\Demo;

use Composer\Http\Controller;
use App\Application\Demo\Models\Demo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Validation\Rule;
use Spatie\QueryBuilder\AllowedFilter;

class Client extends Controller
{
    public function __construct(Demo $demo)
    {
        $this->model = $demo;
        $this->allowedFilters = [
            'title',
            AllowedFilter::callback('created_at', function (Builder $query, $value) {
                $query->whereBetween('created_at', $value);
            }),
        ];
        $this->allowedSorts = ['created_at'];
        $this->validateRules = [
            'title' => ['required', 'max:128']
        ];
    }

    public function getValidateUpdateRules()
    {
        return [
            'title' => [
                Rule::unique($this->model::class)->ignore($this->id)
            ],
        ];
    }
}
