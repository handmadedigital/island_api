<?php namespace ThreeAccents\Products\Repositories;

use ThreeAccents\Products\Entities\Product;
use ThreeAccents\Products\Entities\ProductImage;
use ThreeAccents\Products\Entities\ProductOption;
use ThreeAccents\Products\Entities\ProductOptionValue;
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

            $image = new ProductImage([
                'src' => 'default.png'
            ]);

            $this->model->images()->save($image);

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

            var_dump($count);

            $this->model->name = $product->name;
            $this->model->description = $product->description;
            $this->model->slug = $product->name.rand(10000,99999);

            $this->model->save();

            $image = new ProductImage([
                'src' => 'default.png'
            ]);

            $this->model->images()->save($image);

            $option = new ProductOption([
                'name' => $product->option
            ]);

            $option_model = $this->model->options();

            $option_model->save($option);

            for($i = 0; $i < $count; $i++)
            {
                dd('reaches');
                $is_master = false;

                if($i === 0) $is_master = true;

                $option_value = new ProductOptionValue([
                    'name' => $product->option_value[$i],
                ]);

                $option_value_model = $option_model->values()->save($option_value);

                $variant = new Variant([
                    'is_master' => $is_master,
                    'length' => $product->length[$i],
                    'width' => $product->width[$i],
                    'height' => $product->height[$i],
                    'cubic_feet' => $product->cubic_feet[$i],
                    'weight' => $product->weight[$i],
                    'price' => $product->price[$i],
                ]);

                $option_value_model->variants()->save($variant);
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