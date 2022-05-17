<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Shporta') }}</title>

    <style>
        * {
            line-height: 1.2;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: monospace;
        }

        html {
            color: #4b84a1;
            background-color: #2f2f2f;
            display: table;
            height: 100%;
            text-align: center;
            width: 100%;
        }

        body {
            display: table-cell;
            vertical-align: middle;
            margin: 2em auto;
        }

        h1 {
            color: #e1a8a8;
            font-size: 2em;
            font-weight: 400;
        }

        p {
            margin: 0 auto;
            width: 280px;
        }
        @media only screen and (max-width: 680px) {

            body,
            p {
                width: 95%;
            }

            h1 {
                font-size: 1.5em;
                margin: 0 0 0.3em;
            }
        }


        button.btn {

            margin: 30px 0 15px 15px;
            letter-spacing: 1px;
            color: #767373;
            background-color: transparent;
            border: 0;
            transition:ease-in-out 0.5s;
        }
        button.btn:hover{
            background-color: #9bb6c5;
            padding: 10px;
            color: #36518c;
            border-radius: 20px;
        }
        svg{
            font-size: 150px;
        }
        .will{
            fill: none;
            stroke: #555;
            stroke-width: 3px;
            stroke-dasharray:8% 30%;
            stroke-dashoffset: 0;
            animation: textanimation 6s linear infinite;
        }
        @keyframes textanimation{
            100%{
                stroke-dashoffset:-35%;

            }
        }
        .will1{
            stroke: #9b83c5;
            animation-delay: -1s;
        }
        .will2{
            stroke: #babebe;
            animation-delay: -2s;
        }
        .will3{
            stroke: #b73a3a;
            animation-delay: -3s;
        }
        .will4{
            stroke: #3ab7a0;
            animation-delay: -4s;
        }
        .will5{
            stroke: #36518c;
            animation-delay: -5s;
        }
    </style>
</head>

<body>
<br><br><br><br><br>
<h1>Not Authorized</h1>
<p>Sorry, but you're not authorized to perform this action</p>
<svg viewBox="0 0 1000 400">
    <text id="willie" x="50%" y="50%" text-anchor="middle" fill="none">403</text>
    <use xlink:href="#willie" class="will will1"></use>
    <use xlink:href="#willie" class="will will2"></use>
    <use xlink:href="#willie" class="will will3"></use>
    <use xlink:href="#willie" class="will will4"></use>
    <use xlink:href="#willie" class="will will5"></use>
</svg>
<button onclick="window.history.back()" class="btn">Return</button>
</body>
</html>
