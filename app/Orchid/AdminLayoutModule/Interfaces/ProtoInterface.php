<?php

    namespace App\Orchid\AdminLayoutModule\Interfaces;

    interface ProtoInterface
    {
        public function fill(array $attributes);
        public function save();
        public function delete();
    }
