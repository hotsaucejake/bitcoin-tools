<?php
class bitcoin_information {



   public static function http_request($url) {
      $data = @file_get_contents($url);
      return $data;
   }



   public static function bitcoin_value() {
      $data = self::http_request('https://blockchain.info/ticker');
      $data = json_decode($data, true);
      return (isset($data['USD']['last']) ? $data['USD']['last'] : '0');
   }



   public static function total_bitcoin() {
      $data = self::http_request('http://blockchain.info/q/totalbc');
      return (is_numeric($data) ? ($data / 100000000) : '0');
   }



   public static function block_reward() {
      $data = self::http_request('http://blockchain.info/q/bcperblock');
      return (is_numeric($data) ? ($data / 100000000) : '0');
   }



   public static function mining_difficulty() {
      $data = self::http_request('http://blockchain.info/q/getdifficulty');
      return (is_numeric($data) ? $data : '0');
   }



   public static function hash_rate() {
      $data = self::http_request('https://blockchain.info/q/hashrate');
      return (is_numeric($data) ? $data : '0');
   }



   public static function request_information() {
      $data['bitcoin_value']       = self::bitcoin_value();
      $data['total_bitcoin']       = self::total_bitcoin();
      $data['block_reward']        = self::block_reward();
      $data['mining_difficulty']   = self::mining_difficulty();
      $data['hash_rate']           = self::hash_rate();
      $data['total_blocks']        = ($data['total_bitcoin'] / $data['block_reward']);
      $data['total_bitcoin_value'] = ($data['bitcoin_value'] * $data['total_bitcoin']);
      return $data;
   }



   public static function cached_information($cache_time = 600) {
      $file = rtrim(dirname(__FILE__), '/\\') . '/cached_information.json';

      if ( file_exists($file) ) {
            $data = self::http_request($file);
            $data = json_decode($data, true);

            if ( time() > $data['timestamp'] ) {
                  $data['timestamp']   = (time() + $cache_time);
                  $data['information'] = self::request_information();
                  file_put_contents($file, json_encode($data));
            }
      }
      else {
            $data['timestamp']   = (time() + $cache_time);
            $data['information'] = self::request_information();
            file_put_contents($file, json_encode($data));
      }

      return $data['information'];
   }



}
?>