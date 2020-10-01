# Civic Labs

[![GitHub contributors](https://img.shields.io/github/contributors/code4romania/civiclabs.ro.svg?style=for-the-badge)](https://github.com/code4romania/civiclabs.ro/graphs/contributors) [![GitHub last commit](https://img.shields.io/github/last-commit/code4romania/civiclabs.ro.svg?style=for-the-badge)](https://github.com/code4romania/civiclabs.ro/commits/master) [![License: MPL 2.0](https://img.shields.io/badge/license-MPL%202.0-brightgreen.svg?style=for-the-badge)](https://opensource.org/licenses/MPL-2.0)

Insert bullets description of the project if available.

[See the project live](https://civiclabs.ro)

Give a short introduction of your project. Let this section explain the objectives or the motivation behind this project.

[Contributing](#contributing) | [Built with](#built-with) | [Getting started](#getting-started) | [Deployment](#deployment) | [Feedback](#feedback) | [License](#license) | [About Code4Ro](#about-code4ro)

## Contributing

This project is built by amazing volunteers and you can be one of them! Here's a list of ways in [which you can contribute to this project](.github/CONTRIBUTING.MD).

You can also list any pending features and planned improvements for the project here.

## Built with

* Laravel 5.8
* [Twill](https://twill.io)


### Requirements

* PHP 7.3+
* Apache or Nginx
* MySQL

## Getting started

### 1. Install dependencies
```
composer install
npm install
npm run twill-install
```

### 2. Build frontend
```
npm run prod
npm run twill-build
```

### 3. Configure
```
cp .env.example .env
php artisan key:generate
```

#### 3.A. Subdomain-based routing
```
APP_URL=domain.test

ADMIN_APP_URL=admin.domain.test
ADMIN_APP_PATH=

DASHBOARD_URL=dashboard.domain.test
DASHBOARD_PATH=
```

#### 3.B. Path-based routing
```
APP_URL=domain.test

ADMIN_APP_URL=domain.test
ADMIN_APP_PATH=admin

DASHBOARD_URL=domain.test
DASHBOARD_PATH=dashboard
```

### 4. Migrate and create admin account
```
php artisan migrate
php artisan twill:superadmin
```

## Deployment

Deploying to a remote host is done through `php artisan deploy <stage>`, using [lorisleiva/laravel-deployer](https://github.com/lorisleiva/laravel-deployer), which can be configured in [config/deploy.php](config/deploy.php).

## Feedback

* Request a new feature on GitHub.
* Vote for popular feature requests.
* File a bug in GitHub Issues.
* Email us with other feedback contact@code4.ro
********

## License

This project is licensed under the MPL 2.0 License - see the [LICENSE](LICENSE) file for details

## About Code4Ro

Started in 2016, Code for Romania is a civic tech NGO, official member of the Code for All network. We have a community of over 500 volunteers (developers, ux/ui, communications, data scientists, graphic designers, devops, it security and more) who work pro-bono for developing digital solutions to solve social problems. #techforsocialgood. If you want to learn more details about our projects [visit our site](https://www.code4.ro/en/) or if you want to talk to one of our staff members, please e-mail us at contact@code4.ro.

Last, but not least, we rely on donations to ensure the infrastructure, logistics and management of our community that is widely spread across 11 timezones, coding for social change to make Romania and the world a better place. If you want to support us, [you can do it here](https://code4.ro/en/donate/).
