## 🔹 Step 1: Node.js install

```text
npm install -g pm2

pm2 -v // for check
```

## 🔹 Step 2: Laravel worker run (10 parallel)

```text
pm2 start "php artisan queue:work --queue=high,custom,default --sleep=3 --tries=3" --name=laravel-worker -i 10
```

## 🔹 Step 3: Auto-start (macOS reboot)

```text
pm2 startup
তুমি চাইছো তোমার Laravel Queue Worker বা যেকোনো প্রক্রিয়া (process) Mac reboot বা shutdown/restart হওয়ার পরও অটোমেটিক আবার চালু হয়ে যাক।

pm2 save
তুমি এখন পর্যন্ত যতগুলো process চালিয়েছো (যেমন php artisan queue:work 10 workers ইত্যাদি) এগুলোকে pm2 save করে রাখবে।
```

## 🔹 Step 4: PM2 commands (daily use)

```text
pm2 list                    # সব process list করবে
pm2 restart laravel-worker  # restart
pm2 stop laravel-worker     # stop
pm2 delete laravel-worker   # remove
pm2 logs laravel-worker     # log দেখবে
```
