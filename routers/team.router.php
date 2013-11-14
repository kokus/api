<?php

// GET teams route
$app->get('/team', function () use ($app) {
    $oTeam = new models\Team();
    $teams = $oTeam->getTeams();
	$app->contentType('application/json');
	$json = json_encode($teams);
	//echo pretty_json($json);
	echo '{"teams": ' . pretty_json($json) . '}';

});


// GET teams by id route
$app->get('/team/:id', function ($id) use ($app) {
	$oTeam = new models\Team();
    $teams = $oTeam->getTeamById($id);
    $app->contentType('application/json');
    $json = json_encode($teams);
	echo pretty_json($json);
});


$app->get('/listteams', function () use ($app) {
    $oTeam = new models\Team();
    $teams = $oTeam->getTeams();
    $app->render('teamview.html', array('pageTitle'=>'A list of Teams', 'teamlist' => $teams));
});





