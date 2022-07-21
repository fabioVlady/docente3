<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pdf>
 */
class PdfFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'url' => 'pdfs/' . $this->faker->image('public/storage/pdfs',640,480,null,false),


            // $table->string('url');
            // $table->unsignedBigInteger('pdfable_id');
            // $table->string('pdfable_type');
        ];
    }
}
