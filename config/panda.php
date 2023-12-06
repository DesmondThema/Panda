<?php

return [
    'sessions_url' => env('SESSIONS_URL', 'https://api.joinpanda.com/api/session?page_size=100&page=1&home_territory=all'),
    'keywords_url' => env('KEYWORDS_URL', 'https://api.joinpanda.com/api/me'),
    'login_url' => env('LOGIN_URL', 'https://api.joinpanda.com/api/auth/email/login/'),
    'user_email' => env('USER_EMAIL'),
    'user_password' => env('USER_PASSWORD'),
];
