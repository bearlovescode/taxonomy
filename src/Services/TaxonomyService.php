<?php
    namespace Bearlovescode\Taxonomy\Services;

    use Bearlovescode\Taxonomy\Models\Dtos\TaxonomyDto;
    use Bearlovescode\Taxonomy\Models\Taxonomy;
    use Illuminate\Support\Collection;

    class TaxonomyService
    {
        public function all(): Collection
        {
            $results = collect();

            foreach(Taxonomy::all() as $term)
                $results->push($term->asDto());

            return $results;
        }

        public function findBySlug(string $slug): TaxonomyDto
        {
            return Taxonomy::where('slug', $slug)->first()->asDto();
        }

        public function save(array $data)
        {
            return Taxonomy::create($data);
        }
    }
