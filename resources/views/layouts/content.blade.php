@if(auth()->check())
    <p class="text-white text-2xl">Welkom, {{ auth()->user()->name }}!</p>
@endif

<h1 class="text-white text-center text-4xl mt-5">Laravel Book CRUD Application</h1>
<h3 class="text-white text-center text-2xl mt-5 mb-5">Made by Rick</h3>

@if(auth()->check())
    <div class="rtl:text-right text-white p-5 w-full dark:bg-gray-700 mb-4 text-center flex justify-around items-center">
        <span>Click on the "Add Book" button to add a book</span>
        <a href="{{ route('addbooks') }}"><button rou class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Book</button></a>
    </div>
@endif

<div class="relative overflow-x-auto w-full">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 text-center">
                    Book Title
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Author
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Publication year
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Genre
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    @if (auth()->check())
                        Actions
                    @else
                        Details
                    @endif
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center">
                    <td>{{ $book->book_title }}</td>
                    <td>{{ $book->book_author }}</td>
                    <td>{{ $book->publication_year }}</td>
                    <td>{{ json_encode($book->genres) }}</td>
                    
                    @if (auth()->check())
                        <td class="px-6 py-4 flex justify-between">
                            <a href="{{ route('bookdetails', $book->id) }}">
                                <button class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Details</button>
                            </a>
                                
                            <a href="{{ route('bookedit', $book->id) }}">
                                <button class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
                            </a>
                        
                            <a href="{{ route('bookdelete', $book->id) }}">
                                <button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</button>
                            </a>
                        </td>
                    @else
                        <td class="px-6 py-4 flex justify-center">
                            <a href="{{ route('bookdetails', $book->id) }}">
                                <button class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Details</button>
                            </a>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

