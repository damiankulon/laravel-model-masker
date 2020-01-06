<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Tables Configuration
    |--------------------------------------------------------------------------
    */

    'tables' => [],

    'maskStrategies' => [
        LaravelModelMasker\Mask\StarifyMask::class,
        LaravelModelMasker\Mask\HashifyMask::class
    ]

];
