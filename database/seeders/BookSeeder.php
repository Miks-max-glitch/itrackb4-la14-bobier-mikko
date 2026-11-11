<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        // 1. lookup rows FIRST, each held in a variable
        $a = Genre::create(['name' => 'Classical']);
        $b = Genre::create(['name' => 'Mystery']);
        $c = Genre::create(['name' => 'Historical']);

        // 2. books: [title, author, year, genre, is_featured]
        $books = [
            // Classical (5)
            ['The Lion, the Witch and the Wardrobe', 'C. S. Lewis',          1950, $a, true],
            ['Pride and Prejudice',                  'Jane Austen',          1813, $a, true],
            ['Great Expectations',                   'Charles Dickens',      1861, $a, false],
            ['Moby-Dick',                            'Herman Melville',      1851, $a, false],
            ['Jane Eyre',                            'Charlotte Brontë',     1847, $a, false],

            // Mystery (7)
            ['Destination Unknown',                  'Agatha Christie',      1954, $b, false],
            ['Set in Darkness',                      'Ian Rankin',           2000, $b, false],
            ['And Then There Were None',             'Agatha Christie',      1939, $b, true],
            ['The Maltese Falcon',                   'Dashiell Hammett',     1930, $b, false],
            ['The Girl with the Dragon Tattoo',      'Stieg Larsson',        2005, $b, false],
            ['Gone Girl',                            'Gillian Flynn',        2012, $b, true],
            ['The Hound of the Baskervilles',        'Arthur Conan Doyle',   1902, $b, false],

            // Historical (8)
            ['Chesapeake',                           'James A. Michener',    1978, $c, false],
            ['The Blind Assassin',                   'Margaret Atwood',      2000, $c, false],
            ['Wolf Hall',                            'Hilary Mantel',        2009, $c, true],
            ['The Pillars of the Earth',             'Ken Follett',          1989, $c, false],
            ['All the Light We Cannot See',          'Anthony Doerr',        2014, $c, false],
            ['Pachinko',                             'Min Jin Lee',          2017, $c, false],
            ['The Name of the Rose',                 'Umberto Eco',          1980, $c, false],
            ['I, Claudius',                          'Robert Graves',        1934, $c, false],
        ];

        foreach ($books as [$title, $author, $year, $genre, $featured]) {
            Book::create([
                'title'       => $title,
                'author'      => $author,
                'year'        => $year,
                'genre_id'    => $genre->id,
                'is_featured' => $featured,
            ]);
        }
    }
}