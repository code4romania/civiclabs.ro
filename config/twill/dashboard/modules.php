<?php

return [

    /**
     * @param array $module Array containing the module config params.
     *    [
     *        'App\Models\ModuleName' = [
     *            'name'           => (string)  [required] Module name
     *            'label'          => (string)  [optional] If the name of your module above does not work as a label
     *            'label_singular' => (string)  [optional] If the automated singular version does not work as a label
     *            'routePrefix'    => (string)  [optional] If the module is living under a specific routes group
     *            'count'          => (boolean) [required] Show total count with link to index of this module
     *            'create'         => (boolean) [required] Show link in create new dropdown
     *            'activity'       => (boolean) [required] Show activities on this module in actities list
     *            'draft           => (boolean) [required] Show drafts of this module for current user
     *            'search'         => (boolean) [required] Show results for this module in global search
     *         ]
     *    ]
     */

    'domain' => [
        'name'           => 'domains',
        'label'          => 'Domains',
        'label_singular' => 'Domain',
        'routePrefix'    => 'solutions',
        'count'          => true,
        'create'         => true,
        'activity'       => true,
        'draft'          => true,
        'search'         => true,
    ],

    'solution' => [
        'name'           => 'solutions',
        'label'          => 'Solutions',
        'label_singular' => 'Solution',
        'routePrefix'    => 'solutions',
        'count'          => true,
        'create'         => true,
        'activity'       => true,
        'draft'          => true,
        'search'         => true,
    ],

    'byproduct' => [
        'name'           => 'byproducts',
        'label'          => 'Byproducts',
        'label_singular' => 'Byproduct',
        'routePrefix'    => 'solutions',
        'count'          => true,
        'create'         => true,
        'activity'       => true,
        'draft'          => true,
        'search'         => true,
    ],

    'person' => [
        'name'           => 'people',
        'label'          => 'Team members',
        'label_singular' => 'Team member',
        'routePrefix'    => '',
        'count'          => false,
        'create'         => true,
        'activity'       => false,
        'draft'          => false,
        'search'         => true,
        'search_fields'  => ['name', 'title']
    ],

    'page' => [
        'name'           => 'pages',
        'label'          => 'Pages',
        'label_singular' => 'Page',
        'routePrefix'    => '',
        'count'          => false,
        'create'         => true,
        'activity'       => false,
        'draft'          => true,
        'search'         => true,
    ],

    'post' => [
        'name'           => 'posts',
        'label'          => 'Posts',
        'label_singular' => 'Post',
        'routePrefix'    => '',
        'count'          => false,
        'create'         => true,
        'activity'       => true,
        'draft'          => true,
        'search'         => true,
    ],

];
