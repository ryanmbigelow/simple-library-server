# Simple Library
## Description
Simple Library is a take home code assignment in a new language for me, PHP. The purpose on the backend is to create an api of books for a library. The books are required to have id, title, author, year_published, and genre fields.
## Features
- A model for books
- Functions to get, post, put and delete a book
- An SQL database with some pre-loaded book data
## Using the Application
- This project requires the installation of PHP and XAMPP
- There should be a simple-library.sql and simple-library.sqlite3 file
- Run the command palette and search for Sqlite: Open Database and select simple-library.sqlite3
- Open simple-library.sql and run the command palette and search for Sqlite: Run Selected Query to seed the database
- Unfortunately, I was unable to complete the assignment. Knowing Python, the following is how I would go about completing the rest of the assignment.
## Next Steps (server-side):
- I imported the book model file into the book view, but since I was using an SQL call, I was unsure where to incorporate the model. In Python, I would use Model.objects.get(pk=pk) which would retrieve the row whose primary key matched the query.
- I returned a serializer to convert the response into readable JSON. In Python, this is where I would specify that the JSON data should be formatted into the book model.
- Next I would configure the URL pattern. In Python, I would register the path '/books' with BookView.
## Next Steps (client-side):
- First I would write out all my api calls, e.g.
```
const getBooks = () => new Promise((resolve, reject) => {
  fetch(`${databaseURL}/books`)
    .then((response) => response.json())
    .then(resolve)
    .catch(reject);
});
```
- Next I would create a card component to display the book information and a form to intake user input. I like to import components from Bootstrap because they are dynamic and the documentation is thorough.
- Next I would import the components into the index file.
- To display the cards, I would use useState() to list all books, .map through them, and for each book, display the information on the card, e.g.
```
{books.map((book) => (
//mapping through the results of useState to get all books
  <section key={`book--${book.id}`} className="books">
    <BookCard bookObj={book} onUpdate={getAllBooks} />
    //the book card component accepts a book object
    //and after a book is deleted, the get all books api call is made again
  </section>
))}
```
- Each card would have a delete button on it. It would pass its id along to the delete function, remove it from the database, and reload the page.
- For the form, I would set up an event handler that accepts the value inputted and assigns it to the name of the column.
```
const handleChange = (e) => {
  const { name, value } = e.target;
  //this key-value pair is listening to each text box in the form
  setCurrentBook((prevState) => ({
    ...prevState,
    [name]: value,
    //with the spread operator, we assign the user input value to each column
  }));
};
```
- If a user was creating a new entity, the values would start as empty strings. If the user was updating an entity, the values would be assigned the saved values from the database.
