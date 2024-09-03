<?php

namespace LaraZeus\Delia;

use Closure;

trait Configuration
{
    /**
     * you can overwrite any model and use your own
     */
    protected array $deliaModels = [];

    protected Closure | string $navigationGroupLabel = 'Delia';

    protected array $hideResources = [];

    public function deliaModels(?array $models): static
    {
        $this->deliaModels = $models;

        return $this;
    }

    public function getDeliaModels(): ?array
    {
        return $this->deliaModels;
    }

    public static function getModel(string $model): string
    {
        return array_merge(
            config('zeus-delia.models'),
            (new static)::get()->getDeliaModels()
        )[$model];
    }

    public function navigationGroupLabel(Closure | string $label): static
    {
        $this->navigationGroupLabel = $label;

        return $this;
    }

    public function getNavigationGroupLabel(): Closure | string
    {
        return $this->evaluate($this->navigationGroupLabel);
    }

    public function hideResources(array $resources): static
    {
        $this->hideResources = $resources;

        return $this;
    }

    public function getHiddenResources(): ?array
    {
        return $this->hideResources;
    }
}
