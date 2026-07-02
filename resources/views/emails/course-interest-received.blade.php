<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Course Interest Received – DKC</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { background: #FAF6F0; font-family: 'Helvetica Neue', Arial, sans-serif; color: #2B2B2B; }
    .wrapper { max-width: 600px; margin: 40px auto; background: #fff; border-radius: 20px; overflow: hidden; box-shadow: 0 4px 24px rgba(139,30,36,0.08); }
    .header { background: #8B1E24; padding: 48px 40px 36px; text-align: center; }
    .header .korean { font-size: 48px; display: block; margin-bottom: 8px; opacity: 0.25; color: #fff; letter-spacing: 4px; }
    .header h1 { color: #fff; font-size: 24px; font-weight: 700; letter-spacing: -0.3px; }
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
      <span class="korean">감사합니다</span>
      <h1>We've Noted Your Interest!</h1>
      <p>한국어를 배우고 싶으신군요 · Great — let's learn Korean together</p>
    </div>

    <div class="body">

      <p class="greeting">안녕하세요, {{ $interest->full_name }}! 👋</p>

      <p class="intro">
        Thank you for registering your interest in our
        <strong>{{ $interest->course === 'basic_korean' ? 'Basic Korean Learning' : 'TOPIK II Preparation' }}</strong>
        course at the <strong>Dibrugarh Korean Club</strong>. We're thrilled to know you want to learn Korean!
      </p>

      <p class="intro" style="margin-top:-16px;">
        We'll reach out to you as soon as enrolments open. In the meantime, keep an eye on our website and Instagram for updates.
      </p>

      <div class="card">
        <h3>Your Registration Details</h3>
        <div class="detail-row">
          <span class="detail-label">Name</span>
          <span class="detail-value">{{ $interest->full_name }}</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Email</span>
          <span class="detail-value">{{ $interest->email }}</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Course</span>
          <span class="detail-value">{{ $interest->course === 'basic_korean' ? 'Basic Korean Learning' : 'TOPIK II Preparation' }}</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Korean Level</span>
          <span class="detail-value">{{ ucfirst($interest->korean_level) === 'None' ? 'No Korean yet' : ucfirst($interest->korean_level) }}</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Registered On</span>
          <span class="detail-value">{{ $interest->created_at->format('F j, Y \a\t g:i A') }}</span>
        </div>
      </div>

      <div class="cta-box">
        <p>While you wait, explore our events, magazine and resources on our website!</p>
        <a href="{{ env('FRONTEND_URL', 'https://dibrugarhkoreanclub.com') }}" class="cta-btn">Visit DKC Website →</a>
      </div>

      <p style="font-size:14px; color:#666; line-height:1.7;">
        Have a question? Just reply to this email — we're happy to help.<br><br>
        화이팅! (Hwaiting!) — Great things are coming! 🌸
      </p>

    </div>

    <div class="footer">
      <div class="korean-footer">대한민국 · DKC</div>
      <div class="brand">Dibrugarh Korean Club</div>
      <p>Dibrugarh University, Assam, India<br>
      This email was sent because you registered course interest on our website.</p>
    </div>

  </div>
</body>
</html>
