
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>@stack('title') {{ env('APP_NAME', 'Sports Spell') }}</title>
<link rel="icon" href="{{ asset('/storage/assets/images/logo/' . getSetting()->favicon) }}" type="image/x-icon">
<link rel="apple-touch-icon" sizes="{{ asset('/storage/assets/images/logo/' . getSetting()->favicon) }}" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/storage/assets/images/logo/' . getSetting()->favicon) }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/storage/assets/images/logo/' . getSetting()->favicon) }}">
@stack('meta')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="{{ asset('/storage/assets/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('/storage/assets/css/responsive.css') }}" rel="stylesheet">
@stack('appendCss')
