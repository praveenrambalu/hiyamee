pipeline {
     agent any
        stage("Deploy") {
            steps {
               sshagent(credentials: ['hiyamee-tracker-prod']) {
                   script{
    -               sh "cd /var/www/html/hiyamee-tracker"
                   }
                }
            }
        }
    }
