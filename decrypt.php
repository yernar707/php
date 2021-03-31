<php
  
  $encrypted = "LXF6C/Q4U6JTCdntm5fLEw==";  //encrypted string
     
  $method = "AES-128-CTR"; //ciphering method, the same as in encrypt.php
     
  //We will use OpenSSL encryption
  $iv_len = openssl_cipher_iv_length($method);
  $opts = 0;
     
  $dec_iv = '1234567898765432';  //initialization vector which is the same as in encrypt.php

  $dec_key = "ThisIsYourKey";  //key to decrypt the encrypted data, the same as in encrypt.php

  ////the function used for OpenSSL decryption
  $result=openssl_decrypt ($encrypted, $method, $dec_key, $opts, $dec_iv);

  echo "Encrypted string: " . $encrypted . "\n";
  echo "Result: " . $result . "\n";

?>
