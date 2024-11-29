<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class TransliterationController extends Controller
{

        public function to_cyrillic($text) {
            $LATIN_TO_CYRILLIC  = array(
        'a' => 'а', 'A' => 'А',
        'b' => 'б', 'B' => 'Б',
        'd' => 'д', 'D' => 'Д',
        'e' => 'е', 'E' => 'Е',
        'f' => 'ф', 'F' => 'Ф',
        'g' => 'г', 'G' => 'Г',
        'h' => 'ҳ', 'H' => 'Ҳ',
        'i' => 'и', 'I' => 'И',
        'j' => 'ж', 'J' => 'Ж',
        'k' => 'к', 'K' => 'К',
        'l' => 'л', 'L' => 'Л',
        'm' => 'м', 'M' => 'М',
        'n' => 'н', 'N' => 'Н',
        'o' => 'о', 'O' => 'О',
        'p' => 'п', 'P' => 'П',
        'q' => 'қ', 'Q' => 'Қ',
        'r' => 'р', 'R' => 'Р',
        's' => 'с', 'S' => 'С',
        't' => 'т', 'T' => 'Т',
        'u' => 'у', 'U' => 'У',
        'v' => 'в', 'V' => 'В',
        'x' => 'х', 'X' => 'Х',
        'y' => 'й', 'Y' => 'Й',
        'z' => 'з', 'Z' => 'З',
        'ʼ' => 'ъ'  // TODO: case?
    );
    $LATIN_VOWELS = array(
        'a', 'A', 'e', 'E', 'i', 'I', 'o', 'O', 'u', 'U', 'o‘', 'O‘'
    );
    $compounds_first = array(
                'ch' => 'ч', 'Ch' => 'Ч', 'CH' => 'Ч',
                'sh' => 'ш', 'Sh' => 'Ш', 'SH' => 'Ш',
                'yo‘' => 'йў', 'Yo‘' => 'Йў', 'YO‘' => 'ЙЎ'
            );

            $compounds_second = array(
                'yo' => 'ё', 'Yo' => 'Ё', 'YO' => 'Ё',
                'yu' => 'ю', 'Yu' => 'Ю', 'YU' => 'Ю',
                'ya' => 'я', 'Ya' => 'Я', 'YA' => 'Я',
                'ye' => 'е', 'Ye' => 'Е', 'YE' => 'Е',
                'o‘' => 'ў', 'O‘' => 'Ў', 'oʻ' => 'ў', 'Oʻ' => 'Ў',
                'g‘' => 'ғ', 'G‘' => 'Ғ', 'gʻ' => 'ғ', 'Gʻ' => 'Ғ'
            );

            $beginning_rules = array(
                'ye' => 'е', 'Ye' => 'Е', 'YE' => 'Е',
                'e' => 'э', 'E' => 'Э'
            );

            $after_vowel_rules = array(
                'ye' => 'е', 'Ye' => 'Е', 'YE' => 'Е',
                'e' => 'э', 'E' => 'Э'
            );

            $exception_words_rules = array(
                's' => 'ц', 'S' => 'Ц',
                'ts' => 'ц', 'Ts' => 'Ц', 'TS' => 'Ц',
                'e' => 'э', 'E' => 'э',
                'sh' => 'сҳ', 'Sh' => 'Сҳ', 'SH' => 'СҲ',
                'yo' => 'йо', 'Yo' => 'Йо', 'YO' => 'ЙО',
                'yu' => 'йу', 'Yu' => 'Йу', 'YU' => 'ЙУ',
                'ya' => 'йа', 'Ya' => 'Йа', 'YA' => 'ЙА'
            );

            // Standardize some characters
            $text = str_replace('ʻ', '‘', $text);

            

            

            // Compounds
            $text = preg_replace_callback(
                '/('.implode('|', array_keys($compounds_first)).')/u',
                function($matches) use ($compounds_first) {
                    return $compounds_first[$matches[1]];
                },
                $text
            );

            $text = preg_replace_callback(
                '/('.implode('|', array_keys($compounds_second)).')/u',
                function($matches) use ($compounds_second) {
                    return $compounds_second[$matches[1]];
                },
                $text
            );

            $text = preg_replace_callback(
                '/\b('.implode('|', array_keys($beginning_rules)).')/u',
                function($matches) use ($beginning_rules) {
                    return $beginning_rules[$matches[1]];
                },
                $text
            );

            $text = preg_replace_callback(
                '/('.implode('|', array_merge($LATIN_VOWELS, array_keys($after_vowel_rules))).')('.implode('|', array_keys($after_vowel_rules)).')/u',
                function($matches) use ($after_vowel_rules) {
                    return $matches[1].$after_vowel_rules[$matches[2]];
                },
                $text
            );
            
            $result = preg_replace_callback(
                '/('.implode('|', array_keys($LATIN_TO_CYRILLIC)).')/u',
                function($matches) use ($LATIN_TO_CYRILLIC) {
                    return $LATIN_TO_CYRILLIC[$matches[1]];
                },
                $text
            );

            return $result;
        }





public function to_latin($text) {
     
            $beginning_rules = array(
                'ц' => 's', 'Ц' => 'S',
                'е' => 'ye', 'Е' => 'Ye'
            );

            $after_vowel_rules = array(
                'ц' => 'ts', 'Ц' => 'Ts',
                'е' => 'ye', 'Е' => 'Ye'
            );

            $text = preg_replace_callback(
                '/(сент|окт)([яЯ])(бр)/u',
                function($matches) {
                    return $matches[1] . ($matches[2] == 'я' ? 'a' : 'A') . $matches[3];
                },
                $text
            );

            $text = preg_replace_callback(
                '/\b('.implode('|', array_keys($beginning_rules)).')/u',
                function($matches) use ($beginning_rules) {
                    return $beginning_rules[$matches[1]];
                },
                $text
            );

    $CYRILLIC_VOWELS = array(
        'а', 'А', 'е', 'Е', 'ё', 'Ё', 'и', 'И', 'о', 'О', 'у', 'У', 'э', 'Э',
        'ю', 'Ю', 'я', 'Я', 'ў', 'Ў'
    );
            $text = preg_replace_callback(
                '/('.implode('|', array_merge($CYRILLIC_VOWELS, array_keys($after_vowel_rules))).')('.implode('|', array_keys($after_vowel_rules)).')/u',
                function($matches) use ($after_vowel_rules) {
                    return $matches[1].$after_vowel_rules[$matches[2]];
                },
                $text
            );


 $CYRILLIC_TO_LATIN = array(
        'а' => 'a', 'А' => 'A',
        'б' => 'b', 'Б' => 'B',
        'в' => 'v', 'В' => 'V',
        'г' => 'g', 'Г' => 'G',
        'д' => 'd', 'Д' => 'D',
        'е' => 'e', 'Е' => 'E',
        'ё' => 'yo', 'Ё' => 'Yo',
        'ж' => 'j', 'Ж' => 'J',
        'з' => 'z', 'З' => 'Z',
        'и' => 'i', 'И' => 'I',
        'й' => 'y', 'Й' => 'Y',
        'к' => 'k', 'К' => 'K',
        'л' => 'l', 'Л' => 'L',
        'м' => 'm', 'М' => 'M',
        'н' => 'n', 'Н' => 'N',
        'о' => 'o', 'О' => 'O',
        'п' => 'p', 'П' => 'P',
        'р' => 'r', 'Р' => 'R',
        'с' => 's', 'С' => 'S',
        'т' => 't', 'Т' => 'T',
        'у' => 'u', 'У' => 'U',
        'ф' => 'f', 'Ф' => 'F',
        'х' => 'x', 'Х' => 'X',
        'ц' => 's', 'Ц' => 'S',
        'ч' => 'ch', 'Ч' => 'Ch',
        'ш' => 'sh', 'Ш' => 'Sh',
        'ъ' => 'ʼ', 'Ъ' => 'ʼ',
        'ь' => '', 'Ь' => '',
        'э' => 'e', 'Э' => 'E',
        'ю' => 'yu', 'Ю' => 'Yu',
        'я' => 'ya', 'Я' => 'Ya',
        'ў' => 'oʻ', 'Ў' => 'Oʻ',
        'қ' => 'q', 'Қ' => 'Q',
        'ғ' => 'gʻ', 'Ғ' => 'Gʻ',
        'ҳ' => 'h', 'Ҳ' => 'H',
    );           
            
             return $result=preg_replace_callback(
                '/('.implode('|', array_keys($CYRILLIC_TO_LATIN)).')/u',
                function($matches) use ($CYRILLIC_TO_LATIN) {
                    return $CYRILLIC_TO_LATIN[$matches[1]];
                },
                $text
            ); 
        }




             //// переключение режима латынь киррил
                public function translit(Request $request,) {
                $text = $request->input('title');
                $variant = $request->input('action');

                if ($variant == 'cyril') {
                                        $result = $this->to_cyrillic($text); 
                                        
                } elseif ($variant == 'lotin') {
                                        $result = $this->to_latin($text);
                                        
                }
                return view('transtext',compact('result','text') );
                }

       

   
}