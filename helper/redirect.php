<?php
function redirect_to($module, $controller, $action)
{
    return header("location: ?mod=$module&controller=$controller&action=$action");
    exit;
}

function slug_redirect($slug)
{
    $base_url = "http://localhost/UNITOP/back_end/php/project/monowear.com/".$slug;
    return header("Location: $base_url");
}
