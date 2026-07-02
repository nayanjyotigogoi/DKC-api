<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;

class TeamMembersSeeder extends Seeder
{
    public function run(): void
    {
        $team = [
            ['name' => 'Sneha Borah',   'initials' => 'SB', 'role' => 'President',              'korean_role' => '회장',    'color' => '#8B1E24', 'department' => 'B.A. English, 3rd Year',   'sort_order' => 1],
            ['name' => 'Rohan Das',     'initials' => 'RD', 'role' => 'Vice President',          'korean_role' => '부회장',  'color' => '#5C3A6B', 'department' => 'B.Com, 3rd Year',          'sort_order' => 2],
            ['name' => 'Priya Sharma',  'initials' => 'PS', 'role' => 'Cultural Secretary',      'korean_role' => '문화 총무','color' => '#1E5C8B', 'department' => 'B.Sc Physics, 2nd Year',  'sort_order' => 3],
            ['name' => 'Ankita Gogoi',  'initials' => 'AG', 'role' => 'Magazine Editor',         'korean_role' => '편집장',  'color' => '#1E8B5C', 'department' => 'B.A. Mass Comm, 3rd Year','sort_order' => 4],
            ['name' => 'Dev Hazarika',  'initials' => 'DH', 'role' => 'Events Head',             'korean_role' => '행사 팀장','color' => '#8B6B1E', 'department' => 'B.Tech CSE, 2nd Year',   'sort_order' => 5],
            ['name' => 'Mitu Kalita',   'initials' => 'MK', 'role' => 'Membership Coordinator',  'korean_role' => '회원 담당','color' => '#8B3A1E', 'department' => 'B.A. Hindi, 2nd Year',   'sort_order' => 6],
        ];

        foreach ($team as $data) {
            Member::updateOrCreate(
                ['name' => $data['name'], 'is_team' => true],
                array_merge($data, ['is_team' => true, 'is_active' => true])
            );
        }
    }
}
