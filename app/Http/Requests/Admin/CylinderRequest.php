<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class CylinderRequest extends Request
{
    public function rules()
    {
        return [
            'count' => 'required|integer',
        ];
    }
}