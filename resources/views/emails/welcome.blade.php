<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to {{ config('app.name') }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .email-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #2563eb;
            margin-bottom: 10px;
        }
        .welcome-title {
            color: #1f2937;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .content {
            margin-bottom: 30px;
        }
        .btn {
            display: inline-block;
            padding: 12px 25px;
            background-color: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin: 20px 0;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            color: #6b7280;
            font-size: 14px;
        }
        .feature-list {
            list-style: none;
            padding: 0;
        }
        .feature-list li {
            padding: 8px 0;
            border-bottom: 1px solid #f3f4f6;
        }
        .feature-list li:before {
            content: "✓";
            color: #059669;
            font-weight: bold;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <div class="logo">{{ config('app.name') }}</div>
            <h1 class="welcome-title">Welcome, {{ $user->name }}! 🎉</h1>
        </div>

        <div class="content">
            <p>Thank you for joining <strong>{{ config('app.name') }}</strong>! We're excited to have you as part of our community.</p>
            
            <p>Your account has been successfully created with the email: <strong>{{ $user->email }}</strong></p>

            <h3>What you can do now:</h3>
            <ul class="feature-list">
                <li>Browse thousands of job opportunities</li>
                <li>Create and customize your professional profile</li>
                <li>Apply to jobs that match your skills</li>
                <li>Track your application status</li>
                <li>Get notified about new job openings</li>
            </ul>

            <div style="text-align: center;">
                <a href="{{ config('app.url') }}:{{ config('app.port', 8000) }}/dashboard" class="btn">Get Started</a>
            </div>

            <p>If you have any questions or need assistance, feel free to reach out to our support team.</p>
        </div>

        <div class="footer">
            <p>Thank you for choosing {{ config('app.name') }}!</p>
            <p>
                <strong>{{ config('app.name') }} Team</strong><br>
                {{ config('app.url') }}
            </p>
            <p><small>This is an automated message. Please do not reply to this email.</small></p>
        </div>
    </div>
</body>
</html>