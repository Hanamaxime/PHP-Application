<?php

class Validation
{
    // Validate name
    /*
     * This function will return:
     * false - if name is empty.
     * false - if name has Symbols, numbers, punctuation.
     *
     * Check is case-insensitive
    */
    public function isValidName($name) {
        if (!empty($name)) {
            $name = strtolower(trim($name));
            // validate against symbols, numbers, punctuation
            $pattern = '/^[a-zA-Z ]+$/';
            if (preg_match($pattern, $name)) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

// Validate email
    /*
     * This function will return false if any of the following conditions are found:
     * Email is empty;
     * Doesn't match email pattern aaa@bbb.ccc;
     * Check is case-insensitive
    */
    public function isValidEmail($email) {
        if (!empty($email)) {
            $email = strtolower(trim($email));
            $pattern = '/^[\w\.]+@\w+\.(\w{2}|\w{3})$/';
            if (preg_match($pattern, $email)) {
                return true;
            }
        }
        return false;
    }

    // Validate postal code
    public function isValidPostal($postal) {
        if (!empty($postal)) {
            $pattern = '/^[A-Z][0-9][A-Z] [0-9][A-Z][0-9]$/';
            if (preg_match($pattern, $postal)) {
                return true;
            }
        }
        return false;
    }

    // Validate Phone
    public function isValidPhone($phone) {
        if (!empty($phone)) {
            $pattern = '/^\d{3}-\d{3}-\d{4}$/';
            if (preg_match($pattern, $phone)) {
                return true;
            }
        }
        return false;
    }

// Validate password
    /*
     * This function will return false if any of the following conditions are found:
     * Password is empty;
     * Is not at least 8 characters in length.
     * Doesn't contain at least 1 lowercase and 1 uppercase letter.
     * Doesn't contain at least 1 special character (!@#$%^&*)
     * Doesn't contain at least 1 number (0–9)
     *
     * errors which it will return:
     * 'len' - pass is less than 8 chars
     * 'small' - pass doesn't have small chars
     * 'caps' - pass doesn't have capital chars
     * 'digit' - pass doesn't have a digit
     * 'special' - pass doesn't have a special char
     *
    */
    public function isValidPassword($password) {
        if (!empty($password)) {
            $password = trim($password);
            if (strlen($password) >= 8) {
                if (preg_match('/[a-z]+/', $password)) {
                    if (preg_match('/[A-Z]+/', $password)) {
                        if (preg_match('/[0-9]+/', $password)) {
                            if (preg_match('/[\!@\#\$%\^&\*]+/', $password)) {
                                return true;
                            } else return "special";
                        } else return "digit";
                    } else return "caps";
                } else return "small";
            } else return "len";
        }
    }



}