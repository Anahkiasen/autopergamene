<?php

//////////////////////////////////////////////////////////////////////
///////////////////////////// DEPLOYMENT /////////////////////////////
//////////////////////////////////////////////////////////////////////

Rocketeer::after('deploy', function ($task) {
	$task->command->comment('Building assets');
	$task->runForCurrentRelease(['npm install', 'node node_modules/.bin/bower install', 'node node_modules/.bin/grunt production']);
});
