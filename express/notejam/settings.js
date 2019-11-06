var settings = {
  development: {
    db: {
      host: "127.0.0.1",
      user: "user",
      password: "abc12345",
      database: "nodejam"
    },
    dsn: "mysql://user:abc12345@127.0.0.1/nodejam"
  },
  test: {
    db: {
      host: "127.0.0.1",
      user: "user",
      password: "abc12345",
      database: "nodejam"
    },
    dsn: "mysql://user:abc12345@127.0.0.1/nodejam"
  }
};

var env = process.env.NODE_ENV;
if (!env) {
  env = "development";
}
module.exports = settings[env];
