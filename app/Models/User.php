<?php
  
namespace App\Models;
  
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use DB;
  
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_name',
        'employee_id',
        'mobile',
        'location_id',
        'department_id',
        'gender',
        'joining_date',
        'status',
        'app_id',
    ];
  
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
  
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getCoadinator(){
        $coardinator_user = DB::table('model_has_roles')->where('role_id',3)->pluck('model_id')->toArray();
        $coardinator_users = User::whereIn('id',$coardinator_user)->get();
        $coardinator_user_id = [];
        // $coardinator_id = User::where('location_id')
        $employee = $this;
        $employee_location = json_decode($employee->location_id,true);
        $employee_department = json_decode($employee->department_id,true);
        foreach ($coardinator_users as $coardinator_users_value) {
            $coardinator_location = json_decode($coardinator_users_value->location_id,true);
            $coardinator_department = json_decode($coardinator_users_value->department_id,true);
            $coardinator_locations = array_intersect($coardinator_location,$employee_location);
            $coardinator_departments = array_intersect($coardinator_department,$employee_department);
            if (count($coardinator_locations) > 0 && count($coardinator_departments) > 0) {
                $coardinator_user_id[] = $coardinator_users_value->id;
            }
        }
        return $coardinator_user_id;
    }
}