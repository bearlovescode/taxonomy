<?php
    namespace Bearlovescode\Taxonomy\Models;

    use Bearlovescode\Taxonomy\Models\Dtos\TaxonomyDto;
    use Illuminate\Database\Eloquent\Concerns\HasUuids;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Illuminate\Support\Str;

    class Taxonomy extends Model
    {
        use HasUuids, SoftDeletes;

        protected $fillable = [
            'type',
            'slug',
            'title',
            'description'
        ];

        public function asDto(): TaxonomyDto
        {
            return new TaxonomyDto($this->getAttributes());
        }

        public static function boot() {
            static::creating(function (Taxonomy $model) {
                if (empty($this->slug))
                    $this->slug = Str::slug($this->title);
            });
        }
    }
