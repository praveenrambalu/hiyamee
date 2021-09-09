pipeline {
    agent any
    stages {
            stage('deploy') {
            agent any
            steps {
                sshagent ( ['hiyamee-tracker-prod']) {
    sh '''
ssh ubuntu@18.219.134.185
'''
  }
            }
        }


}
}