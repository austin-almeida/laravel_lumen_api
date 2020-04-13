<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->post('/', function () use ($router) {
    //return $router->app->version();
	echo "here";
});

$router->post('/login', 'ExampleController@postLogin');
$router->get('like','UserController@test');
$router->post('order','ProductController@create');
$router->post('ordel','UserController@order1');
$router->get('candidate','ExaminfoController@examCandidate');
$router->get('candidate/{id}','ExaminfoController@examCandidateShow');
$router->get('question','QuestionController@question');
$router->get('question/{quiz_id}','QuestionController@questionShow');
$router->get('questionS/{quiz_id}','QuestionController@questionSelect');
$router->get('answer','AsnwerController@answer');
$router->get('answers/{id}','AsnwerController@answerFind');
$router->get('answerResult/{stu_id}','AsnwerController@answerResult');
$router->get('answerCheck/{stu_id}','AsnwerController@answerCheck');


$router->group(['middleware'=>"auth"],function($router){
	$router->post('/test', 'ExampleController@test');
});
