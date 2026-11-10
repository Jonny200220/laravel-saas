<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Database: Neon Postgres

This project uses [Neon](https://neon.com) (serverless Postgres) as its database.

- Organization: `org-icy-band-97571257`
- Project: `late-lab-39744625`
- Console: https://console.neon.tech/app/projects/late-lab-39744625/

### 1. Install and sign in to the Neon CLI

```bash
npm i -g neon@latest
neon login
neon me   # confirms you are signed in
```

### 2. Link the project and write the connection strings

Run from the repository root:

```bash
neon init -y --agent claude-code --org-id org-icy-band-97571257 --project-id late-lab-39744625
```

This links the project (`.neon`) and appends these keys to `.env`:

| Key | Purpose |
|-----|---------|
| `DATABASE_URL` | Pooled connection (`-pooler` host), for the app |
| `DATABASE_URL_UNPOOLED` | Direct connection, for desktop clients and isolated migrations |
| `NEON_BRANCH`, `NEON_BRANCH_ID`, `NEON_FUNCTION_HOST_SUFFIX` | Neon branch metadata |

`neon init` also creates `neon.ts` and installs a few npm packages. The Laravel app does not use them.

### 3. Point Laravel at Neon

Laravel reads `DB_URL`, not `DATABASE_URL` (see `config/database.php`). Update `.env`:

```dotenv
DB_CONNECTION=pgsql
# Must be placed BELOW the DATABASE_URL line
DB_URL="${DATABASE_URL}"
```

> phpdotenv only expands `${VAR}` when `VAR` is defined earlier in the file. If `DB_URL` sits above `DATABASE_URL`, Laravel receives the literal text `${DATABASE_URL}` and falls back to `DB_HOST=127.0.0.1`.

When `DB_URL` is set, it overrides `DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD`. `php artisan db:show` still prints those leftover values, so they can be misleading.

### 4. Verify and migrate

```bash
php artisan db:show    # should report PostgreSQL and a *.neon.tech URL
php artisan migrate
```

The pooled URL works for a regular `migrate`. For `migrate --isolated` (advisory locks), use `DATABASE_URL_UNPOOLED`.

### Connecting from TablePlus

1. Copy `DATABASE_URL_UNPOOLED` from `.env`.
2. TablePlus → **Create a new connection → Import from URL** → paste it.
3. Make sure **SSL mode** is `REQUIRE`, then **Test** and **Connect**.

### Security

- Never commit `.env` or paste connection strings in chats, issues, or logs. They contain the database password.
- If a password leaks, reset it in Neon Console → **Roles** → `neondb_owner` → **Reset password**, then update `.env` and TablePlus.

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
