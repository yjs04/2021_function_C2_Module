<?php

use App\Router;

Router::get("/","ViewController@index");
Router::get("/phone","ViewController@phone");
Router::get("/history","ViewController@history");
Router::get("/cultures","ViewController@cultures");
Router::get("/addCulture","ViewController@addCulture");
Router::get("/modCulture/{id}","ViewController@modCulture");
Router::get("/monthShow","ViewController@monthShow");
Router::get("/yearShow","ViewController@yearShow");
Router::get("/modShow/{id}","ViewController@modShow");
Router::get("/addShow","ViewController@addShow");
Router::get("/openCulture","ViewController@openCulture");
Router::get("/openShow","ViewController@openShow");
Router::get("/openAPI/nihList.php","ApiController@nihList");
Router::get("/openAPI/showList.php","ApiController@showList");

Router::post("/addCultureProccess","ActionController@addCultureProccess");
Router::get("/delCultureProccess/{id}","ActionController@delCultureProccess");
Router::post("/modCultureProccess/{id}","ActionController@modCultureProccess");
Router::post("/addShowProccess","ActionController@addShowProccess");
Router::post("/modShowProccess","ActionController@modShowProccess");
Router::get("/delShowProccess","ActionController@delShowProccess");
Router::get("/imageLoad","ActionController@imageLoad");

Router::start();