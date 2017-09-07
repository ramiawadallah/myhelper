composer require "rami-awadallah/myhelpers":"@dev"
   
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
      	group(['prefix'=>cpanel,'middleware'=>'auth'],function(){
      		get('/', 'Cpanel\HomeController@index','cpanel.home');
      		get('settings/languages', 'Settings\LangController@index','lang.index');
      		get('settings/main_settings', 'Settings\MainController@index','main.settings');
      		post('settings/main_settings', 'Settings\MainController@store','main.settings.store');
      
      		post('settings/lang/create', 'Settings\LangController@create','lang.create');
      		post('settings/lang/{id}/edit', 'Settings\LangController@update','lang.edit');
      		post('settings/lang/update_files', 'Settings\LangController@updateFiles','lang.updateFiles');
      		post('settings/lang/flug', 'Settings\LangController@updateFlug','lang.updateFlug');
      		post('settings/lang/delete', 'Settings\LangController@deleteLang','lang.deleteLang');
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
