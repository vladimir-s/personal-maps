<?php
class PhpMessageSource extends CPhpMessageSource {
    public function getAllMessages($category, $lang) {
        return $this->loadMessages($category, $lang);
    }
}