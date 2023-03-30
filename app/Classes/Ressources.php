<?php
namespace App\Classes;

use Illuminate\Support\Facades\Route;


class Ressources
{
    // SET FILLE ARRAY
    protected static $ressourcesArray = [
        // DASHBOARD
        'login' => [
            "css" => [
                'assets/css/theme/custom-auth.css',
            ],
            "js" => [
                "assets/js/authentication/sign-in/general.js",
            ],
        ],
        'register' => [
            "css" => [
                'assets/css/theme/custom-auth.css',
            ],
            "js" => [
                "assets/js/authentication/sign-up/general.js",
            ],
        ],
        'password.request' => [
            "css" => [

            ],
            "js" => [
                "assets/js/authentication/reset-password/reset-password.js",
            ],
        ],
        'dashboard' => [
            "css" => [

            ],
            "js" => [
                // "assets/script/senderID/senderID.js",
            ],
        ],
        'profile.create' => [
            "css" => [

            ],
            "js" => [
                "assets/js/profile/profile.js",
            ],
        ],
        'permission.create' => [
            "css" => [

            ],
            "js" => [
                "assets/js/user-management/permissions/list.js",
            ],
        ],
    ];


    /** get current route
     * @return string $routeName
     */
    public static function current_route()
    {
        $curPageName = Route::currentRouteName();
        return $curPageName;
    }

    /**
     * FUNCTION TO GET JS FILE OF THE CURRENT PAGE
     * @param string $currentUrl
     * @param string $filesType
     * @return array
     */
    public static function jsFilesArray($currentUrl,$filesType){
        $currentPageFiles = [];
        if(!empty(self::$ressourcesArray[$currentUrl][$filesType])){
            $currentPageFiles = self::$ressourcesArray[$currentUrl][$filesType];
        }
        return $currentPageFiles;

    }
}
