pipeline {
    agent any
    stages {
            stage('deploy') {
            agent any
            steps {
                sshagent ( ['hiyamee-tracker-prod']) {
    script { sh '''
    [ -d ~/.ssh ] || mkdir ~/.ssh && chmod 0700 ~/.ssh
    ssh-keyscan -t rsa,dsa 18.219.134.185 >> ~/.ssh/known_hosts
    ssh -tt ubuntu@18.219.134.185
    cd /var/www/html/hiyamee-tracker
    git checkout laravel-app
    git pull
    composer install
    php artisan migrate
    exit
'''
    }
  }
            }
        }


}
}