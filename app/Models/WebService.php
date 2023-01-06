<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebService extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'description',
        // 'image_name',
        'created_by_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'created_by_id' => 'integer',
    ];

// public function setImageResultAttribute($value)
//     {
//         $attribute_name = "image_name";
//         // or use your own disk, defined in config/filesystems.php
//         $disk = config('backpack.base.root_disk_name');
//         $disk = 'public';
//         // destination path relative to the disk above
//         $destination_path = 'images';

//         // if the image was erased
//         if ($value==null) {
//             // delete the image from disk
//             \Storage::disk($disk)->delete($this->{$attribute_name});
//             // set null in the database column
//             $this->attributes[$attribute_name] = null;
//         }

//         // if a base64 was sent, store it in the db
//         if (Str::startsWith($value, 'data:image'))
//         {
//             // 0. Make the image
//             $image = \Image::make($value)->encode('jpg', 90);

//             // 1. Generate a filename.
//             $filename = md5($value.time()).'.jpg';

//             // 2. Store the image on disk.
//            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());

//             // 3. Delete the previous image, if there was one.
//             \Storage::disk($disk)->delete($this->{$attribute_name});

//             // 4. Save the public path to the database
//             // but first, remove "public/" from the path, since we're pointing to it
//             // from the root folder; that way, what gets saved in the db
//             // is the public URL (everything that comes after the domain name)
//             $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
//             $this->attributes[$attribute_name] = 'storage/'. $public_destination_path.'/'.$filename;
//         }
//     }


//     public function getImageAttribute()
//     {

//         return asset($this->attributes['image_name']);

//     // return $this->attributes[{$attribute_name}]; // uncomment if this is a translatable field
//     }

    public function createdBy()
    {
        return $this->belongsTo(User::class);
    }
}
