<?php

declare(strict_types=1);

namespace src\Controllers;

use vendor\myFramework\Controller;

class SiteController extends Controller
{
    public function index (): void
    {
        $this->setViews('site/index');
    }
}