<?php
namespace App\Services;

use App\Models\Item;
use App\Models\ItemStore;
use App\Models\ItemTransaction;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class ItemService
{
    public function handel(array $data, ?int $id = null)
    {
        try {
            // dd($data);
            // $data['images'] = $this->upload( $data['images'] ?? null );
        //    dd($data);
                $row = Item::updateOrCreate(['id' => $id], $data);
// dd($row);
                foreach ($data['images'] as $image) {
                    if($image->isValid()) {
                        $row->addMedia($image)->toMediaCollection('product-images');
                    }
                    }
            return $row;
        } catch(Exception $e) {
            DB::rollBack();
            return $e;
        }
    }

 
    protected function upload($files = null): ?array
    {
        // dd($files);
        if (! $files) return null;
        $names = [];
        foreach ($files as $file) {
            $path = "uploads/items";
            $name = $file->hashName();
            $file->move($path, $name);
            $names[] = $name;
        }
        
        return $names;
    }

}
