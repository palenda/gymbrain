<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Sora:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        ul[class],
        ol[class] {
            padding: 0;
        }

        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        p,
        ul[class],
        ol[class],
        li,
        figure,
        figcaption,
        blockquote,
        dl,
        dd {
            margin: 0;
        }

        body {
            background: #FFFFFF;
            font-family: 'Sora', sans-serif;
            min-height: 100vh;
            scroll-behavior: smooth;
            text-rendering: optimizeSpeed;
            line-height: 1.5;
        }

        ul[class],
        ol[class] {
            list-style: none;
        }

        a:not([class]) {
            text-decoration-skip-ink: auto;
        }

        img {
            max-width: 100%;
            display: block;
        }

        article > * + * {
            margin-top: 1em;
        }

        input,
        button,
        textarea,
        select {
            font: inherit;
        }

        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }

        h1 {
            font-size: 64px;
            font-weight: 400;
            line-height: 81px;
            letter-spacing: 0.05em;
            text-align: left;
        }

        h2 {
            font-size: 48px;
            font-weight: 400;
            line-height: 60px;
            letter-spacing: 0.05em;
            text-align: left;
        }

        h3 {
            font-size: 32px;
            font-weight: 600;
            line-height: 40px;
            letter-spacing: 0.05em;
            text-align: left;
        }

        h4 {
            font-size: 24px;
            font-weight: 400;
            line-height: 30px;
            letter-spacing: 0.025em;
            text-align: left;
        }

        h5 {
            font-size: 20px;
            font-weight: 600;
            line-height: 25px;
            letter-spacing: 0;
            text-align: left;
        }

        hr {
            border: 1px solid #D9D9D9;

            margin-top: 32px;
            margin-bottom: 32px;
        }
    </style>
</head>
<body id="app">
<script>window.Laravel = { csrfToken: '{{ csrf_token() }}', user: @json($user) }</script>
<script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</body>
</html>
