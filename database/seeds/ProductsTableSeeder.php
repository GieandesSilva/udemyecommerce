<?php

use Illuminate\Database\Seeder;

use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        factory(\App\Product::class, 30)->create();
        
        /*

        $p1 = [

            'name' => 'Linux, a Bíblia: O Mais Abrangente e Definitivo Guia Sobre Linux',

            'image' => 'images/uploads/products/119804671SZ.jpg',

            'price' => 10910 ,

            'description' => 'Quer adquirir uma base para se tornar um profissional certificado em Linux, iniciar em uma carreira que vai durar décadas, dominar habilidades que você pode usar em todas as distribuições Linux.'
        ];

        $p2 = [

            'name' => 'Javascript: O Guia Definitivo',

            'image' => 'images/uploads/products/112167569SZ.jpg',

            'price' => 12340 ,

            'description' => 'JavaScript é a linguagem de programação da Web. A maioria dos sites modernos usa JavaScript, e todos os navegadores - em computadores de mesa, consoles de jogos, tablets e smartphones - incluem interpretadores JavaScript.'
        ];

        $p3 = [

            'name' => 'HTML e CSS : Projete e Construa Webistes',

            'image' => 'images/uploads/products/126167842SZ.jpg',

            'price' => 14850 ,

            'description' => 'Se você quer projetar, construir do zero ou ter mais controle sobre um site existente, este livro lhe ajudará a criar conteúdos atrativos e amigáveis.'
        ];

        $p4 = [

            'name' => 'Desenvolvendo Com Laravel - Novatec',

            'image' => 'images/uploads/products/24584267_1SZ.jpg',

            'price' => 8990 ,

            'description' => 'O que diferencia o Laravel de outros frameworks Php? Para começar, velocidade e simplicidade.'
        ];

        Product::create($p1);
        Product::create($p2);
        Product::create($p3);
        Product::create($p4);

        */
    }
}
