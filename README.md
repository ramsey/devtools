<h1 align="center">ramsey/devtools</h1>

<p align="center">
    <strong>A Composer plugin to aid PHP library and application development.</strong>
</p>

<p align="center">
    <a href="https://github.com/ramsey/devtools"><img src="http://img.shields.io/badge/source-ramsey/devtools-blue.svg?style=flat-square" alt="Source Code"></a>
    <a href="https://packagist.org/packages/ramsey/devtools"><img src="https://img.shields.io/packagist/v/ramsey/devtools.svg?style=flat-square&label=release" alt="Download Package"></a>
    <a href="https://php.net"><img src="https://img.shields.io/packagist/php-v/ramsey/devtools.svg?style=flat-square&colorB=%238892BF" alt="PHP Programming Language"></a>
    <a href="https://github.com/ramsey/devtools/actions?query=workflow%3Amain"><img src="https://img.shields.io/github/workflow/status/ramsey/devtools/main?logo=github&style=flat-square" alt="Build Status"></a>
    <a href="https://codecov.io/gh/ramsey/devtools"><img src="https://img.shields.io/codecov/c/gh/ramsey/devtools?label=codecov&logo=codecov&style=flat-square" alt="Codecov Code Coverage"></a>
    <a href="https://shepherd.dev/github/ramsey/devtools"><img src="https://img.shields.io/endpoint?style=flat-square&url=https%3A%2F%2Fshepherd.dev%2Fgithub%2Framsey%2Fdevtools%2Fcoverage" alt="Psalm Type Coverage"></a>
    <a href="https://github.com/ramsey/devtools/blob/master/LICENSE"><img src="https://img.shields.io/packagist/l/ramsey/devtools.svg?style=flat-square&colorB=darkcyan" alt="Read License"></a>
    <a href="https://packagist.org/packages/ramsey/devtools/stats"><img src="https://img.shields.io/packagist/dt/ramsey/devtools.svg?style=flat-square&colorB=darkmagenta" alt="Package downloads on Packagist"></a>
    <a href="https://phpc.chat/channel/ramsey"><img src="https://img.shields.io/badge/phpc.chat-%23ramsey-darkslateblue?style=flat-square" alt="Chat with the maintainers"></a>
</p>

## About

