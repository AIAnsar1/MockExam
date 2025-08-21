-- Create additional databases for testing
CREATE DATABASE mockexam_test;

-- Grant privileges
GRANT ALL PRIVILEGES ON DATABASE mockexam TO postgres;
GRANT ALL PRIVILEGES ON DATABASE mockexam_test TO postgres;

-- Create extensions if needed
\c mockexam;
CREATE EXTENSION IF NOT EXISTS "uuid-ossp";

\c mockexam_test;
CREATE EXTENSION IF NOT EXISTS "uuid-ossp";
