# DotVoid Forum

## What is DotVoid?

DotVoid is a forum on which you can chat mostly about software development, but also about anything IT-related: hardware, news, tech, video games, ...

The forum has the particularity of being a community project coming from what was Bukkit.fr. That means that it's the community that is developing the forum and its related applications (such as Discord bots), and **everyone is invited to [contribute]()**, no matter your skills. Everyone can contribute and do suggestions, whether it be the about the code, the design, the features, etc.

Developing a forum ourselves allows to involve the community, energize it and bring it closer together. Moreover, it allows to have a unique website which fits exactly what we want.

## Requirements

* Git (of course)
* PHP >= 7.1
* Mysql server >= 8.0
* Apache 2
* Composer
* Supervisor
* npm
* [VirtualBox](https://www.virtualbox.org/) and [Vagrant](https://www.vagrantup.com/) (Optional but recommended)

**Recommended OS:** Ubuntu 18.04 LTS

## Install

### Using Vagrant (recommended)

1. Clone the repository using `git clone`.
2. Open a terminal and `cd` to the project's root directory.
3. Run `vagrant up`. Vagrant will download a box, install it and provision it. This will take a few minutes. Wait for the operation to finish.
4. Your work environment is ready.

The provision should have installed and configured everything you need to start working. You can access your web server from your host machine via `http://127.0.0.1:4567`.

**Mysql root credentials:**

Username: root
Password: root
Database name: dotvoid
Testing database name: dotvoid_test

**Mysql laravel credentials:**

Username: laravel
Password: secret

**Virtual Machine credentials:**

Username: vagrant
Password: vagrant

**Default admin account:**

This account is created by running the seeders.

Username: admin@dotvoid.io
Password: admin

### Manually

1. Clone the repository using `git clone`.
2. Check if you meet all the requirements.
3. Create a new virtual host in you web server. Enable the `rewrite` mod if not already enabled.
4. Create a database with the `utf-8` charset.
5. Open a terminal and `cd` to the project's root directory.
6. Make sure the `www-data` user has write access to the `storage` and `bootstrap` directories.
7. Run `composer install`.
8. Run `npm install`.
9. Copy `env.example` and change its content to match your local configuration.
10. Run the following commands (replacing the path with your path):
```
php artisan key:generate

php artisan migrate:install
php artisan migrate
php artisan db:seed

supervisorctl reread
supervisorctl update
supervisorctl start laravel-worker:*

line="* * * * * php /path/to/project/artisan schedule:run >> /dev/null 2>&1"
(crontab -u www-data -l; echo "$line" ) | crontab -u www-data -
```


## Running the tests

To run the automated tests, simply run : `php ./vendor/phpunit/phpunit/phpunit` when your current directory is the root of the project.

## Contributing

Please read [CONTRIBUTING.md]() for details on our code of conduct, and the process for submitting pull requests to us.

## License

This project is licences under the [<INSERT LICENCE HERE>]().

## Join the discussion on Discord

Don't hesitate to come talk to the community to share your ideas or concerns on our [Discord](https://discord.gg/pmubSNC).  
We will be happy to answer your questions or help you setup your workspace to contribute to the project.  

The spoken language is mainly french but english is allowed aswell!

## Useful links

* [DotVoid documentation]()
* [Laravel documentation](https://laravel.com/docs/5.6)
* [Vagrant documentation](https://www.vagrantup.com/docs/index.html)