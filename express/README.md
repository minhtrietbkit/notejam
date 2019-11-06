# Guide to use MySQL instead of SQLite3

## Start Docker MySQL

**NOTE** The code only works with `mysql v5`, `mysql v8` will fail to run.

The command below will start a `mysql` container with following information:

- database name: nodejam
- user name: user
- password: abc12345
- port: 3306

```Bash
mkdir sqldata #location to store sql data, mounted into sql container
docker run -d -e MYSQL_RANDOM_ROOT_PASSWORD=yes -e MYSQL_DATABASE=nodejam -e MYSQL_USER=user -e MYSQL_PASSWORD=abc12345 -v $(pwd)/sqldata:/var/lib/mysq -v $(pwd)/data.sql:/docker-entrypoint-initdb.d/schema.sql -p 3306:3306 mysql:5

```

## Start application

```Bash
$ cd YOUR_PROJECT_DIR/express/notejam/
$ DEBUG=* ./bin/www
```

Go to http://127.0.0.1:3000/ in your browser

## Known issue

The sign up step will fail, probably due to the fact that there was no `asynchronous` handling (not sure). Another source of issue might be various configurations for `mysql`.
