<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Application Received – DKC</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { background: #FAF6F0; font-family: 'Helvetica Neue', Arial, sans-serif; color: #2B2B2B; }
    .wrapper { max-width: 600px; margin: 40px auto; background: #fff; border-radius: 20px; overflow: hidden; box-shadow: 0 4px 24px rgba(139,30,36,0.08); }
    .header { background: #8B1E24; padding: 48px 40px 36px; text-align: center; }
    .header .korean { font-size: 48px; display: block; margin-bottom: 8px; opacity: 0.25; color: #fff; letter-spacing: 4px; }
    .header h1 { color: #fff; font-size: 26px; font-weight: 700; letter-spacing: -0.3px; }
    .header p { color: rgba(255,255,255,0.7); font-size: 14px; margin-top: 6px; }
    .badge { display: inline-block; background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.3); color: #fff; font-size: 12px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase; padding: 6px 16px; border-radius: 30px; margin-bottom: 20px; }
    .body { padding: 40px; }
    .greeting { font-size: 22px; font-weight: 700; color: #8B1E24; margin-bottom: 16px; }
    .intro { font-size: 15px; line-height: 1.7; color: #444; margin-bottom: 28px; }
    .card { background: #FAF3ED; border-radius: 14px; padding: 24px 28px; margin-bottom: 28px; }
    .card h3 { font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 1.2px; color: #8B1E24; margin-bottom: 16px; }
    .detail-row { display: flex; gap: 12px; padding: 8px 0; border-bottom: 1px solid rgba(139,30,36,0.08); }
    .detail-row:last-child { border-bottom: none; }
    .detail-label { font-size: 13px; font-weight: 600; color: #8B1E24; min-width: 130px; }
    .detail-value { font-size: 13px; color: #555; flex: 1; }
    .steps { margin-bottom: 28px; }
    .steps h3 { font-size: 14px; font-weight: 700; color: #2B2B2B; margin-bottom: 14px; }
    .step { display: flex; align-items: flex-start; gap: 14px; margin-bottom: 12px; }
    .step-num { width: 28px; height: 28px; background: #8B1E24; color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 13px; font-weight: 700; flex-shrink: 0; }
    .step-text { font-size: 14px; color: #555; line-height: 1.5; padding-top: 4px; }
    .cta-box { background: #8B1E24; border-radius: 14px; padding: 24px 28px; text-align: center; margin-bottom: 28px; }
    .cta-box p { color: rgba(255,255,255,0.85); font-size: 14px; margin-bottom: 14px; }
    .cta-btn { display: inline-block; background: #fff; color: #8B1E24; font-size: 14px; font-weight: 700; padding: 12px 28px; border-radius: 30px; text-decoration: none; }
    .footer { background: #FAF3ED; padding: 24px 40px; text-align: center; border-top: 1px solid rgba(139,30,36,0.08); }
    .footer p { font-size: 12px; color: #999; line-height: 1.6; }
    .footer .brand { font-size: 14px; font-weight: 700; color: #8B1E24; margin-bottom: 4px; }
    .footer .korean-footer { font-size: 18px; color: #8B1E24; opacity: 0.4; margin-bottom: 8px; }
  </style>
</head>
<body>
  <div class="wrapper">

    <!-- Header -->
    <div class="header">
      <span class="badge">Dibrugarh Korean Club</span>
      <span class="korean">환영합니다</span>
      <h1>Your Application is Received!</h1>
      <p>한국어 클럽에 오신 것을 환영합니다 · Welcome to DKC</p>
    </div>

    <!-- Body -->
    <div class="body">

      <p class="greeting">안녕하세요, {{ $application->full_name }}! 👋</p>

      <p class="intro">
        Thank you so much for applying to the <strong>Dibrugarh Korean Club</strong>. We're thrilled
        to see your interest in Korean language and culture! Your application has been successfully
        received and our team will review it shortly.
      </p>

      <!-- Application summary -->
      <div class="card">
        <h3>Your Application Details</h3>
        <div class="detail-row">
          <span class="detail-label">Full Name</span>
          <span class="detail-value">{{ $application->full_name }}</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Email</span>
          <span class="detail-value">{{ $application->email }}</span>
        </div>
        @if($application->phone)
        <div class="detail-row">
          <span class="detail-label">Phone</span>
          <span class="detail-value">{{ $application->phone }}</span>
        </div>
        @endif
        <div class="detail-row">
          <span class="detail-label">Department</span>
          <span class="detail-value">{{ $application->department }}{{ $application->course ? ' — ' . $application->course : '' }}</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Year of Study</span>
          <span class="detail-value">{{ $application->year_of_study }}</span>
        </div>
        @if($application->favourite_korean_thing)
        <div class="detail-row">
          <span class="detail-label">Favourite Korean Thing</span>
          <span class="detail-value">{{ $application->favourite_korean_thing }}</span>
        </div>
        @endif
        <div class="detail-row">
          <span class="detail-label">Applied On</span>
          <span class="detail-value">{{ $application->created_at->format('F j, Y \a\t g:i A') }}</span>
        </div>
      </div>

      <!-- What happens next -->
      <div class="steps">
        <h3>What happens next?</h3>
        <div class="step">
          <div class="step-num">1</div>
          <div class="step-text"><strong>Review</strong> — Our team reviews all applications within 3–5 working days.</div>
        </div>
        <div class="step">
          <div class="step-num">2</div>
          <div class="step-text"><strong>Notification</strong> — You'll receive a confirmation email with your membership status.</div>
        </div>
        <div class="step">
          <div class="step-num">3</div>
          <div class="step-text"><strong>Welcome!</strong> — Once approved, you'll be added to our community and invited to upcoming events.</div>
        </div>
      </div>

      <!-- CTA -->
      <div class="cta-box">
        <p>While you wait, explore our events, magazine and Korean culture resources on our website!</p>
        <a href="{{ env('FRONTEND_URL', 'http://localhost:3000') }}" class="cta-btn">Visit DKC Website →</a>
      </div>

      <p style="font-size:14px; color:#666; line-height:1.7;">
        If you have any questions in the meantime, feel free to reply to this email or reach out to us
        on Instagram. We're always happy to help!<br><br>
        화이팅! (Hwaiting!) — You've got this! 🌸
      </p>

    </div>

    <!-- Footer -->
    <div class="footer">
      <div class="korean-footer">대한민국 · DKC</div>
      <div class="brand">Dibrugarh Korean Club</div>
      <p>Dibrugarh University, Assam, India<br>
      This email was sent because you submitted a membership application on our website.</p>
    </div>

  </div>
</body>
</html>
