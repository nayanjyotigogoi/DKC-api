<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>New Submission – DKC Admin</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { background: #F5F5F5; font-family: 'Helvetica Neue', Arial, sans-serif; color: #2B2B2B; }
    .wrapper { max-width: 600px; margin: 40px auto; background: #fff; border-radius: 16px; overflow: hidden; box-shadow: 0 2px 12px rgba(0,0,0,0.08); }
    .header { background: #1A1A1A; padding: 28px 32px; }
    .header .label { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 1.5px; color: #888; margin-bottom: 6px; }
    .header h1 { color: #fff; font-size: 20px; font-weight: 700; }
    .header .sub { color: #888; font-size: 13px; margin-top: 4px; }
    .type-badge { display: inline-block; padding: 4px 12px; border-radius: 20px; font-size: 11px; font-weight: 700; letter-spacing: 0.8px; text-transform: uppercase; margin-top: 10px; }
    .type-application { background: rgba(139,30,36,0.15); color: #8B1E24; }
    .type-course { background: rgba(30,92,139,0.12); color: #1E5C8B; }
    .body { padding: 32px; }
    .from-block { background: #FAF6F0; border-left: 3px solid #8B1E24; padding: 16px 20px; border-radius: 0 10px 10px 0; margin-bottom: 24px; }
    .from-name { font-size: 18px; font-weight: 700; color: #1A1A1A; }
    .from-email { font-size: 14px; color: #8B1E24; margin-top: 2px; }
    .section-title { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 1.2px; color: #999; margin-bottom: 12px; }
    table { width: 100%; border-collapse: collapse; margin-bottom: 28px; }
    td { padding: 10px 0; border-bottom: 1px solid #F0EBE4; vertical-align: top; font-size: 13px; }
    td:last-child { border-bottom: none; }
    .td-label { color: #888; font-weight: 600; width: 38%; padding-right: 12px; }
    .td-value { color: #2B2B2B; }
    .action-row { background: #FAF3ED; border-radius: 12px; padding: 18px 20px; display: flex; align-items: center; justify-content: space-between; gap: 12px; }
    .action-row p { font-size: 13px; color: #666; }
    .action-btn { display: inline-block; background: #8B1E24; color: #fff; font-size: 13px; font-weight: 700; padding: 10px 20px; border-radius: 20px; text-decoration: none; white-space: nowrap; }
    .footer { padding: 20px 32px; text-align: center; border-top: 1px solid #F0EBE4; }
    .footer p { font-size: 11px; color: #BBB; line-height: 1.6; }
  </style>
</head>
<body>
  <div class="wrapper">

    <div class="header">
      <div class="label">DKC Admin Alert</div>
      <h1>New Submission Received</h1>
      <div class="sub">{{ now()->format('F j, Y \a\t g:i A') }}</div>
      <div class="type-badge {{ $type === 'application' ? 'type-application' : 'type-course' }}">
        {{ $type === 'application' ? 'Membership Application' : 'Course Interest' }}
      </div>
    </div>

    <div class="body">

      <div class="from-block">
        <div class="from-name">{{ $fromName }}</div>
        <div class="from-email">{{ $fromEmail }}</div>
      </div>

      <div class="section-title">Submission Details</div>
      <table>
        @foreach ($details as $label => $value)
          @if ($value)
          <tr>
            <td class="td-label">{{ $label }}</td>
            <td class="td-value">{{ $value }}</td>
          </tr>
          @endif
        @endforeach
      </table>

      <div class="action-row">
        <p>View and manage this submission in the admin panel.</p>
        <a href="{{ env('APP_URL', 'http://localhost:8000') }}/admin" class="action-btn">Open Admin →</a>
      </div>

    </div>

    <div class="footer">
      <p>This is an automated notification sent to connect@dibrugarhkoreanclub.com<br>
      Dibrugarh Korean Club — Dibrugarh University, Assam</p>
    </div>

  </div>
</body>
</html>
