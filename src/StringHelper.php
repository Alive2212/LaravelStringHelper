<?php
/**
 * Created by PhpStorm.
 * User: alive
 * Date: 9/28/17
 * Time: 12:35 PM
 */

namespace Alive2212\LaravelStringHelper;

class StringHelper
{
    /**
     * upper letters
     *
     * @var string
     */
    protected $upperLetters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';


    public function plural($value)
    {
        // TODO must be implementing
    }

    /**
     * @param $string
     * @param string $separator
     * @return mixed
     */
    public function toTag($string, $separator = '_')
    {
        $string[0] = strtolower($string[0]);
        foreach (str_split($this->upperLetters) as $upperLetter) {
            $string = str_replace($upperLetter, $separator . strtolower($upperLetter), $string);
        }
        return $string;
    }

    /**
     * @param $string
     * @return mixed
     */
    public function upperFirstLetter($string)
    {
        $string[0] = strtoupper($string[0]);
        return $string;
    }

    /**
     * @param $string
     * @return mixed
     */
    public function lowerFirstLetter($string)
    {
        $string[0] = strtolower($string[0]);
        return $string;
    }

    /**
     * @param $string
     * @return mixed
     */
    public function toCamel($string)
    {
        $stringArray = explode('_', $string);
        for ($i = 1; $i < count($stringArray);$i++){
            $stringArray[$i] = $this->upperFirstLetter($stringArray[$i]);
        }
        return implode('', $stringArray);
    }

    /**
     * @param $string
     * @return mixed
     */
    public function toClassCamel($string)
    {
        $stringArray = explode('_', $string);
        for ($i = 0; $i < count($stringArray);$i++){
            $stringArray[$i] = $this->upperFirstLetter($stringArray[$i]);
        }
        return implode('', $stringArray);
    }

    /**
     * @param $string
     * @return bool|string
     */
    public function singular($string)
    {
        if (substr($string, -1) == 's' || substr($string, -1) == 'S') {
            return substr($string, 0, -1);
        }
        return $string;
    }
}