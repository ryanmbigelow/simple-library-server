<?php
class Book {
    //Properties
    public $title;
    public $author;
    public $year_published;
    public $genre;

    //Constructor method (that is called when creating a new instance)
    public function __construct($title, $author, $year_published, $genre) {
        $this->title = $title;
        $this->author = $author;
        $this->year_published = $year_published;
        $this->genre = $genre;
    }
}
?>
