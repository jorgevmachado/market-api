<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        table thead {
            background-color: #CECBCA
        }

        table caption {
            text-align: left;
            background-color: #AED6F1
        }

        table tr.thead {
            background-color: #CECBCA
        }

        tr:nth-child(even) {
            background-color: #F2F2F2
        }

        tr { page-break-inside: avoid; }

        tr.totalizador {
            background-color: #fff;
        }

    </style>
</head>
<body>
    <div class="content" style="clear: left">
        @include($content)
    </div>
</body>
</html>
