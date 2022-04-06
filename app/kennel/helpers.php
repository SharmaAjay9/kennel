<?php

use App\Models\Setting;
use App\Models\Upload;

if (!function_exists('pr')) {
    function pr($ar)
    {
        echo "<pre>";
        print_r($ar);
        exit;
    }
}

if (!function_exists('translate')) {
    function translate($ar)
    {
        return $ar;
    }
}

if (!function_exists('getBaseURL')) {
    function getBaseURL()
    {
        return url()->to("/");
    }
}




if (!function_exists('areActiveRoutes')) {
    function areActiveRoutes($ar)
    {   
        if(in_array(Route::current()->getName(),$ar)){
            return 'active';
        }
    }
}


if (!function_exists('get_setting')) {
    function get_setting($key, $default = null)
    {
        $setting = Setting::where('type', $key)->first();
        return $setting == null ? $default : $setting->value;
    }
}


if (!function_exists('uploaded_asset')) {
    function uploaded_asset($id)
    {
        if (($asset = Upload::find($id)) != null) {
           return asset('storage/'.$asset->file_name);
        }
        return null;
    }
}


if (!function_exists('formatBytes')) {
    function formatBytes($bytes, $precision = 2) {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        // Uncomment one of the following alternatives
        $bytes /= pow(1024, $pow);
        // $bytes /= (1 << (10 * $pow));

        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}


