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

- **app/:** โค้ดหลักของแอปพลิเคชัน
  - **Http/Controllers/:** ตัวควบคุมต่างๆ (BehaviorController, StudentController, ฯลฯ)
  - **Models/:** โมเดลสำหรับฐานข้อมูล (User, Student, ฯลฯ)
  - **Providers/:** Service Providers
- **config/:** ไฟล์การตั้งค่าต่างๆ
- **database/:** Migration และ Seeders
- **public/:** ไฟล์ที่เข้าถึงได้จากภายนอก (CSS, JS, รูปภาพ)
- **resources/:**
  - **views/:** หน้าเว็บแอปพลิเคชัน (Blade Templates)
  - **css/:** ไฟล์ CSS ที่ยังไม่ได้ compile
  - **js/:** ไฟล์ JavaScript ที่ยังไม่ได้ compile
- **routes/:** การกำหนดเส้นทาง URL
- **storage/:** ไฟล์ที่อัปโหลดและล็อก
- **tests/:** การทดสอบอัตโนมัติ

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