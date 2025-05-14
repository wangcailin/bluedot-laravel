<?php

namespace App\Application\Demo;

use BluedotComposer\Http\Controller;
use App\Application\Demo\Models\Form;

class FormClient extends Controller
{
    public function __construct(Form $form)
    {
        $this->model = $form;
    }
}
