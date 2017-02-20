<?php
class bitcoin_tools {



   public static function http_request($url) {
      $data = @file_get_contents($url);
      return $data;
   }



   public static function valid_address($address) {
      $data = self::http_request('https://blockchain.info/address/' . $address . '?limit=0&format=json');
      $data = json_decode($data, true);
      return (isset($data['address']) ? true : false);
   }



   public static function address_balance($address) {
      $data = self::http_request('https://blockchain.info/address/' . $address . '?limit=0&format=json');
      $data = json_decode($data, true);
      return (isset($data['final_balance']) ? ($data['final_balance'] / 100000000) : '0');
   }



   public static function address_received($address) {
      $data = self::http_request('https://blockchain.info/address/' . $address . '?limit=0&format=json');
      $data = json_decode($data, true);
      return (isset($data['total_received']) ? ($data['total_received'] / 100000000) : '0');
   }



   public static function address_sent($address) {
      $data = self::http_request('https://blockchain.info/address/' . $address . '?limit=0&format=json');
      $data = json_decode($data, true);
      return (isset($data['total_sent']) ? ($data['total_sent'] / 100000000) : '0');
   }



   public static function address_to_hash($address) {
      $data = self::http_request('https://blockchain.info/address/' . $address . '?limit=0&format=json');
      $data = json_decode($data, true);
      return (isset($data['hash160']) ? $data['hash160'] : false);
   }



   public static function hash_to_address($hash) {
      $data = self::http_request('https://blockchain.info/address/' . $hash . '?limit=0&format=json');
      $data = json_decode($data, true);
      return (isset($data['address']) ? $data['address'] : false);
   }



}
?>