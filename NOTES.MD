=== PROGRES ===
1. migration
(part 1)
- buat table users pake 'php artisan make:migration buat_table_users_baru.php'
- trus di php artisan migrate

2. seeder
(part 1)
- buat seeder untuk data awal pake 'php artisan make:seeder trialuserSeeder'
- buat data dummy
- kemudian masukkan ke table user
- setelah mengedit model ketikan perintah untuk menambahkan data yang kita buat di seeder ke table user. 'php artisan db:seed --class=trialuserSeeder'
- di password aku isiin bcrypt itu untuk buat passwordnya ngacak

3. model
(part 1)
- edit bagian user.php
- tambahkan sesuai isi dari table user

4. controller
(part 1)
- buat controller baru 'php artisan make:controller roleController'
- bikin function index

(part 2)
- abis bikin blade loginnya, kita setting function index nya untuk ngarahin ke blade login yang kita buat barusan 'return view('login');'
- setelah selesai setting function index, next kita setting function login. buat function login untuk ngatur logika pas login di roleController

(part 3)
- buat controller baru 'php artisan make:controller adminController'

5. Route (web.php)
(part 1)
- bikin route nya biar kalo buka webnya itu masuk ke halaman yang kita buat di roleController '/'

(part 2)
- buat agar jika dia belum login, artinya dia masih sebagai tamu. setting pada web.php cek pada kernel.php middleware yang 'guest' itu untuk autentikasi kalau dia sudah login tidak bisa jadi akses ke halaman login
- kemudian setting pada halaman web.php juga agar ketika sudah login itu otomatis akan mengarah ke halaman home(karena settingan di redirectifautenticated.php berisikan 'return redirect(RouteServiceProvider::HOME);'). sedangkan kita nggk ada buat halaman home. so kita setting di web.php untuk mengarahkan ke halaman loginz

6. views/blade
(part 1)
- buat blade baru itu blade login yach
- (p.2/1:controller)



note aja :
- untuk manggil sesuatu dari table itu
'Auth::user()->name' misal itu untuk ngambil namanya

note aja :
- riskan kalau nggk hati-hati
- setelah (p.2/2:route) itu yang belum logout bisa aja masuk ke halaman admin. sekarang gimana caranya kita buat biar yang bisa akses admin dan pake logout itu cuma akun2 yang ter autenticated. kita pake auth sama kaya kita pake guest tadi

kayanya kalo kaya di atas tu sangat ribet bacanya yah teman teman. jadi aku buat berdasarkan urutan pembuatannya

- setelah kita setting pake auth. intinya sekarang masih ada kecolongann dimana kita bisa login ke admin pake email pengguna. disini kita perlu yang namanya pembatasan akses, email ini boleh kemana dan nggk boleh kemana.

- kita buat middleware baru 'php artisan make:middleware userAkses'

-



SKEMA DATABASE
