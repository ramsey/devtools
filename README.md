<h1 align="center">ramsey/devtools</h1>

<p align="center">
    <strong>A Composer plugin to aid PHP library and application development.</strong>
</p>

<p align="center">
    <a href="https://github.com/ramsey/devtools"><img src="http://img.shields.io/badge/source-ramsey/devtools-blue.svg?style=flat-square" alt="Source Code"></a>
    <a href="https://packagist.org/packages/ramsey/devtools"><img src="https://img.shields.io/packagist/v/ramsey/devtools.svg?style=flat-square&label=release" alt="Download Package"></a>
    <a href="https://php.net"><img src="https://img.shields.io/packagist/php-v/ramsey/devtools.svg?style=flat-square&colorB=%238892BF" alt="PHP Programming Language"></a>
    <a href="https://github.com/ramsey/devtools/blob/master/LICENSE"><img src="https://img.shields.io/packagist/l/ramsey/devtools.svg?style=flat-square&colorB=darkcyan" alt="Read License"></a>
    <a href="https://github.com/ramsey/devtools-lib/actions?query=workflow%3ACI"><img src="https://img.shields.io/github/workflow/status/ramsey/devtools-lib/CI?label=CI&logo=github&style=flat-square" alt="Build Status"></a>
    <a href="https://codecov.io/gh/ramsey/devtools-lib"><img src="https://img.shields.io/codecov/c/gh/ramsey/devtools-lib?label=codecov&logo=codecov&style=flat-square" alt="Codecov Code Coverage"></a>
    <a href="https://shepherd.dev/github/ramsey/devtools-lib"><img src="https://img.shields.io/endpoint?style=flat-square&url=https%3A%2F%2Fshepherd.dev%2Fgithub%2Framsey%2Fdevtools-lib%2Fcoverage" alt="Psalm Type Coverage"></a>
</p>

## About

I created this [Composer](https://getcomposer.org) plugin because I got tired of
making changes to development tools and scripts in my repositories, only to find
I liked the change so much, I now needed to apply it to all my repositories.
This is an effort to consolidate and simplify.

These tools might not be for you, and that's okay.

Maybe these tools help a lot, but you have different needs. That's also okay.
You may create your own devtools, requiring
[ramsey/devtools-lib](https://github.com/ramsey/devtools-lib) (the library code
behind this plugin), to extend and add to these tools, creating your own
Composer plugin.

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

### Add a Command Prefix

The commands this plugin provides are all intermingled with the rest of the
Composer commands, so it may be hard to find them all. We have a way to group
them by command namespace, though. Open `composer.json` and add a
`ramsey/devtools.command-prefix` property to the `extra` section. You may use
any prefix you wish.

``` json
{
    "extra": {
        "ramsey/devtools": {
            "command-prefix": "my-prefix"
        }
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
  my-prefix:test:all            Runs linting, static analysis, and unit tests.
  my-prefix:test:coverage:ci    Runs the unit test suite and generates a Clover coverage report.
  my-prefix:test:coverage:html  Runs the unit test suite and generates an HTML coverage report.
  my-prefix:test:unit           Runs the unit test suite.
```

You can also list commands by command prefix with `composer list my-prefix`.

### Extending or Overriding ramsey/devtools Commands

Maybe the commands ramsey/devtools provides don't do everything you need, or
maybe you want to replace them entirely. The configuration allows you to do
this!

Using the `ramsey/devtools.commands` property in the `extra` section of
`composer.json`, you may specify any command (*without* your custom prefix, if
you've configured one) as having other scripts to run, in addition to the
command's default behavior, or you may override the default behavior entirely.

Specifying additional scripts works exactly like
[writing custom commands](https://getcomposer.org/doc/articles/scripts.md#writing-custom-commands)
in `composer.json`, but the location is different. Everything you can do with
a custom Composer command, you can do here because they're the same thing.

``` json
{
    "extra": {
        "ramsey/devtools": {
            "command-prefix": "my-prefix",
            "commands": {
                "lint": {
                    "script": "@mylint"
                },
                "test:all": {
                    "script": [
                        "@mylint",
                        "@phpbench"
                    ]
                }
            }
        }
    },
    "scripts": {
        "mylint": "parallel-lint src tests",
        "phpbench": "phpbench run"
    }
}
```

In this way, when you run `composer lint` or `composer test:all`, it will
execute the default behavior first and then run your additional commands. To
override the default behavior so that it doesn't run at all and only your
scripts run, specify the `override` property and set it to `true`.

``` json
{
    "extra": {
        "ramsey/devtools": {
            "commands": {
                "lint": {
                    "override": true,
                    "script": "parallel-lint src tests"
                }
            }
        }
    }
}
```

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

Contributions are welcome! To contribute, please familiarize yourself with
[CONTRIBUTING.md](CONTRIBUTING.md).

## Copyright and License

The ramsey/devtools library is copyright © [Ben Ramsey](https://benramsey.com)
and licensed for use under the terms of the
MIT License (MIT). Please see [LICENSE](LICENSE) for more information.
