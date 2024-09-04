<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class SupportedPHPVersion extends Model
{
    use Sushi;

    protected $schema = [
        'php_version' => 'text',
        'php_version_name' => 'text',
    ];

    public function getRows()
    {
        $phpVersions = [];
        $phpVersions[] = ['php_version' => '7.3', 'php_version_name' => 'PHP 7.3'];
        $phpVersions[] = ['php_version' => '7.4', 'php_version_name' => 'PHP 7.4'];
        $phpVersions[] = ['php_version' => '8.0', 'php_version_name' => 'PHP 8.0'];
        $phpVersions[] = ['php_version' => '8.1', 'php_version_name' => 'PHP 8.1'];
        $phpVersions[] = ['php_version' => '8.2', 'php_version_name' => 'PHP 8.2'];
        $phpVersions[] = ['php_version' => '8.3', 'php_version_name' => 'PHP 8.3'];

        return $phpVersions;
    }
}
