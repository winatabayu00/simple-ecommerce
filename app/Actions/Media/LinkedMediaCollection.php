<?php

namespace App\Actions\Media;

use App\Enums\MediaCollectionName;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\HasMedia;
use Winata\PackageBased\Abstracts\BaseAction;

class LinkedMediaCollection extends BaseAction
{

    public function __construct(
        public HasMedia                        $model,
        public Request                         $request,
        public string                          $inputName,
        public ?string                         $usingCustomFileName = null,
        public null|string|MediaCollectionName $collection = null,
        public bool                            $deletePreviousMedia = false,
        public array                           $customProperty = [],
        bool                                   $usingDBTransaction = false
    )
    {
        parent::__construct($usingDBTransaction);
    }

    /**
     * @return BaseAction
     * @throws \Exception
     */
    public function rules(): BaseAction
    {
        if ($this->collection instanceof MediaCollectionName) {
            $this->collection = $this->collection->value;
        } elseif (! is_string($this->collection)) {
            throw new \InvalidArgumentException("Collection must be a string or MediaCollectionName enum.");
        }

        if ($this->deletePreviousMedia) {
            if ($this->request->hasFile($this->inputName)) {
                if ($this->model->getMedia($this->collection)->count() > 0) {
                    $this->model->clearMediaCollection($this->collection); // all media in the images collection will be deleted
                }
            }
        }

        if (empty($this->collection)) {
            $this->collection = $this->inputName;
        }

        if (empty($this->usingCustomFileName)) {
            $this->usingCustomFileName = $this->inputName;
        }

        return $this;
    }

    /**
     * @return bool
     */
    public function handle(): bool
    {
        if (is_string($this->request->input($this->inputName))) {
            if (str($this->request->input($this->inputName))->startsWith('data:')) {
                $this->model->addMediaFromBase64($this->request->input($this->inputName))
                    ->usingFileName($this->usingCustomFileName)
                    ->withCustomProperties($this->customProperty)
                    ->toMediaCollection($this->collection);
            }
            if (str($this->request->input($this->inputName))->isMatch('/https?:\/\//')) {
                $this->model->addMediaFromUrl($this->request->input($this->inputName))
                    ->usingFileName($this->usingCustomFileName)
                    ->withCustomProperties($this->customProperty)
                    ->toMediaCollection($this->collection);
            }


        }

        if (is_array($this->request->file($this->inputName))) {
            if ($this->request->hasFile($this->inputName)) {
                $this->model->addMultipleMediaFromRequest([$this->inputName])
                    ->each(function ($fileAddr) {
                        $fileAddr
                            ->withCustomProperties($this->customProperty)
                            ->usingFileName($this->usingCustomFileName);
                        $fileAddr
                            ->toMediaCollection($this->collection);
                    });
            }
        } else {
            if ($this->request->hasFile($this->inputName)) {
                $media = $this->model->addMediaFromRequest($this->inputName);
                $media
                    ->withCustomProperties($this->customProperty)
                    ->usingFileName($this->usingCustomFileName);

                $media->toMediaCollection($this->collection);
            }
        }

        return true;
    }
}
