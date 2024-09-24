<?php

$data = $_GET;

if($data['password'] != 'thiago') {
    header('location:/');
}


$css = scandir('./assets/css/css_bootstrap-5.3.3-dist');
array_shift($css);
array_shift($css);

$js = scandir('./assets/js/js_bootstrap-5.3.3-dist/');
array_shift($js);
array_shift($js);


function concatenationFiles($filesArray, $path) {

    $minify = '';

    $i = 0;
    
    foreach ($filesArray as $key => $value) {
        $content = file_get_contents($path . '/' . $value);
        $minify .= $content;  
        
        $i++;

        if($i == 1) {
            break;
        }
       

    } 
    
    return $minify;
    
}




$css_concat = concatenationFiles($css, './assets/css/css_bootstrap-5.3.3-dist/');
//$js_concat = concatenationFiles($js,  './assets/js/js_bootstrap-5.3.3-dist/');

$file = fopen('./assets/css/css_bootstrap_minify.txt', 'w');
fwrite($file, $css_concat);
fclose($file);
rename('./assets/css/css_bootstrap_minify.txt', './assets/css/css_bootstrap_minify.css');

