<?php

    namespace src;
    use src\Matriz;

    class Cripto extends Matriz
    {

        protected $key;

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

            return $this->security($output, 'add');
        }
        
        private function security(String $string, String $type_sec) : String
        {   
            switch ($type_sec) {
                case 'add':

                    $split_string = str_split($string);
                    $string_reverse = array_reverse($split_string);
                    $final_string = implode('', $string_reverse);

                    $encode_64 = base64_encode($final_string);
                    $getout = explode('=', $encode_64);
                    $return_string = implode('', $getout);

                    return $return_string;

                break;
                case 'remove':

                    $encode_64 = base64_decode($string);

                    $split_string = str_split($encode_64);
                    $string_reverse = array_reverse($split_string);
                    $final_string = implode('', $string_reverse);

                    return $final_string;

                break;
                default:
                    return false;
                break;
            }

            
        }

        public function decript(String $String): String
        {
            $remove_secur = $this->security($String, 'remove');
            $string = preg_split("/(?<!^)(?!$)/u", $remove_secur);

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

