<html language="en">
    <head>
        <meta charset="UTF-8">
        <title>Admin Dashboard</title>
        @vite("resources/css/app.css")
    </head>
    <body>
       <x-navbar name={{$name}}></x-navbar>
       @if(session('category'))
        <div class="bg-green-800 text-white pl-5 w-full">{{session('category')}}</div> 
       @endif
       <div class="bg-gray-100 flex flex-col items-center pt-10 min-h-screen">

            <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm">
                <h2 class="text-2xl text-center mb-6 text-gray-800">Categories</h2>
                <form action="/add-category" method="post" class="space-y-4">
                    @csrf
                    <div>
                        {{-- <label class="text-gray-600 mb-1">Category_Name</label> --}}
                        <input type="text" name="cname" placeholder="Enter Category_Name" class="border border-gray-300 focus:outline-none px-4 py-2 w-full rounded-xl">
                        @error('cname')
                            <div class="text-red-500">{{$message}}</div>
                        @enderror
                    </div>
                    <button name="addCategory" type="submit" class="bg-blue-500 text-white w-full rounded-xl px-4 py-2">Add Category</button>
                </form>
            </div>
            <div class="w-200">
                <h1 class="text-2xl text-blue-500">Category List</h1>
                <ul class="border border-gray-200">
                    <li class="p-2 font-bold">
                        <ul class="flex justify-between">
                            <li class="w-30">category_id</li>
                            <li class="w-70">category_name</li>
                            <li class="w-70">creator</li>
                            <li class="w-30">Action</li>
                        </ul>
                    </li>
                    @foreach($categories as $category)
                    <li class="even:bg-gray-200 p-2">
                        <ul class="flex justify-between">
                            <li class="w-30">{{$category->category_id}}</li>
                            <li class="w-70">{{$category->cname}}</li>
                            <li class="w-70">{{$category->creator}}</li>
                            <li class="w-15">
                                <a href="/category/delete/{{ $category->category_id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M292.31-140q-29.92 0-51.12-21.19Q220-182.39 220-212.31V-720h-40v-60h180v-35.38h240V-780h180v60h-40v507.69Q740-182 719-161q-21 21-51.31 21H292.31ZM680-720H280v507.69q0 5.39 3.46 8.85t8.85 3.46h375.38q4.62 0 8.46-3.85 3.85-3.84 3.85-8.46V-720ZM376.16-280h59.99v-360h-59.99v360Zm147.69 0h59.99v-360h-59.99v360ZM280-720v520-520Z"/></svg> 
                                </a>
                            </li>
                            <li class="w-15">
                                <a href="/category/edit/{{ $category->category_id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M200-200h50.46l409.46-409.46-50.46-50.46L200-250.46V-200Zm-60 60v-135.38l527.62-527.39q9.07-8.24 20.03-12.73 10.97-4.5 23-4.5t23.3 4.27q11.28 4.27 19.97 13.58l48.85 49.46q9.31 8.69 13.27 20 3.96 11.31 3.96 22.62 0 12.07-4.12 23.03-4.12 10.97-13.11 20.04L275.38-140H140Zm620.38-570.15-50.23-50.23 50.23 50.23Zm-126.13 75.9-24.79-25.67 50.46 50.46-25.67-24.79Z"/></svg>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </div>
       </div>
    </body>
</html>