<html language="en">
    <head>
        <meta charset="UTF-8">
        <title>Admin Dashboard</title>
        @vite("resources/css/app.css")
    </head>
    <body>
       <x-navbar name={{$name}}></x-navbar>
       <div>
            <h1 class=" align-text-bottom text-center px-3 py-4 flex">Dashboard</h1>
       </div>
    </body>
</html>