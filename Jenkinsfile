pipeline {
    agent any
    stages {
            stage('deploy') {
            agent any
            steps {
                sshagent ( ['hiyamee-tracker-prod']) {
    script { sh '''
ssh -v ubuntu@18.219.134.185
'''
    }
  }
            }
        }


}
}