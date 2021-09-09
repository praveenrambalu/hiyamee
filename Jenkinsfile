pipeline {
     agent any
        stage("Deploy") {
            steps {
                sshPublisher(publishers: [sshPublisherDesc(configName: 'Hiyamee ATS', transfers: [sshTransfer(cleanRemote: false, excludes: '', execCommand: 'apt-get update', execTimeout: 120000, flatten: false, makeEmptyDirs: false, noDefaultExcludes: false, patternSeparator: '[, ]+', remoteDirectory: '', remoteDirectorySDF: false, removePrefix: '', sourceFiles: '*.war')], usePromotionTimestamp: false, useWorkspaceInPromotion: false, verbose: false)])
            }
        }
    }
