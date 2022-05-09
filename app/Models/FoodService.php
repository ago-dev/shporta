<?php

namespace App\Models;

use App\Enum\ActivationEnum;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Http\Requests\FoodServiceUpdateRequest;
use App\Http\Requests\StoreFoodServiceRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class FoodService extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image', 'food_service_type_id'];
    public $timestamps = false;

    public static function list(): LengthAwarePaginator
    {
        return FoodService::paginate(5);
    }

    public static function edit(FoodServiceUpdateRequest $request)
    {
        $foodService = FoodService::find($request['id']);
        $foodServiceType = $request['typeUpdate'];

        if (isset($foodServiceType))
            $foodService->food_service_type_id = FoodServiceType::getTypeByName($foodServiceType)->id;

        if (isset($request['imageUpdate'])) {
            $request->validate([
                'imageUpdate' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imageName = time() . '.' . $request->imageUpdate->extension();
            $request->imageUpdate->move(public_path('images/food-services'), $imageName);

            $foodService->image = $imageName;
        }

        $foodService->name = $request['nameUpdate'];
        $foodService->description = $request['descriptionUpdate'];

        $foodService->save();
    }


    public function foodServiceType()
    {
        return $this->belongsTo('App\Models\FoodServiceType');
    }

    public static function store(StoreFoodServiceRequest $request): FoodService
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/food-services'), $imageName);

        return FoodService::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'image' => $imageName,
            'food_service_type_id' => FoodServiceType::getTypeByName($request['type'])->id
        ]);
    }
}
