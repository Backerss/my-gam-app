<div align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  
  # My Laravel Project
  
  [![PHP Version](https://img.shields.io/badge/PHP-8.1%2B-blue.svg)](https://www.php.net/)
  [![Laravel Version](https://img.shields.io/badge/Laravel-Latest-red.svg)](https://laravel.com)
  [![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)
  
  <p>ระบบจัดการข้อมูลโรงเรียนสำหรับครูและผู้ปกครอง</p>
</div>

## 📋 เกี่ยวกับโปรเจคนี้

โปรเจคนี้เป็นระบบจัดการข้อมูลโรงเรียนที่ออกแบบมาเพื่อเชื่อมโยงระหว่างครูและผู้ปกครอง ช่วยให้การติดตามพฤติกรรมและผลการเรียนของนักเรียนเป็นไปอย่างมีประสิทธิภาพ

## ✨ คุณสมบัติหลัก

- 🔐 **ระบบล็อกอินแยกสำหรับครูและผู้ปกครอง** - การเข้าถึงข้อมูลที่เหมาะสมตามบทบาท
- 📊 **ติดตามพฤติกรรมนักเรียน** - บันทึกและติดตามพฤติกรรมได้แบบเรียลไทม์
- 📱 **รองรับการใช้งานบนมือถือ** - ใช้งานได้ทุกที่ทุกเวลา
- 🔔 **ระบบแจ้งเตือน** - แจ้งเตือนผู้ปกครองเมื่อมีข้อมูลสำคัญ

## 🔧 ความต้องการของระบบ

| ความต้องการ | เวอร์ชั่น |
|------------|---------|
| PHP        | >= 8.1  |
| Composer   | 2.x     |
| MySQL/MariaDB | 5.7+ / 10.5+ |
| Node.js    | 16.x+   |
| NPM        | 8.x+    |
| Git        | 2.x+    |

## 🚀 การติดตั้ง

ทำตามขั้นตอนด้านล่างนี้เพื่อติดตั้งโปรเจคในเครื่องของคุณ:

### 1️⃣ Clone โปรเจค

```bash
git clone [URL ของ repository ของคุณ]
cd my-laravel-app
```

### 2️⃣ ติดตั้ง Dependencies

```bash
composer install
npm install
```

### 3️⃣ ตั้งค่าไฟล์สภาพแวดล้อม

```bash
cp .env.example .env
php artisan key:generate
```

### 4️⃣ แก้ไขไฟล์ .env

เปิดไฟล์ .env และตั้งค่าฐานข้อมูลของคุณ:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 5️⃣ สร้างฐานข้อมูลและ Migrate

```bash
php artisan migrate
```

### 6️⃣ เพิ่มข้อมูลเริ่มต้น (ถ้ามี)

```bash
php artisan db:seed
```

### 7️⃣ สร้าง Assets

```bash
npm run dev
```

### 8️⃣ เริ่มเซิร์ฟเวอร์

```bash
php artisan serve
```

> **เข้าใช้งาน:** เซิร์ฟเวอร์จะทำงานที่ http://localhost:8000

## 📂 โครงสร้างโปรเจค

<details>
<summary>คลิกเพื่อดูโครงสร้างโปรเจค</summary>

```
app/                # โค้ด PHP หลักของแอปพลิเคชัน
├── Console/        # คำสั่ง Artisan
├── Exceptions/     # Exception handlers
├── Http/           # Controllers, Middleware, Requests
├── Models/         # Eloquent Models
├── Providers/      # Service Providers
config/             # ไฟล์การตั้งค่าต่างๆ
database/           # Database migrations และ seeds
public/             # Document root ของเว็บไซต์
resources/          # Views, assets และภาษา
├── js/             # JavaScript files
├── css/            # CSS files
├── views/          # Blade templates
routes/             # ไฟล์ route ต่างๆ
storage/            # ไฟล์ที่อัปโหลด, logs, cache
tests/              # Test cases
vendor/             # Composer dependencies
```

</details>

## 📖 วิธีการใช้งาน

### สำหรับผู้ดูแลระบบ
1. ล็อกอินด้วยบัญชีผู้ดูแลระบบที่ `/admin/login`
2. จัดการผู้ใช้และสิทธิ์การเข้าถึงที่แผงควบคุม
3. ตั้งค่าระบบและพารามิเตอร์ต่างๆ

### สำหรับครู
1. ล็อกอินที่หน้าหลักด้วยบัญชีครู
2. จัดการข้อมูลนักเรียนและบันทึกพฤติกรรม
3. ส่งการแจ้งเตือนไปยังผู้ปกครอง

### สำหรับผู้ปกครอง
1. ล็อกอินที่หน้าหลักด้วยบัญชีผู้ปกครอง
2. ดูข้อมูลและความประพฤติของนักเรียน
3. รับการแจ้งเตือนและติดต่อกับครู

## 🌐 การ Deployment

### การ Deploy บน Shared Hosting
1. อัปโหลดไฟล์ทั้งหมดไปยังเซิร์ฟเวอร์
2. ตั้งค่า Document Root ไปที่โฟลเดอร์ `public/`
3. ตั้งค่า .env สำหรับการใช้งานจริง
4. เรียกใช้คำสั่ง migration และ optimization:
   ```bash
   php artisan migrate --force
   php artisan optimize
   php artisan config:cache
   php artisan route:cache
   ```

### การ Deploy ด้วย Docker
```bash
docker-compose up -d
```

## 👨‍💻 การพัฒนาต่อ

<details>
<summary>คลิกเพื่อดูขั้นตอนการพัฒนาต่อ</summary>

1. สร้าง branch ใหม่สำหรับ feature หรือการแก้ไข:
   ```bash
   git checkout -b feature/your-feature-name
   ```

2. ทำการเปลี่ยนแปลงและ commit:
   ```bash
   git commit -m "Add new feature or fix"
   ```

3. Push branch ไปยัง repository:
   ```bash
   git push origin feature/your-feature-name
   ```

4. สร้าง Pull Request บน GitHub

</details>

## 🧪 การทดสอบ

```bash
# รันการทดสอบทั้งหมด
php artisan test

# รันการทดสอบเฉพาะ feature
php artisan test --filter=FeatureTest

# รันการทดสอบกับรายงานความครอบคลุม
php artisan test --coverage
```

## 🛠️ เครื่องมือและเทคโนโลยีที่ใช้

- [Laravel](https://laravel.com) - PHP Framework
- [MySQL](https://www.mysql.com) - ฐานข้อมูล
- [Tailwind CSS](https://tailwindcss.com) - CSS Framework
- [Vue.js](https://vuejs.org) - JavaScript Framework

## ❓ การแก้ไขปัญหา

<details>
<summary><b>ปัญหา: Permission denied</b></summary>
<p>
แก้ไขโดยให้สิทธิ์กับโฟลเดอร์ storage และ bootstrap/cache:

```bash
chmod -R 775 storage bootstrap/cache
```
</p>
</details>

<details>
<summary><b>ปัญหา: Composer dependencies ไม่อัปเดต</b></summary>
<p>
ลองใช้คำสั่ง:

```bash
composer dump-autoload
```
</p>
</details>

<details>
<summary><b>ปัญหา: NPM build ล้มเหลว</b></summary>
<p>
ลองล้างแคชและติดตั้งใหม่:

```bash
npm cache clean --force
rm -rf node_modules package-lock.json
npm install
```
</p>
</details>

## 📞 การติดต่อและสนับสนุน

- 🐛 [รายงานปัญหา](https://github.com/your-username/my-gam-app/issues)
- 💬 [คำถามและคำตอบ](https://github.com/Backerss/my-gam-app/discussions)
- 📧 อีเมล: asan.r@nsru.ac.th

## 📚 เอกสารเพิ่มเติม

- [เอกสาร Laravel](https://laravel.com/docs)
- [Laracasts](https://laracasts.com)
- [วิดีโอสอนการใช้งาน](https://youtube.com/your-channel)

## 📄 License

โปรเจคนี้ใช้ใบอนุญาต MIT License - ดูรายละเอียดได้ที่ [LICENSE](LICENSE) file.
