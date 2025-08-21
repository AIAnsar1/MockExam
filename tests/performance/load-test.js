import http from 'k6/http';
import { check, sleep } from 'k6';
import { Rate } from 'k6/metrics';

export let errorRate = new Rate('errors');

export let options = {
  stages: [
    { duration: '2m', target: 10 }, // Ramp up to 10 users
    { duration: '5m', target: 10 }, // Stay at 10 users
    { duration: '2m', target: 20 }, // Ramp up to 20 users
    { duration: '5m', target: 20 }, // Stay at 20 users
    { duration: '2m', target: 0 },  // Ramp down to 0 users
  ],
  thresholds: {
    http_req_duration: ['p(95)<500'], // 95% of requests must complete below 500ms
    errors: ['rate<0.1'], // Error rate must be below 10%
  },
};

const BASE_URL = __ENV.BASE_URL || 'http://localhost:8000';

export default function () {
  // Test homepage
  let homeResponse = http.get(`${BASE_URL}/`);
  check(homeResponse, {
    'homepage status is 200': (r) => r.status === 200,
    'homepage response time < 500ms': (r) => r.timings.duration < 500,
  });
  errorRate.add(homeResponse.status !== 200);

  sleep(1);

  // Test API health endpoint
  let healthResponse = http.get(`${BASE_URL}/api/health`);
  check(healthResponse, {
    'health endpoint status is 200': (r) => r.status === 200,
    'health endpoint response time < 200ms': (r) => r.timings.duration < 200,
  });
  errorRate.add(healthResponse.status !== 200);

  sleep(1);

  // Test courses API
  let coursesResponse = http.get(`${BASE_URL}/api/courses`);
  check(coursesResponse, {
    'courses API status is 200': (r) => r.status === 200,
    'courses API response time < 1000ms': (r) => r.timings.duration < 1000,
    'courses API returns JSON': (r) => r.headers['Content-Type'].includes('application/json'),
  });
  errorRate.add(coursesResponse.status !== 200);

  sleep(1);

  // Test exams API
  let examsResponse = http.get(`${BASE_URL}/api/exams`);
  check(examsResponse, {
    'exams API status is 200': (r) => r.status === 200,
    'exams API response time < 1000ms': (r) => r.timings.duration < 1000,
  });
  errorRate.add(examsResponse.status !== 200);

  sleep(2);
}