I created this [Composer](https://getcomposer.org) plugin because I got tired of
making changes to development tools and scripts in my repositories, only to find
I liked the change so much, I now needed to apply it to all my repositories.
This is an effort to consolidate and simplify.

These tools might not be for you, and that's okay.

Maybe these tools help a lot, but you have different needs. That's also okay.
Feel free to fork this repository, change the package name, and make your own
devtools.

Of course, if you want to help improve these tools, I welcome your contributions.
Feel free to open issues, ask about or request features, and submit PRs. I can't
wait to see what you come up with.

This project adheres to a [code of conduct](CODE_OF_CONDUCT.md).
By participating in this project and its community, you are expected to
uphold this code.

## Installation

Install this package as a development dependency using
[Composer](https://getcomposer.org).

``` bash
composer require --dev ramsey/devtools
```

## Usage

This package is a Composer plugin. This means Composer recognizes that it
provides custom functionality to your `composer` command. After installation,
type `composer list`, and you'll see a lot of new commands that this plugin
provides.

``` bash
composer list
```

> You may additionally (or alternately) use `./vendor/bin/devtools` to access
> the commands within this plugin.

The commands this plugin provides are all intermingled with the rest of the
Composer commands, so it may be hard to find them all. We have a way to group
them by command namespace, though. Open your `composer.json` and add a
`command-prefix` property to the `extra` section. You may use any prefix you
wish.

``` json
{
    "extra": {
        "command-prefix": "my-prefix"
    }
}
```

Now, when you type `composer list` (or just `composer`), you'll see a section
of commands that looks like this:

```
 my-prefix
  my-prefix:analyze             Performs static analysis checks on the code base.
  my-prefix:analyze:phpstan     Runs the PHPStan static analyzer.
  my-prefix:analyze:psalm       Runs the Psalm static analyzer.
  my-prefix:build:clean         Removes everything from the build directory that is not under version control.
  my-prefix:build:clear-cache   Removes everything from build/cache that is not under version control.
  my-prefix:lint                Checks source code for coding standards issues.
  my-prefix:lint:fix            Checks source code for coding standards issues and fixes them, if possible.
  my-prefix:test                Runs the full unit test suite.
  my-prefix:test:all            Runs linting, static analysis, and unit tests.
  my-prefix:test:coverage:ci    Runs the unit test suite and generates a Clover coverage report.
  my-prefix:test:coverage:html  Runs the unit test suite and generates an HTML coverage report.
```

You can also list commands by command prefix with `composer list my-prefix`.

### Composer Command Autocompletion

Did you know you can set up your terminal to do Composer command autocompletion?

If you'd like to have Composer command autocompletion, you may use
[bamarni/symfony-console-autocomplete](https://github.com/bamarni/symfony-console-autocomplete).
Install it globally with Composer:

``` bash
composer global require bamarni/symfony-console-autocomplete
```

Then, in your shell configuration file — usually `~/.bash_profile` or `~/.zshrc`,
but it could be different depending on your settings — ensure that your global
Composer `bin` directory is in your `PATH`, and evaluate the
`symfony-autocomplete` command. This will look like this:

``` bash
export PATH="$(composer config home)/vendor/bin:$PATH"
eval "$(symfony-autocomplete)"
```

Now, you can use the `tab` key to auto-complete Composer commands:

``` bash
composer my-prefix:[TAB][TAB]
```

## Contributing

Contributions are welcome! Before contributing to this project, familiarize
yourself with [CONTRIBUTING.md](CONTRIBUTING.md).

To develop this project, you will need [PHP](https://www.php.net) 7.4 or greater
and [Composer](https://getcomposer.org).

After cloning this repository locally, execute the following commands:

``` bash
cd /path/to/repository
composer install
```

Now, you are ready to develop!

### Tooling

This project uses [CaptainHook](https://github.com/CaptainHookPhp/captainhook)
to validate all staged changes prior to commit.

#### Commands

To see all the commands available for contributing to this project:

``` bash
composer devtools
```

#### Coding Standards

This project follows a superset of [PSR-12](https://www.php-fig.org/psr/psr-12/)
coding standards, enforced by [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer).
The project PHP_CodeSniffer configuration may be found in `phpcs.xml.dist`.

CaptainHook will run PHP_CodeSniffer before committing. It will attempt to fix
any errors it can, and it will reject the commit if there are any un-fixable
issues. Many issues can be fixed automatically and will be done so pre-commit.

You may lint the entire codebase using PHP_CodeSniffer with the following
commands:

``` bash
# Lint
composer devtools lint

# Lint and autofix
composer devtools lint:fix
```

#### Static Analysis

This project uses a combination of [PHPStan](https://github.com/phpstan/phpstan)
and [Psalm](https://github.com/vimeo/psalm) to provide static analysis of PHP
code. Configurations for these are in `phpstan.neon.dist` and `psalm.xml`,
respectively.

CaptainHook will run PHPStan and Psalm before committing. The pre-commit hook
does not attempt to fix any static analysis errors. Instead, the commit will
fail, and you must fix the errors manually.

You may run static analysis manually across the whole codebase with the
following command:

``` bash
# Static analysis
composer devtools analyze
```

#### Project Structure

This project uses [pds/skeleton](https://github.com/php-pds/skeleton) as its
base folder structure and layout.

## Copyright and License

The ramsey/devtools library is copyright © [Ben Ramsey](https://benramsey.com)
and licensed for use under the terms of the
MIT License (MIT). Please see [LICENSE](LICENSE) for more information.
