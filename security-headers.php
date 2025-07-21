<?php
/**
 * ========================================
 * SECURITY HEADERS FOR PHP
 * Digital Business Card - Habib Frambudi
 * ========================================
 * 
 * Include this file at the top of your PHP files
 * or in your main configuration file
 */

// Prevent direct access to this file
if (basename(__FILE__) == basename($_SERVER['SCRIPT_NAME'])) {
    http_response_code(403);
    exit('Direct access forbidden');
}

/**
 * Set comprehensive security headers
 */
function setSecurityHeaders() {
    // Prevent clickjacking
    header('X-Frame-Options: SAMEORIGIN');
    
    // Enable XSS protection
    header('X-XSS-Protection: 1; mode=block');
    
    // Prevent MIME type sniffing
    header('X-Content-Type-Options: nosniff');
    
    // Referrer policy
    header('Referrer-Policy: strict-origin-when-cross-origin');
    
    // HTTPS enforcement (HSTS)
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        header('Strict-Transport-Security: max-age=31536000; includeSubDomains; preload');
    }
    
    // Permissions policy
    header('Permissions-Policy: geolocation=(), microphone=(), camera=()');
    
    // Content Security Policy
    $csp = "default-src 'self'; " .
           "script-src 'self' 'unsafe-inline' https://cdn.tailwindcss.com https://cdnjs.cloudflare.com https://cdn.jsdelivr.net; " .
           "style-src 'self' 'unsafe-inline' https://cdn.tailwindcss.com https://cdnjs.cloudflare.com https://fonts.googleapis.com; " .
           "font-src 'self' https://fonts.gstatic.com https://cdnjs.cloudflare.com; " .
           "img-src 'self' data: https:; " .
           "connect-src 'self' https://formspree.io; " .
           "frame-src https://www.google.com; " .
           "object-src 'none'; " .
           "base-uri 'self';";
    
    header("Content-Security-Policy: $csp");
    
    // Remove server information
    header_remove('X-Powered-By');
    header_remove('Server');
}

/**
 * Validate and sanitize input
 */
