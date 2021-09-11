pipeline {
    agent any
    stages {

            stage('build'){
                agent any
                steps {
                archiveArtifacts artifacts:'**/*.*', followSymlinks: false
                }
            }

            stage('deploy') {
            agent any
            steps {
                sshPublisher(publishers: [sshPublisherDesc(configName: 'Hiyamee ATS', transfers: [sshTransfer(cleanRemote: false, excludes: '', execCommand:'', execTimeout: 120000, flatten: false, makeEmptyDirs: false, noDefaultExcludes: false, patternSeparator: '[, ]+', remoteDirectory: '/var/www/html/', remoteDirectorySDF: false, removePrefix: '', sourceFiles: '*/')], usePromotionTimestamp: false, useWorkspaceInPromotion: false, verbose: true)])
            }
        }


}
}