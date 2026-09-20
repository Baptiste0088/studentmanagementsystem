<?php
declare(strict_types=1);

return [
    <<<'SQL'
CREATE TABLE IF NOT EXISTS users (
    user_id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    email VARCHAR(191) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(32) NOT NULL,
    status VARCHAR(32) NOT NULL DEFAULT 'active',
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (user_id),
    UNIQUE KEY users_email_unique (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
SQL,
    <<<'SQL'
CREATE TABLE IF NOT EXISTS admission_letter (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    student_sdms_code VARCHAR(100) NOT NULL,
    full_name VARCHAR(191) NOT NULL,
    email_address VARCHAR(191) NOT NULL,
    gender VARCHAR(32) NOT NULL,
    phone_number VARCHAR(50) NOT NULL,
    trade_program VARCHAR(191) NOT NULL,
    academic_year VARCHAR(32) NOT NULL,
    term VARCHAR(32) NOT NULL,
    requested_level VARCHAR(64) NOT NULL,
    result_slip VARCHAR(500) NOT NULL DEFAULT '',
    purpose_of_admission_letter VARCHAR(255) NOT NULL,
    additional_comments TEXT NULL,
    request_status VARCHAR(32) NOT NULL DEFAULT 'Pending',
    submitted_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    KEY admission_letter_email_index (email_address),
    KEY admission_letter_status_index (request_status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
SQL,
    <<<'SQL'
CREATE TABLE IF NOT EXISTS request_reply (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    admission_letter_id BIGINT UNSIGNED NOT NULL,
    reply_status VARCHAR(32) NOT NULL,
    admission_letter VARCHAR(500) NOT NULL DEFAULT '',
    reply_message TEXT NULL,
    responded_by VARCHAR(191) NULL,
    response_date DATE NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    KEY request_reply_admission_index (admission_letter_id),
    CONSTRAINT request_reply_admission_foreign
        FOREIGN KEY (admission_letter_id) REFERENCES admission_letter (id)
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
SQL,
    <<<'SQL'
CREATE TABLE IF NOT EXISTS suggestions (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    telephone VARCHAR(50) NOT NULL,
    message TEXT NOT NULL,
    status VARCHAR(32) NOT NULL DEFAULT 'new',
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    KEY suggestions_status_index (status),
    KEY suggestions_created_at_index (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
SQL,
];
