J1. Your HomeController is not a resource controller. Name two things an index() on a resource controller does that yours does not have to.

A resource controller's `index()` gets the list of books from the database and passes them to a list view. It also handles the paging, search and sorting of that list. My `HomeController` does none of that. It has no list to build, so it only passes two counts (`Book::count()` and `Genre::count()`) to the front page and shows it.

J2. Your pagination links lost the search term until you added one method. Say what those links contained before, and what the controller therefore received.

Before I added `withQueryString()`, the page links only contained `?page=2`. They had no `q=the` in them, so the controller received just the page number and no search word. With no search to apply, it showed the full book list again, and the search box came back empty.

J3. A misspelled sort value does not break your page. Explain why that is worse than an error, and what your allowed list does about it.

On SQLite, a wrong sort name like `?sort=titel` doesn't break the page. It just comes back in no particular order, so nobody sees an error or reports it, and it stays hidden. My allowed list (`title`, `author`, `year`) checks the sort value first. If it isn't on the list, the controller uses `title` instead, so the books are always sorted properly.