function sanitizeInput($input) {
    if (is_array($input)) {
        return array_map('sanitizeInput', $input);
    }
    
    // Remove null bytes
    $input = str_replace(chr(0), '', $input);
    
    // Basic XSS protection
    $input = htmlspecialchars($input, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    
    // Remove potential SQL injection patterns
    $patterns = [
        '/(\b(SELECT|INSERT|UPDATE|DELETE|DROP|CREATE|ALTER|EXEC|UNION|SCRIPT)\b)/i',
        '/(\b(OR|AND)\s+\d+\s*=\s*\d+)/i',
        '/(\'|\"|`|;|--|\*|\/\*|\*\/)/i'
    ];
    
    foreach ($patterns as $pattern) {
        $input = preg_replace($pattern, '', $input);
    }
    
    return trim($input);
}

/**
 * Rate limiting implementation
 */
function checkRateLimit($identifier, $maxRequests = 60, $timeWindow = 3600) {
    $rateLimitFile = sys_get_temp_dir() . '/rate_limit_' . md5($identifier);
    
    $currentTime = time();
    $requests = [];
    
    // Read existing requests
    if (file_exists($rateLimitFile)) {
        $data = file_get_contents($rateLimitFile);
        $requests = json_decode($data, true) ?: [];
    }
    
    // Filter requests within time window
    $requests = array_filter($requests, function($timestamp) use ($currentTime, $timeWindow) {
        return ($currentTime - $timestamp) < $timeWindow;
    });
    
    // Check if limit exceeded
    if (count($requests) >= $maxRequests) {
        http_response_code(429);
        header('Retry-After: ' . $timeWindow);
        exit('Rate limit exceeded. Please try again later.');
    }
    
    // Add current request
    $requests[] = $currentTime;
    
    // Save updated requests
    file_put_contents($rateLimitFile, json_encode($requests), LOCK_EX);
    
    return true;
}

/**
 * Validate HTTP method
 */
function validateHttpMethod($allowedMethods = ['GET', 'POST', 'HEAD']) {
    $method = $_SERVER['REQUEST_METHOD'] ?? '';
    
    if (!in_array($method, $allowedMethods)) {
        http_response_code(405);
        header('Allow: ' . implode(', ', $allowedMethods));
        exit('Method not allowed');
    }
}

/**
 * Check for malicious user agents
 */
function checkUserAgent() {
    $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';
    
    $blockedAgents = [
        'wget', 'curl', 'java', 'python', 'go-http-client',
        'libwww', 'lwp-trivial', 'msnbot', 'scrapbot',
        'bot', 'crawler', 'spider', 'scraper'
    ];
    
    foreach ($blockedAgents as $agent) {
        if (stripos($userAgent, $agent) !== false) {
            http_response_code(403);
            exit('Access forbidden');
        }
    }
}

/**
 * Validate referer for hotlink protection
 */
function validateReferer($allowedDomains = []) {
    $referer = $_SERVER['HTTP_REFERER'] ?? '';
    
    if (empty($referer)) {
        return true; // Allow direct access
    }
    
    $defaultDomains = [
        'habibframbudi.my.id',
        'kontak.habibframbudi.my.id',
        'www.habibframbudi.my.id',
        'www.kontak.habibframbudi.my.id'
    ];
    
    $allowedDomains = array_merge($defaultDomains, $allowedDomains);
    
    $refererHost = parse_url($referer, PHP_URL_HOST);
    
    foreach ($allowedDomains as $domain) {
        if (strpos($refererHost, $domain) !== false) {
            return true;
        }
    }
    
    http_response_code(403);
    exit('Hotlinking not allowed');
}

/**
 * Log security events
 */
function logSecurityEvent($event, $details = []) {
    $logFile = __DIR__ . '/security.log';
    
    $logEntry = [
        'timestamp' => date('Y-m-d H:i:s'),
        'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
        'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown',
        'event' => $event,
        'details' => $details,
        'request_uri' => $_SERVER['REQUEST_URI'] ?? '',
        'referer' => $_SERVER['HTTP_REFERER'] ?? ''
    ];
    
    $logLine = json_encode($logEntry) . PHP_EOL;
    
    file_put_contents($logFile, $logLine, FILE_APPEND | LOCK_EX);
}

/**
 * Initialize security measures
 */
function initSecurity($options = []) {
    // Set default options
    $defaults = [
        'rate_limit' => true,
        'max_requests' => 60,
        'time_window' => 3600,
        'allowed_methods' => ['GET', 'POST', 'HEAD'],
        'check_user_agent' => true,
        'validate_referer' => false,
        'log_events' => true
    ];
    
    $options = array_merge($defaults, $options);
    
    try {
        // Set security headers
        setSecurityHeaders();
        
        // Validate HTTP method
        validateHttpMethod($options['allowed_methods']);
        
        // Check user agent
        if ($options['check_user_agent']) {
            checkUserAgent();
        }
        
        // Rate limiting
        if ($options['rate_limit']) {
            $identifier = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
            checkRateLimit($identifier, $options['max_requests'], $options['time_window']);
        }
        
        // Validate referer
        if ($options['validate_referer']) {
            validateReferer();
        }
        
        // Log successful initialization
        if ($options['log_events']) {
            logSecurityEvent('security_init', ['status' => 'success']);
        }
        
    } catch (Exception $e) {
        if ($options['log_events']) {
            logSecurityEvent('security_error', ['error' => $e->getMessage()]);
        }
        
        http_response_code(500);
        exit('Security check failed');
    }
}

/**
 * Clean old rate limit files (call periodically)
 */
function cleanupRateLimitFiles() {
    $tempDir = sys_get_temp_dir();
    $files = glob($tempDir . '/rate_limit_*');
    $currentTime = time();
    
    foreach ($files as $file) {
        if (($currentTime - filemtime($file)) > 86400) { // 24 hours
            unlink($file);
        }
    }
}

// Auto-initialize security if this file is included
if (!defined('SECURITY_MANUAL_INIT')) {
    initSecurity();
}

// Clean up old files occasionally (1% chance)
if (rand(1, 100) === 1) {
    cleanupRateLimitFiles();
}
?>
