<?php

/*todo
 * render hook to show the dropdown list
 * render hook to show the bookmark toggle
 * a blade component
 *
 */
return [
    /**
     * set the default domain.
     */
    'render-hooks' => [
        'list' => '',
        'toggle' => '',
    ],

    /**
     * set  the database tables prefix
     */
    'table-prefix' => '',

    /**
     * you can overwrite any model and use your own
     * you can also configure the model per panel in your panel provider using:
     * ->skyModels([ ... ])
     */
    'models' => [
        'User' => config('auth.providers.users.model'),
        'Bookmark' => \LaraZeus\Delia\Models\Bookmark::class,
    ],
];
