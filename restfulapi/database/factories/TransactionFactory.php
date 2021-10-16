<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Seller;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // On récupère un vendeur dont on sait qu'il vend au moins un produit :
        $seller = Seller::has('products')->get()->random();

        // On génère un acheteur (buyer) en faisant en sorte qu'il soit différent du vendeur ci-dessus, car un vendeur ne peut acheter son propre produit :
        $buyer = User::all()->except($seller->id)->random();

        return [
            'quantity' => $this->faker->numberBetween(1, 3),
            'buyer_id' => $buyer->id,
            'product_id' => $seller->products->random()->id,
        ];
    }
}
