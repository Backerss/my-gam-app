# ระบบจัดการและติดตามพฤติกรรมนักเรียน - คู่มือสำหรับนักพัฒนา

## สารบัญ
- [ภาพรวมของระบบ](#ภาพรวมของระบบ)
- [เทคโนโลยีที่ใช้](#เทคโนโลยีที่ใช้)
- [สิ่งที่ต้องเรียนรู้เบื้องต้น](#สิ่งที่ต้องเรียนรู้เบื้องต้น)
- [วิธีการติดตั้งระบบ](#วิธีการติดตั้งระบบ)
- [โครงสร้างโปรเจค](#โครงสร้างโปรเจค)
- [ฐานข้อมูล](#ฐานข้อมูล)
- [การพัฒนาต่อ](#การพัฒนาต่อ)
- [การแก้ไขปัญหาเบื้องต้น](#การแก้ไขปัญหาเบื้องต้น)

## ภาพรวมของระบบ

ระบบจัดการและติดตามพฤติกรรมนักเรียนเป็นเว็บแอปพลิเคชันที่พัฒนาด้วย Laravel Framework โดยมีความสามารถหลักดังนี้:

- การจัดการข้อมูลนักเรียน (เพิ่ม, แก้ไข, ลบ, นำเข้า)
- การบันทึกและหักคะแนนพฤติกรรม
- การออกรายงานสรุปพฤติกรรม
- ระบบผู้ใช้หลายระดับ (ผู้ดูแลระบบ, ครู, ผู้ปกครอง)
- ระบบแจ้งเตือน
- การตั้งค่าระบบ

## เทคโนโลยีที่ใช้

- **Back-end:** PHP 8.2 + Laravel 10
- **Front-end:** HTML, CSS (Tailwind CSS), JavaScript
- **ฐานข้อมูล:** MySQL 8
- **Server:** Apache หรือ Nginx

## สิ่งที่ต้องเรียนรู้เบื้องต้น

สำหรับผู้พัฒนาที่ไม่มีพื้นฐานด้านการเขียนโค้ด ควรเรียนรู้สิ่งต่อไปนี้:

1. **พื้นฐาน PHP:** หลักการพื้นฐานของภาษา PHP (ตัวแปร, ฟังก์ชัน, คลาส)
2. **Laravel เบื้องต้น:** โครงสร้าง MVC, Routing, Controller, View, Model
3. **Tailwind CSS:** หลักการใช้งาน Utility Classes
4. **ฐานข้อมูล:** พื้นฐาน MySQL และการเขียน SQL เบื้องต้น
5. **Git:** การใช้ Version Control เบื้องต้น

แหล่งเรียนรู้แนะนำ:
- [Laravel - เอกสารทางการ](https://laravel.com/docs)
- [PHP - W3Schools](https://www.w3schools.com/php/)
- [Tailwind CSS - เอกสารทางการ](https://tailwindcss.com/docs)

## วิธีการติดตั้งระบบ

### ความต้องการของระบบ
- PHP 8.2 หรือสูงกว่า
- Composer
- MySQL 8 หรือสูงกว่า
- Node.js และ npm (สำหรับการพัฒนา)

### ขั้นตอนการติดตั้ง

1. **ติดตั้ง Software ที่จำเป็น:**
    - [XAMPP](https://www.apachefriends.org/) หรือ [Laravel Homestead](https://laravel.com/docs/homestead)
    - [Composer](https://getcomposer.org/download/)
    - [Node.js และ npm](https://nodejs.org/)
    - [Git](https://git-scm.com/downloads)

2. **Clone โปรเจค:**
    ```bash
    git clone [URL_REPOSITORY]
    cd my-laravel-app
    ```

3. **ติดตั้ง Dependencies:**
    ```bash
    composer install
    npm install
    ```

4. **ตั้งค่าไฟล์ Environment:**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

5. **แก้ไขไฟล์ .env:**
    - แก้ไขการตั้งค่าฐานข้อมูล (DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD)

6. **สร้างฐานข้อมูล:**
    - สร้างฐานข้อมูลใน MySQL ให้ตรงกับชื่อที่ระบุใน .env

7. **รันคำสั่ง Migration เพื่อสร้างตาราง:**
    ```bash
    php artisan migrate
    ```

8. **รัน Seeder เพื่อเพิ่มข้อมูลเริ่มต้น (ถ้ามี):**
    ```bash
    php artisan db:seed
    ```

9. **Compile Assets:**
    ```bash
    npm run dev
    ```

10. **เริ่มต้นเซิร์ฟเวอร์:**
     ```bash
     php artisan serve
     ```
     เว็บแอปจะทำงานที่ http://localhost:8000

## โครงสร้างโปรเจค

ระบบของเราแบ่งโฟลเดอร์ตามแบบมาตรฐานของ Laravel นะ มาดูกันว่าแต่ละโฟลเดอร์เก็บอะไรบ้าง:

- **app/:** เป็นโฟลเดอร์หลักที่เก็บโค้ดทั้งหมดของระบบเรา
    - **Http/Controllers/:** เก็บไฟล์ Controller ทั้งหมด ซึ่งทำหน้าที่รับคำสั่งจากผู้ใช้และประมวลผล
        - เช่น `StudentController.php` จัดการเรื่องเพิ่ม/แก้ไข/ลบข้อมูลนักเรียน
        - `BehaviorController.php` จัดการเรื่องคะแนนความประพฤติ
        - `AuthController.php` จัดการเรื่องการล็อกอิน/สมัครสมาชิก
    - **Models/:** เก็บโมเดลที่ใช้ติดต่อกับฐานข้อมูล แต่ละไฟล์จะแทนตารางในฐานข้อมูล
        - เช่น `Student.php` เชื่อมกับตาราง students
        - `BehaviorRecord.php` เชื่อมกับตาราง behavior_records
    - **Providers/:** เก็บ Service Provider ซึ่งเป็นส่วนที่ช่วยกำหนดค่าเริ่มต้นต่างๆ (ส่วนใหญ่เราไม่ต้องแก้ไขบ่อย)
    - **Mail/:** เก็บโค้ดที่ใช้สำหรับส่งอีเมล์แจ้งเตือนต่างๆ
    - **Exports/:** เก็บคลาสสำหรับส่งออกรายงานเป็น Excel หรือ PDF

- **config/:** เก็บไฟล์ตั้งค่าต่างๆ ของระบบ
    - เช่น `database.php` ตั้งค่าการเชื่อมต่อฐานข้อมูล
    - `app.php` ตั้งค่าทั่วไปของแอปฯ

- **database/**
    - **migrations/:** เก็บไฟล์ที่ใช้สร้างโครงสร้างตารางในฐานข้อมูล
        - เช่น `2023_01_01_create_students_table.php` สร้างตาราง students
    - **seeders/:** เก็บไฟล์สำหรับใส่ข้อมูลตัวอย่างหรือข้อมูลเริ่มต้น
        - เช่น `UserSeeder.php` สร้างบัญชีแอดมินตั้งต้น

- **public/:** เก็บไฟล์ที่เข้าถึงได้จากเว็บเบราว์เซอร์โดยตรง
    - เช่น รูปภาพ, ไฟล์ CSS และ JS ที่ compile แล้ว
    - ไฟล์ `index.php` ซึ่งเป็นจุดเริ่มต้นของแอปฯ (แต่เราไม่ต้องยุ่งกับมันหรอก)

- **resources/:**
    - **views/:** เก็บไฟล์หน้าตาเว็บไซต์ทั้งหมด (นามสกุล .blade.php)
        - เช่น `students/index.blade.php` คือหน้าแสดงรายการนักเรียน
        - `behaviors/form.blade.php` คือหน้าฟอร์มบันทึกพฤติกรรม
    - **css/:** เก็บไฟล์ CSS ที่เรากำลังพัฒนา (ยังไม่ได้ compile)
    - **js/:** เก็บไฟล์ JavaScript ที่เรากำลังพัฒนา (ยังไม่ได้ compile)
    - **lang/:** เก็บไฟล์คำแปลภาษาต่างๆ ถ้าเว็บเรารองรับหลายภาษา

- **routes/:**
    - `web.php` กำหนด URL ของเว็บเราว่าจะเรียกใช้ Controller ไหน
        - เช่น เมื่อเข้า `/students` จะเรียกใช้ `StudentController@index`

- **storage/:** เก็บไฟล์ที่อัปโหลดและไฟล์ล็อกต่างๆ
    - `app/public/` เก็บไฟล์ที่ผู้ใช้อัปโหลด เช่น รูปนักเรียน
    - `logs/` เก็บไฟล์ล็อกเวลาระบบเกิดข้อผิดพลาด ดูได้ที่ `laravel.log`

- **tests/:** เก็บไฟล์สำหรับทดสอบระบบอัตโนมัติ
    - ช่วยให้เราทดสอบได้ว่าโค้ดที่เขียนใหม่ไม่พังของเก่า

- **vendor/:** เก็บ library ต่างๆ ที่เราติดตั้งผ่าน Composer (ไม่ต้องแก้ไฟล์ในนี้เลย)

ถ้าเป็นมือใหม่ พื้นที่ที่เราจะทำงานบ่อยที่สุดคือ:
1. `app/Http/Controllers/` เวลาเขียนโค้ดจัดการข้อมูล
2. `resources/views/` เวลาแก้ไขหน้าตาเว็บไซต์
3. `app/Models/` เวลาต้องจัดการกับข้อมูลในฐานข้อมูล
4. `routes/web.php` เวลาต้องสร้างหน้าเว็บใหม่

## ฐานข้อมูล

ระบบใช้ฐานข้อมูล MySQL โดยมีตารางหลักดังนี้:

1. **users:** ข้อมูลผู้ใช้ (ครู, ผู้ดูแลระบบ)
2. **students:** ข้อมูลนักเรียน
3. **behavior_records:** บันทึกพฤติกรรมนักเรียน
4. **behavior_types:** ประเภทพฤติกรรม
5. **classrooms:** ข้อมูลห้องเรียน
6. **settings:** การตั้งค่าระบบ
7. **notifications:** การแจ้งเตือน

การอัพเดตโครงสร้างฐานข้อมูลทำได้โดยการแก้ไขหรือสร้างไฟล์ Migration ใหม่ใน `database/migrations/`

## การพัฒนาต่อ

1. **เพิ่มฟีเจอร์ใหม่:**
    - สร้าง Controller ใหม่ใน `app/Http/Controllers/`
    - เพิ่ม Route ใน `routes/web.php`
    - สร้าง View ใน `resources/views/`

2. **แก้ไขหน้าเว็บ:**
    - แก้ไขไฟล์ Blade Template ใน `resources/views/`
    - CSS อยู่ใน `resources/css/` หรือใช้ Tailwind CSS Utility Classes

3. **การคอมไพล์ Assets:**
    ```bash
    npm run dev   # สำหรับการพัฒนา
    npm run build # สำหรับ Production
    ```

## การแก้ไขปัญหาเบื้องต้น

- **การล้างแคช:**
  ```bash
  php artisan cache:clear
  php artisan config:clear
  php artisan view:clear
  php artisan route:clear
  ```

- **การอัพเดตหลังจาก Pull โค้ดใหม่:**
  ```bash
  composer install
  php artisan migrate
  npm install
  npm run dev
  ```

- **ดูล็อกของแอปพลิเคชัน:**
  ตรวจสอบไฟล์ `storage/logs/laravel.log`

สำหรับปัญหาเพิ่มเติม สามารถติดต่อทีมพัฒนาเดิมหรือค้นหาข้อมูลเพิ่มเติมได้ที่ [Laravel Forums](https://laracasts.com/discuss) หรือ [Stack Overflow](https://stackoverflow.com/questions/tagged/laravel)