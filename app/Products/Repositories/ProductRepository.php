<?php namespace ThreeAccents\Products\Repositories;

use ThreeAccents\Products\Entities\Product;
use ThreeAccents\Products\Entities\ProductImage;
use ThreeAccents\Products\Entities\Variant;

class ProductRepository
{
    /**
     * @var Product
     */
    protected $model;

    /**
     * @param Product $model
     */
    function __construct(Product $model)
    {
        $this->model = $model;
    }

    /**
     * @param $limit
     * @return mixed
     */
    public function getPaginated($limit)
    {
        return $this->model->with('categories', 'options', 'options.values', 'images')->latest()->paginate($limit);
    }

    /**
     * @param $slug
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function getBySlug($slug)
    {
        return $this->model->with('categories', 'options', 'options.values', 'images')->where('slug', '=', $slug)->first();

    }


    public function add($product)
    {
        if( $product->option === null)
        {
            $this->model->name = $product->name;
            $this->model->description = $product->description;
            $this->model->slug = $product->name.rand(10000,99999);

            $this->model->save();

            $variant = new Variant([
                'is_master' => true,
                'length' => $product->length,
                'width' => $product->width,
                'height' => $product->height,
                'cubic_feet' => $product->cubic_feet,
                'weight' => $product->weight,
                'price' => $product->price,
            ]);

            $this->model->variants()->save($variant);
        }
        else
        {
            $count = count($product->option_value);

            $model = new Product();

            $model->name = $product->name;
            $model->description = $product->description;
            $model->slug = $this->sluggify($product->name.rand(10000,99999));

            $model->save();

            $image = new ProductImage([
                'src' => 'default.png'
            ]);

            $model->images()->save($image);

            for($i = 0; $i < $count; $i++)
            {
                $is_master = false;

                if($i === 0) $is_master = true;

                $variant = new Variant([
                    'is_master' => $is_master,
                    'length' => $product->length[$i],
                    'width' => $product->width[$i],
                    'height' => $product->height[$i],
                    'cubic_feet' => $product->cubic_feet[$i],
                    'weight' => $product->weight[$i],
                    'price' => $product->price[$i],
                ]);

                $model->variants()->save($variant);
            }
        }
    }

    public function sluggify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

        // trim
        $text = trim($text, '-');

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // lowercase
        $text = strtolower($text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        if (empty($text))
        {
            return 'n-a';
        }

        return $text;
    }
}