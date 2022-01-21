<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);
require(__DIR__ . '/lang.php');

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'sourceLanguage' => 'ru',
    'language' => $default, // Yii::$app->language
    'name' => 'Vera Fund',
    'params' => $params,
    'components' => [
        'view' => [
            'theme' => [
               'pathMap' => [
                  '@app/views' => '@frontend/views'
               ],
            ],
        ],
        'site' => [
            'class' => 'budyaga_cust\users\models\Scripts',
            'version' => '4.5.1 alfa',
            'name' => 'CMS Defina',
            'license' => 'GNU General Public License v3.0',
            'licenseURI' => 'https://github.com/DefinaCorporation/Defina/blob/master/LICENSE',
            'price' => 'активная',
            'lang' => 'ru',
            'session' => $session,
        ],
        'paypal' => [
            'class' => 'budyaga_cust\users\models\forms\Money',
            'Client_Id' => 'AVqClgAyRyLCEz3OoNXUhciGl115wOFr1yORnkj1VyfdvOHYD4qxXVl7g9znOVMf-n_-58zf5B7yL6fy',
            'Secret' => 'EDbF6fNXlHBXB17N17ns0HM7k-nt183qvkgVUeIu82-ZPmHcG69KrjxLBq4FgWCBY8zP7_fIHE4JuI_h',
        ],
        'google' => [
            'class' => 'budyaga_cust\users\models\Google',
            'Client_Id' => '222325588288-pvcflrdplrlv9tjlhaikp6f1kqj41ucd.apps.googleusercontent.com',
            'Secret' => '1VJD71-Cvikg9e1qkxmwIIB4',
            'RedirectUri' => 'http://affeliatpro.host/register'
        ],
        'stripe' => [
            'class' => 'ruskid\stripe\Stripe',
            'publicKey' => "pk_live_amve3FBJfzPaJyurldsLtdF4",
            'privateKey' => "sk_live_s4WiiVsmsRMaoGA5vFguDdxn",
        ],
        'affise' => [
            'class' => 'budyaga_cust\users\models\Affise',
            'url' => 'https://api-affiliatehub.affise.com',
            'partner' => 'http://affiliatehub.affise.com',
            'tracking' => 'http://affiliatehub.g2afse.com/',
            'offers' => 'http://offers.affiliatehub.affise.com',
            'key' => '44fc491c83bd7da0b6398cb06a4220ca364151df',
            'USERID' => '' // 13
        ],
//        'pdf' => [
//            'class' => Pdf::classname(),
//            'format' => Pdf::FORMAT_A4,
//            'orientation' => Pdf::ORIENT_PORTRAIT,
//            'destination' => Pdf::DEST_BROWSER,
//        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'parsers' => [
                'multipart/form-data' => 'yii\web\MultipartFormDataParser'
            ],
        ],
        'user' => [
            'identityClass' => 'budyaga_cust\users\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['/login'],
        ],
        'sms' => [
            'class' => 'budyaga_cust\users\models\Sms',
            'login' => '9857172989',
            'password' => 'Vera@123456',
            'apiId' => '00EA49F7-4800-F035-64C3-9F7907AE4F2B',        
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'cache' => [    
            'class' => 'yii\caching\FileCache',
            'cachePath' => '@frontend/runtime/cache', 
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            //'suffix' => '.html',
            'rules' => [
                '' => 'site/index',
                '/signup' => '/user/user/signup',
                '/register' => '/user/user/register',
                '/payer' => '/user/user/payer',
                '/payer/<pay:\w+>' => '/user/user/payer',
                '/login' => '/user/user/login',
                '/logout' => '/user/user/logout',
                '/defina' => '/user/defina/index',
                '/index' => '/user/index/index',
                '/seo' => '/user/seo/index',
                '/code' => '/user/code/index',
                '/mail' => '/user/mail/index',
                '/menu' => '/user/menu/index',
                '/requestPasswordReset' => '/user/user/request-password-reset',
                '/resetPassword' => '/user/user/reset-password',
                '/profile' => '/user/user/profile',
                '/retryConfirmEmail' => '/user/user/retry-confirm-email',
                '/confirmEmail' => '/user/user/confirm-email',
                '/delivery' => '/delivery/index',
                'new/<link:\w+>' => 'site/new',
                'art/<link:\w+>' => 'site/art',
                'blog/<link:\w+>' => 'site/blog',
                'portfolio/<link:\w+>.html' => 'site/portfolio',
                'command/<href:\w+>' => 'site/command',
                'blog/<page:\d+>/<per-page:\d+>' => 'site/blog',
                'reviev/<page:\d+>/<per-page:\d+>' => 'site/reviev',
                'reviews/<page:\d+>/<per-page:\d+>' => 'site/reviews',
                'perfomance/<page:\d+>/<per-page:\d+>' => 'site/perfomance',
                'api/v1/limit/<id:\d+>/<filter:\w+>/<limit:\d+>/<apiKey:\w+>.py' => 'api/page/info', // http://verafind.site/api/v1/limit/0/vf/3/HCwXUfSrvB.py
                'api/v1/filter/<id:\d+>/<filter:\w+>/<limit:\d+>/<apiKey:\w+>.py' => 'api/page/sort',
                'api/v1/object/<filter:\w+>/<link:\w+>/<apiKey:\w+>.py' => 'api/page/object', // http://verafind.site/api/v1/object/vf/obj4705280711/HCwXUfSrvB.py
                                
                'api/v3/user/<id:\d+>' => 'api/page/user',
                'api/v3/user' => 'api/page/user',
                'api/v3/faq/<land:\w+>' => 'api/page/faq',
                'api/v3/faq' => 'api/page/faq',
                'api/v3/currency' => 'api/page/currency',
                'api/v3/upload' => 'api/page/upload',
                'api/v3/upload/<dir:\w+>' => 'api/page/upload',
                
                '/service/<link:\w+>' => 'site/service',
                '/service-<link:\w+>.html' => 'site/service',
                'api/v1/data/<link:\w+>/<apiKey:\w+>.py' => 'api/page/one',   // http://verafind.site/api/v1/data/obj609431205/HCwXUfSrvB.py
                'api/v1/data/<apiKey:\w+>.py' => 'api/page/one',              // http://verafind.site/api/v1/data/HCwXUfSrvB.py
                'api/v1/catalog/<apiKey:\w+>.py' => 'api/page/all',           // https://shopme.su/api/v1/catalog/HCwXUfSrvB.py 
                'api/v1/catalog' => 'api/page/all',             
                'api/v1/data/<link:\w+>/<apiKey:\w+>' => 'api/page/error',
                'api/v1/data/<apiKey:\w+>' => 'api/page/error',
                'api/v1/image/<id:\d+>' => 'api/page/image',
                'api/v1/data/<link:\w+>' => 'api/page/error',
                '/news' => 'admin/page/news',
                '/new/<id:\w+>.html' => 'admin/page/new',
                '/smartlinks' => 'admin/page/smartlinks',
                '/profile' => 'admin/page/profile',
                '/api' => 'admin/page/api',
                '/helps' => 'admin/page/helps',
                '/settings' => 'admin/page/settings',
                'support/chat' => 'admin/page/chat',
                'support/faq' => 'admin/page/faq',
                '/dashboard' => 'admin/page/index',
                '/offer/hub<id:\d+>.aspx' => 'admin/page/offer',
                '/offers' => 'admin/page/offers',
                'object/<link:\w+>' => 'site/objects',
                'doc/<href:\w+>' => 'site/doc',
                'ticket/<date:\d+>' => 'site/ticket',
                
                // <action:(\w|-)+>
                'mx/<number_mls:(\w|-)+>' => 'site/mx',
                '/payments' => '/payments/index',
                '/orders' => '/orders/index',
                '<action:apple>.asp' => 'site/apple',
                '<action>' => 'site/<action>',
            ],
        ], 
        'assetManager' => [
            'bundles' => [
                'yii2mod\alert\AlertAsset' => [
                    'css' => [
                        'dist/sweetalert.css',
                        'themes/twitter/twitter.css',
                    ]
                ],
                'kartik\form\ActiveFormAsset' => [
                    'bsDependencyEnabled' => false
                ],
            ],
            'basePath' => '@webroot/assets',
            'baseUrl' => '@web/assets'
        ],  
        'request' => [
            'baseUrl' => ''
        ]
    ],
    'modules' => [
        
        'user' => [
            'class' => 'budyaga_cust\users\Module',
        ],
        'invester' => [
            'class' => 'frontend\people\Invester',
        ],
        'api' => [
            'class' => 'frontend\api\Link',
        ],
        'admin' => [
            'class' => 'frontend\admin\Admin',
        ],
        'filemanager' => [
            'class' => 'pendalf89\filemanager\Module',
            'routes' => [
                'baseUrl' => '',
                'basePath' => '@frontend/web',
                'uploadPath' => 'uploads',
            ],
            'thumbs' => [
                'small' => [
                    'name' => 'Мелкий',
                    'size' => [100, 100],
                ],
                'medium' => [
                    'name' => 'Средний',
                    'size' => [300, 300],
                ],
                'large' => [
                    'name' => 'Большой',
                    'size' => [500, 500],
                    'mode' => \Imagine\Image\ImageInterface::THUMBNAIL_INSET
                ],
            ],
        ],        
    ],
];