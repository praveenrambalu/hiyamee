pipeline {
    agent any
    stages {
            stage('deploy') {
            agent any
            steps {
                sshagent ( ['hiyamee-tracker-prod']) {
    script { sh '''
cd /var/www/html/hiyamee-tracker
'''
    }
  }
            }
        }


}
}