<?php

use Illuminate\Database\Seeder;

class AdminTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // base tables
        \Encore\Admin\Auth\Database\Menu::truncate();
        \Encore\Admin\Auth\Database\Menu::insert(
            [
                [
                    "parent_id" => 0,
                    "order" => 1,
                    "title" => "Dashboard",
                    "icon" => "fa-bar-chart",
                    "uri" => "/",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 0,
                    "order" => 11,
                    "title" => "Admin",
                    "icon" => "fa-tasks",
                    "uri" => "",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 2,
                    "order" => 12,
                    "title" => "Users",
                    "icon" => "fa-users",
                    "uri" => "auth/users",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 2,
                    "order" => 13,
                    "title" => "Roles",
                    "icon" => "fa-user",
                    "uri" => "auth/roles",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 2,
                    "order" => 14,
                    "title" => "Permission",
                    "icon" => "fa-ban",
                    "uri" => "auth/permissions",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 2,
                    "order" => 15,
                    "title" => "Menu",
                    "icon" => "fa-bars",
                    "uri" => "auth/menu",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 2,
                    "order" => 16,
                    "title" => "Operation log",
                    "icon" => "fa-history",
                    "uri" => "auth/logs",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 0,
                    "order" => 2,
                    "title" => "Manager",
                    "icon" => "fa-database",
                    "uri" => NULL,
                    "permission" => NULL
                ],
                [
                    "parent_id" => 8,
                    "order" => 9,
                    "title" => "Images",
                    "icon" => "fa-file-image-o",
                    "uri" => "manager/images",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 8,
                    "order" => 4,
                    "title" => "Beverages",
                    "icon" => "fa-beer",
                    "uri" => "manager/beverages",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 8,
                    "order" => 7,
                    "title" => "Logs",
                    "icon" => "fa-history",
                    "uri" => "manager/logs",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 8,
                    "order" => 8,
                    "title" => "Rakutens",
                    "icon" => "fa-shopping-cart",
                    "uri" => "manager/rakutens",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 8,
                    "order" => 6,
                    "title" => "Reviews",
                    "icon" => "fa-star",
                    "uri" => "manager/reviews",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 8,
                    "order" => 3,
                    "title" => "Tags",
                    "icon" => "fa-tags",
                    "uri" => "manager/tags",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 8,
                    "order" => 5,
                    "title" => "BeverageTags",
                    "icon" => "fa-tag",
                    "uri" => "manager/beverage-tags",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 8,
                    "order" => 10,
                    "title" => "Votes",
                    "icon" => "fa-ticket",
                    "uri" => "manager/votes",
                    "permission" => NULL
                ]
            ]
        );

        \Encore\Admin\Auth\Database\Permission::truncate();
        \Encore\Admin\Auth\Database\Permission::insert(
            [
                [
                    "name" => "All permission",
                    "slug" => "*",
                    "http_method" => "",
                    "http_path" => "*"
                ],
                [
                    "name" => "Dashboard",
                    "slug" => "dashboard",
                    "http_method" => "GET",
                    "http_path" => "/"
                ],
                [
                    "name" => "Login",
                    "slug" => "auth.login",
                    "http_method" => "",
                    "http_path" => "/auth/login\r\n/auth/logout"
                ],
                [
                    "name" => "User setting",
                    "slug" => "auth.setting",
                    "http_method" => "GET,PUT",
                    "http_path" => "/auth/setting"
                ],
                [
                    "name" => "Auth management",
                    "slug" => "auth.management",
                    "http_method" => "",
                    "http_path" => "/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs"
                ]
            ]
        );

        \Encore\Admin\Auth\Database\Role::truncate();
        \Encore\Admin\Auth\Database\Role::insert(
            [
                [
                    "name" => "Administrator",
                    "slug" => "administrator"
                ]
            ]
        );

        // pivot tables
        DB::table('admin_role_menu')->truncate();
        DB::table('admin_role_menu')->insert(
            [
                [
                    "role_id" => 1,
                    "menu_id" => 2
                ],
                [
                    "role_id" => 1,
                    "menu_id" => 9
                ],
                [
                    "role_id" => 1,
                    "menu_id" => 13
                ],
                [
                    "role_id" => 1,
                    "menu_id" => 14
                ],
                [
                    "role_id" => 1,
                    "menu_id" => 15
                ],
                [
                    "role_id" => 1,
                    "menu_id" => 16
                ]
            ]
        );

        DB::table('admin_role_permissions')->truncate();
        DB::table('admin_role_permissions')->insert(
            [
                [
                    "role_id" => 1,
                    "permission_id" => 1
                ]
            ]
        );

        // finish
    }
}
