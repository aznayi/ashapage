<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/css/mystyle.css" rel="stylesheet" type="text/css">
    <link href="/css/persianDatepicker-default.css" rel="stylesheet" type="text/css">

    <title>ASHA Page</title>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/persianDatepicker.min.js"></script>
    <script src="/ckeditor/ckeditor.js"></script>


    <style>
        @font-face {
            font-family: 'yekan';
            src:  url('/fonts/BYekan.ttf') format('truetype'),
            url('/fonts/BYekan.eot?#iefix') format('embedded-opentype');
        }
        @font-face {
            font-family: 'iran';
            src:  url('/fonts/IRANSansWeb.ttf') format('truetype'),
            url('/fonts/IRANSansWeb.eot?#iefix') format('embedded-opentype');
        }
        @font-face {
            font-family: 'iranBold';
            src:  url('/fonts/IRANSansWeb_Bold.ttf') format('truetype'),
            url('/fonts/IRANSansWeb_Bold.eot?#iefix') format('embedded-opentype');
        }
        @font-face {
            font-family: 'iranLight';
            src:  url('/fonts/IRANSansWeb_Light.ttf') format('truetype'),
            url('/fonts/IRANSansWeb_Light.eot?#iefix') format('embedded-opentype');
        }
        @font-face {
            font-family: 'iranMedium';
            src:  url('/fonts/IRANSansWeb_Medium.ttf') format('truetype'),
            url('/fonts/IRANSansWeb_Medium.eot?#iefix') format('embedded-opentype');
        }
        @font-face {
            font-family: 'iranUltraLight';
            src:  url('/fonts/IRANSansWeb_UltraLight.ttf') format('truetype'),
            url('/fonts/IRANSansWeb_UltraLight.eot?#iefix') format('embedded-opentype');
        }
        div, a, ul, li, p, span {
            text-align: right;
            direction: rtl;
        }

        a {
            text-decoration: none;
        }

        .yekan {
            font-family: yekan;
        }

        .fontsm {
            font-size: 10pt;
        }

        .fontmd {
            font-size: 11pt;
        }

        .fontlg {
            font-size: 12pt;
        }

        ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        i{
            background-image: url('/img/icons.png')!important;
        }
    </style>
</head>

<body style="margin: 0; background: #FFFFFF; text-align: center;">
@include('header')


@yield('content')

<script src="js/sweetalert.min.js"></script>
@include('sweet::alert')

@include('footer')

</body>
</html>