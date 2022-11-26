<?php

    namespace App\Models;

    use App\Orchid\AdminLayoutModule\Interfaces\ProtoInterface;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Orchid\Attachment\Attachable;
    use Orchid\Filters\Filterable;
    use Orchid\Screen\AsSource;

    abstract class ProtoModel extends Model implements ProtoInterface
    {
        use HasFactory;
        use AsSource;
        use Attachable;
        use Filterable;

        protected $guarded = ['id', 'created_at', 'updated_at'];

        public function switchActive()
        {
            $this->is_active = !$this->is_active;
        }

        public function isActive(): bool
        {
            return (bool) $this->is_active;
        }
    }
