## 👉 Queue Priority

```text
php artisan queue:work --queue=high,default

php artisan queue:monitor [options] [--] <queues>
- [options] is queue name

php artisan queue:failed
- Show all failed queue

php artisan queue:retry [id]
- Pushing failed queue jobs back onto the queue.

php artisan queue:retry --queue=custom

php artisan queue:work --queue=default,custom --tries=3
- Processing jobs from the [default,custom] queues

php artisan queue:clear --queue=default

php artisan queue:forget [id]
- Clear id ways failed queue from failed_jobs

php artisan queue:flush
- Clear all failed queue from failed_jobs
```
