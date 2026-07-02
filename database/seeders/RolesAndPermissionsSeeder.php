<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Define all permissions grouped by resource
        $permissions = [
            // Events
            'view events', 'create events', 'edit events', 'delete events',
            // Gallery
            'view gallery', 'create gallery', 'edit gallery', 'delete gallery',
            // Magazine
            'view magazine', 'create magazine', 'edit magazine', 'delete magazine',
            // Goodies
            'view goodies', 'create goodies', 'edit goodies', 'delete goodies',
            // Members
            'view members', 'create members', 'edit members', 'delete members',
            // Phrases
            'view phrases', 'create phrases', 'edit phrases', 'delete phrases',
            // Fun Facts
            'view fun_facts', 'create fun_facts', 'edit fun_facts', 'delete fun_facts',
            // Media Picks
            'view media_picks', 'create media_picks', 'edit media_picks', 'delete media_picks',
            // Settings
            'view settings', 'edit settings',
            // Users (super_admin only)
            'view users', 'create users', 'edit users', 'delete users',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // SUPER ADMIN — all permissions
        $superAdmin = Role::firstOrCreate(['name' => 'super_admin']);
        $superAdmin->givePermissionTo(Permission::all());

        // ADMIN — everything except user management
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->givePermissionTo(Permission::whereNotIn('name', [
            'view users', 'create users', 'edit users', 'delete users',
        ])->get());

        // EDITOR — only content they upload; no settings, no users, no goodies
        $editor = Role::firstOrCreate(['name' => 'editor']);
        $editor->givePermissionTo([
            'view events', 'create events', 'edit events',
            'view gallery', 'create gallery', 'edit gallery',
            'view magazine', 'create magazine', 'edit magazine',
            'view members', 'create members', 'edit members',
            'view phrases', 'edit phrases',
            'view fun_facts', 'edit fun_facts',
            'view media_picks', 'edit media_picks',
        ]);

        // Create users if they don't exist
        $superAdminUser = User::firstOrCreate(
            ['email' => 'superadmin@dkc.local'],
            ['name' => 'Super Admin', 'password' => bcrypt('superadmin123'), 'is_active' => true]
        );
        $superAdminUser->assignRole('super_admin');

        $adminUser = User::firstOrCreate(
            ['email' => 'admin@dkc.local'],
            ['name' => 'DKC Admin', 'password' => bcrypt('admin123'), 'is_active' => true]
        );
        $adminUser->assignRole('admin');

        $editorUser = User::firstOrCreate(
            ['email' => 'editor@dkc.local'],
            ['name' => 'DKC Editor', 'password' => bcrypt('editor123'), 'is_active' => true]
        );
        $editorUser->assignRole('editor');
    }
}
