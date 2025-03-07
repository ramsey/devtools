# ramsey/devtools Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## 2.1.0 - 2025-03-06

### Added

- Widen PHPStan versions to allow `^2.0`.
- Widen PHPUnit versions to allow `^12.0`.
- Widen Psalm versions to allow `^6.0`.

### Changed

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Nothing.

## 2.0.0 - 2023-04-24

### Added

- Nothing.

### Changed

- Bump minimum supported version of ramsey/devtools-lib to 2.0

- Bump minimum supported version of PHP to 8.1

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Nothing.

## 1.7.1 - 2021-08-08

### Added

- Bump to ramsey/devtools-lib patch level v1.2.2.

### Changed

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Nothing.

## 1.7.0 - 2021-07-11

### Added

- Bump to next minor version of ramsey/devtools-lib, which includes the following changes:
  - Add `lint:style` command to check for coding standards issues.
  - Add `lint:syntax` command to check for syntax errors.
  - Add `license` command that uses [madewithlove/license-checker](https://github.com/madewithlove/license-checker-php).
  - Add `clean:coverage` command to remove code coverage logging files.
  - Improve documentation for all commands.
  - The `lint` command is now aliased to `lint:all` and executes `lint:pds`, `lint:syntax`, and `lint:style`.
  - Deprecate `pre-commit` command and make it a no-op. This also deprecates `Ramsey\Dev\Tools\Composer\Command\PreCommitCommand`.
  - Deprecate `Ramsey\Dev\Tools\Composer\Command\CaptainHookInstallCommand`. This was only used internally and has been replaced with [captainhook/plugin-composer](https://github.com/captainhookphp/plugin-composer).

### Changed

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Nothing.

## 1.6.0 - 2021-03-21

### Added

- Bump to next minor version of ramsey/devtools-lib, with `lint:pds` command.

### Changed

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Nothing.

## 1.5.1 - 2020-10-27

### Added

- Nothing.

### Changed

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Use stable composer/composer version 2.0

## 1.5.0 - 2020-10-09

### Added

- Move library code to [ramsey/devtools-lib](https://github.com/ramsey/devtools-lib)

### Changed

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Nothing.

## 1.4.1 - 2020-09-07

### Added

- Nothing.

### Changed

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Test the 1.8.0 release of laminas/automatic-releases to ensure [laminas/automatic-releases#73](https://github.com/laminas/automatic-releases/pull/73) fixes [laminas/automatic-releases#57](https://github.com/laminas/automatic-releases/issues/57)

## 1.4.0 - 2020-09-04

### Added

- Improve CI workflows and tests; add automatic release workflow using laminas/automatic-releases.

### Changed

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Nothing.

## 1.3.0 - 2020-09-02

### Added

- Add a `changelog` command that proxies to the [phly/keep-a-changelog](https://github.com/phly/keep-a-changelog) `keep-a-changelog` command.

### Changed

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Nothing.

## 1.2.1 - 2020-08-31

### Added

- Nothing.

### Changed

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Use correct command name when dispatching events.

## 1.2.0 - 2020-08-30

### Added

- Use a namespaced Composer `extra` property (i.e., `extra.ramsey/devtools`).
- Allow additional scripts and overriding of commands.

### Changed

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Nothing.

## 1.1.0 - 2020-08-28

### Added

- Move base test case to `src` for use by dependants.

### Changed

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Nothing.

## 1.0.1 - 2020-08-28

### Added

- Nothing.

### Changed

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Rename command to avoid collisions with root `composer test`.

## 1.0.0 - 2020-08-27

Initial release.

### Added

- Nothing.

### Changed

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Nothing.
