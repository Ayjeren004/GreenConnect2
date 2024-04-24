<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Gift;

class GiftSeeder extends Seeder
{
    /**
     * Seed the gifts table with sample data.
     */
    public function run()
    {
        // Get some users from the database
        $users = User::all();

        // Loop through each user and create gifts
        $users->each(function ($user) use ($users) {
            // For each user, create 1 to 5 gifts
            $giftCount = rand(1, 5);
            for ($i = 0; $i < $giftCount; $i++) {
                // Choose a random user as the receiver of the gift
                $receiver = $users->random();

                // Create a gift
                Gift::create([
                    'description' => "Gift from {$user->first_name} to {$receiver->first_name}",
                    'sender_id' => $user->id,
                    'receiver_id' => $receiver->id,
                ]);
            }
        });
    }
}
