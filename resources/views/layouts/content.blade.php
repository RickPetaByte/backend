@if(auth()->check())
    <p class="text-white text-2xl select-none">Welkom, {{ auth()->user()->name }}!</p>
@endif

<h1 class="text-white text-center text-4xl mt-5 select-none">Laravel Book CRUD Application</h1>
<h3 class="text-white text-center text-2xl mt-5 mb-5 select-none">Made by Rick</h3>

@if(auth()->check())
    <div class="rtl:text-right text-white p-5 w-full dark:bg-gray-700 mb-4 text-center flex justify-around items-center">
        <span>Click on the "Add Book" button to add a book</span>
        <a href="{{ route('addbooks') }}"><button rou class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Book</button></a>
    </div>
@endif

<div class="relative overflow-x-auto w-full rounded">
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
                    Book Image
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
                    <td><img src="{{ asset($book->book_image) }}" alt="Book Image" width="100" height="100" class="mx-auto"></td>
                    
                    @if (auth()->check())
                        <td class="px-6 py-4 flex justify-between items-center h-44">
                            <a href="{{ route('bookdetails', $book->id) }}">
                                <button class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Details</button>
                            </a>
                                
                            <a href="{{ route('bookedit', $book->id) }}">
                                <button class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
                            </a>
                        
                            <form action="{{ route('bookdelete', $book->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this book?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</button>
                            </form>
                        </td>
                    @else
                        <td class="px-6 py-4 flex justify-center items-center h-44">
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

