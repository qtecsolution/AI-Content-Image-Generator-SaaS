<?php

namespace Database\Seeders;

use App\Models\UseCase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UseCaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UseCase::create([
            'title' => 'Product Description',
            'icon' => 'assets/images/icons/box.svg',
            'details' => 'Generate beautifully written product descriptions to increase sales.',
            'prompt' => 'Write me product description with keywords [short_description]. The title of product is "[title]" and the description: [description]',
            'is_published' => 1
        ]);
        UseCase::create([
            'title' => 'Blog Writing',
            'icon' => 'assets/images/icons/writting.svg',
            'details' => 'The Blog Writing template takes your topic from idea to outline and then
            generate perfect text.',
            'prompt'=>'Write blog description with keywords [short_description]. The title of blog is "[title]" and the description: [description]',
            'is_published' => 1
        ]);
        UseCase::create([
            'title' => 'Social Media Caption',
            'icon' => 'assets/images/icons/social-caption.svg',
            'details' => 'Generate beautifully written product descriptions to increase sales.',
            'prompt'=>'Write social media post with keywords [short_description]. The title of post is "[title]"  and the description: [description]',
            'is_published' => 1
        ]);
        UseCase::create([
            'title' => 'Mail Writing',
            'icon' => 'assets/images/icons/gmail.svg',
            'details' => 'Generate simple and professional report based on different category with
            just a few keywords.',
            'prompt'=>'Write me a mail content with keywords [short_description]. The subject of mail is "[title]"  and the description: [description]',
            'is_published' => 1
        ]);
        UseCase::create([
            'title' => 'Google SEO',
            'icon' => 'assets/images/icons/google.svg',
            'details' => 'The best-performing Google ad copy converts visitors into customer! So
            don’t miss it.',
            'prompt'=>'Write google search ads with target keywords [short_description]. The Product title is "[title]" and the description: [description]',
            'is_published' => 1
        ]);
    }
}
