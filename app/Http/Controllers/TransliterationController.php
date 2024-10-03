<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class TransliterationController extends Controller
{
    
    

        public function to_cyrillic(Request $request) {
              $text = $request->input('title');
              // Standardize some characters
            $text = str_replace('ʻ', '‘', $text);



$LATIN_TO_CYRILLIC  = array(
        'a' => 'а', 'A' => 'А','b' => 'б', 'B' => 'Б','d' => 'д', 'D' => 'Д','e' => 'е', 'E' => 'Е',
        'f' => 'ф', 'F' => 'Ф','g' => 'г', 'G' => 'Г','h' => 'ҳ', 'H' => 'Ҳ','i' => 'и', 'I' => 'И',
        'j' => 'ж', 'J' => 'Ж','k' => 'к', 'K' => 'К','l' => 'л', 'L' => 'Л','m' => 'м', 'M' => 'М',
        'n' => 'н', 'N' => 'Н','o' => 'о', 'O' => 'О','p' => 'п', 'P' => 'П','q' => 'қ', 'Q' => 'Қ',
        'r' => 'р', 'R' => 'Р','s' => 'с', 'S' => 'С','t' => 'т', 'T' => 'Т','u' => 'у', 'U' => 'У',
        'v' => 'в', 'V' => 'В','x' => 'х', 'X' => 'Х','y' =>'й','Y' =>'Й','z'=>'з','Z' =>'З','ʼ'=>'ъ');
        
            $map='/('.implode('|', array_keys($LATIN_TO_CYRILLIC)).')/u'; 
            //преобразуется карта алфавита |А|б|Б|в|В|г|Г|д|Д|е|Е
            
            $text =preg_replace_callback($map,
            function($matches) use ($LATIN_TO_CYRILLIC) {return $LATIN_TO_CYRILLIC[$matches[1]];}

            ,$text);

            return view('transtext',compact('text') );
        }





        public function to_latin(Request $request) {
        $text = $request->input('title');

$CYRILLIC_TO_LATIN = ['а' => 'a', 'А' => 'A','б' => 'b', 'Б' => 'B','в' => 'v', 'В' => 'V','г' => 'g',
 'Г' =>'G','д' => 'd', 'Д' => 'D','е' => 'e', 'Е' => 'E','ё' => 'yo', 'Ё' => 'Yo','ж' =>'j','Ж' => 'J',
 'з' => 'z', 'З' => 'Z','и' => 'i', 'И' => 'I','й' => 'y','Й' => 'Y','к' => 'k', 'К' => 'K','л' => 'l',
 'Л' => 'L','м' => 'm', 'М' => 'M','н' => 'n', 'Н' => 'N','о' => 'o', 'О' => 'O','п' => 'p', 'П' =>'P',
 'р' => 'r', 'Р' => 'R','с' => 's', 'С' => 'S','т' => 't', 'Т' => 'T','у' => 'u','У' => 'U','ф' => 'f',
 'Ф' => 'F','х' => 'x','Х' => 'X','ц' => 's','Ц' => 'S','ч' => 'ch','Ч' =>'Ch','ш' => 'sh','Ш' => 'Sh',
 'ъ' => 'ʼ', 'Ъ' => 'ʼ', 'ь' => '', 'Ь' => '','э' => 'e','Э' => 'E','ю' => 'yu','Ю' =>'Yu','я' => 'ya',
 'Я' => 'Ya','ў' => 'oʻ', 'Ў' => 'Oʻ', 'қ' => 'q', 'Қ' => 'Q','ғ' => 'gʻ', 'Ғ' => 'Gʻ', 'ҳ' => 'h', 'Ҳ' => 'H',];

            $map='/('.implode('|', array_keys($CYRILLIC_TO_LATIN)).')/u'; 
            //сонвертируета|А|б|Б|в|В|г|Г|д|Д|е|Е
            
            $text =preg_replace_callback($map,
            function($matches) use ($CYRILLIC_TO_LATIN) {return $CYRILLIC_TO_LATIN[$matches[1]];}

            ,$text);

            return view('transtext',compact('text') );
        }

       
}
