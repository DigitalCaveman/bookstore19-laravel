<?php

use Illuminate\Database\Seeder;
use App\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::all()->first();

        $book = new Book;
        $book->title = "Herr der Ringe";
        $book->subtitle = "Die Gefährten";
        $book->isbn = "23523423422";
        $book->brutto_price = 10.50;
        $book->rating = 10;
        $book->description = "Erster Teil..";
        $book->published = new DateTime();
        // map existing user to book
        $book->user()->associate($user);
        $book->save();

        $authors = App\Author::all()->pluck("id");
        $book->authors()->sync($authors);
        $book->save();

        $book2 = new Book;
        $book2->title = "Herr der Ringe II";
        $book2->subtitle = "Die 2 Türme";
        $book2->isbn = "23523423412";
        $book2->brutto_price = 11.50;
        $book2->rating = 10;
        $book2->description = "Zweiter Teil..";
        $book2->published = new DateTime();
        $book2->user()->associate($user);
        $book2->save();

        $image1 = new App\Image();
        $image1->title = "Cover 1";
        $image1->url = "https://m.media-amazon.com/images/I/81YhTPSojOL._AC_UL654_FMwebp_QL65_.jpg";
        $image1->book()->associate($book);
        $image1->save();

        $image2 = new App\Image();
        $image2->title = "Cover 2";
        $image2->url = "https://m.media-amazon.com/images/I/81mAUoMZ0sL._AC_UL654_FMwebp_QL65_.jpg";
        $image2->book()->associate($book);
        $image2->save();


    }
}
