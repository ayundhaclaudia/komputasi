pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                git branch: 'main',
                    url: 'https://github.com/ayundhaclaudia/komputasi.git'
            }
        }

        stage('Build') {
            steps {
                echo 'Build process berjalan'
            }
        }
    }
}
