<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    /**
     * Mass assignable fields
     *
     * @var array
     */
    protected $fillable = ['url', 'code'];

    /**
     * Generate and persist a trimmed url
     *
     * @param $url
     * @return mixed
     */
    public function trim($url)
    {
        $trimmedUrl = static::firstOrCreate([
                        'url' => $url
                    ]);

        // Adding a 1000000 to the model->id just to create a longer url code,
        // there should be smarter ways todo this
        $trimmedUrl->code = base_convert($trimmedUrl->id + 1000000, 10, 36);

        $trimmedUrl->save();

        return $trimmedUrl;
    }
}
