AMP Generator functionality
============

This is a plugin to generate boilerplate code based on the original AMP project.

#### Composer Install

    "require": {
        "agandra/amp": "dev-master"
    }

#### Import config setting and run migrations

	php artisan config:publish agandra/amp

#### Run migrations
	
	php artisan migrate --package=agandra/amp-generator

#### Commands to generate boilerplate code

Please make sure you set the values in the config file before running commands.

	php artisan amp:users
	php artisan amp:auth