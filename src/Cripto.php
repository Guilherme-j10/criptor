<?php

    namespace src;

    class Cripto 
    {

        protected $key;
        protected $key_avaliable = ['k9', 'k10'];
        protected $simple_matriz = [
            'k9' => [
                'AML4' => 'a',
                'UB4f' => 'b',
                'Pmle' => 'c',
                'Pq01' => 'd'
            ],
            'k10' => [
                '&zsf' => '0', 
                '/h7H' => '1',
                'u%a7' => '2',
                'pO8T' => '3',
                'M@pY' => '4',
                'dMEu' => '5',
                'X0lW' => '6',
                'A95T' => '7',
                '2vCN' => '8',
                'H6nT' => '9',
                '8G4x' => 'a',
                'HiKF' => 'b',
                '5!de' => 'c',
                'Omif' => 'd',
                'xnqK' => 'e',
                'J!Xn' => 'f',
                'WiKu' => 'g',
                '8aUr' => 'h',
                '214b' => 'i',
                'WgJN' => 'j',
                '7MK9' => 'k',
                'oOcH' => 'l',
                '0xmk' => 'm',
                'C3En' => 'n',
                'cEuJ' => 'o',
                'H6T%' => 'p',
                'mPps' => 'q',
                'D6TL' => 'r',
                'vOe7' => 's',
                'XwmM' => 't',
                '1GF7' => 'u',
                'G/Xy' => 'v',
                'jeyP' => 'w',
                'DI7W' => 'x',
                'LkX4' => 'y',
                'FRA6' => 'z',
                'G2Rw' => ' ',
                'A5Zt' => '(',
                '054F' => ')',
                '4wzm' => '-',
                '20FI' => '!',
                '90CE' => '@',
                'P2SI' => '#',
                '83cd' => '$',
                '4dor' => '%',
                '3Mpe' => '¨',
                '40px' => '&',
                '01en' => '*',
                'u5n!' => '_',
                'T6nv' => '+',
                '02cF' => '=',
                '94vh' => '^',
                '93NF' => '~',
                '01hf' => '[',
                '0pzd' => ']',
                'tko3' => '{',
                'lebt' => '}',
                'pzwm' => '/',
                'EMt4' => '?',
                '!Drd' => '.',
                '354D' => '>',
                'EDad' => ',',
                'oEtd' => '<',
                '3Lps' => '|',
                '9Xet' => '\\',
                'Aqw3' => ':',
                'tvG4' => ';',
                'Na4r' => '//',
                '1mpE' => '"',
                'ebTt' => '\'',
                'EgUl' => 'Á',
                'K4Mt' => 'Ã',
                '1b04' => 'ã',
                'V5Ht' => 'á',
                '2wnt' => 'É',
                'Pl4v' => 'é',
                'psls' => 'Í',
                'ptdb' => 'í',
                'TbT5' => 'Ó',
                'QmPr' => 'ó',
                '3F4g' => 'Ú',
                'qmpD' => 'ú',
                '5vwW' => 'à',
                'ypEt' => 'À',
                'eMpT' => 'A',
                'Te/t' => 'B',
                '7Rdt' => 'C',
                'Anle' => 'D',
                'gmer' => 'E',
                'RFtp' => 'F',
                'KtMe' => 'G',
                '4C7f' => 'H',
                '1X53' => 'I',
                'QmpS' => 'J',
                '5cPr' => 'K',
                'P2P2' => 'L',
                'MO3L' => 'M',
                'pe07' => 'N',
                'Uzrt' => 'O',
                'c5p!' => 'P',
                'Pled' => 'Q',
                'EVrt' => 'R',
                'PzTq' => 'S',
                'P01T' => 'T',
                'cpqt' => 'U',
                '74!r' => 'V',
                'LaT5' => 'W',
                'vIn3' => 'X',
                'W1Kg' => 'Y',
                'PH1J' => 'Z',
            ] 
        ];

        public function __construct(String $key)
        {
            $this->key = $key;
        }

        public function encript(String $string): String
        {

            $arr_string = preg_split("/(?<!^)(?!$)/u", $string);
            $output = '';
            
            for($i = 0; $i < count($arr_string); $i++){
                foreach($this->simple_matriz[$this->key] as $chave => $value){
                    if($value === $arr_string[$i]){
                        $output .= $chave;
                    }
                } 
            }

            return $output;
        }

        public function decript(String $String): String
        {
            $string = preg_split("/(?<!^)(?!$)/u", $String);

            $index_value = count($string) / 4;
            $a = 0;
            $output = '';

            do {
                
                $index = 4 * $a;

                if($index == 4){
                    $index = 0;
                }elseif($index > 4){
                    $index = $index - 4;
                }

                for($i = $index; $i < 4 * $a; $i++){
                    $output .= $string[$i];
                }

                $output = $output.' ';

                $a++;
            } while ($a <= $index_value);

            $final_result = '';
            $explode_code = explode(' ', $output);

            for($j = 0; $j < count($explode_code); $j++){
                foreach($this->simple_matriz[$this->key] as $chave => $valor){
                    if($chave === $explode_code[$j]){
                        $final_result .= $valor;
                    }
                }
            }

            return trim($final_result);
        }   

    }

