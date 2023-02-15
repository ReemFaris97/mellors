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

               [
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
                'name' => 'game_cats-list',
                'guard_name' => 'web',
                'title' => 'game_cats list',
                'route_name' => 'admin.game_cats.index,admin.game_cats.show'
            ],
            [
                'name' => 'game_cats-create',
                'guard_name' => 'web',
                'title' => 'add game_cats',
                'route_name' => 'admin.game_cats.create,admin.game_cats.store'
            ],
            [
                'name' => 'game_cats-edit',
                'guard_name' => 'web',
                'title' => 'update game_cats',
                'route_name' => 'admin.game_cats.edit,admin.game_cats.update'
            ],
            [
                'name' => 'game_cats-delete',
                'guard_name' => 'web',
                'title' => 'delete game_categories',
                'route_name' => 'admin.game_cats.destroy'
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



        ];
        \DB::table('permissions')->insert($permissions);
    }
}
