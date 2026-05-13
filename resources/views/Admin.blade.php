<html language="en">
    <head>
        <meta charset="UTF-8">
        <title>Admin Dashboard</title>
        @vite("resources/css/app.css")
    </head>
    <body>
        <nav class="bg-white shadow-md px-4 py-3">
            <div class="flex justify-between items-center">
                <div class="text-2xl text-gray-700 hover:text-blue-500">

                    Quiz System
                </div>
                <div class="Space-x-4">
                    <a href="" class="text-gray-700 hover:text-blue-500">Categories</a>
                    <a href="" class="text-gray-700 hover:text-blue-500">Quiz</a>
                    <a href="" class="text-gray-700 hover:text-blue-500">Welcome {{$name}}</a>
                    <a href="" class="text-gray-700 hover:text-blue-500">LogOut</a>
                </div>
            </div>
        </nav>
    </body>
</html>