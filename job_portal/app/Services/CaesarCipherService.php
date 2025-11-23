<?php

namespace App\Services;

class CaesarCipherService
{
    // Encrypts the text using Caesar Cipher with a shift
    public function encrypt($text, $shift = 3)
    {
        $encryptedText = '';

        foreach (str_split($text) as $char) {
            if (ctype_alpha($char)) {
                $asciiOffset = ctype_upper($char) ? 65 : 97;
                $encryptedText .= chr((ord($char) - $asciiOffset + $shift) % 26 + $asciiOffset);
            } else {
                $encryptedText .= $char;  // If it's not a letter, keep it as is
            }
        }

        return $encryptedText;
    }

    // Decrypts the text using Caesar Cipher with a shift
    public function decrypt($text, $shift = 3)
    {
        $decryptedText = '';

        foreach (str_split($text) as $char) {
            if (ctype_alpha($char)) {
                $asciiOffset = ctype_upper($char) ? 65 : 97;
                $decryptedText .= chr((ord($char) - $asciiOffset - $shift + 26) % 26 + $asciiOffset);
            } else {
                $decryptedText .= $char;  // If it's not a letter, keep it as is
            }
        }

        return $decryptedText;
    }
}
