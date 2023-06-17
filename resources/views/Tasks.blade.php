<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body class="bg-slate-100 flex flex-col items-center">
    <h1 class=" p-2 text-4xl text-orange-500 mb-6">
        Todo-laravel
    </h1>

    <div class="flex w-[600px] gap-4">
        <form method="post" action="{{route("tasks.store")}}" class="w-5/12 h-44 bg-white p-4 rounded-md inline-block">
            @csrf
            <div class="mb-6">
                <label for="task" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task</label>
                <input type="text" id="task" name="task" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add task</button>
        </form>
        <div class="w-7/12">
            @foreach($tasks as $task)
            <form action="{{route("tasks.update", $task->id)}}" method="post" class=" bg-white p-4 rounded-md flex mb-4">
                @csrf
                @method("put")
                <input value="{{$task->task}}" name="updatedTask" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-10">
                <button type="submit" class="text-green-800 bg-green-200 h-10 flex items-center">update</button>
                <!-- <input  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> -->
                <a href="{{route("deleteTask", $task->id )}}" class="text-red-800 bg-red-200 h-10 flex items-center rounded-r-lg">delete</a>
            </form>
            @endforeach
        </div>
</body>

</html>