<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        @yield('welcome')
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">
                    <table border="1">
                       <tr>
                            <td>Name1</td>
                       </tr>
                       <tr>
                            <td>Name2</td>
                       </tr>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
