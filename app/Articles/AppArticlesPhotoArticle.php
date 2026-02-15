<?php

namespace App\Articles;

use App\Models\Photo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AppArticlesPhotoArticle
{
    public const THUMBNAIL_WIDTH = 400;
    public const THUMBNAIL_HEIGHT = 300;
    public const DETAIL_WIDTH = 800;
    public const DETAIL_HEIGHT = 600;

    /**

     *
     * @param UploadedFile $file
     * @param Model $model
     * @param int $order
     * @return Photo
     */
    public function uploadPhoto(UploadedFile $file, Model $model, int $order = 0): Photo
    {
        $filename = Str::uuid();
        $extension = $file->getClientOriginalExtension();

        $directory = $this->getStorageDirectory($model);

        $paths = $this->generateFilePaths($directory, $filename, $extension);

        $this->processAndSaveImages($file, $paths);

        return $model->photos()->create([
            'original_path' => $paths['original'],
            'thumbnail_path' => $paths['thumbnail'],
            'detail_path' => $paths['detail'],
            'original_name' => $file->getClientOriginalName(),
            'size' => $file->getSize(),
            'mime_type' => $file->getMimeType(),
            'order' => $order,
        ]);
    }

    /**

     */
    public function deletePhoto(Photo $photo): bool
    {
        return (bool) $photo->delete();
    }

    /**

     */
    protected function getStorageDirectory(Model $model): string
    {
        $modelName = strtolower(class_basename($model));
        return "photos/{$modelName}s/{$model->id}";
    }

    /**

     */
    protected function generateFilePaths(string $directory, string $filename, string $extension): array
    {
        return [
            'original'  => "{$directory}/original/{$filename}.{$extension}",
            'thumbnail' => "{$directory}/thumbnail/{$filename}.{$extension}",
            'detail'    => "{$directory}/detail/{$filename}.{$extension}",
        ];
    }

    /**

     */
    protected function processAndSaveImages(UploadedFile $file, array $paths): void
    {
        // Сохраняем оригинал
        $file->storeAs(dirname($paths['original']), basename($paths['original']), 'public');

        // Копируем оригинал в thumbnail и detail (без изменений)
        Storage::disk('public')->copy($paths['original'], $paths['thumbnail']);
        Storage::disk('public')->copy($paths['original'], $paths['detail']);
    }
}
