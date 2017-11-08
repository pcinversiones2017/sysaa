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
        User::create(['username' => 'gmoreno', 'email' => 'gilmarmoreno1993@gmail.com', 'password' => bcrypt(123456), 'nombres' => 'GILMAR', 'paterno' => 'GILMAR', 'materno' => 'GILMAR']);
        User::create(['username' => 'cesar', 'email' => 'cesarhm1687@gmail.com', 'password' => bcrypt(123456), 'nombres' => 'CESAR', 'paterno' => 'CESAR', 'materno' => 'CESAR']);
        User::create(['username' => 'roberth', 'email' => 'roberth1136@gmail.com', 'password' => bcrypt(123456), 'nombres' => 'ROBERTH', 'paterno' => 'ROBERTH', 'materno' => 'ROBERTH']);
        User::create(['username' => 'jose', 'email' => 'jose@gmail.com', 'password' => bcrypt(123456), 'nombres' => 'JOSE', 'paterno' => 'JOSE', 'materno' => 'JOSE']);
        User::create(['username' => 'maria', 'email' => 'maria@gmail.com', 'password' => bcrypt(123456), 'nombres' => 'MARIA', 'paterno' => 'MARIA', 'materno' => 'MARIA']);
        User::create(['username' => 'sofia', 'email' => 'sofia@gmail.com', 'password' => bcrypt(123456), 'nombres' => 'SOFIA', 'paterno' => 'SOFIA', 'materno' => 'SOFIA']);
    }
}
