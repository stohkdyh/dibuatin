<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'project_id',
        'file_name',
        'file_path',
        'file_type',
        'user_id',
    ];

    private static function getMimeType(string $extension): string
    {
        $mimeTypes = [
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'pdf' => 'application/pdf',
            'doc' => 'application/msword',
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'xls' => 'application/vnd.ms-excel',
            'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'zip' => 'application/zip',
            'mp4' => 'video/mp4',
            'mp3' => 'audio/mpeg',
            'txt' => 'text/plain',
            'webp' => 'image/webp'
        ];

        return $mimeTypes[strtolower($extension)] ?? 'application/octet-stream';
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($file) {
            if ($file->project_id) {
                $project = Project::with(['order.package', 'order.user'])->find($file->project_id);

                if ($project && $project->order && $project->order->package) {
                    $packageName = $project->order->package->name;
                    $userName = $project->order->user ? $project->order->user->name : 'Unknown User';

                    // Get original filename from the temporary file
                    $originalPath = $file->file_name;
                    $originalExtension = pathinfo($originalPath, PATHINFO_EXTENSION);

                    // Create formatted file name
                    $formattedFileName = Str::slug($packageName . ' - ' . $userName) . '-' . time() . '.' . $originalExtension;

                    // Set file path to package name folder
                    $folderPath = Str::slug($packageName);

                    // Set file type based on extension
                    $file->file_type = self::getMimeType($originalExtension);

                    $file->file_name = $formattedFileName;
                    $file->file_path = $folderPath;
                    $file->user_id = $project->user_id;
                }
            }
        });

        static::created(function ($file) {
            if ($file->file_name && $file->file_path) {
                $originalFile = $file->getOriginal('file_name');

                if (Storage::disk('public')->exists('temp/' . $originalFile)) {
                    // Create package directory
                    Storage::disk('public')->makeDirectory($file->file_path);

                    // Move the file
                    Storage::disk('public')->move(
                        'temp/' . $originalFile,
                        $file->file_path . '/' . $file->file_name
                    );
                }
            }
        });
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}