<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Penjelasan Project
Sebuah aplikasi website sederhana yang dapat membantu pengelolaan daftar buku pada suatu perpustakaan. Daftar buku tersebut diolah oleh seorang admin sekaligus dengan mengelola daftar penulis buku. Selain itu, disediakan *API endpoint* untuk menyajikan beberapa informasi seperti daftar buku, detail buku, pencarian buku berdasarkan judul buku, dan filter buku berdasarkan penulis.

## Desain Basis Data
![database-schema](https://user-images.githubusercontent.com/21327758/120672703-bc7aeb00-c4bc-11eb-9834-2270a638faf4.png "database-schema")
> atau dapat diakses melalui [dbdiagram.io (library-database-schema)](https://dbdiagram.io/d/60b8e3deb29a09603d17d6d2 "dbdiagram.io (library-database-schema)")

## Screenshot Aplikasi
<p align="center"><b>Book Dashboard</b></p>

![books index](https://user-images.githubusercontent.com/21327758/120667798-09a88e00-c4b8-11eb-8756-8a9955fd8d4d.png)

<p align="center"><b>Add Book</b></p>

![books create](https://user-images.githubusercontent.com/21327758/120667795-090ff780-c4b8-11eb-8f5d-54f1d116af13.png)
<p align="center"><b>Book Detail</b></p>

![books show](https://user-images.githubusercontent.com/21327758/120667802-0a412480-c4b8-11eb-921e-a04922a966b4.png)

<p align="center"><b>Edit Book</b></p>

![books edit](https://user-images.githubusercontent.com/21327758/120667797-090ff780-c4b8-11eb-81ea-b3671b5c4516.png)

<p align="center"><b>Author Dashboard</b></p>

![authors index](https://user-images.githubusercontent.com/21327758/120667789-07deca80-c4b8-11eb-84ac-61899517c373.png)

<p align="center"><b>Add Author</b></p>

![authors create](https://user-images.githubusercontent.com/21327758/120667780-06150700-c4b8-11eb-9648-8aac8aa5cb98.png)

<p align="center"><b>Author Detail</b></p>

![authors show](https://user-images.githubusercontent.com/21327758/120667794-08776100-c4b8-11eb-8e49-d6168c7e3cc3.png)

<p align="center"><b>Edit Author</b></p>

![authors edit](https://user-images.githubusercontent.com/21327758/120667787-07463400-c4b8-11eb-8c70-416db9dbc5c4.png)

## Dependency
- [Laravel UI](https://github.com/laravel/ui "Laravel UI") - Library untuk membuat *auth scaffolding* 
- [Faker](https://github.com/FakerPHP/Faker) - Library untuk membuat data dummy

## Instalasi Project
1. Clone repository ini `https://github.com/faizaaulia/dot-library.git` atau download source codenya lalu ekstrak
2. Masuk ke direktori project <br>
`cd dot-library`
3. Install *dependencies* <br>
`composer install`
4. Atur file .env <br>
`cp .env.example .env`
5. *Generate app encryption key* <br>
`php artisan key:generate`
6. Buat *database* kosong
7. Tambahkan informasi database di file **.env**<br>
Isi variabel `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` sesuai dengan pengaturan database yang digunakan
8. Migrasi *database* <br>
`php artisan migrate`
9. *Database seeding* <br>
Memasukkan beberapa data dummy untuk aplikasi <br>
`php artisan db:seed`

## API Documentation
[Postman API documentation](https://documenter.getpostman.com/view/5188042/TzY4eEHg "Postman API documentation")
