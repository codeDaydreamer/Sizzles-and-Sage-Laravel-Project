<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuItem; // Make sure this matches your actual MenuItem model namespace

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define your menu items with full paths to the images
        $menuItems = [
            [
                'name' => 'Margherita Pizza',
                'description' => 'Traditional Italian pizza with tomatoes, mozzarella cheese, and basil.',
                'price' => 1500,
                'category' => 'Appetizers',
                'image' => 'images/appetizer1.jpg',
            ],
            [
                'name' => 'Caesar Salad',
                'description' => 'Classic salad with romaine lettuce, croutons, Parmesan cheese, and Caesar dressing.',
                'price' => 1200,
                'category' => 'Appetizers',
                'image' => 'images/appetizer2.jpg',
            ],
            [
                'name' => 'Caprese Salad',
                'description' => 'Fresh salad with tomatoes, mozzarella cheese, basil, and balsamic vinegar.',
                'price' => 1100,
                'category' => 'Appetizers',
                'image' => 'images/appetizer3.jpg',
            ],
            [
                'name' => 'Garlic Bread',
                'description' => 'Toasted bread slices rubbed with garlic and topped with olive oil and herbs.',
                'price' => 900,
                'category' => 'Appetizers',
                'image' => 'images/appetizer4.jpg',
            ],
            [
                'name' => 'Beef Burger',
                'description' => 'Juicy beef patty with lettuce, tomato, onion, and pickles on a sesame seed bun.',
                'price' => 1100,
                'category' => 'Main Courses',
                'image' => 'images/main1.jpg',
            ],
            [
                'name' => 'Pasta Carbonara',
                'description' => 'Spaghetti with creamy sauce, pancetta, and Parmesan cheese.',
                'price' => 1400,
                'category' => 'Main Courses',
                'image' => 'images/main2.jpg',
            ],
            [
                'name' => 'Grilled Salmon',
                'description' => 'Fresh salmon fillet grilled to perfection, served with steamed vegetables.',
                'price' => 1800,
                'category' => 'Main Courses',
                'image' => 'images/main3.jpg',
            ],
            [
                'name' => 'Chicken Alfredo',
                'description' => 'Fettuccine pasta with creamy Alfredo sauce and grilled chicken breast.',
                'price' => 1600,
                'category' => 'Main Courses',
                'image' => 'images/main4.jpg',
            ],
            [
                'name' => 'Chocolate Brownie',
                'description' => 'Decadent chocolate brownie served warm with vanilla ice cream.',
                'price' => 800,
                'category' => 'Desserts',
                'image' => 'images/dessert1.jpg',
            ],
            [
                'name' => 'Tiramisu',
                'description' => 'Traditional Italian dessert with layers of coffee-soaked ladyfingers and mascarpone cheese.',
                'price' => 900,
                'category' => 'Desserts',
                'image' => 'images/dessert2.jpg',
            ],
            [
                'name' => 'New York Cheesecake',
                'description' => 'Rich and creamy cheesecake with a graham cracker crust.',
                'price' => 1000,
                'category' => 'Desserts',
                'image' => 'images/dessert3.jpg',
            ],
            [
                'name' => 'Fruit Sorbet',
                'description' => 'Refreshing fruit sorbet made with fresh seasonal fruits.',
                'price' => 600,
                'category' => 'Desserts',
                'image' => 'images/dessert4.jpg',
            ],
            [
                'name' => 'Mojito',
                'description' => 'Classic Cuban cocktail with rum, mint leaves, lime juice, sugar, and soda water.',
                'price' => 900,
                'category' => 'Drinks',
                'image' => 'images/drink1.jpg',
            ],
            [
                'name' => 'Espresso',
                'description' => 'Strong Italian coffee brewed by forcing hot water through finely-ground coffee beans.',
                'price' => 400,
                'category' => 'Drinks',
                'image' => 'images/drink2.jpg',
            ],
            [
                'name' => 'Green Tea',
                'description' => 'Traditional Japanese green tea, served hot or cold.',
                'price' => 300,
                'category' => 'Drinks',
                'image' => 'images/drink3.jpg',
            ],
            [
                'name' => 'Red Wine',
                'description' => 'Full-bodied red wine with rich flavors of berries and spices.',
                'price' => 1500,
                'category' => 'Drinks',
                'image' => 'images/drink4.jpg',
            ],
        ];

        // Insert all menu items into the database
        foreach ($menuItems as $menuItem) {
            MenuItem::create([
                'name' => $menuItem['name'],
                'description' => $menuItem['description'],
                'price' => $menuItem['price'],
                'category' => $menuItem['category'],
                'image' => $menuItem['image'],
            ]);
        }
    }
}
