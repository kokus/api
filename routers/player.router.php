<?php

// GET Players route
$app->get('/player', function () use ($app) {
    $oPlayer = new models\Player();
    $players = $oPlayer->getPlayers();
	$app->contentType('application/json');
	$json = json_encode($players);
	//echo pretty_json($json);
	echo '{"Players": ' . pretty_json($json) . '}';

});


// GET Players by id route
$app->get('/player/:id', function ($id) use ($app) {
	$oPlayer = new models\Player();
    $players = $oPlayer->getPlayerById($id);
    $app->contentType('application/json');
    $json = json_encode($players);
	echo pretty_json($json);
});


/*$app->get('/listplayers', function () use ($app) {
    $oPlayer = new models\Player();
    $Players = $oPlayer->getPlayers();
    $app->render('playerview.html', array('pageTitle'=>'A list of Players', 'Playerlist' => $Players));
});*/





