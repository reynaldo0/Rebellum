
## 1. Backend (dashboard)

masuk ke folder "backend"

```bash
  cd backend
```

Install semua dependencies
```bash
  composer install
  npm install
```

jalankan migration database
```bash
  php artisan migrate --seed
```

jalankan server
```bash
  npm run build
  php artisan ser --port=8000
```

