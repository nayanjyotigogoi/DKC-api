<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Event Registration Confirmed – DKC</title>
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
    .event-card { background: #FAF3ED; border-radius: 14px; padding: 24px 28px; margin-bottom: 28px; border-left: 4px solid #8B1E24; }
    .event-title { font-size: 18px; font-weight: 700; color: #8B1E24; margin-bottom: 16px; }
    .card { background: #FAF3ED; border-radius: 14px; padding: 24px 28px; margin-bottom: 28px; }
    .card h3 { font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 1.2px; color: #8B1E24; margin-bottom: 16px; }
    .detail-row { display: flex; gap: 12px; padding: 8px 0; border-bottom: 1px solid rgba(139,30,36,0.08); }
    .detail-row:last-child { border-bottom: none; }
    .detail-label { font-size: 13px; font-weight: 600; color: #8B1E24; min-width: 130px; }
    .detail-value { font-size: 13px; color: #555; flex: 1; }
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

    <div class="header">
      <span class="badge">Dibrugarh Korean Club</span>
      <span class="korean">등록완료</span>
      <h1>You're Registered! 🎉</h1>
      <p>이벤트 등록이 완료되었습니다 · See you there!</p>
    </div>

    <div class="body">

      <p class="greeting">안녕하세요, {{ $registration->full_name }}! 👋</p>

      <p class="intro">
        Great news — your registration for the upcoming <strong>Dibrugarh Korean Club</strong> event has been confirmed!
        We're excited to see you there. Here are your registration details:
      </p>

      <div class="event-card">
        <div class="event-title">{{ $registration->event_title }}</div>
        <p style="font-size:13px; color:#666;">We'll send you any updates about the event (time, venue changes, etc.) via email — so keep an eye on your inbox.</p>
      </div>

      <div class="card">
        <h3>Your Registration Details</h3>
        <div class="detail-row">
          <span class="detail-label">Full Name</span>
          <span class="detail-value">{{ $registration->full_name }}</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Email</span>
          <span class="detail-value">{{ $registration->email }}</span>
        </div>
        @if($registration->phone)
        <div class="detail-row">
          <span class="detail-label">Phone</span>
          <span class="detail-value">{{ $registration->phone }}</span>
        </div>
        @endif
        @if($registration->department)
        <div class="detail-row">
          <span class="detail-label">Department</span>
          <span class="detail-value">{{ $registration->department }}</span>
        </div>
        @endif
        <div class="detail-row">
          <span class="detail-label">Registered On</span>
          <span class="detail-value">{{ $registration->created_at->format('F j, Y \a\t g:i A') }}</span>
        </div>
      </div>

      <div class="cta-box">
        <p>Check out our other upcoming events, magazine and Korean culture resources!</p>
        <a href="{{ env('FRONTEND_URL', 'https://dibrugarhkoreanclub.com') }}" class="cta-btn">Visit DKC Website →</a>
      </div>

      <p style="font-size:14px; color:#666; line-height:1.7;">
        If you have any questions about the event, feel free to reply to this email or reach us at
        <a href="mailto:connect@dibrugarhkoreanclub.com" style="color:#8B1E24;">connect@dibrugarhkoreanclub.com</a>.<br><br>
        화이팅! (Hwaiting!) — See you soon! 🌸
      </p>

    </div>

    <div class="footer">
      <div class="korean-footer">대한민국 · DKC</div>
      <div class="brand">Dibrugarh Korean Club</div>
      <p>Dibrugarh University, Assam, India<br>
      This email was sent because you registered for an event on our website.</p>
    </div>

  </div>
</body>
</html>
