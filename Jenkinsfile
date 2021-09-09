pipeline {
     agent any
     stages{
        stage("Deploy") {
            steps {
               sshagent(['hiyamee-tracker-prod']) {
    -               sh "cd /var/www/html/hiyamee-tracker"
                    
                }
            }
        }
    }
}

