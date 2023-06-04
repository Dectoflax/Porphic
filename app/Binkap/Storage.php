<?php

namespace App\Binkap;

use Livewire\TemporaryUploadedFile;
use Nette\Utils\FileSystem;
use Nette\Utils\Random;

class Storage
{
    private static self $instance;

    private TemporaryUploadedFile $file;

    private string $path;

    private string $name;

    public static function url(string $path)
    {
        return \asset($path, \app()->isProduction());
    }

    /**
     * Undocumented function
     *
     * @param  string|null $path
     *
     * @return void
     */
    public static function delete(string|null $path)
    {
        if (\is_null($path)) {
            return;
        }
        try {
            FileSystem::delete(\public_path($path));
        } catch (\Nette\IOException $th) {
            \logger($th->getMessage());
        }
    }

    public static function store(TemporaryUploadedFile $file, string $path)
    {
        static::$instance = new Storage;
        static::$instance->file = $file;
        static::$instance->path = $path;
        static::$instance->move();
        return static::$instance->name;
    }

    private function path()
    {
        $chunks = \explode('/', $this->path);
        $created = [];
        foreach ($chunks as $key => $dir) {
            $created[] = $dir;
            $this->create(\public_path(\implode('/', $created)));
        }
        return \public_path($this->path);
    }

    private function move()
    {
        FileSystem::copy($this->file->getRealPath(), $this->to());
        $this->file->delete();
    }

    private function generate()
    {
        return Random::generate(20);
    }

    private function name()
    {
        return $this->generate() . '.' . $this->file->getClientOriginalExtension();
    }

    private function to()
    {
        return $this->name = $this->path . '/' . $this->name();
    }

    private function create(string $dir)
    {
        if (!is_dir($dir)) {
            \mkdir($dir);
        }
    }
}
