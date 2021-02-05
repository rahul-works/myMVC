<?php
interface ViewInterface
{
    public function setTemplate($template);
    public function getTemplate();
    public function __set($field, $value);
    public function __get($field);
    public function __isset($field);
    public function __unset($field);
    public function render();
}
?>