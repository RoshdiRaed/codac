<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>{{ $subjectText ?? '' }}</title>
</head>
<body style="font-family: sans-serif; background-color: #f9f9f9; padding: 2rem;">
    <div style="background-color: white; padding: 2rem; border-radius: 8px;">
        {!! nl2br(e($content)) !!}
    </div>
</body>
</html>
