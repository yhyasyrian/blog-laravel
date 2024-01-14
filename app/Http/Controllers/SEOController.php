<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Const\Links;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;

class SEOController extends Controller
{
    public static function start(
        string $title,
        string $description = '',

    )
    {
        SEOTools::setTitle($title)
            ->setDescription($description)
            ->opengraph()->setUrl(\request()->url());
        SEOTools::twitter()->setSite(Links::getSitting('twitter'));
    }
}
