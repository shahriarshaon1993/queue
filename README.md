## 👉 Throttling Exceptions

```text
php artisan queue:work --tries=100

What will the flow look like:
1. After 10 failures → no logs will come for 5 minutes (because the job has been throttled)
2. After 5 minutes, logs will start coming again.
3. After 30 minutes → the job will go to the failed_jobs table.
```

```text
return [(new ThrottlesExceptions(10, 10 * 60))->by('key')];

👉 by('key') আসলে কী করে?

ডিফল্ট ভাবে ThrottlesExceptions(10, 600) → job fail হলে সবগুলো instance কে একসাথে throttle করবে।
কিন্তু by('something') দিলে তুমি throttle কে একটা নির্দিষ্ট key অনুযায়ী আলাদা করবে।

👉 এখানে effect হবে:

- যদি user 1 এর job বারবার fail করে → তাহলে কেবল user 1 এর জন্য throttle হবে
- user 2 এর job ঠিকমতো চলতে থাকবে
- throttle সব user এর উপর globally প্রভাব ফেলবে না
```
