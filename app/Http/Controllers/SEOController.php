<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Const\Links;
use App\Models\Post;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;

class SEOController extends Controller
{
    public static function start(
        string $title,
        string $description = '',
        string $image = '',
        ?Post $post = null,
        string $type = ''
    )
    {
        $url = \request()->url();
        SEOTools::metatags()->reset();
        SEOTools::setTitle($title)
            ->setDescription($description)
            ->addImages($image)
            ->opengraph()->setUrl($url)
            ->setTitle($title . config('seotools.meta.defaults.separator') . Links::getSitting('title'))
            ->setSiteName(config('seotools.meta.title'))
            ->setDescription($description)
            ->setType($type)
            ->setArticle([
                'published_time' => Carbon::create($post?->created_at)->format('Y-m-d\T-H-i-s+00:00'),
                'modified_time' => Carbon::create($post?->updated_at)->format('Y-m-d\T-H-i-s+00:00'),
                'author' => $post?->user()?->value('name'),
                'section' => $post?->category()?->value('title')
            ])
            ;
        SEOTools::twitter()
            ->setTitle($title . config('seotools.meta.defaults.separator') . Links::getSitting('title'))
            ->setSite(Links::getSitting('twitter'))
            ->setUrl($url)
            ->setDescription($description)
            ->setImage($image)
            ->setType($type)
        ;
        SEOTools::jsonLdMulti()
            ->setTitle($title . config('seotools.meta.defaults.separator') . Links::getSitting('title'))
            ->setUrl($url)
            ->setType($type)
            ->setDescription($description)
            ->setSite($url)
            ->setImages([$image])
        ;
        SEOTools::metatags()
            ->addMeta('googlebot','archive')
            ->addMeta('robots','index, follow')
            ;
    }
}
