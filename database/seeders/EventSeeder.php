<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            'title' => 'Laravel Conference 2024',
            'description' => 'Join us for the biggest Laravel conference of the year! Learn from experts, network with fellow developers, and discover the latest in Laravel development.',
            'date' => '2024-12-15',
            'time' => '09:00:00',
            'location' => 'Convention Center, New York',
            'image' => 'https://via.placeholder.com/400x200?text=Laravel+Conference',
            'category' => 'Technology',
            'price' => 299.99,
            'capacity' => 500,
        ]);

        Event::create([
            'title' => 'Summer Music Festival',
            'description' => 'Experience an unforgettable night of music with top artists from around the world. Multiple stages, food vendors, and amazing vibes!',
            'date' => '2024-07-20',
            'time' => '18:00:00',
            'location' => 'Central Park, New York',
            'image' => 'https://via.placeholder.com/400x200?text=Music+Festival',
            'category' => 'Music',
            'price' => 89.99,
            'capacity' => 10000,
        ]);

        Event::create([
            'title' => 'Art Gallery Opening',
            'description' => 'Celebrate the opening of our new contemporary art exhibition featuring works from emerging and established artists.',
            'date' => '2024-08-05',
            'time' => '19:00:00',
            'location' => 'Modern Art Museum, Los Angeles',
            'image' => 'https://via.placeholder.com/400x200?text=Art+Gallery',
            'category' => 'Art',
            'price' => 25.00,
            'capacity' => 200,
        ]);

        Event::create([
            'title' => 'Startup Pitch Night',
            'description' => 'Watch innovative startups pitch their ideas to investors. Network with entrepreneurs and discover the next big thing.',
            'date' => '2024-09-10',
            'time' => '20:00:00',
            'location' => 'Tech Hub, San Francisco',
            'image' => 'https://via.placeholder.com/400x200?text=Startup+Pitch',
            'category' => 'Business',
            'price' => 15.00,
            'capacity' => 150,
        ]);

        Event::create([
            'title' => 'Yoga & Wellness Retreat',
            'description' => 'Escape the city for a weekend of yoga, meditation, and wellness activities in the beautiful mountains.',
            'date' => '2024-10-12',
            'time' => '08:00:00',
            'location' => 'Mountain Resort, Colorado',
            'image' => 'https://via.placeholder.com/400x200?text=Yoga+Retreat',
            'category' => 'Wellness',
            'price' => 450.00,
            'capacity' => 50,
        ]);
    }
}
