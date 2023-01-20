
## Import file Excel
1) setup connection with database;
2) then run command ``` php artisan migrate ```
3) Change in ```.env``` **QUEUE_CONNECTION** to ```QUEUE_CONNECTION=database```
4) ```php artisan config:clear``` run in console
5) ```php artisan queue:work``` run in console
6) ```php artisan migrate:refresh``` for refresh run in console
