<?php

namespace App\Livewire\Sys\Artisan;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;

class Migration extends Component
{


    public $vname;
    public $TableName;


    #region[getTableName]
    public function getTableName()
    {
        $this->TableName=DB::table('migrations')->select('migrations.*')->get();
    }
    #region

    #region[DbMigration]
    public function clearView(): void
    {
        Artisan::call('view:clear');
    }

    public function runMigration(): void
    {
        Artisan::call('migrate');
    }

    public function runMigrationRollBack(): void
    {
        Artisan::call('migrate:rollback');
    }


    public function runMigrationFreshSeed(): void
    {

        Artisan::call('migrate:fresh --seed');
    }

    public function runDropTable(): void
    {
        $obj=DB::table('migrations')->find($this->vname);
        Schema::dropIfExists($this->getTableNameFromMigration($obj->migration));
        $data=DB::table('migrations')->where('id',$this->vname);
        $data->delete();
    }

    public function getTableNameFromMigration($migrationFileName)
    {
        preg_match('/create_(.+)_table/', $migrationFileName, $matches);

        return isset($matches[1]) ? $matches[1] : null;
    }

    public function storageLink(): void
    {
        Artisan::call('storage:link');
    }

    public function storageUnLink(): void
    {
        Artisan::call('storage:unlink');
    }

    #endregion


    public function render()
    {
        $this->getTableName();
        return view('livewire.sys.artisan.migration');
    }
}
