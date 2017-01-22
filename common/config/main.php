<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
     'authManager' => [
			        'class' => 'yii\rbac\DbManager',
			    ],
			],
			'modules' => [
			    'rbac' =>  [
			        'class' => 'johnitvn\rbacplus\Module',
			        'userModelClassName'=>null,
			        'userModelIdField'=>'id',
			        'userModelLoginField'=>'username',
			        'userModelLoginFieldLabel'=>null,
			        'userModelExtraDataColumls'=>null,
			        'beforeCreateController'=>null,
			        'beforeAction'=>null
			    ] , 
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
