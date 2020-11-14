<?php

namespace Neelkanth\Laravel\SurveillanceUi\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SurveillanceUiController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;
}