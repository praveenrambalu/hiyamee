pipeline {
     agent any
        stage("Deploy") {
            steps {
               sshagent(['hiyamee-tracker-prod']) {
    -               sh "cd /var/www/html/hiyamee-tracker"
                    sh "git checkout laravel-app"
                    sh "git pull"
                    sh "composer install"
                    sh "php artisan migrate"
                }
            }
        }
    }
