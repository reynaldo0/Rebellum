
# Langkah-langkah menjalankan Project




## Persyaratan Sistem

- PHP (>=8.3)
- Composer
- Node.js & npm
- MySQL


## 1. Backend

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

Jalankan server di 2 terminal yang berbeda 

terminal 1
```bash
  php artisan ser --port=8000
```
terminal 2
```bash
  npm run dev
```


## 1. Frontend

masuk ke folder "frontend"

```bash
  cd frontend
```

Install semua dependencies
```bash
  npm install
```

jalankan server
```bash
  npm run dev
```

