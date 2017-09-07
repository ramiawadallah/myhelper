<?php

<?php

if (! function_exists('theme')) {
    function theme($path)
    {
        $config = app('config')->get('cms.theme');
        return url('/themes/default/assets/cms/'.$path);
    }
}

// if (! function_exists('theme')) {
//     function theme($path)
//     {
//         $config = app('config')->get('cms.theme');

//         return url($config['folder'].'/'.$config['active'].'/assets/cms/'.$path);
//     }
// }
