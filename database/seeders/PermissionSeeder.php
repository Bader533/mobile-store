<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // // HR
        // Permission::create(['name' => 'Create-Employee', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Employees', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Employee', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Employee', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Show-Employee', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-Customer', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Customers', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Customer', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Customer', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Show-Customer', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-Branch', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Branches', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Branch', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Branch', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Show-Branch', 'guard_name' => 'admin']);

        // // Apps
        // Permission::create(['name' => 'Create-Product', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Products', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Product', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Product', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Show-Product', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-Order', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Orders', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Order', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Order', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Show-Order', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-Installment', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Installments', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Installment', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Installment', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Show-Installment', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-Contract', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Contracts', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Contract', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Contract', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Show-Contract', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Paid-invoice', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Show-invoice', 'guard_name' => 'admin']);

        // //Tracking
        // Permission::create(['name' => 'Read-Trackings', 'guard_name' => 'admin']);

        // // ========================== employee ========================== //

        // // HR
        // Permission::create(['name' => 'Create-Employee', 'guard_name' => 'employee']);
        // Permission::create(['name' => 'Read-Employees', 'guard_name' => 'employee']);
        // Permission::create(['name' => 'Update-Employee', 'guard_name' => 'employee']);
        // Permission::create(['name' => 'Delete-Employee', 'guard_name' => 'employee']);
        // Permission::create(['name' => 'Show-Employee', 'guard_name' => 'employee']);

        // Permission::create(['name' => 'Create-Customer', 'guard_name' => 'employee']);
        // Permission::create(['name' => 'Read-Customers', 'guard_name' => 'employee']);
        // Permission::create(['name' => 'Update-Customer', 'guard_name' => 'employee']);
        // Permission::create(['name' => 'Delete-Customer', 'guard_name' => 'employee']);
        // Permission::create(['name' => 'Show-Customer', 'guard_name' => 'employee']);

        // Permission::create(['name' => 'Create-Branch', 'guard_name' => 'employee']);
        // Permission::create(['name' => 'Read-Branches', 'guard_name' => 'employee']);
        // Permission::create(['name' => 'Update-Branch', 'guard_name' => 'employee']);
        // Permission::create(['name' => 'Delete-Branch', 'guard_name' => 'employee']);
        // Permission::create(['name' => 'Show-Branch', 'guard_name' => 'employee']);

        // // Apps
        // Permission::create(['name' => 'Create-Product', 'guard_name' => 'employee']);
        // Permission::create(['name' => 'Read-Products', 'guard_name' => 'employee']);
        // Permission::create(['name' => 'Update-Product', 'guard_name' => 'employee']);
        // Permission::create(['name' => 'Delete-Product', 'guard_name' => 'employee']);
        // Permission::create(['name' => 'Show-Product', 'guard_name' => 'employee']);

        // Permission::create(['name' => 'Create-Order', 'guard_name' => 'employee']);
        // Permission::create(['name' => 'Read-Orders', 'guard_name' => 'employee']);
        // Permission::create(['name' => 'Update-Order', 'guard_name' => 'employee']);
        // Permission::create(['name' => 'Delete-Order', 'guard_name' => 'employee']);
        // Permission::create(['name' => 'Show-Order', 'guard_name' => 'employee']);

        // Permission::create(['name' => 'Create-Installment', 'guard_name' => 'employee']);
        // Permission::create(['name' => 'Read-Installments', 'guard_name' => 'employee']);
        // Permission::create(['name' => 'Update-Installment', 'guard_name' => 'employee']);
        // Permission::create(['name' => 'Delete-Installment', 'guard_name' => 'employee']);
        // Permission::create(['name' => 'Show-Installment', 'guard_name' => 'employee']);

        // Permission::create(['name' => 'Create-Contract', 'guard_name' => 'employee']);
        // Permission::create(['name' => 'Read-Contracts', 'guard_name' => 'employee']);
        // Permission::create(['name' => 'Update-Contract', 'guard_name' => 'employee']);
        // Permission::create(['name' => 'Delete-Contract', 'guard_name' => 'employee']);
        // Permission::create(['name' => 'Show-Contract', 'guard_name' => 'employee']);

        // Permission::create(['name' => 'Paid-invoice', 'guard_name' => 'employee']);
        // Permission::create(['name' => 'Show-invoice', 'guard_name' => 'employee']);

        // //Tracking
        // Permission::create(['name' => 'Read-Trackings', 'guard_name' => 'employee']);

        // // ========================== branch ========================== //

        // // HR
        // Permission::create(['name' => 'Create-Employee', 'guard_name' => 'branch']);
        // Permission::create(['name' => 'Read-Employees', 'guard_name' => 'branch']);
        // Permission::create(['name' => 'Update-Employee', 'guard_name' => 'branch']);
        // Permission::create(['name' => 'Delete-Employee', 'guard_name' => 'branch']);
        // Permission::create(['name' => 'Show-Employee', 'guard_name' => 'branch']);

        // Permission::create(['name' => 'Create-Customer', 'guard_name' => 'branch']);
        // Permission::create(['name' => 'Read-Customers', 'guard_name' => 'branch']);
        // Permission::create(['name' => 'Update-Customer', 'guard_name' => 'branch']);
        // Permission::create(['name' => 'Delete-Customer', 'guard_name' => 'branch']);
        // Permission::create(['name' => 'Show-Customer', 'guard_name' => 'branch']);

        // Permission::create(['name' => 'Create-Branch', 'guard_name' => 'branch']);
        // Permission::create(['name' => 'Read-Branches', 'guard_name' => 'branch']);
        // Permission::create(['name' => 'Update-Branch', 'guard_name' => 'branch']);
        // Permission::create(['name' => 'Delete-Branch', 'guard_name' => 'branch']);
        // Permission::create(['name' => 'Show-Branch', 'guard_name' => 'branch']);

        // // Apps
        // Permission::create(['name' => 'Create-Product', 'guard_name' => 'branch']);
        // Permission::create(['name' => 'Read-Products', 'guard_name' => 'branch']);
        // Permission::create(['name' => 'Update-Product', 'guard_name' => 'branch']);
        // Permission::create(['name' => 'Delete-Product', 'guard_name' => 'branch']);
        // Permission::create(['name' => 'Show-Product', 'guard_name' => 'branch']);

        // Permission::create(['name' => 'Create-Order', 'guard_name' => 'branch']);
        // Permission::create(['name' => 'Read-Orders', 'guard_name' => 'branch']);
        // Permission::create(['name' => 'Update-Order', 'guard_name' => 'branch']);
        // Permission::create(['name' => 'Delete-Order', 'guard_name' => 'branch']);
        // Permission::create(['name' => 'Show-Order', 'guard_name' => 'branch']);

        // Permission::create(['name' => 'Create-Installment', 'guard_name' => 'branch']);
        // Permission::create(['name' => 'Read-Installments', 'guard_name' => 'branch']);
        // Permission::create(['name' => 'Update-Installment', 'guard_name' => 'branch']);
        // Permission::create(['name' => 'Delete-Installment', 'guard_name' => 'branch']);
        // Permission::create(['name' => 'Show-Installment', 'guard_name' => 'branch']);

        // Permission::create(['name' => 'Create-Contract', 'guard_name' => 'branch']);
        // Permission::create(['name' => 'Read-Contracts', 'guard_name' => 'branch']);
        // Permission::create(['name' => 'Update-Contract', 'guard_name' => 'branch']);
        // Permission::create(['name' => 'Delete-Contract', 'guard_name' => 'branch']);
        // Permission::create(['name' => 'Show-Contract', 'guard_name' => 'branch']);

        // Permission::create(['name' => 'Paid-invoice', 'guard_name' => 'branch']);
        // Permission::create(['name' => 'Show-invoice', 'guard_name' => 'branch']);

        // //Tracking
        // Permission::create(['name' => 'Read-Trackings', 'guard_name' => 'branch']);

        // // ========================== customer ========================== //

        // Permission::create(['name' => 'Read-Contracts', 'guard_name' => 'customer']);
        // Permission::create(['name' => 'Show-Contract', 'guard_name' => 'customer']);

        // Permission::create(['name' => 'Show-invoice', 'guard_name' => 'customer']);

        // Permission::create(['name' => 'Show-MonthyInstallment', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Show-MonthyInstallment', 'guard_name' => 'branch']);
        // Permission::create(['name' => 'Show-MonthyInstallment', 'guard_name' => 'employee']);

        // Permission::create(['name' => 'Update-Status', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Change-Status', 'guard_name' => 'branch']);
        Permission::create(['name' => 'Change-Status', 'guard_name' => 'employee']);

        Permission::create(['name' => 'Create-Edit-Check', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Create-Edit-Check', 'guard_name' => 'branch']);
        Permission::create(['name' => 'Create-Edit-Check', 'guard_name' => 'employee']);
    }
}
