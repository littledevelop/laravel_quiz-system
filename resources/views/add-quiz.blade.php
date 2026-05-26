<html language="UN">
    <head>
        <meta charset="UTF">
        <title>Add Quiz</title>
        @vite("resources/css/app.css")
    </head>
    <body>
        <x-navbar name={{$name}}></x-navbar>
            {{-- <div class="bg-green-800 pl-3 text-white w-full">{{session('quizDetails')}}</div> --}}
            <div class="bg-gray-100 flex flex-col w-full min-h-screen items-center pt-10">
            <div class="bg-white p-8 rounded-xl w-full shadow-lg max-w-md">
            @if(!session('quizDetails'))
                <h2 class="text-gray-800 text-center text-2xl mb-6">Add Quiz</h2>
                <form action="/add-quiz" method="get" class="space-y-4">
                    {{-- @csrf --}}
                    <div>
                        <input class="border border-gray-300 w-full rounded-xl focus:outline-none px-4 py-2" type="text" name="quiz_name" required placeholder="Please Enter Quiz Name"> 
                    </div>    
                    <div>
                        <select name="category_id" required class="border border-gray-300 w-full rounded-xl px-4 py-2 focus:outline-none">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value={{$category->category_id}}>{{$category->cname}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="bg-blue-500 w-full text-white rounded-xl px-4 py-2" name="addQuiz" type="submit">Add Quiz</button>
                </form>
            @else
                <span class="text-green-500 font-bold">Quiz_name : {{ session('quizDetails')->quiz_name}}</span>
                <p class="text-green-600 font-bold">Total MCQs : {{$totalMCQs}}</p>
                @if($totalMCQs > 0)
                    <a class="text-yellow-600 font-bold text-sm" href="/show-mcqs/{{ session('quizDetails')->id }}">Show MCQs</a>
                @endif
                <h2 class="text-gray-800 text-2xl text-center mb-6">Add MCQ</h2>
                <form action="/add-mcqs" method="post" class="space-y-4">
                    @csrf
                    <div>
                        <textarea type="text" name="question" required placeholder="Enter Your Question" class="border border-gray-300 w-full rounded-xl focus:outline-none px-4 py-2"></textarea>
                        @error('question')
                        <div class='text-red-500'>{{$message}}</div>
                        @enderror
                    </div>
                    <div>
                        <input type="text" placeholder="Enter First Option" required name="opt_A" class="border border-gray-300 w-full rounded-xl focus:outline-none px-4 py-2">
                        @error('opt_A')
                            <div class='text-red-500'>{{$message}}</div>
                        @enderror
                    </div>
                     <div>
                        <input type="text" placeholder="Enter Second Option" required name="opt_B" class="border border-gray-300 w-full rounded-xl focus:outline-none px-4 py-2">
                         @error('opt_B')
                            <div class='text-red-500'>{{$message}}</div>
                        @enderror
                    </div> 
                    <div>
                        <input type="text" placeholder="Enter Third Option" required name="opt_C" class="border border-gray-300 w-full rounded/-xl focus:outline-none px-4 py-2">
                         @error('opt_C')
                            <div class='text-red-500'>{{$message}}</div>
                        @enderror
                    </div>
                     <div>
                        <input type="text" placeholder="Enter Forth Option" required name="opt_D" class="border border-gray-300 w-full rounded-xl focus:outline-none px-4 py-2">
                         @error('opt_D')
                            <div class='text-red-500'>{{$message}}</div>
                        @enderror
                    </div>
                    <div>
                        <select name="correct_answer" required class="border border-gray-300 w-full rounded-xl focus:outline-none px-4 py-2">
                            <option value="">Select Right Answer</option>
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                            <option>D</option>
                        </select>
                         @error('correct_answer')
                            <div class='text-red-500'>{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="bg-blue-500 w-full rounded-xl px-4 py-2 text-white" name="submit" value="add_more">Add More</button>
                    <button type="submit" class="bg-green-500 w-full rounded-xl px-4 py-2 text-white" name="submit" value="done">Add And Submit</button>
                    <a href="end-quiz" class="bg-red-500 w-full rounded-xl px-4 py-2 text-white block text-center">Finish Quiz</a>
                </form>
            @endif
            </div>
        </div>
    </body>
</html>
