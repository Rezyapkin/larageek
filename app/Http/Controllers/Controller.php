<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Faker\Factory as Faker;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    private array $categories;
    private array $news;

    function __construct() {
        $faker = Faker::create('ru_RU');
        $this->makeRandomCategories($faker);
        $this->makeRandomNews($faker);
    }

    private function makeRandomCategories($faker) {
        for ($i = 1; $i <= 5; $i++) {
            $this->categories[] = [
                'id' => $i,
                'name' => $faker->realText(20),
            ];
        }
    }

    private function makeRandomNews($faker) {
        for ($i = 1; $i <= 50; $i++) {
            $this->news[] = [
                'id' => $i,
                'categoryId' => $this->categories[array_rand($this->categories)]['id'],
                'date' => $faker->date(),
                'caption' => $faker->realText(50),
                'description' => $faker->realText(1000),
            ];
        }
    }

    public function getNewsList(): array {
        return $this->news;
    }

    public function getCategoriesList(): array {
        return $this->categories;
    }

    public function getNewsById (int $id): ?array {
        $result = array_filter($this->news, function ($value) use ($id) {
            return $value['id'] == $id;
        });
        return count($result)==0 ? null : current($result);

    }

    public function getListNewsByCategoryId (int $id): array {
        return array_filter($this->news, function ($value) use ($id) {
            return $value['categoryId'] == $id;
        });        
    }

}
