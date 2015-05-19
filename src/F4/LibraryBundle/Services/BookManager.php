<?php

namespace F4\LibraryBundle\Services;

class BookManager
{
    protected $api_key = 'mhiTzbypoOYWIRRfpmvWg';

    protected $id;

    protected $title;

    protected $isbn;

    protected $description;

    protected $releaseDate;

    protected $image;

    protected $smallImage;

    protected $largeImage;

    protected $authors;

    public function __construct($isbn)
    {
        $this->getBookByIsbn($isbn);
    }

    public function getBookByIsbn($isbn)
    {
        $request = $this->getXMLContent('https://www.goodreads.com/book/isbn?isbn=' . $isbn);

        if ($request) {
            $xml = $request->book;

            $this->id = $xml->id;
            $this->isbn = $xml->isbn13;
            $this->title = $xml->title;
            $this->description = $this->assignCheck($xml->description);
            $this->image = $xml->image_url;
            $this->smallImage = $xml->small_image_url;
            $this->largeImage = $this->formatLargePicture($xml->image_url);
            $this->releaseDate = $this->formatDate($xml->publication_year, $xml->publication_month, $xml->publication_day);

            foreach ($xml->authors as $authors) {
                $this->authors[] = $this->getAuthorById($authors->author->id);
            }
        }
    }

    protected function getAuthorById($id)
    {
        $author = array();
        $request = $this->getXMLContent('https://www.goodreads.com/author/show.xml?id=' . $id);

        if ($request) {
            $xml = $request->author;

            $author['name'] = $this->assignCheck($xml->name);
            $author['hometown'] = $this->assignCheck($xml->hometown);
            $author['image_url'] = $this->assignCheck($xml->small_image_url);
            $author['born_at'] = $this->assignCheck($xml->born_at);
            $author['died_at'] = $this->assignCheck($xml->died_at);
            return $author;
        }

        return false;
    }

    protected function getXMLContent($url)
    {
        $urlAPI = $url . '&key=' . $this->api_key;

        if ($this->get_http_response_code($urlAPI) != "200") {
            return false;
        }

        $request = file_get_contents($urlAPI);
        $result = simplexml_load_string($request);

        return $result;

    }

    protected function formatDate($y, $m, $d)
    {
        $date = date_create();

        if (empty($y))
            $y = 2015;
        else if (empty($m))
            $m = 1;
        else if (empty($d))
            $d = 1;

        date_date_set($date, intval($y), intval($m), intval($d));

        return date_format($date, 'Y-m-d');
    }

    protected function get_http_response_code($url)
    {
        $headers = get_headers($url);
        return substr($headers[0], 9, 3);
    }

    protected function assignCheck($item)
    {
        return (strlen($item) > 1) ? $item : null;
    }

    protected function formatLargePicture($url)
    {
        $pos = strpos($url, 'books');

        if ($pos) {
            $temp = explode('/', $url);
            $temp[4] = str_replace('m', 'l', $temp[4]);
            $url = implode('/', $temp);
        }

        return $url;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getAuthors()
    {
        return $this->authors;
    }

    /**
     * @return mixed
     */
    public function getSmallImage()
    {
        return $this->smallImage;
    }

    /**
     * @return mixed
     */
    public function getLargeImage()
    {
        return $this->largeImage;
    }
}
