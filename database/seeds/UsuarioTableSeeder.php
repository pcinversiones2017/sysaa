    <?php

use Illuminate\Database\Seeder;
use App\User;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['email' => 'gilmarmoreno1993@gmail.com', 'password' => bcrypt(123456), 'nombres' => 'GILMAR', 'paterno' => 'GILMAR', 'materno' => 'GILMAR']);
        User::create(['email' => 'cesarhm1687@gmail.com', 'password' => bcrypt(123456), 'nombres' => 'CESAR', 'paterno' => 'CESAR', 'materno' => 'CESAR']);
        User::create(['email' => 'roberth1136@gmail.com', 'password' => bcrypt(123456), 'nombres' => 'ROBERTH', 'paterno' => 'ROBERTH', 'materno' => 'ROBERTH']);
    }
}
