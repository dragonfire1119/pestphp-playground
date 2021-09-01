You need to have `blog`, `blog_testing`, `blog2`, `blog2_testing` databases. I kept all the composer packages the same.

```
mysql -uroot -h 127.0.0.1 -P3306 -e 'CREATE DATABASE IF NOT EXISTS blog;'
mysql -uroot -h 127.0.0.1 -P3306 -e 'CREATE DATABASE IF NOT EXISTS blog_testing;'
mysql -uroot -h 127.0.0.1 -P3306 -e 'CREATE DATABASE IF NOT EXISTS blog2;'
mysql -uroot -h 127.0.0.1 -P3306 -e 'CREATE DATABASE IF NOT EXISTS blog2_testing;'
```

Once done just run: `php artisan test --parallel`

You should get:

```
SQLSTATE[42S02]: Base table or view not found: 1051 Unknown table 'blog_testing.migrations,blog_testing.posts' (SQL: drop table `migrations`,`posts`)
```

If you don't let me know. Thanks for your help on this issue man!
