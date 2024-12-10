<?php

namespace Database\Seeders;

use App\Enum\PermissionEnum;
use App\Enum\RolesEnum;
use App\Models\Feature;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
     $userRole=Role::create(['name'=>RolesEnum::User->value]);
     $adminRole=Role::create(['name'=>RolesEnum::Admin->value]);
     $commenterRole=Role::create(['name'=>RolesEnum::Commenter->value]);

     $manageUserPermission=Permission::create(['name'=>PermissionEnum::ManageUser->value]);

     $manageCommentPermission=Permission::create(['name'=>PermissionEnum::ManageComment->value]);
     $manageFeaturePermission=Permission::create(['name'=>PermissionEnum::MangeFeature->value]);

     $upvoteDownvote=Permission::create(['name'=>PermissionEnum::UpvoteDownvote->value]);


     $userRole->syncPermissions([$upvoteDownvote]);
     $commenterRole->syncPermissions([$upvoteDownvote,$manageCommentPermission]);
     $adminRole->syncPermissions([$upvoteDownvote,$manageCommentPermission,$manageFeaturePermission,$manageUserPermission]);
        User::factory()->create([
            'name' => 'User User',
            'email' => 'user@example.com',
        ])->assignRole($userRole);
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ])->assignRole($adminRole);
        User::factory()->create([
            'name' => 'Commenter User',
            'email' => 'commenter@example.com',
        ])->assignRole($commenterRole);

        Feature::factory(20)->create();
    }
}
