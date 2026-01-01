pipeline {
    agent any

    stages {
        stage('Checkout SCM') {
            steps {
                checkout scm
            }
        }

        stage('Build Docker Image') {
            steps {
                sh 'docker build -t komputasi-image .'
            }
        }

        stage('Run Tests (Optional)') {
            steps {
                sh 'echo "Testing application..."'
            }
        }

        stage('Deploy') {
            steps {
                sh 'echo "Deploy step here"'
            }
        }
    }
}
