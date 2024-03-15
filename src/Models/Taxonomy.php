<?php
    namespace Bearlovescode\Taxonomy\Models;

    use Bearlovescode\Taxonomy\Models\Dtos\TaxonomyDto;
    use Illuminate\Database\Eloquent\Concerns\HasUuids;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Taxonomy extends Model
    {
        use HasUuids, SoftDeletes;

        protected $fillable = [
            'type',
            'title'
        ];

        public function asDto(): TaxonomyDto
        {
            return new TaxonomyDto($this->getAttributes());
        }
    }