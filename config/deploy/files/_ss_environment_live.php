<?php

date_default_timezone_set( 'Europe/London' );

/* What kind of environment is this: development, test, or live (ie, production)? */
define( 'SS_ENVIRONMENT_TYPE','live' );

/* Database connection */
define( 'SS_DATABASE_SERVER'  ,'localhost' );
define( 'SS_DATABASE_USERNAME','helixnexus' );
define( 'SS_DATABASE_PASSWORD','' );

/* Configure a default username and password to access the CMS on all sites in this environment. */
define( 'SS_DEFAULT_ADMIN_USERNAME','admin' );
define( 'SS_DEFAULT_ADMIN_PASSWORD','' );

global $_FILE_TO_URL_MAPPING;

$_FILE_TO_URL_MAPPING['/var/www/html/helixnexus.uk/current/public'] = 'http://helixnexus.uk';
