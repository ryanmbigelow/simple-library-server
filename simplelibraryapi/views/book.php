<?php
include_once('models/book.php');
$db = new SQLite3('/Users/user/workspace/jobsearch/simple-library/simple-library-server/simple-library.sqlite3');

class BookViewSet {
    //function to LIST all books
    public function list() {
        //api call to LIST all books
        $listBooks = $GLOBALS['db']->query('SELECT * FROM books');
        return serialize($listBooks);
    }
    public function retrieve() {
        //api call to RETRIEVE a single book by id
        $id = $_POST['id'];
        $retrieveBook = $GLOBALS['db']->prepare('SELECT * FROM books WHERE id = :id');
        $retrieveBook->execute(['id' => $id]);
        return serialize($retrieveBook);
    }
    public function post() {
        //POST api call to a new book
        //first we define each of the columns
        $title = $_POST['title'];
        $author = $_POST['author'];
        $year_published = $_POST['year_published'];
        $genre = $_POST['genre'];
        //INSERT statement
        //we use a prepare statement to ensure a user can only enter a string
        $postBook = $GLOBALS['db']->prepare('INSERT INTO books (title, author, year_published, genre) VALUES (:title, :author, :year_published, :genre)');
        $postBook->execute(['title' => $title, 'author' => $author, 'year_published' => $year_published, 'genre' => $genre]);
        return serialize($postBook);
    }
    public function update() {
        //PUT api call to an existing book based off its id 
        $id = $_POST['id'];
        //defining the columns
        $title = $_POST['title'];
        $author = $_POST['author'];
        $year_published = $_POST['year_published'];
        $genre = $_POST['genre'];
        //SET statement
        $putBook = $GLOBALS['db']->prepare('UPDATE books SET title = :title, author = :author, year_published = :year_published, genre = :genre WHERE id = :id');
        $putBook->execute(['title' => $title, 'author' => $author, 'year_published' => $year_published, 'genre' => $genre]);
        return serialize($putBook);
    }
    public function delete() {
        //api call to DELETE an existing book based off its id
        $id = $_POST['id'];
        //DELETE statement
        $deleteBook = $GLOBALS['db']->prepare('DELETE FROM books WHERE id = :id');
        $deleteBook->execute(['id' => $id]);
    }
}
