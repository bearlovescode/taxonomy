<?php
    namespace Bearlovescode\Taxonomy\Models\Dtos;

    use Bearlovescode\Datamodels\Dto\Dto;

    class TaxonomyDto extends Dto
    {
        public string $id;
        public string $type;
        public string $title;

    }