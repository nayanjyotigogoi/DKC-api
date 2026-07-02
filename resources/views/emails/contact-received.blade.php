<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Message Received – DKC</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { background: #FAF6F0; font-family: 'Helvetica Neue', Arial, sans-serif; color: #2B2B2B; }
    .wrapper { max-width: 600px; margin: 40px auto; background: #fff; border-radius: 20px; overflow: hidden; box-shadow: 0 4px 24px rgba(139,30,36,0.08); }
    .header { background: #8B1E24; padding: 48px 40px 36px; text-align: center; }
    .header .korean { font-size: 48px; display: block; margin-bottom: 8px; opacity: 0.25; color: #fff; letter-spacing: 4px; }
    .header h1 { color: #fff; font-size: 24px; font-weight: 700; }
    .header p { color: rgba(255,255,255,0.7); font-size: 14px; margin-top: 6px; }
    .badge { display: inline-block; background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.3); color: #fff; font-size: 12px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase; padding: 6px 16px; border-radius: 30px; margin-bottom: 20px; }
    .body { padding: 40px; }
    .greeting { font-size: 22px; font-weight: 700; color: #8B1E24; margin-bottom: 16px; }
    .intro { font-size: 15px; line-height: 1.7; color: #444; margin-bottom: 28px; }
    .card { background: #FAF3ED; border-radius: 14px; padding: 24px 28px; margin-bottom: 28px; }
    .card h3 { font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 1.2px; color: #8B1E24; margin-bottom: 16px; }
    .subject-line { font-size: 14px; font-weight: 600; color: #2B2B2B; margin-bottom: 10px; }
    .message-body { font-size: 14px; color: #555; line-height: 1.7; white-space: pre-wrap; }
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
      <h1>We Got Your Message!</h1>
      <p>메시지를 받았습니다 · We'll get back to you soon</p>
    </div>

    <div class="body">

      <p class="greeting">안녕하세요, {{ $senderName }}! 👋</p>

      <p class="intro">
        Thank you for reaching out to the <strong>Dibrugarh Korean Club</strong>. We've received your message and will get back to you within <strong>48 hours</strong>.
      </p>

      <div class="card">
        <h3>Your Message</h3>
        @if($contactSubject)
        <p class="subject-line">Subject: {{ $contactSubject }}</p>
        @endif
        <p class="message-body">{{ $contactMessage }}</p>
      </div>

      <div class="cta-box">
        <p>While you wait, feel free to explore our events, magazine and more on our website!</p>
        <a href="{{ env('FRONTEND_URL', 'https://dibrugarhkoreanclub.com') }}" class="cta-btn">Visit DKC Website →</a>
      </div>

      <p style="font-size:14px; color:#666; line-height:1.7;">
        If your message is urgent, you can also reach us directly at
        <a href="mailto:connect@dibrugarhkoreanclub.com" style="color:#8B1E24;">connect@dibrugarhkoreanclub.com</a>.<br><br>
        감사합니다 (Gamsahamnida) — Thank you! 🌸
      </p>

    </div>

    <div class="footer">
      <div class="korean-footer">대한민국 · DKC</div>
      <div class="brand">Dibrugarh Korean Club</div>
      <p>Dibrugarh University, Assam, India<br>
      This is an automated reply to your contact form submission.</p>
    </div>

  </div>
</body>
</html>
