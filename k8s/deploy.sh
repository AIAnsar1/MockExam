#!/bin/bash

# Kubernetes deployment script for MockExam Laravel application
set -e

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Configuration
NAMESPACE="mockexam"
KUBECTL_CMD="kubectl"

# Functions
log_info() {
    echo -e "${GREEN}[INFO]${NC} $1"
}

log_warn() {
    echo -e "${YELLOW}[WARN]${NC} $1"
}

log_error() {
    echo -e "${RED}[ERROR]${NC} $1"
}

check_kubectl() {
    if ! command -v kubectl &> /dev/null; then
        log_error "kubectl is not installed or not in PATH"
        exit 1
    fi
    log_info "kubectl is available"
}

check_cluster_connection() {
    if ! kubectl cluster-info &> /dev/null; then
        log_error "Cannot connect to Kubernetes cluster"
        exit 1
    fi
    log_info "Connected to Kubernetes cluster"
}

create_namespace() {
    log_info "Creating namespace: $NAMESPACE"
    kubectl apply -f namespace.yaml
}

deploy_secrets() {
    log_info "Deploying secrets..."
    if [ -f "secret.yaml" ]; then
        kubectl apply -f secret.yaml
    else
        log_warn "secret.yaml not found, skipping secrets deployment"
    fi
}

deploy_configmaps() {
    log_info "Deploying ConfigMaps..."
    kubectl apply -f configmap.yaml
}

deploy_postgres() {
    log_info "Deploying PostgreSQL..."
    kubectl apply -f postgres-deployment.yaml
    
    log_info "Waiting for PostgreSQL to be ready..."
    kubectl wait --for=condition=available --timeout=300s deployment/postgres-deployment -n $NAMESPACE
}

deploy_redis() {
    log_info "Deploying Redis..."
    kubectl apply -f redis-deployment.yaml
    
    log_info "Waiting for Redis to be ready..."
    kubectl wait --for=condition=available --timeout=300s deployment/redis-deployment -n $NAMESPACE
}

deploy_app() {
    log_info "Deploying MockExam application..."
    kubectl apply -f app-deployment.yaml
    
    log_info "Waiting for application to be ready..."
    kubectl wait --for=condition=available --timeout=600s deployment/mockexam-app-deployment -n $NAMESPACE
}

deploy_ingress() {
    log_info "Deploying Ingress..."
    kubectl apply -f ingress.yaml
}

deploy_hpa() {
    log_info "Deploying Horizontal Pod Autoscaler..."
    kubectl apply -f hpa.yaml
}

deploy_monitoring() {
    log_info "Deploying monitoring resources..."
    if kubectl get crd servicemonitors.monitoring.coreos.com &> /dev/null; then
        kubectl apply -f monitoring.yaml
    else
        log_warn "Prometheus Operator CRDs not found, skipping monitoring deployment"
    fi
}

show_status() {
    log_info "Deployment Status:"
    echo
    kubectl get pods -n $NAMESPACE
    echo
    kubectl get services -n $NAMESPACE
    echo
    kubectl get ingress -n $NAMESPACE
}

rollback() {
    log_warn "Rolling back deployment..."
    kubectl rollout undo deployment/mockexam-app-deployment -n $NAMESPACE
}

# Main deployment function
main() {
    log_info "Starting MockExam Kubernetes deployment..."
    
    check_kubectl
    check_cluster_connection
    
    case "${1:-deploy}" in
        "deploy")
            create_namespace
            deploy_secrets
            deploy_configmaps
            deploy_postgres
            deploy_redis
            deploy_app
            deploy_ingress
            deploy_hpa
            deploy_monitoring
            show_status
            log_info "Deployment completed successfully!"
            ;;
        "rollback")
            rollback
            log_info "Rollback completed!"
            ;;
        "status")
            show_status
            ;;
        "clean")
            log_warn "Cleaning up all resources..."
            kubectl delete namespace $NAMESPACE
            log_info "Cleanup completed!"
            ;;
        *)
            echo "Usage: $0 {deploy|rollback|status|clean}"
            echo "  deploy   - Deploy all resources"
            echo "  rollback - Rollback application deployment"
            echo "  status   - Show deployment status"
            echo "  clean    - Delete all resources"
            exit 1
            ;;
    esac
}

# Run main function with all arguments
main "$@"
