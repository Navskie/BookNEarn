<head>
        <?php include_once '../.config/dbconnect.php' ?>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <title>Book and Earn Administrator</title>
        <!-- CSS files -->
        <link href="dist/css/tabler.min.css?1692870487" rel="stylesheet"/>
        <link href="dist/css/tabler-flags.min.css?1692870487" rel="stylesheet"/>
        <link href="dist/css/tabler-payments.min.css?1692870487" rel="stylesheet"/>
        <link href="dist/css/tabler-vendors.min.css?1692870487" rel="stylesheet"/>
        <link href="dist/css/demo.min.css?1692870487" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <style>
                @import url('https://rsms.me/inter/inter.css');
                :root {
                --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
                }
                body {
                font-feature-settings: "cv03", "cv04", "cv11";
                }
        </style>
        <?php
                if ($token == "")
                {
                echo "<script>window.location.href = '../login';</script>";
                }
        ?>
</head>