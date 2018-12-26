<?php
use Illuminate\Database\Seeder;
class AdministratorSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
  public function run()
  {
    $administrator = new \App\User;
    $administrator->username = "administrator";
    $administrator->name = "Site Administrator";
    $administrator->email = "administrator@larashop.test";
    $administrator->address = "";
    $administrator->phone= "";
    $administrator->avatar = "";
    $administrator->status = "ACTIVE";
    $administrator->roles = json_encode(["ADMIN"]);
    $administrator->password = \Hash::make("larashop");
    $administrator->save();
    $this->command->info("User Admin berhasil diinsert");
  }
}
