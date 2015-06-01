<?php

namespace Jimtendo\Jimguistics;

class Ngram {
	
	static public function fromText($text, $n = 1)
	{
		// First let's remove all weird characters from text
		$text = preg_replace("/[^A-Za-z0-9 ]/", '', $text);
		
		// Next, let's turn it into an array
		$array = explode(' ', $text);
		
		// Create ngram from array
		return self::fromArray($array, $n);
	}
	
	static public function fromArray(array $array, $n = 1)
	{
		$ngrams = array();
		
		for ($i = 0; $i < count($array) - $i; $i++) {
			
			$ngram = '';
			
			// Compile this ngram
			for ($j = 0; $j < $n; $j++) {
				$ngram .= ' ' . $array[$i+$j];
			}
			
			// If it already exists, increment its number of appearances, otherwise set to one
			(array_key_exists($ngram, $ngrams)) ? $ngrams[$ngram]++ : $ngrams[$ngram] = 1;
		}
		
		return $ngrams;
	}

}