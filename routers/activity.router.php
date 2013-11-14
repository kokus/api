<?php

// GET teams route
$app->get('/alerts', function () use ($app) {
    $oActivity = new models\Activity();
    $activities = $oActivity->getActivities();
	$app->contentType('application/json');
	$json = json_encode($activities);
	//echo pretty_json($json);
	echo '{"alerts": ' . pretty_json($json) . '}';
});

