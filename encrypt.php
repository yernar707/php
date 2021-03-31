<?php

  $str = "your string here";
  
  $method = "AES-128-CTR"; //ciphering method

  //We will use OpenSSL encryption
  $iv_len = openssl_cipher_iv_length($method);
  $opts = 0;

  $enc_iv = '1234567898765432'; //initialization vector, it mustn't be null and 16 digit, we will use it to decrypt, too

  $enc_key = "ThisIsYourKey"; //this is our key to encrypt, we will use it to decrypt, too

  //the function used for OpenSSL encryption
  $result = openssl_encrypt($str, $method, $enc_key, $opts, $enc_iv);
  
  echo "Intital string: " . $str . "\n";
  echo "Result: " . $result . "\n";
  
?>
