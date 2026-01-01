pipeline {
  agent any

  stages {
    stage('Checkout') {
      steps {
        git credentialsId: 'github-token', url: 'https://github.com/ayundhaclaudia/komputasi.git'
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
    stage('Push to Registry / Deploy') {
      steps {
        sh 'echo "Deploy step here"'
      }
    }
  }
}
