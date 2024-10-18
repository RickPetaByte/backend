<div class="container">
    <h1>{{ $book->book_title }}</h1>
    <p><strong>Auteur:</strong> {{ $book->book_author }}</p>
    <p><strong>Publicatiejaar:</strong> {{ $book->publication_year }}</p>
    <p><strong>Genre:</strong> {{ $book->genres }}</p>

    <a href="{{ route('welcome') }}" class="btn btn-primary">Terug naar boekenlijst</a>
</div>