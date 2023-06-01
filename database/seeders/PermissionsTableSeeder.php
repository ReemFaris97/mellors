<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
      */ 
    public function run()
    {
        $permissions = [

 /*                 [   
                    'name' => 'role-list',   
                    'guard_name' => 'web',   
                    'title' => 'roles List',   
                    'route_name' => 'admin.roles.index,admin.roles.show'   
                ],   
                [   
                    'name' => 'role-create',   
                    'guard_name' => 'web',   
                    'title' => 'add Role',   
                    'route_name' => 'admin.roles.create,admin.roles.store'   
                ],   
                [   
                    'name' => 'role-edit',   
                    'guard_name' => 'web',   
                    'title' => 'update role',   
                    'route_name' => 'admin.roles.edit,admin.roles.update'   
                ],   
                [   
                    'name' => 'role-delete',   
                    'guard_name' => 'web',   
                    'title' => 'delete Role',   
                    'route_name' => 'admin.roles.destroy'   
                ],   
                [   
                    'name' => 'users-list',   
                    'guard_name' => 'web',   
                    'title' => 'users list',   
                    'route_name' => 'admin.users.index,admin.users.show'   
                ],   
                [   
                    'name' => 'users-create',   
                    'guard_name' => 'web',   
                    'title' => 'add users',   
                    'route_name' => 'admin.users.create,admin.users.store'   
                ],   
                [   
                    'name' => 'users-edit',   
                    'guard_name' => 'web',   
                    'title' => 'update users',   
                    'route_name' => 'admin.users.edit,admin.users.update'   
                ],   
                [   
                    'name' => 'users-delete',   
                    'guard_name' => 'web',   
                    'title' => 'delete users',   
                    'route_name' => 'admin.users.destroy'   
                ],   
              [   
                  'name' => 'departments-list',   
                  'guard_name' => 'web',   
                  'title' => 'departments list',   
                  'route_name' => 'admin.departments.index,admin.departments.show'   
              ],   
              [   
                  'name' => 'departments-create',   
                  'guard_name' => 'web',   
                  'title' => 'add departments',   
                  'route_name' => 'admin.departments.create,admin.departments.store'   
              ],   
              [   
                  'name' => 'departments-edit',   
                  'guard_name' => 'web',   
                  'title' => 'update departments',   
                  'route_name' => 'admin.departments.edit,admin.departments.update'   
              ],   
              [   
                  'name' => 'departments-delete',   
                  'guard_name' => 'web',   
                  'title' => 'delete users',   
                  'route_name' => 'admin.users.destroy'   
              ],   
              [   
                  'name' => 'branches-list',   
                  'guard_name' => 'web',   
                  'title' => 'branches list',   
                  'route_name' => 'admin.branches.index,admin.branches.show'   
              ],   
              [   
                  'name' => 'branches-create',   
                  'guard_name' => 'web',   
                  'title' => 'add branches',   
                  'route_name' => 'admin.branches.create,admin.branches.store'   
              ],   
              [   
                  'name' => 'branches-edit',   
                  'guard_name' => 'web',   
                  'title' => 'update branches',   
                  'route_name' => 'admin.branches.edit,admin.branches.update'   
              ],   
              [   
                  'name' => 'branches-delete',   
                  'guard_name' => 'web',   
                  'title' => 'delete branches',   
                  'route_name' => 'admin.branches.destroy'   
              ],   
              [   
                  'name' => 'parks-list',   
                  'guard_name' => 'web',   
                  'title' => 'parks list',   
                  'route_name' => 'admin.parks.index,admin.parks.show'   
              ],   
              [   
                  'name' => 'parks-create',   
                  'guard_name' => 'web',   
                  'title' => 'add parks',   
                  'route_name' => 'admin.parks.create,admin.parks.store'   
              ],   
              [   
                  'name' => 'parks-edit',   
                  'guard_name' => 'web',   
                  'title' => 'update parks',   
                  'route_name' => 'admin.parks.edit,admin.parks.update'   
              ],   
              [   
                  'name' => 'parks-delete',   
                  'guard_name' => 'web',   
                  'title' => 'delete parks',   
                  'route_name' => 'admin.parks.destroy'   
              ],   
              [   
                  'name' => 'zones-list',   
                  'guard_name' => 'web',   
                  'title' => 'zones list',   
                  'route_name' => 'admin.zones.index,admin.zones.show'   
              ],   
              [   
                  'name' => 'zones-create',   
                  'guard_name' => 'web',   
                  'title' => 'add zones',   
                  'route_name' => 'admin.zones.create,admin.zones.store'   
              ],   
              [   
                  'name' => 'zones-edit',   
                  'guard_name' => 'web',   
                  'title' => 'update zones',   
                  'route_name' => 'admin.zones.edit,admin.zones.update'   
              ],   
              [   
                  'name' => 'zones-delete',   
                  'guard_name' => 'web',   
                  'title' => 'delete zones',   
                  'route_name' => 'admin.zones.destroy'   
              ],   
              [   
                  'name' => 'park_times-list',   
                  'guard_name' => 'web',   
                  'title' => 'park_times list',   
                  'route_name' => 'admin.park_times.index,admin.park_times.show'   
              ],   
              [   
                  'name' => 'park_times-create',   
                  'guard_name' => 'web',   
                  'title' => 'add park_times',   
                  'route_name' => 'admin.park_times.create,admin.park_times.store'   
              ],   
              [   
                  'name' => 'park_times-edit',   
                  'guard_name' => 'web',   
                  'title' => 'update park_times',   
                  'route_name' => 'admin.park_times.edit,admin.park_times.update'   
              ],   
              [   
                  'name' => 'park_times-delete',   
                  'guard_name' => 'web',   
                  'title' => 'delete park_times',   
                  'route_name' => 'admin.park_times.destroy'   
              ],   
              [   
                  'name' => 'game_times-list',   
                  'guard_name' => 'web',   
                  'title' => 'game_times list',   
                  'route_name' => 'admin.game_times.index,admin.game_times.show'   
              ],   
              [   
                  'name' => 'game_times-create',   
                  'guard_name' => 'web',   
                  'title' => 'add game_times',   
                  'route_name' => 'admin.game_times.create,admin.game_times.store'   
              ],   
              [   
                  'name' => 'game_times-edit',   
                  'guard_name' => 'web',   
                  'title' => 'update game_times',   
                  'route_name' => 'admin.game_times.edit,admin.game_times.update'   
              ],   
              [   
                  'name' => 'game_times-delete',   
                  'guard_name' => 'web',   
                  'title' => 'delete game_times',   
                  'route_name' => 'admin.game_times.destroy'   
              ],   
              [   
                  'name' => 'games-list',   
                  'guard_name' => 'web',   
                  'title' => 'games list',   
                  'route_name' => 'admin.games.index,admin.games.show'   
              ],   
              [   
                  'name' => 'games-create',   
                  'guard_name' => 'web',   
                  'title' => 'add games',   
                  'route_name' => 'admin.games.create,admin.games.store'   
              ],   
              [   
                  'name' => 'games-edit',   
                  'guard_name' => 'web',   
                  'title' => 'update games',   
                  'route_name' => 'admin.games.edit,admin.games.update'   
              ],   
              [   
                  'name' => 'games-delete',   
                  'guard_name' => 'web',   
                  'title' => 'delete games',   
                  'route_name' => 'admin.games.destroy'   
              ],   
              [   
                  'name' => 'inspection_lists-list',   
                  'guard_name' => 'web',   
                  'title' => 'inspection_lists list',   
                  'route_name' => 'admin.inspection_lists.index,admin.inspection_lists.show'   
              ],   
              [   
                  'name' => 'inspection_lists-create',   
                  'guard_name' => 'web',   
                  'title' => 'add inspection_lists',   
                  'route_name' => 'admin.inspection_lists.create,admin.inspection_lists.store'   
              ],   
              [   
                  'name' => 'inspection_lists-edit',   
                  'guard_name' => 'web',   
                  'title' => 'update inspection_lists',   
                  'route_name' => 'admin.inspection_lists.edit,admin.inspection_lists.update'   
              ],   
              [   
                  'name' => 'inspection_lists-delete',   
                  'guard_name' => 'web',   
                  'title' => 'delete inspection_lists',   
                  'route_name' => 'admin.inspection_lists.destroy'   
              ],   
              [   
                  'name' => 'preopening_lists-list',   
                  'guard_name' => 'web',   
                  'title' => 'preopening_lists list',   
                  'route_name' => 'admin.preopening_lists.index,admin.preopening_lists.show'   
              ],   
              [   
                  'name' => 'preopening_lists-create',   
                  'guard_name' => 'web',   
                  'title' => 'add preopening_lists',   
                  'route_name' => 'admin.preopening_lists.create,admin.preopening_lists.store'   
              ],   
              [   
                  'name' => 'preopening_lists-edit',   
                  'guard_name' => 'web',   
                  'title' => 'update preopening_lists',   
                  'route_name' => 'admin.preopening_lists.edit,admin.preopening_lists.update'   
              ],   
              [   
                  'name' => 'preopening_lists-delete',   
                  'guard_name' => 'web',   
                  'title' => 'delete preopening_lists',   
                  'route_name' => 'admin.preopening_lists.destroy'   
              ],   
              [   
                  'name' => 'rides-list',   
                  'guard_name' => 'web',   
                  'title' => 'rides list',   
                  'route_name' => 'admin.rides.index,admin.rides.show'   
              ],   
              [   
                  'name' => 'rides-create',   
                  'guard_name' => 'web',   
                  'title' => 'add rides',   
                  'route_name' => 'admin.rides.create,admin.rides.store'   
              ],   
              [   
                  'name' => 'rides-edit',   
                  'guard_name' => 'web',   
                  'title' => 'update rides',   
                  'route_name' => 'admin.rides.edit,admin.rides.update'   
              ],   
              [   
                  'name' => 'rides-delete',   
                  'guard_name' => 'web',   
                  'title' => 'delete rides',   
                  'route_name' => 'admin.rides.destroy'   
              ],   
              [   
                  'name' => 'customer_feedbacks-list',   
                  'guard_name' => 'web',   
                  'title' => 'customer_feedbacks list',   
                  'route_name' => 'admin.customer_feedbacks.index,admin.customer_feedbacks.show'   
              ],   
              [   
                  'name' => 'customer_feedbacks-create',   
                  'guard_name' => 'web',   
                  'title' => 'add customer_feedbacks',   
                  'route_name' => 'admin.customer_feedbacks.create,admin.customer_feedbacks.store'   
              ],   
              [   
                  'name' => 'customer_feedbacks-edit',   
                  'guard_name' => 'web',   
                  'title' => 'update customer_feedbacks',   
                  'route_name' => 'admin.customer_feedbacks.edit,admin.customer_feedbacks.update'   
              ],   
              [   
                  'name' => 'customer_feedbacks-delete',   
                  'guard_name' => 'web',   
                  'title' => 'delete customer feedbacks',   
                  'route_name' => 'admin.customer_feedbacks.destroy'   
              ],   
              [   
                  'name' => 'queues-list',   
                  'guard_name' => 'web',   
                  'title' => 'queues list',   
                  'route_name' => 'admin.queues.index,admin.queues.show'   
              ],   
              [   
                  'name' => 'queues-create',   
                  'guard_name' => 'web',   
                  'title' => 'add queues',   
                  'route_name' => 'admin.queues.create,admin.queues.store'   
              ],   
              [   
                  'name' => 'queues-edit',   
                  'guard_name' => 'web',   
                  'title' => 'update queues',   
                  'route_name' => 'admin.queues.edit,admin.queues.update'   
              ],   
              [   
                  'name' => 'queues-delete',   
                  'guard_name' => 'web',   
                  'title' => 'delete queues',   
                  'route_name' => 'admin.queues.destroy'   
              ] ,   



              [   
                  'name' => 'stoppage-category-list',   
                  'guard_name' => 'web',   
                  'title' => 'stoppage-category list',   
                  'route_name' => 'admin.stoppage-category.index,admin.stoppage-category.show'   
              ],   
              [   
                  'name' => 'stoppage-category-create',   
                  'guard_name' => 'web',   
                  'title' => 'add stoppage-category',   
                  'route_name' => 'admin.stoppage-category.create,admin.stoppage-category.store'   
              ],   
              [   
                  'name' => 'stoppage-category-edit',   
                  'guard_name' => 'web',   
                  'title' => 'update stoppage-category',   
                  'route_name' => 'admin.stoppage-category.edit,admin.stoppage-category.update'   
              ],   
              [   
                  'name' => 'stoppage-category-delete',   
                  'guard_name' => 'web',   
                  'title' => 'delete stoppage-category',   
                  'route_name' => 'admin.stoppage-category.destroy'   
              ],   

              [   
                  'name' => 'stoppage-sub-category-list',   
                  'guard_name' => 'web',   
                  'title' => 'stoppage-sub-category list',   
                  'route_name' => 'admin.stoppage-sub-category.index,admin.stoppage-sub-category.show'   
              ],   
              [   
                  'name' => 'stoppage-sub-category-create',   
                  'guard_name' => 'web',   
                  'title' => 'add stoppage-sub-category',   
                  'route_name' => 'admin.stoppage-sub-category.create,admin.stoppage-sub-category.store'   
              ],   
              [   
                  'name' => 'stoppage-sub-category-edit',   
                  'guard_name' => 'web',   
                  'title' => 'update stoppage-sub-category',   
                  'route_name' => 'admin.stoppage-sub-category.edit,admin.stoppage-sub-category.update'   
              ],   
              [   
                  'name' => 'stoppage-sub-category-delete',   
                  'guard_name' => 'web',   
                  'title' => 'delete stoppage-sub-category',   
                  'route_name' => 'admin.stoppage-sub-category.destroy'   
              ],   

              [   
                  'name' => 'rides-stoppages-list',   
                  'guard_name' => 'web',   
                  'title' => 'rides-stoppages list',   
                  'route_name' => 'admin.rides-stoppages.index,admin.rides-stoppages.show'   
              ],   
              [   
                  'name' => 'rides-stoppages-create',   
                  'guard_name' => 'web',   
                  'title' => 'add rides-stoppages',   
                  'route_name' => 'admin.rides-stoppages.create,admin.rides-stoppages.store'   
              ],   
              [   
                  'name' => 'rides-stoppages-edit',   
                  'guard_name' => 'web',   
                  'title' => 'update rides-stoppages',   
                  'route_name' => 'admin.rides-stoppages.edit,admin.rides-stoppages.update'   
              ],   
              [   
                  'name' => 'rides-stoppages-delete',   
                  'guard_name' => 'web',   
                  'title' => 'delete rides-stoppages',   
                  'route_name' => 'admin.rides-stoppages.destroy'   
              ],   
              [   
                  'name' => 'rides-cycles-list',   
                  'guard_name' => 'web',   
                  'title' => 'rides-cycles list',   
                  'route_name' => 'admin.rides-cycles.index,admin.rides-cycles.show'   
              ],   
              [   
                  'name' => 'rides-cycles-create',   
                  'guard_name' => 'web',   
                  'title' => 'add rides-cycles',   
                  'route_name' => 'admin.rides-cycles.create,admin.rides-cycles.store'   
              ],   
              [   
                  'name' => 'rides-cycles-edit',   
                  'guard_name' => 'web',   
                  'title' => 'update rides-cycles',   
                  'route_name' => 'admin.rides-cycles.edit,admin.rides-cycles.update'   
              ],   
              [   
                  'name' => 'rides-cycles-delete',   
                  'guard_name' => 'web',   
                  'title' => 'delete rides-cycles',   
                  'route_name' => 'admin.rides-cycles.destroy'   
              ],   
              [   
                  'name' => 'rsr_reports-list',   
                  'guard_name' => 'web',   
                  'title' => 'rsr_reports list',   
                  'route_name' => 'admin.rsr_reports.index,admin.rsr_reports.show'   
              ],   
              [   
                  'name' => 'rsr_reports-create',   
                  'guard_name' => 'web',   
                  'title' => 'add rsr_reports',   
                  'route_name' => 'admin.rsr_reports.create,admin.rsr_reports.store'   
              ],   
              [   
                  'name' => 'rsr_reports-edit',   
                  'guard_name' => 'web',   
                  'title' => 'update rsr_reports',   
                  'route_name' => 'admin.rsr_reports.edit,admin.rsr_reports.update'   
              ],   
              [   
                  'name' => 'rsr_reports-delete',   
                  'guard_name' => 'web',   
                  'title' => 'delete rsr_reports',   
                  'route_name' => 'admin.rsr_reports.destroy'   
              ],   
         
              [   
                  'name' => 'incidents-list',   
                  'guard_name' => 'web',   
                  'title' => 'incidents list',   
                  'route_name' => 'admin.incidents.index,admin.incidents.show'   
              ],   
              [   
                  'name' => 'incidents-create',   
                  'guard_name' => 'web',   
                  'title' => 'add incidents',   
                  'route_name' => 'admin.incidents.create,admin.incidents.store'   
              ],   
              [   
                  'name' => 'incidents-edit',   
                  'guard_name' => 'web',   
                  'title' => 'update incidents',   
                  'route_name' => 'admin.incidents.edit,admin.incidents.update'   
              ],   
              [   
                  'name' => 'incidents-delete',   
                  'guard_name' => 'web',   
                  'title' => 'delete incidents',   
                  'route_name' => 'admin.incidents.destroy'   
              ],   
              [   
                  'name' => 'accidents-list',   
                  'guard_name' => 'web',   
                  'title' => 'accidents list',   
                  'route_name' => 'admin.accidents.index,admin.accidents.show'   
              ],   
              [   
                  'name' => 'accidents-create',   
                  'guard_name' => 'web',   
                  'title' => 'add accidents',   
                  'route_name' => 'admin.accidents.create,admin.accidents.store'   
              ],   
              [   
                  'name' => 'accidents-edit',   
                  'guard_name' => 'web',   
                  'title' => 'update accidents',   
                  'route_name' => 'admin.accidents.edit,admin.accidents.update'   
              ],   
              [   
                  'name' => 'accidents-delete',   
                  'guard_name' => 'web',   
                  'title' => 'delete accidents',   
                  'route_name' => 'admin.accidents.destroy'   
              ],   
              [   
                  'name' => 'health_and_safety_reports-list',   
                  'guard_name' => 'web',   
                  'title' => 'health_and_safety_reports list',   
                  'route_name' => 'admin.health_and_safety_reports.index,admin.health_and_safety_reports.show'   
              ],   
              [   
                  'name' => 'health_and_safety_reports-create',   
                  'guard_name' => 'web',   
                  'title' => 'add health_and_safety_reports',   
                  'route_name' => 'admin.health_and_safety_reports.create,admin.health_and_safety_reports.store'   
              ],   
              [   
                  'name' => 'health_and_safety_reports-edit',   
                  'guard_name' => 'web',   
                  'title' => 'update health_and_safety_reports',   
                  'route_name' => 'admin.health_and_safety_reports.edit,admin.health_and_safety_reports.update'   
              ],   
              [   
                  'name' => 'health_and_safety_reports-delete',   
                  'guard_name' => 'web',   
                  'title' => 'delete health_and_safety_reports',   
                  'route_name' => 'admin.health_and_safety_reports.destroy'   
              ],   
              [   
                  'name' => 'skill_game_reports-list',   
                  'guard_name' => 'web',   
                  'title' => 'skill_game_reports list',   
                  'route_name' => 'admin.skill_game_reports.index,admin.skill_game_reports.show'   
              ],   
              [   
                  'name' => 'skill_game_reports-create',   
                  'guard_name' => 'web',   
                  'title' => 'add skill_game_reports',   
                  'route_name' => 'admin.skill_game_reports.create,admin.skill_game_reports.store'   
              ],   
              [   
                  'name' => 'skill_game_reports-edit',   
                  'guard_name' => 'web',   
                  'title' => 'update skill_game_reports',   
                  'route_name' => 'admin.skill_game_reports.edit,admin.skill_game_reports.update'   
              ],   
              [   
                  'name' => 'skill_game_reports-delete',   
                  'guard_name' => 'web',   
                  'title' => 'delete skill_game_reports',   
                  'route_name' => 'admin.skill_game_reports.destroy'   
              ],   
              [   
                  'name' => 'maintenance_reports-list',   
                  'guard_name' => 'web',   
                  'title' => 'maintenance_reports list',   
                  'route_name' => 'admin.maintenance_reports.index,admin.maintenance_reports.show'   
              ],   
              [   
                  'name' => 'maintenance_reports-create',   
                  'guard_name' => 'web',   
                  'title' => 'add maintenance_reports',   
                  'route_name' => 'admin.maintenance_reports.create,admin.maintenance_reports.store'   
              ],   
              [   
                  'name' => 'maintenance_reports-edit',   
                  'guard_name' => 'web',   
                  'title' => 'update maintenance_reports',   
                  'route_name' => 'admin.maintenance_reports.edit,admin.maintenance_reports.update'   
              ],   
              [   
                  'name' => 'maintenance_reports-delete',   
                  'guard_name' => 'web',   
                  'title' => 'delete maintenance_reports',   
                  'route_name' => 'admin.maintenance_reports.destroy'   
              ],   
              [   
                  'name' => 'tech-reports-list',   
                  'guard_name' => 'web',   
                  'title' => 'tech-reports list',   
                  'route_name' => 'admin.tech-reports.index,admin.tech-reports.show'   
              ],   
              [   
                  'name' => 'tech-reports-create',   
                  'guard_name' => 'web',   
                  'title' => 'add tech-reports',   
                  'route_name' => 'admin.tech-reports.create,admin.tech-reports.store'   
              ],   
              [   
                  'name' => 'tech-reports-edit',   
                  'guard_name' => 'web',   
                  'title' => 'update tech-reports',   
                  'route_name' => 'admin.tech-reports.edit,admin.tech-reports.update'   
              ],   
              [   
                  'name' => 'tech-reports-delete',   
                  'guard_name' => 'web',   
                  'title' => 'delete tech-reports',   
                  'route_name' => 'admin.tech-reports.destroy'   
              ],   
              [   
                  'name' => 'ride-ops-reports-list',   
                  'guard_name' => 'web',   
                  'title' => 'ride-ops-reports list',   
                  'route_name' => 'admin.ride-ops-reports.index,admin.ride-ops-reports.show'   
              ],   
              [   
                  'name' => 'ride-ops-reports-create',   
                  'guard_name' => 'web',   
                  'title' => 'add ride-ops-reports',   
                  'route_name' => 'admin.ride-ops-reports.create,admin.ride-ops-reports.store'   
              ],   
              [   
                  'name' => 'ride-ops-reports-edit',   
                  'guard_name' => 'web',   
                  'title' => 'update ride-ops-reports',   
                  'route_name' => 'admin.ride-ops-reports.edit,admin.ride-ops-reports.update'   
              ],   
              [   
                  'name' => 'ride-ops-reports-delete',   
                  'guard_name' => 'web',   
                  'title' => 'delete ride-ops-reports',   
                  'route_name' => 'admin.ride-ops-reports.destroy'   
              ],   
           [ 
                'name' => 'ride_types-list',
                'guard_name' => 'web',
                'title' => 'ride_types list',
                'route_name' => 'admin.ride_types.index,admin.ride_types.show'
            ],
            [
                'name' => 'ride_types-create',
                'guard_name' => 'web',
                'title' => 'add ride_types',
                'route_name' => 'admin.ride_types.create,admin.ride_types.store'
            ],
            [
                'name' => 'ride_types-edit',
                'guard_name' => 'web',
                'title' => 'update ride_types',
                'route_name' => 'admin.ride_types.edit,admin.ride_types.update'
            ],
            [
                'name' => 'ride_types-delete',
                'guard_name' => 'web',
                'title' => 'delete ride_types',
                'route_name' => 'admin.ride_types.destroy'
            ], */
           [
                'name' => 'daily_entrance_count',
                'guard_name' => 'web',
                'title' => 'Add daily entrance count',
                'route_name' => 'admin.park_times.daily_entrance_count'
            ],
            [
                'name' => 'editRideTime',
                'guard_name' => 'web',
                'title' => 'edit Ride Time',
                'route_name' => 'admin.editRideTime'
            ],
            [
                'name' => 'uploadStoppagesExcleFile',
                'guard_name' => 'web',
                'title' => 'upload Stoppages Excle File',
                'route_name' => 'admin.uploadStoppagesExcleFile'
            ],
            [
                'name' => 'showStoppages',
                'guard_name' => 'web',
                'title' => 'show Stoppages',
                'route_name' => 'admin.showStoppages'
            ],
            [
                'name' => 'uploadQueueExcleFile',
                'guard_name' => 'web',
                'title' => 'upload Queue ExcleFile',
                'route_name' => 'admin.uploadQueueExcleFile'
            ],
            [
                'name' => 'uploadCycleExcleFile',
                'guard_name' => 'web',
                'title' => 'upload Cycle ExcleFile',
                'route_name' => 'admin.uploadCycleExcleFile'
            ],

            [
                'name' => 'showCycles',
                'guard_name' => 'web',
                'title' => 'show Cycles',
                'route_name' => 'admin.showCycles'
            ],
            [
                'name' => 'showQueues',
                'guard_name' => 'web',
                'title' => 'show Queues',
                'route_name' => 'admin.showQueues'
            ],
            [
                'name' => 'showPreopeningList',
                'guard_name' => 'web',
                'title' => 'show Inspection List',
                'route_name' => 'admin.showPreopeningList'
            ],

            [
                'name' => 'cheackRideInspectionList',
                'guard_name' => 'web',
                'title' => 'cheackRideInspectionList',
                'route_name' => 'admin.cheackRideInspectionList'
            ],
            [
                'name' => 'showStoppagesReport',
                'guard_name' => 'web',
                'title' => 'show Stoppages Report',
                'route_name' => 'admin.reports.showStoppagesReport'
            ],
            [
                'name' => 'stoppagesReport',
                'guard_name' => 'web',
                'title' => 'stoppages Report',
                'route_name' => 'admin.reports.stoppagesReport'
            ],
            [
                'name' => 'rideStatus',
                'guard_name' => 'web',
                'title' => 'ride Status report',
                'route_name' => 'admin.reports.rideStatus'
            ],

            [
                'name' => 'searchCustomerFeedBack',
                'guard_name' => 'web',
                'title' => 'search Customer FeedBack',
                'route_name' => 'admin.searchCustomerFeedBack'
            ],
            [
                'name' => 'searchDutySummaryReport',
                'guard_name' => 'web',
                'title' => 'search DutySummary Report',
                'route_name' => 'admin.searchDutySummaryReport'
            ],
            [
                'name' => 'addRideZone',
                'guard_name' => 'web',
                'title' => 'add Ride Zone',
                'route_name' => 'admin.addRideZone'
            ],
            [
                'name' => 'addRidePark',
                'guard_name' => 'web',
                'title' => 'add Ride Park',
                'route_name' => 'admin.addRidePark'
            ],
            [ 
                'name' => 'duty-report-list',
                'guard_name' => 'web',
                'title' => 'duty report list',
                'route_name' => 'admin.duty-report.index,admin.duty-report.show'
            ],
            [ 
                'name' => 'inspectionListReport',
                'guard_name' => 'web',
                'title' => 'inspection List Report',
                'route_name' => 'admin.inspectionListReport'
            ],
            [ 
                'name' => 'user_zones-list',
                'guard_name' => 'web',
                'title' => 'user zones list',
                'route_name' => 'admin.user_zones.index,admin.user_zones.show'
            ],
            [
                'name' => 'user_zones-create',
                'guard_name' => 'web',
                'title' => 'add user zones',
                'route_name' => 'admin.user_zones.create,admin.user_zones.store'
            ],
            [
                'name' => 'user_zones-edit',
                'guard_name' => 'web',
                'title' => 'update user zones',
                'route_name' => 'admin.user_zones.edit,admin.user_zones.update'
            ],
            [ 
                'name' => 'user_parks-list',
                'guard_name' => 'web',
                'title' => 'user parks list',
                'route_name' => 'admin.user_parks.index,admin.user_parks.show'
            ],
            [
                'name' => 'user_parks-create',
                'guard_name' => 'web',
                'title' => 'add user zones',
                'route_name' => 'admin.user_parks.create,admin.user_parks.store'
            ],
            [
                'name' => 'user_parks-edit',
                'guard_name' => 'web',
                'title' => 'update user parks',
                'route_name' => 'admin.user_parks.edit,admin.user_parks.update'
            ],
        ];
        \DB::table('permissions')->insert($permissions);
    }
}
