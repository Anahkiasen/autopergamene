<?php

//////////////////////////////////////////////////////////////////////
///////////////////////////// DEPLOYMENT /////////////////////////////
//////////////////////////////////////////////////////////////////////

Rocketeer::listenTo('deploy.before-symlink', array(
    'node_modules/.bin/grunt production'
));
