H1. The top of your error page named a file inside vendor. Say why that was not where your mistake was, and where the page showed you it actually was.
Answer:
The top of the error page named a file inside `vendor`, because that is where Laravel stopped when it tried to run `withh()`, a method that does not exist. My mistake was in `app/Http/Controllers/BookController.php` at line ___, which the Exception trace had already opened for me with the line marked in red.

H2. You wrote one Log::info line with a context array. Name something it will tell you next month that the error page could not.
Answer:
My `Log::info('Book saved', ['id' => ...])` line will tell me next month which Book was saved and when. The error page could not tell me that, because it only appears for failures, only while someone is looking, and a successful save is never an error.

H3. Your guard answers with 403 instead of redirecting back with a message. Say when each of the two is the better answer.
Answer:
I used 403 on delete because deleting the last Book in a genre is a request my app should refuse. A redirect back with a message is better when a normal user did something reasonable that did not work, such as a form filled in wrongly, because they need to be told why and try again. A 403 is better when the request should not have been made at all, such as someone typing the delete address by hand.
