pipeline {
     agent any
        stage("Deploy") {
            steps {
               sshagent(['hiyamee-tracker-prod']) {
    -               sh '''
                    cd /var/www/html/hiyamee-tracker
                    git checkout laravel-app
                    git pull
                    composer install
                    php artisan migrate
                    '''
                }
            }
        }
    }
