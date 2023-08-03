<?php
namespace App\Services;

use App\Models\UserNormal;
use Exception;
use Illuminate\Http\UploadedFile;

class UserService
{
    public function handel(array $data, ?int $id = null)
    {
        try {
            $data['image'] = $this->upload( $data['image'] ?? null );
            return UserNormal::updateOrCreate(['id' => $id], $data);
        } catch(Exception $e) {
            return $e;
        }
    }

    protected function upload(?UploadedFile $file = null): ?string
    {
        if (! $file) return null;

        $name = $file->hashName();
        $file->move(UserNormal::uploadPath(), $name);
        return $name;
    }
}
