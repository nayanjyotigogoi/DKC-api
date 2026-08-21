<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Welcome to DKC!</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { background: #FAF6F0; font-family: 'Helvetica Neue', Arial, sans-serif; color: #2B2B2B; }
    .wrapper { max-width: 600px; margin: 40px auto; background: #fff; border-radius: 20px; overflow: hidden; box-shadow: 0 4px 24px rgba(139,30,36,0.08); }
    .header { background: #8B1E24; padding: 48px 40px 36px; text-align: center; }
    .header .korean { font-size: 52px; display: block; margin-bottom: 8px; opacity: 0.25; color: #fff; letter-spacing: 4px; }
    .header h1 { color: #fff; font-size: 28px; font-weight: 700; letter-spacing: -0.3px; }
    .header p { color: rgba(255,255,255,0.7); font-size: 14px; margin-top: 6px; }
    .badge { display: inline-block; background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.3); color: #fff; font-size: 12px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase; padding: 6px 16px; border-radius: 30px; margin-bottom: 20px; }
    .approved-banner { background: #F0FFF4; border: 2px solid #22C55E; border-radius: 14px; padding: 18px 24px; margin: 32px 40px 0; text-align: center; }
    .approved-banner .check { font-size: 32px; margin-bottom: 6px; }
    .approved-banner p { font-size: 15px; font-weight: 700; color: #16A34A; }
    .body { padding: 32px 40px 40px; }
    .greeting { font-size: 22px; font-weight: 700; color: #8B1E24; margin-bottom: 16px; }
    .intro { font-size: 15px; line-height: 1.7; color: #444; margin-bottom: 28px; }
    .card { background: #FAF3ED; border-radius: 14px; padding: 24px 28px; margin-bottom: 28px; }
    .card h3 { font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 1.2px; color: #8B1E24; margin-bottom: 16px; }
    .detail-row { display: flex; gap: 12px; padding: 8px 0; border-bottom: 1px solid rgba(139,30,36,0.08); }
    .detail-row:last-child { border-bottom: none; }
    .detail-label { font-size: 13px; font-weight: 600; color: #8B1E24; min-width: 130px; }
    .detail-value { font-size: 13px; color: #555; flex: 1; }
    .perks { margin-bottom: 28px; }
    .perks h3 { font-size: 14px; font-weight: 700; color: #2B2B2B; margin-bottom: 14px; }
    .perk { display: flex; align-items: flex-start; gap: 14px; margin-bottom: 12px; }
    .perk-icon { font-size: 20px; flex-shrink: 0; width: 32px; text-align: center; }
    .perk-text { font-size: 14px; color: #555; line-height: 1.5; padding-top: 2px; }
    .cta-box { background: #8B1E24; border-radius: 14px; padding: 28px; text-align: center; margin-bottom: 28px; }
    .cta-box p { color: rgba(255,255,255,0.85); font-size: 14px; margin-bottom: 16px; line-height: 1.6; }
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
      <h1>Welcome to the Club! 🎉</h1>
      <p>당신은 이제 DKC 가족입니다 · You are now part of the DKC family</p>
    </div>

    <!-- Approval banner -->
    <div class="approved-banner">
      <div class="check">✅</div>
      <p>Your membership has been officially approved!</p>
    </div>

    <!-- Body -->
    <div class="body">

      <p class="greeting">축하합니다, {{ $application->full_name }}! 🌸</p>

      <p class="intro">
        We are absolutely thrilled to welcome you to the <strong>Dibrugarh Korean Club</strong>!
        Your application has been reviewed and approved by our team. You are now an official member
        of our growing community of Korean language and culture enthusiasts.
      </p>

      <!-- Membership details -->
      <div class="card">
        <h3>Your Membership Details</h3>
        <div class="detail-row">
          <span class="detail-label">Name</span>
          <span class="detail-value">{{ $application->full_name }}</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Email</span>
          <span class="detail-value">{{ $application->email }}</span>
        </div>
        @if($application->department)
        <div class="detail-row">
          <span class="detail-label">Department</span>
          <span class="detail-value">{{ $application->department }}{{ $application->course ? ' — ' . $application->course : '' }}</span>
        </div>
        @endif
        <div class="detail-row">
          <span class="detail-label">Member Since</span>
          <span class="detail-value">{{ now()->format('F j, Y') }}</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Status</span>
          <span class="detail-value" style="color:#16A34A; font-weight:700;">✅ Active Member</span>
        </div>
      </div>

      <!-- What you get -->
      <div class="perks">
        <h3>What you get as a DKC member</h3>
        <div class="perk">
          <span class="perk-icon">📚</span>
          <div class="perk-text"><strong>Korean Learning Resources</strong> — Access our curated lessons, vocabulary, grammar guides, and conversations on the DKC website.</div>
        </div>
        <div class="perk">
          <span class="perk-icon">🎉</span>
          <div class="perk-text"><strong>Events & Workshops</strong> — Priority invitations to cultural events, language camps, K-food nights, and movie screenings.</div>
        </div>
        <div class="perk">
          <span class="perk-icon">📖</span>
          <div class="perk-text"><strong>DKC Magazine</strong> — Exclusive access to our community magazine featuring articles on Korean culture, language, and life.</div>
        </div>
        <div class="perk">
          <span class="perk-icon">🤝</span>
          <div class="perk-text"><strong>Community</strong> — Connect with fellow Korean culture enthusiasts from Dibrugarh University and beyond.</div>
        </div>
      </div>

      <!-- CTA -->
      <div class="cta-box">
        <p>Start your Korean journey today — explore lessons, upcoming events, and our community magazine on the DKC website!</p>
        <a href="{{ env('FRONTEND_URL', 'https://dibrugarhkoreanclub.com') }}" class="cta-btn">Go to DKC Website →</a>
      </div>

      <p style="font-size:14px; color:#666; line-height:1.7;">
        Have questions or need help? Reply to this email or write to us at
        <a href="mailto:connect@dibrugarhkoreanclub.com" style="color:#8B1E24;">connect@dibrugarhkoreanclub.com</a>.<br><br>
        한국어 공부 열심히 하세요! (Study Korean hard!) 화이팅! 🌟
      </p>

    </div>

    <!-- Footer -->
    <div class="footer">
      <div class="korean-footer">대한민국 · DKC</div>
      <div class="brand">Dibrugarh Korean Club</div>
      <p>Dibrugarh University, Assam, India<br>
      This email was sent because your DKC membership application was approved.</p>
    </div>

  </div>
</body>
</html>
