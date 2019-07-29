@php
    $breadcrumbs = [['name' => 'Home',
                      'url' => route('web.home'),
                      'icon' => 'fa fa-home'],
                      ['name' => 'Article',
                      'url' => '#',
                      'icon' => ''],
                      ['name' => $article->title,
                      'url' => '#',
                      'icon' => '']
                      ];

@endphp

@include('common.breadcrumb', $breadcrumbs)