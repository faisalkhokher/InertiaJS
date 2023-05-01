<?php

namespace Deployer;

require 'recipe/laravel.php';
require 'contrib/php-fpm.php';
require 'contrib/npm.php';

set('application', 'mylaravelapp');
set('repository', 'git@github.com:faisalkhokher/Vue-Inertia.git');
set('php_fpm_version', '8.0');

host('prod')
    ->set('remote_user', 'root')
    ->set('hostname', '18.118.93.181')
    ->set('deploy_path', '/var/www/Vue-Inertia');

task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:view:cache',
    'artisan:config:cache',
    'artisan:migrate',
    'npm:install',
    'npm:run:prod',
    'deploy:publish',
    'php-fpm:reload',
]);

task('npm:run:prod', function () {
    cd('/var/www/Vue-Inertia');
    run('npm run prod');
});

after('deploy:failed', 'deploy:unlock');