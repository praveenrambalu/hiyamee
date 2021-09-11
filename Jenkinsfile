pipeline {
    agent any
    stages {
            stage('deploy') {
            agent any
            steps {
                sshPublisher(publishers: [sshPublisherDesc(configName: 'Hiyamee ATS', transfers: [sshTransfer(cleanRemote: false, excludes: '', execCommand: 'apt-get-update', execTimeout: 120000, flatten: false, makeEmptyDirs: false, noDefaultExcludes: false, patternSeparator: '[, ]+', remoteDirectory: '/var/www/html/hiyamee-tracker', remoteDirectorySDF: false, removePrefix: '', sourceFiles: '*')], usePromotionTimestamp: false, useWorkspaceInPromotion: false, verbose: false)])
            }
        }


}
}