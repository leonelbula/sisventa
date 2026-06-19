<?php

use App\Models\Company;

if (! function_exists('company')) {

    function company()
    {
        return Company::first();
    }
}