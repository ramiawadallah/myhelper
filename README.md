composer require "rami-awadallah/myhelpers":"1.1.x-dev"
   
   config\app.php  --> providers array

        Collective\Html\HtmlServiceProvider::class,
        DaveJamesMiller\Breadcrumbs\ServiceProvider::class,
        RamiAwadallah\Helpers\ServiceProvider::class,


  config\app.php  --> aliases array
  
        'Form' => Collective\Html\FormFacade::class,
        'Html' => Collective\Html\HtmlFacade::class,
        'Btn' => RamiAwadallah\Helpers\Src\Btn::class,
        'bsForm' => RamiAwadallah\Helpers\Src\bsForm::class,
        'langForm' => RamiAwadallah\Helpers\Src\langForm::class,
        'MyRoute' => RamiAwadallah\Helpers\Src\Routes\MyRoute::class,
        'Files' => RamiAwadallah\Helpers\Src\Files\Files::class,
        'Control' => RamiAwadallah\Helpers\Src\Control::class,
        'Breadcrumbs' => DaveJamesMiller\Breadcrumbs\Facade::class,

 publish vendor 
 
         php artisan vendor:publish --force


   app\Console\Kernel.php

    protected $commands = [
        ...
        Commands\Controller::class,
        Commands\View::class,    
    ];

    
 app/Http/Kernel.php


       protected $middlewareGroups = [
        'web' => [
            ...
            \App\Http\Middleware\LocaleMiddleware::class,
        ],

      protected $routeMiddleware = [
        ...
        'maintenance' => \App\Http\Middleware\maintenance::class,
        'rule' => \App\Http\Middleware\Rules::class,
    ];

 app/Http/routes.php


        MyRoute::shareVariables();
        MyRoute::system();


        \MyRoute::auth();
        group(['prefix'=>admin,'middleware'=>'auth'],function(){

        /* Language Route design */
           resource('langs', 'Backend\LangController', 'admin.langs');
           Route::post('admin/langs/store', array('as'=>'store_langs' ,'uses'=>'Backend\LangController@store') );
           Route::post('admin/langs', array('as' => 'update_file' , 'uses' => 'Backend\LangController@updateFiles'));

        /* Settings Route design */
           resource('settings', 'Backend\SettingsController','admin.settings');

        /* Go to Admin Route design */
           get('/', 'Backend\HomeController@index','admin.index');

           /* Language changing Route design */
           get('backend/main_settings', 'Backend\SettingsController@index','main.settings');

           /* Users Route design */
           resource('users', 'Backend\UserController','admin.users');

       
          });

Auth::routes();

        ...

   database/seeds/DatabaseSeeder.php

    public function run()
    {
        ...
        $this->call(LangsTableSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(UserSeeder::class);
        
    }

    
       composer dump-autoload
 
       php artisan migrate --seed

بعد الانتهاء من الخطوات السابقة ادخل على رابط 

  adminpanel 
  
وقم بتسجيل الدخول  بهذا الحساب

  user : alfurat.eg@gmail.com

  pass : 123456
