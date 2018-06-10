<?php defined('SUPERFAST') OR exit('Direct access denied');

$app->preload(function ($request, $response, $app) {
	// Called when every request
});

$app->method('/login', function ($request, $response, $app) {
	// Called when if user sent POST to /login

	$result = $app->db->select('users', '*', array(
		'username' => $request->post('username'),
		'password' => md5($request->post('password'))
	))->first();

	$response->json->status = $result != NULL;
	$response->json->profile = $result;
	$response->write_json();
});