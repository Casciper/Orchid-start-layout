<?php

namespace App\Models;

use App\Orchid\AdminLayoutModule\Interfaces\ProtoInterface;
use App\Orchid\AdminLayoutModule\Traits\ActiveScopeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends ProtoModel implements ProtoInterface
{
    use ActiveScopeTrait;

    protected $table = 'slides';
    protected array $allowedSorts = ['id', 'title', 'is_active', 'created_at'];
    protected array $allowedFilters = ['id', 'title', 'is_active', 'created_at'];
}
