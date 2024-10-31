{{-- <div class="container">
    <h1>{{ $book->book_title }}</h1>
    <p><strong>Auteur:</strong> {{ $book->book_author }}</p>
    <p><strong>Publicatiejaar:</strong> {{ $book->publication_year }}</p>
    <p><strong>Genre:</strong> {{ $book->genres }}</p>

    <a href="{{ route('welcome') }}" class="btn btn-primary">Terug naar boekenlijst</a>
</div> --}}

<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white text-center">
            <h1 class="card-title mb-0 text-2xl">{{ $book->book_title }}</h1>
            <h6 class="text-light text-xl">{{ $book->book_author }}</h6>
        </div>
        <div class="card-body">
            <p><strong>Auteur:</strong> {{ $book->book_author }}</p>
            <p><strong>Publicatiejaar:</strong> {{ $book->publication_year }}</p>
            <p><strong>Genre:</strong> {{ json_encode($book->genres) }}</p>
            <p><strong>Book Image:</strong><img src="{{ asset($book->book_image) }}" alt="Book Image" width="100" height="100"></p>
            <hr>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('welcome') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left"></i> Terug naar boekenlijst
            </a>
        </div>
    </div>
</div>
