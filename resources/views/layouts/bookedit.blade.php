<div class="flex items-center justify-center min-h-screen">
    <form action="{{ route('bookedit', ['id' => $book->id]) }}" method="POST" class="max-w-md w-full">
        @csrf
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="book_title" id="floating_book_title" class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="book_title" class="peer-focus:font-medium absolute text-sm text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Book Title</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="book_author" id="floating_book_author" class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="book_author" class="peer-focus:font-medium absolute text-sm text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Author</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="publication_year" id="floating_publication_year" class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_repeat_password" class="peer-focus:font-medium absolute text-sm text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Publication Year</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <div class="multiselect w-full">
                <div class="selectBox">
                  <select>
                    <option>Select an option</option>
                  </select>
                  <div class="overSelect"></div>
                </div>
                <div class="bg-white" style="display: none;" id="checkboxes">
                    <label for="romantic">
                    <input name="genres[]" class="m-2" type="checkbox" id="romantic" value="romantic" />Romantic</label>
                    <label for="action">
                    <input name="genres[]" class="m-2" type="checkbox" id="action" value="action" />Action</label>
                    <label for="Thriller">
                    <input name="genres[]" class="m-2" type="checkbox" id="thriller" value="thriller" />Thriller</label>
                    <label for="scifi">
                    <input name="genres[]" class="m-2" type="checkbox" id="scifi" value="scifi" />Sci-fi</label>
                    <label for="history">
                    <input name="genres[]" class="m-2" type="checkbox" id="history" value="" />History</label>
                </div>
            </div>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit Book</button>
    
        @if(@session('success'))
            <div class="text-green-600 mt-2">
                {{ session('success')}}
            </div>
        @endif

        @if($errors->any())
            <div class="text-red-800 mt-2">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
    
    </form>
</div>