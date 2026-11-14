<?php

namespace Database\Seeders;

use App\Models\Comic;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class ComicSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Lookup rows FIRST, each held in a variable
        $a = Genre::create(['name' => 'Action']);
        $b = Genre::create(['name' => 'Sci-Fi']);
        $c = Genre::create(['name' => 'Adventure']);
        $d = Genre::create(['name' => 'Fantasy']);

        // 2. Comics (20 total: 5 Action, 5 Sci-Fi, 5 Adventure, 5 Fantasy)
        // Years mostly distributed across: 2001, 2014, 2016, 2017, 2018, 2020

        // --- ACTION (5) ---
        Comic::create([
            'title'       => 'Spider-Man: Blue',
            'author'      => 'Jeph Loeb',
            'year'        => 2001,
            'price'       => 19.99,
            'genre_id'    => $a->id,
            'is_featured' => true,
        ]);

        Comic::create([
            'title'       => 'Batman: Year One',
            'author'      => 'Frank Miller',
            'year'        => 2001,
            'price'       => 16.99,
            'genre_id'    => $a->id,
            'is_featured' => false,
        ]);

        Comic::create([
            'title'       => 'Daredevil: Born Again',
            'author'      => 'Frank Miller',
            'year'        => 2016,
            'price'       => 18.50,
            'genre_id'    => $a->id,
            'is_featured' => false,
        ]);

        Comic::create([
            'title'       => 'Invincible Vol. 1',
            'author'      => 'Robert Kirkman',
            'year'        => 2017,
            'price'       => 14.99,
            'genre_id'    => $a->id,
            'is_featured' => true,
        ]);

        Comic::create([
            'title'       => 'Venom: Rex',
            'author'      => 'Donny Cates',
            'year'        => 2018,
            'price'       => 17.99,
            'genre_id'    => $a->id,
            'is_featured' => false,
        ]);

        // --- SCI-FI (5) ---
        Comic::create([
            'title'       => 'Watchmen',
            'author'      => 'Alan Moore',
            'year'        => 2014,
            'price'       => 24.99,
            'genre_id'    => $b->id,
            'is_featured' => true,
        ]);

        Comic::create([
            'title'       => 'Saga Vol. 1',
            'author'      => 'Brian K. Vaughan',
            'year'        => 2014,
            'price'       => 14.99,
            'genre_id'    => $b->id,
            'is_featured' => false,
        ]);

        Comic::create([
            'title'       => 'Descender Vol. 1',
            'author'      => 'Jeff Lemire',
            'year'        => 2016,
            'price'       => 12.99,
            'genre_id'    => $b->id,
            'is_featured' => false,
        ]);

        Comic::create([
            'title'       => 'Paper Girls Vol. 1',
            'author'      => 'Brian K. Vaughan',
            'year'        => 2016,
            'price'       => 13.99,
            'genre_id'    => $b->id,
            'is_featured' => false,
        ]);

        Comic::create([
            'title'       => 'Akira Vol. 1',
            'author'      => 'Katsuhiro Otomo',
            'year'        => 2017,
            'price'       => 24.95,
            'genre_id'    => $b->id,
            'is_featured' => false,
        ]);

        // --- ADVENTURE (5) ---
        Comic::create([
            'title'       => 'One Piece Vol. 1',
            'author'      => 'Eiichiro Oda',
            'year'        => 2001,
            'price'       => 9.99,
            'genre_id'    => $c->id,
            'is_featured' => true,
        ]);

        Comic::create([
            'title'       => 'Bone: Out from Boneville',
            'author'      => 'Jeff Smith',
            'year'        => 2014,
            'price'       => 12.99,
            'genre_id'    => $c->id,
            'is_featured' => false,
        ]);

        Comic::create([
            'title'       => 'Lumberjanes Vol. 1',
            'author'      => 'Noelle Stevenson',
            'year'        => 2017,
            'price'       => 14.99,
            'genre_id'    => $c->id,
            'is_featured' => false,
        ]);

        Comic::create([
            'title'       => 'Tintin in Tibet',
            'author'      => 'Hergé',
            'year'        => 2018,
            'price'       => 13.50,
            'genre_id'    => $c->id,
            'is_featured' => false,
        ]);

        Comic::create([
            'title'       => 'Amulet: The Stonekeeper',
            'author'      => 'Kazu Kibuishi',
            'year'        => 2020,
            'price'       => 12.99,
            'genre_id'    => $c->id,
            'is_featured' => false,
        ]);

        // --- FANTASY (5 - added to reach 20 total) ---
        Comic::create([
            'title'       => 'The Sandman: Preludes & Nocturnes',
            'author'      => 'Neil Gaiman',
            'year'        => 2018,
            'price'       => 19.99,
            'genre_id'    => $d->id,
            'is_featured' => true,
        ]);

        Comic::create([
            'title'       => 'Monstress Vol. 1',
            'author'      => 'Marjorie Liu',
            'year'        => 2016,
            'price'       => 14.99,
            'genre_id'    => $d->id,
            'is_featured' => false,
        ]);

        Comic::create([
            'title'       => 'Hellboy: Seed of Destruction',
            'author'      => 'Mike Mignola',
            'year'        => 2001,
            'price'       => 17.99,
            'genre_id'    => $d->id,
            'is_featured' => false,
        ]);

        Comic::create([
            'title'       => 'Fables: Legends in Exile',
            'author'      => 'Bill Willingham',
            'year'        => 2020,
            'price'       => 16.99,
            'genre_id'    => $d->id,
            'is_featured' => false,
        ]);

        Comic::create([
            'title'       => 'Once & Future Vol. 1',
            'author'      => 'Kieron Gillen',
            'year'        => 2020,
            'price'       => 16.99,
            'genre_id'    => $d->id,
            'is_featured' => false,
        ]);
    }
}