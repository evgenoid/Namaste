<?php
class Slug
{
    static public function slugify($link)
    {
        $lang = array(
            'А' => 'a', 'а' => 'a',
            'Б' => 'b', 'б' => 'b',
            'В' => 'v', 'в' => 'v',
            'Г' => 'g', 'г' => 'g',
            'Д' => 'd', 'д' => 'd',
            'Е' => 'e', 'е' => 'e',
            'Ж' =>  'zh', 'ж' => 'zh',
            'З' => 'z', 'з' => 'z',
            'И' => 'i', 'и' => 'i',
            'Й' => 'y', 'й' => 'y',
            'К' => 'k', 'к' => 'k',
            'Л' => 'l', 'л' => 'l',
            'М' => 'm', 'м' => 'm',
            'Н' => 'n', 'н' => 'n',
            'О' => 'o', 'о' => 'o',
            'П' => 'p', 'п' => 'p',
            'Р' => 'r', 'р' => 'r',
            'С' => 's', 'с' => 's',
            'Т' => 't', 'т' => 't',
            'У' => 'u', 'у' => 'u',
            'Ф' => 'f', 'ф' => 'f',
            'Х' => 'kh', 'х' => 'kh',
            'Ц' => 'ts', 'ц' => 'ts',
            'Ч' => 'ch', 'ч' => 'ch',
            'Ш' => 'sh', 'ш' => 'sh',
            'Щ' => 'shch', 'щ' => 'shch',
            'ы' => 'y', 'Ы' => 'Y',
            'Э' => 'e', 'э' => 'e',
            'Ю' => 'yu', 'ю' => 'yu',
            'Я' => 'ya', 'я' => 'ya',
            'ь' => '','Ь' => '',
            '-' => '-', ')' => ')',
            ',' => ',', '(' => '(',
            '.' => '.',
            '\'' => '', '|' => '|',
            'і' => 'i', 'І' => 'I',
            'ї' => 'ji', 'Ї' => 'Ji',
            'є' => 'je','Є' => 'Je',
            '1' => '1', '2' => '2',
            '3' => '3', '4' => '4',
            '5' => '5', '6' => '6',
            '7' => '7', '8' => '8',
            '9' => '9',
        );

        $linkarray = preg_split('/(?<!^)(?!$)/u', $link );
        foreach ($linkarray as $i => $symbol):
            $linkarray[$i] = array_key_exists($symbol, $lang) ? $lang[$symbol] : $linkarray[$i];
        endforeach;        
        $link = implode($linkarray);
        if (empty($link))
          {
            return 'n-a';
          }
        $link = preg_replace('/^(\W+)|(\W+)$/', '', $link);
        $link = preg_replace('/\W+/', '-', $link);
        $link = strtolower($link);

            return $link;
    }
}

?>
