<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

$params = [
    'middleware' => ['web'],
    'prefix' => 'admpanel',
    'namespace' => 'Admin'
];

Route::group($params, function () {

    Route::get('/login', ['middleware' => 'guest:admin', 'uses' => 'AccountController@login', 'as' => 'admin_login']);
    Route::post('/login', ['uses' => 'AccountController@loginApi', 'as' => 'admin_login_api']);

    Route::group(['middleware' => ['auth:admin', 'language']], function () {

        Route::get('/', 'IndexController@index');
        Route::get('/logout', ['uses' => 'AccountController@logout', 'as' => 'admin_logout']);

        Route::get('/admin', ['uses' => 'AdminController@table', 'as' => 'admin_table']);
        Route::get('/admin/create', ['uses' => 'AdminController@create', 'as' => 'admin_create']);
        Route::get('/admin/edit/{id}', ['uses' => 'AdminController@edit', 'as' => 'admin_edit']);
        Route::post('/admin', ['uses' => 'AdminController@index', 'as' => 'admin_index']);
        Route::post('/admin/store', ['uses' => 'AdminController@store', 'as' => 'admin_store']);
        Route::post('/admin/update/{id}', ['uses' => 'AdminController@update', 'as' => 'admin_update']);
        Route::post('/admin/delete/{id}', ['uses' => 'AdminController@delete', 'as' => 'admin_delete']);

        Route::get('/language', ['uses' => 'LanguageController@table', 'as' => 'admin_language_table']);
        Route::get('/language/create', ['uses' => 'LanguageController@create', 'as' => 'admin_language_create']);
        Route::get('/language/edit/{id}', ['uses' => 'LanguageController@edit', 'as' => 'admin_language_edit']);
        Route::post('/language', ['uses' => 'LanguageController@index', 'as' => 'admin_language_index']);
        Route::post('/language/store', ['uses' => 'LanguageController@store', 'as' => 'admin_language_store']);
        Route::post('/language/update/{id}', ['uses' => 'LanguageController@update', 'as' => 'admin_language_update']);
        Route::post('/language/delete/{id}', ['uses' => 'LanguageController@delete', 'as' => 'admin_language_delete']);

        Route::get('/dictionary', ['uses' => 'DictionaryController@table', 'as' => 'admin_dictionary_table']);
        Route::post('/dictionary', ['uses' => 'DictionaryController@index', 'as' => 'admin_dictionary_index']);
        Route::post('/dictionary/store', ['uses' => 'DictionaryController@store', 'as' => 'admin_dictionary_store']);
        Route::post('/dictionary/update', ['uses' => 'DictionaryController@update', 'as' => 'admin_dictionary_update']);
        Route::post('/dictionary/delete', ['uses' => 'DictionaryController@delete', 'as' => 'admin_dictionary_delete']);

        /**********************************************************/

        Route::get('/mark', ['uses' => 'MarkController@table', 'as' => 'admin_mark_table']);
        Route::get('/mark/create', ['uses' => 'MarkController@create', 'as' => 'admin_mark_create']);
        Route::get('/mark/edit/{id}', ['uses' => 'MarkController@edit', 'as' => 'admin_mark_edit']);
        Route::post('/mark', ['uses' => 'MarkController@index', 'as' => 'admin_mark_index']);
        Route::post('/mark/store', ['uses' => 'MarkController@store', 'as' => 'admin_mark_store']);
        Route::post('/mark/update/{id}', ['uses' => 'MarkController@update', 'as' => 'admin_mark_update']);
        Route::post('/mark/delete/{id}', ['uses' => 'MarkController@delete', 'as' => 'admin_mark_delete']);

        Route::get('/modelCategory', ['uses' => 'ModelCategoryController@table', 'as' => 'admin_model_category_table']);
        Route::get('/modelCategory/create', ['uses' => 'ModelCategoryController@create', 'as' => 'admin_model_category_create']);
        Route::get('/modelCategory/edit/{id}', ['uses' => 'ModelCategoryController@edit', 'as' => 'admin_model_category_edit']);
        Route::post('/modelCategory', ['uses' => 'ModelCategoryController@index', 'as' => 'admin_model_category_index']);
        Route::post('/modelCategory/store', ['uses' => 'ModelCategoryController@store', 'as' => 'admin_model_category_store']);
        Route::post('/modelCategory/update/{id}', ['uses' => 'ModelCategoryController@update', 'as' => 'admin_model_category_update']);
        Route::post('/modelCategory/delete/{id}', ['uses' => 'ModelCategoryController@delete', 'as' => 'admin_model_category_delete']);
        Route::post('/api/modelCategory/get', ['uses' => 'ModelCategoryController@get']);

        Route::get('/model', ['uses' => 'ModelController@table', 'as' => 'admin_model_table']);
        Route::get('/model/create', ['uses' => 'ModelController@create', 'as' => 'admin_model_create']);
        Route::get('/model/edit/{id}', ['uses' => 'ModelController@edit', 'as' => 'admin_model_edit']);
        Route::post('/model', ['uses' => 'ModelController@index', 'as' => 'admin_model_index']);
        Route::post('/model/store', ['uses' => 'ModelController@store', 'as' => 'admin_model_store']);
        Route::post('/model/update/{id}', ['uses' => 'ModelController@update', 'as' => 'admin_model_update']);
        Route::post('/model/delete/{id}', ['uses' => 'ModelController@delete', 'as' => 'admin_model_delete']);

        Route::get('/body', ['uses' => 'BodyController@table', 'as' => 'admin_body_table']);
        Route::get('/body/create', ['uses' => 'BodyController@create', 'as' => 'admin_body_create']);
        Route::get('/body/edit/{id}', ['uses' => 'BodyController@edit', 'as' => 'admin_body_edit']);
        Route::post('/body', ['uses' => 'BodyController@index', 'as' => 'admin_body_index']);
        Route::post('/body/store', ['uses' => 'BodyController@store', 'as' => 'admin_body_store']);
        Route::post('/body/update/{id}', ['uses' => 'BodyController@update', 'as' => 'admin_body_update']);
        Route::post('/body/delete/{id}', ['uses' => 'BodyController@delete', 'as' => 'admin_body_delete']);

        Route::get('/rudder', ['uses' => 'RudderController@table', 'as' => 'admin_rudder_table']);
        Route::get('/rudder/create', ['uses' => 'RudderController@create', 'as' => 'admin_rudder_create']);
        Route::get('/rudder/edit/{id}', ['uses' => 'RudderController@edit', 'as' => 'admin_rudder_edit']);
        Route::post('/rudder', ['uses' => 'RudderController@index', 'as' => 'admin_rudder_index']);
        Route::post('/rudder/store', ['uses' => 'RudderController@store', 'as' => 'admin_rudder_store']);
        Route::post('/rudder/update/{id}', ['uses' => 'RudderController@update', 'as' => 'admin_rudder_update']);
        Route::post('/rudder/delete/{id}', ['uses' => 'RudderController@delete', 'as' => 'admin_rudder_delete']);

        Route::get('/color', ['uses' => 'ColorController@table', 'as' => 'admin_color_table']);
        Route::get('/color/create', ['uses' => 'ColorController@create', 'as' => 'admin_color_create']);
        Route::get('/color/edit/{id}', ['uses' => 'ColorController@edit', 'as' => 'admin_color_edit']);
        Route::post('/color', ['uses' => 'ColorController@index', 'as' => 'admin_color_index']);
        Route::post('/color/store', ['uses' => 'ColorController@store', 'as' => 'admin_color_store']);
        Route::post('/color/update/{id}', ['uses' => 'ColorController@update', 'as' => 'admin_color_update']);
        Route::post('/color/delete/{id}', ['uses' => 'ColorController@delete', 'as' => 'admin_color_delete']);

        Route::get('/interiorColor', ['uses' => 'InteriorColorController@table', 'as' => 'admin_interior_color_table']);
        Route::get('/interiorColor/create', ['uses' => 'InteriorColorController@create', 'as' => 'admin_interior_color_create']);
        Route::get('/interiorColor/edit/{id}', ['uses' => 'InteriorColorController@edit', 'as' => 'admin_interior_color_edit']);
        Route::post('/interiorColor', ['uses' => 'InteriorColorController@index', 'as' => 'admin_interior_color_index']);
        Route::post('/interiorColor/store', ['uses' => 'InteriorColorController@store', 'as' => 'admin_interior_color_store']);
        Route::post('/interiorColor/update/{id}', ['uses' => 'InteriorColorController@update', 'as' => 'admin_interior_color_update']);
        Route::post('/interiorColor/delete/{id}', ['uses' => 'InteriorColorController@delete', 'as' => 'admin_interior_color_delete']);

        Route::get('/transmission', ['uses' => 'TransmissionController@table', 'as' => 'admin_transmission_table']);
        Route::get('/transmission/create', ['uses' => 'TransmissionController@create', 'as' => 'admin_transmission_create']);
        Route::get('/transmission/edit/{id}', ['uses' => 'TransmissionController@edit', 'as' => 'admin_transmission_edit']);
        Route::post('/transmission', ['uses' => 'TransmissionController@index', 'as' => 'admin_transmission_index']);
        Route::post('/transmission/store', ['uses' => 'TransmissionController@store', 'as' => 'admin_transmission_store']);
        Route::post('/transmission/update/{id}', ['uses' => 'TransmissionController@update', 'as' => 'admin_transmission_update']);
        Route::post('/transmission/delete/{id}', ['uses' => 'TransmissionController@delete', 'as' => 'admin_transmission_delete']);

        Route::get('/engine', ['uses' => 'EngineController@table', 'as' => 'admin_engine_table']);
        Route::get('/engine/create', ['uses' => 'EngineController@create', 'as' => 'admin_engine_create']);
        Route::get('/engine/edit/{id}', ['uses' => 'EngineController@edit', 'as' => 'admin_engine_edit']);
        Route::post('/engine', ['uses' => 'EngineController@index', 'as' => 'admin_engine_index']);
        Route::post('/engine/store', ['uses' => 'EngineController@store', 'as' => 'admin_engine_store']);
        Route::post('/engine/update/{id}', ['uses' => 'EngineController@update', 'as' => 'admin_engine_update']);
        Route::post('/engine/delete/{id}', ['uses' => 'EngineController@delete', 'as' => 'admin_engine_delete']);

        Route::get('/cylinder', ['uses' => 'CylinderController@table', 'as' => 'admin_cylinder_table']);
        Route::get('/cylinder/create', ['uses' => 'CylinderController@create', 'as' => 'admin_cylinder_create']);
        Route::get('/cylinder/edit/{id}', ['uses' => 'CylinderController@edit', 'as' => 'admin_cylinder_edit']);
        Route::post('/cylinder', ['uses' => 'CylinderController@index', 'as' => 'admin_cylinder_index']);
        Route::post('/cylinder/store', ['uses' => 'CylinderController@store', 'as' => 'admin_cylinder_store']);
        Route::post('/cylinder/update/{id}', ['uses' => 'CylinderController@update', 'as' => 'admin_cylinder_update']);
        Route::post('/cylinder/delete/{id}', ['uses' => 'CylinderController@delete', 'as' => 'admin_cylinder_delete']);

        Route::get('/train', ['uses' => 'TrainController@table', 'as' => 'admin_train_table']);
        Route::get('/train/create', ['uses' => 'TrainController@create', 'as' => 'admin_train_create']);
        Route::get('/train/edit/{id}', ['uses' => 'TrainController@edit', 'as' => 'admin_train_edit']);
        Route::post('/train', ['uses' => 'TrainController@index', 'as' => 'admin_train_index']);
        Route::post('/train/store', ['uses' => 'TrainController@store', 'as' => 'admin_train_store']);
        Route::post('/train/update/{id}', ['uses' => 'TrainController@update', 'as' => 'admin_train_update']);
        Route::post('/train/delete/{id}', ['uses' => 'TrainController@delete', 'as' => 'admin_train_delete']);

        Route::get('/door', ['uses' => 'DoorController@table', 'as' => 'admin_door_table']);
        Route::get('/door/create', ['uses' => 'DoorController@create', 'as' => 'admin_door_create']);
        Route::get('/door/edit/{id}', ['uses' => 'DoorController@edit', 'as' => 'admin_door_edit']);
        Route::post('/door', ['uses' => 'DoorController@index', 'as' => 'admin_door_index']);
        Route::post('/door/store', ['uses' => 'DoorController@store', 'as' => 'admin_door_store']);
        Route::post('/door/update/{id}', ['uses' => 'DoorController@update', 'as' => 'admin_door_update']);
        Route::post('/door/delete/{id}', ['uses' => 'DoorController@delete', 'as' => 'admin_door_delete']);

        Route::get('/wheel', ['uses' => 'WheelController@table', 'as' => 'admin_wheel_table']);
        Route::get('/wheel/create', ['uses' => 'WheelController@create', 'as' => 'admin_wheel_create']);
        Route::get('/wheel/edit/{id}', ['uses' => 'WheelController@edit', 'as' => 'admin_wheel_edit']);
        Route::post('/wheel', ['uses' => 'WheelController@index', 'as' => 'admin_wheel_index']);
        Route::post('/wheel/store', ['uses' => 'WheelController@store', 'as' => 'admin_wheel_store']);
        Route::post('/wheel/update/{id}', ['uses' => 'WheelController@update', 'as' => 'admin_wheel_update']);
        Route::post('/wheel/delete/{id}', ['uses' => 'WheelController@delete', 'as' => 'admin_wheel_delete']);

        Route::get('/country', ['uses' => 'CountryController@table', 'as' => 'admin_country_table']);
        Route::get('/country/create', ['uses' => 'CountryController@create', 'as' => 'admin_country_create']);
        Route::get('/country/edit/{id}', ['uses' => 'CountryController@edit', 'as' => 'admin_country_edit']);
        Route::post('/country', ['uses' => 'CountryController@index', 'as' => 'admin_country_index']);
        Route::post('/country/store', ['uses' => 'CountryController@store', 'as' => 'admin_country_store']);
        Route::post('/country/update/{id}', ['uses' => 'CountryController@update', 'as' => 'admin_country_update']);
        Route::post('/country/delete/{id}', ['uses' => 'CountryController@delete', 'as' => 'admin_country_delete']);

        Route::get('/region', ['uses' => 'RegionController@table', 'as' => 'admin_region_table']);
        Route::get('/region/create', ['uses' => 'RegionController@create', 'as' => 'admin_region_create']);
        Route::get('/region/edit/{id}', ['uses' => 'RegionController@edit', 'as' => 'admin_region_edit']);
        Route::post('/region', ['uses' => 'RegionController@index', 'as' => 'admin_region_index']);
        Route::post('/region/store', ['uses' => 'RegionController@store', 'as' => 'admin_region_store']);
        Route::post('/region/update/{id}', ['uses' => 'RegionController@update', 'as' => 'admin_region_update']);
        Route::post('/region/delete/{id}', ['uses' => 'RegionController@delete', 'as' => 'admin_region_delete']);
    });

});
