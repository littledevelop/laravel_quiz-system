<html language="UN">
    <head>
        <meta charset="UTF">
        <title>Add Quiz</title>
        @vite("resources/css/app.css")
    </head>
    <body>
        <x-navbar name={{$name}}></x-navbar>
            <div class="bg-green-800 pl-3 text-white w-full">{{session('quizDetails')}}</div>
            <div class="bg-gray-100 flex flex-col w-full min-h-screen items-center pt-10">
            <div class="bg-white p-8 rounded-xl w-full shadow-lg max-w-md">
            @if(!session('quizDetails'))
                <h2 class="text-gray-800 text-center text-2xl mb-6">Add Quiz</h2>
                <form action="/add-quiz" method="get" class="space-y-4">
                    <div>
                        <input class="border border-gray-300 w-full rounded-xl focus:outline-none px-4 py-2" type="text" name="quiz_name" placeholder="Please Enter Quiz Name"> 
                    </div>    
                    <div>
                        <select name="category_id" class="border border-gray-300 w-full rounded-xl px-4 py-2 focus:outline-none">
                            <option>Select Category</option>
                            @foreach ($categories as $category)
                                <option value={{$category->category_id}}>{{$category->cname}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="bg-blue-500 w-full text-white rounded-xl px-4 py-2" name="addQuiz" type="submit">Add Quiz</button>
                </form>
            @else
                <span class="text-green-500 font-bold">Quiz_name:{{ session('quizDetails')->quiz_name}}</span>
                <h2 class="text-gray-800 text-2xl text-center mb-6">Add MCQ</h2>
                <form action="" method="get" class="space-y-4">
                    <div>
                        <textarea type="text" name="question" placeholder="Enter Your Question" class="border border-gray-300 w-full rounded-xl focus:outline-none px-4 py-2"></textarea>
                    </div>
                    <div>
                        <input type="text" placeholder="Enter First Option" name="firstoption" class="border border-gray-300 w-full rounded-xl focus:outline-none px-4 py-2">
                    </div>
                     <div>
                        <input type="text" placeholder="Enter Second Option" name="secondoption" class="border border-gray-300 w-full rounded-xl focus:outline-none px-4 py-2">
                    </div> 
                    <div>
                        <input type="text" placeholder="Enter Third Option" name="thirdoption" class="border border-gray-300 w-full rounded-xl focus:outline-none px-4 py-2">
                    </div>
                     <div>
                        <input type="text" placeholder="Enter Forth Option" name="forthoption" class="border border-gray-300 w-full rounded-xl focus:outline-none px-4 py-2">
                    </div>
                    <div>
                        <select name="answer" class="border border-gray-300 w-full rounded-xl focus:outline-none px-4 py-2">
                            <option>Select Right Answer</option>
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                            <option>D</option>
                        </select>
                    </div>
                    <button type="submit" class="bg-blue-500 w-full rounded-xl px-4 py-2 text-white">Add More</button>
                    <button type="submit" class="bg-green-500 w-full rounded-xl px-4 py-2 text-white">Add And Submit</button>
                </form>
            @endif
            </div>
        </div>
    </body>
</html>
