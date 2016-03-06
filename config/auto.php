<?php

use App\Models\Auto\AutoImage;

return [
    'images' => [
        'path' => '/'.AutoImage::IMAGES_PATH,
        'images' => [
            'extensions' => [
                'jpg', 'jpeg', 'png'
            ],
            //'width' => 700,
            //'height' => 500,
            //'min_width' => 500,
            //'max_width' => 200,
            //'min_height' => 500,
            //'max_height' => 200,
        ]
    ]
];