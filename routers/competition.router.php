<?php

// GET competitions route
$app->get('/competition', function () use ($app) {
    $oCompetition = new models\Competition();
    $competitions = $oCompetition->getCompetitions();
	$app->contentType('application/json');
	$json = json_encode($competitions);
	//echo pretty_json($json);
	echo '{"competitions": ' . pretty_json($json) . '}';

});


// GET competitions by id route
$app->get('/competition/:id', function ($id) use ($app) {
	$oCompetition = new models\Competition();
    $competitions = $oCompetition->getCompetitionById($id);
    $app->contentType('application/json');
    $json = json_encode($competitions);
	echo pretty_json($json);
});


/*$app->get('/listcompetitions', function () use ($app) {
    $ocompetition = new models\competition();
    $competitions = $ocompetition->getcompetitions();
    $app->render('competitionview.html', array('pageTitle'=>'A list of competitions', 'competitionlist' => $competitions));
});*/





