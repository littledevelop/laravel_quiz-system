<html language="en">
    <head>
        <meta charset="UTF-8">
        <title>Show MCQs</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <x-navbar name={{ $name }}></x-navbar>
        <div class="bg-gray-100 flex flex-col items-center min-h-screen pt-10"> 
            <h2 class="text-2xl mb-6 text-center text-gray-800">All Current Quiz's MCQS</h2>
            <span class="text-yellow-500 text-md"><a href="/add-quiz">Back</a></span>
            <div class="w-200">
                {{-- <h1 class="text-xl text-blue-500"></h1> --}}
                <ul class="border border-gray-200">
                    <li class="p-2 font-bold">
                        <ul class="flex justify-between">
                            <li class="w-30">MCQ_id</li>
                            <li class="w-170">Question</li>
                        </ul>
                    </li>
                    @foreach ($mcqs as $mcq )                  
                    <li class="p-2 even:bg-gray-200"> 
                        <ul class="flex justify-between">
                            <li class="w-30">{{ $mcq->mcq_id }}</li>
                            <li class="w-170">{{ $mcq->question }}</li>
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </body>
</html>