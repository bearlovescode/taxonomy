<?php
    namespace Bearlovescode\Taxonomy\Services;

    use Bearlovescode\Taxonomy\Models\Dtos\TaxonomyDto;
    use Bearlovescode\Taxonomy\Models\Taxonomy;
    use Illuminate\Support\Collection;

    class TaxonomyTermService
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

        public function create(array $data)
        {
            return Taxonomy::create($data);
        }
    }
