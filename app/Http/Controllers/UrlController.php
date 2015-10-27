<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateUrlRequest;
use App\Url;

class UrlController extends Controller
{
    protected $url;

    public function __construct()
    {
        $this->url = new Url();
    }

    /**
     * Create a new trimmed url or return trimmed url if the url already existing
     *
     * @param CreateUrlRequest $request
     * @return \Illuminate\Http\Response
     */
    public function trimUrl(CreateUrlRequest $request)
    {
        $trimmedUrl = $this->url->trim($request->get('url'));

        return view('home', compact('trimmedUrl'));
    }

    /**
     * Get the url from the database and redirect to the intended location.
     * Return a 404 if record not found
     *
     * @param $code
     * @return mixed
     */
    public function getUrl($code)
    {
        $url = $this->url->whereCode($code)->firstOrFail();

        return redirect($url->url);
    }
}
